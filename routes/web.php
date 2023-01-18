<?php

// use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/admin', [HomeController::class, 'dashboard'])
    // ->name('dashboard');
    
    Route::prefix('admin')->group(function () {


        Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
        Route::get('/products', [DashboardController::class, 'productsIndex'])
        ->name('dashboard.products.index');
        
        Route::resource('users',UserController::class);
        Route::resource('categories', CategoryController::class)->except([
            'show', 'index'
        ]);


    });
    
    Route::resource('cart',CartController::class)->only([
        'index',
        'destroy'
    ]);

    Route::resource('orders',OrderController::class);
    
});


Route::resource('products',ProductController::class);


// Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
// Route::get('/cart/{id}/destroy', [CartController::class, 'index'])->name('carts.destroy');
