<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/products/{id}', [MainController::class, 'product'])->name('product');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout', [CartController::class, 'checkoutSend'])->name('cart.checkout');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'loginSend'])->name('login.send');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');
Route::get('/logout', [AdminController::class, 'logout'])->middleware('auth')->name('logout');
