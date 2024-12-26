<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;



Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    #product
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::get('/{id}/purchase', [ProductController::class, 'purchase'])->name('purchase');
    });

    #cart
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
        Route::post('/{id}/buy', [CartController::class, 'buy'])->name('buy');
    });
    
    #History
    Route::group(['prefix' => 'history', 'as' => 'history.'], function(){
        Route::post('/{id}/store', [HistoryController::class, 'store'])->name('store');
    });
    

});