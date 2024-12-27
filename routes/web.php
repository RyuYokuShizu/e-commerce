<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search',[HomeController::class, 'search'])->name('search');

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
// >>>>>>> dev_ryu
