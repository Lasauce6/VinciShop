<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): Factory|View|Application
    {
        $commandes = Commande::all();
        for ($i = 0; $i < count($commandes); $i++) {
            $commandes[$i]->panier = json_decode($commandes[$i]->panier);
        }

        return view('admin', ['commandes' => $commandes]);
    }

    public function login(): Factory|View|Application
    {
        return view('login');
    }

    public function loginSend(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.index');
        }
        return redirect()->route('login')->withErrors(['auth' => 'Email ou mot de passe incorrect.']);
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('index');
    }

    public function traite(Request $request): RedirectResponse
    {
        $commande = Commande::find($request->id);
        $commande->etat = $commande->traite == 'En attente' ? 'Traitée' : 'En attente';
        $commande->save();
        return redirect()->route('admin.index');
    }

//    public function createCreds(): RedirectResponse
//    {
//        $user = new \App\Models\User();
//        $user->name = 'admin';
//        $user->email = 'your_email/username';
//        $user->password = bcrypt('your_password');
//        $user->save();
//
//        return redirect()->route('index');
//
//    }
}
