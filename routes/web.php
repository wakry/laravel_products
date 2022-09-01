<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [ProductController::class, 'home'])->name('home');;

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('management', \App\Http\Controllers\Admin\AdminController::class);
    });

    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::resource('/products', ProductController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');;

});

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::post('update-cart', [ProductController::class, 'cartUpdate'])->name('update.cart');
Route::post('remove-from-cart', [ProductController::class, 'removeFromCart'])->name('remove.from.cart');