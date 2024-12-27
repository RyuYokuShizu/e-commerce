<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    #product
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::get('/{id}/purchase', [ProductController::class, 'purchase'])->name('purchase');
        Route::post('/{id}/buy', [ProductController::class, 'buy'])->name('buy');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
    });



});