<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Customers\IndexCustomer;
use App\Http\Livewire\Products\IndexProduct;
use App\Http\Livewire\Suppliers\IndexSupplier;
use App\Http\Livewire\Users\IndexUser;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Livewire\Products\BrandManagement;
use App\Http\Livewire\Products\CategoryManagement;
use App\Http\Livewire\Inventory\InventoryManagement;
use App\Http\Livewire\Purchases\PurchaseManagement;
use App\Http\Livewire\Sales\SaleManagement;


Route::get('/',         [HomeController::class, 'home'])->name('home');
Route::get('/about',    [HomeController::class, 'about'])->name('about');
Route::get('/blog',     [HomeController::class, 'blog'])->name('blog');
Route::get('/contact',  [HomeController::class, 'contact'])->name('contact');
Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/terms',    [HomeController::class, 'terms'])->name('terms');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //Menú para rol administrador
    Route::get('/admin', [MenuController::class, 'admin'])->name('admin');
    //Menú para rol vendedor
    Route::get('/seller', [MenuController::class, 'seller'])->name('seller');
    //Menú para rol invitado
    Route::get('/guest', [MenuController::class, 'guest'])->name('guest');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/index-user', IndexUser::class)->name('index-user');
    Route::get('/index-product', IndexProduct::class)->name('index-product');
    Route::get('/index-supplier', IndexSupplier::class)->name('index-supplier');
    Route::get('/index-customer', IndexCustomer::class)->name('index-customer');
    Route::get('/purchases', PurchaseManagement::class)->name('purchases');
    Route::get('/sales', SaleManagement::class)->name('sales');
    Route::get('/inventory', InventoryManagement::class)->name('inventory');
    Route::get('/Categories', CategoryManagement::class)->name('categories');
    Route::get('/Brands', BrandManagement::class)->name('brands');
});
