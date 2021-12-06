<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Livewire\CartSummary;
use App\Http\Livewire\CartView;
use App\Http\Livewire\ProductListings;
use App\Http\Livewire\ProductView;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
