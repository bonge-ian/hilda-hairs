<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Livewire\CartSummary;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\ProductListings;
use App\Http\Livewire\ProductView;


Route::get('/', [PagesController::class, 'index']);

Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified']);

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
	Route::view('profile', 'profile.show');
});

Route::prefix('categories')->name('category.')->group(function () {
	Route::get('/', [CategoryController::class, 'index'])->name('index');
	Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('show');
});

Route::prefix('products')->name('product.')->group(function () {
    Route::get('/', ProductListings::class)->name('index');
	Route::get('/{product:slug}', ProductView::class)->name('show');
});

Route::get('/cart', CartSummary::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
