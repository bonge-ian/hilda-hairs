<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return view('pages.index');
});

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
