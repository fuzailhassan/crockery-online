<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->name('dashboard');
    
    Route::resource('cart',CartController::class)->only([
        'index',
        'destroy'
    ]);
    
});


Route::resource('products',ProductController::class);
Route::resource('orders',OrderController::class);

// Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
// Route::get('/cart/{id}/destroy', [CartController::class, 'index'])->name('carts.destroy');
