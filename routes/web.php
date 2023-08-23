<?php

use App\Http\Livewire\Products\ProductTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Menu\MenuController;

Route::get('/',         [HomeController::class, 'home'])    ->name('home');
Route::get('/about',    [HomeController::class, 'about'])   ->name('about');
Route::get('/blog',     [HomeController::class, 'blog'])    ->name('blog');
Route::get('/contact',  [HomeController::class, 'contact']) ->name('contact');
Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/terms',    [HomeController::class, 'terms'])   ->name('terms');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //Menú para rol administrador
    Route::get('/admin', [MenuController::class, 'admin'])->name('admin');
    //Menú para rol vendedor
    Route::get('/seller', [MenuController::class, 'seller'])->name('seller');
    //Menú para rol invitado
    Route::get('/guest', [MenuController::class, 'guest'])->name('guest');

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);
    Route::get('/product-table', ProductTable::class)->name('product-table');
    Route::resource('suppliers', ProductController::class);
    Route::resource('purchases', ProductController::class);
    Route::resource('sales', ProductController::class);
});