<?php

// use App\Models\Product;

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
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
        
        Route::resource('feedbacks',FeedbackController::class);


        Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
        Route::get('/products', [DashboardController::class, 'productsIndex'])
        ->name('dashboard.products.index');
        
        Route::resource('users',UserController::class);
        Route::resource('categories', CategoryController::class)->except([
            'show', 'index'
        ]);
        Route::resource('materials', MaterialController::class)->except([
            'show', 'index'
        ]);
        Route::resource('brands', BrandController::class)->except([
            'show', 'index'
        ]);
        Route::get('reviews',[ProductReviewController::class, 'indexAll'])->name('reviews.indexAll');



    });
    
    Route::resource('cart',CartController::class)->only([
        'index',
        'destroy'
    ]);


    Route::resource('orders',OrderController::class);
    
});
Route::resource('categories', CategoryController::class)->only([
            'show', 'index'
        ]);
Route::resource('materials', MaterialController::class)->only([
            'show', 'index'
        ]);
Route::resource('brands', BrandController::class)->only([
            'show', 'index'
        ]);
Route::get('/productsSorted/{sortBy}',[ProductController::class, 'indexSorted'])->name('products.indexSorted');


Route::resource('products',ProductController::class);
Route::resource('products.reviews', ProductReviewController::class)->shallow();


// Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
// Route::get('/cart/{id}/destroy', [CartController::class, 'index'])->name('carts.destroy');
