<?php

namespace App\Http\Controllers;

use App\Mail\CommandSuccess;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller {
    public function index(): Factory|View|Application
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $produit) {
            $total += $produit['prix'] * $produit['quantite'];
        }

        return view('cart', ['cart' => $cart, 'total' => $total]);
    }

    public function add(Request $request): RedirectResponse
    {
        $produit = Produit::findOrFail($request->id);
        $quantite = $request->quantite;

        $cart = session()->get('cart', []);
        $cart[$produit->id] = [
            'id' => $produit->id,
            'nom' => $produit->nom,
            'prix' => $produit->prix,
            'quantite' => $quantite,
            'qte' => $produit->qte,
        ];
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function update(Request $request): RedirectResponse
    {
        $produit = Produit::findOrFail($request->id);
        $quantite = $request->quantite;

        $cart = session()->get('cart', []);
        $cart[$produit->id]['quantite'] = $quantite;
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove(Request $request): RedirectResponse
    {
        $produit = Produit::findOrFail($request->id);
        $cart = session()->get('cart', []);
        unset($cart[$produit->id]);
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function destroy(): RedirectResponse
    {
        session()->forget('cart');

        return redirect()->route('cart');
    }

    public function checkout(): Application|Factory|View|RedirectResponse
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $produit) {
            $total += $produit['prix'] * $produit['quantite'];
        }

        if ($cart == null) {
            return redirect()->route('cart');
        }

        return view('checkout', ['cart' => $cart, 'total' => $total]);
    }

    public function checkoutSend(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => array(
                'required',
                'regex:/^[A-Za-zÀ-ÖØ-ö\s]+$/',
                'max:40'
            ),
            'prenom' => array(
                'required',
                'regex:/^[A-Za-zÀ-ÖØ-ö\s]+$/',
                'max:40'
            ),
            'email' => 'required|email|max:40',
        ]);

        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $produit) {
            $total += $produit['prix'] * $produit['quantite'];
            $p = Produit::findOrFail($produit['id']);
            $reste = $produit['qte'] - $produit['quantite'];
            if ($reste < 0) {
                session()->forget('cart');
                return redirect()->route('cart')->withErrors(['error', 'Un produit est en rupture de stock']);
            } else {
                $p->qte = $reste;
                $p->save();
            }
        }

        $commande = new Commande();
        $commande->nom = $request->nom;
        $commande->prenom = $request->prenom;
        $commande->email = $request->email;
        $commande->panier = json_encode($cart);
        $commande->total = $total;
        $commande->etat = 'En attente';
        $commande->save();

        session()->forget('cart');
        session()->put('success', true);

        Mail::to($request->email)->send(new CommandSuccess($request->email, json_encode($cart), $total));

        return redirect()->route('index');
    }

}
