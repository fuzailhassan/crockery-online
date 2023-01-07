<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    $products = Product::all(); 
    return view('index')->with('products',$products);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});


Route::resource('products',ProductController::class);
Route::resource('orders',OrderController::class);
Route::resource('cart',CartController::class)->only([
    'index',
    'destroy'
]);
// Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
// Route::get('/cart/{id}/destroy', [CartController::class, 'index'])->name('carts.destroy');
