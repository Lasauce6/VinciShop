<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        for ($i = 0; $i < count($commandes); $i++) {
            $commandes[$i]->panier = json_decode($commandes[$i]->panier);
        }

        return view('admin', ['commandes' => $commandes]);
    }

    public function login()
    {
        return view('login');
    }

    public function loginSend(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.index');
        }
        return redirect()->route('login')->withErrors(['auth' => 'Email ou mot de passe incorrect.']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
