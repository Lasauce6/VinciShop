<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainController extends Controller {
    public function index(): Factory|View|Application
    {
        $success = session()->get('success', false);
        session()->forget('success');

        return view('index', ['success' => $success]);
    }

    public function products(): Factory|View|Application
    {
        $produits = Produit::get();

        return view('products', ['produits' => $produits]);
    }

    public function product($id): Factory|View|Application
    {
        $produit = Produit::find($id);

        return view('product', ['produit' => $produit]);
    }

    public function infos(): Factory|View|Application
    {
        return view('infos');
    }
}
