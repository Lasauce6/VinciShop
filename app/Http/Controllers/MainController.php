<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function index() {
        $success = session()->get('success', false);
        session()->forget('success');

        return view('index', ['success' => $success]);
    }

    public function products() {
        $produits = Produit::get();

        return view('products', ['produits' => $produits]);
    }

    public function product($id) {
        $produit = Produit::find($id);

        return view('product', ['produit' => $produit]);
    }
}
