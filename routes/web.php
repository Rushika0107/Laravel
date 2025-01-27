<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get("/", function () {
    return view("welcome");
    });

   // Route::view("user-form", "user-form");
    // Route::post("adduser",[UserController::class,"addUser"]);
    //Route::view("user-form","user-form");

    Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{products}/edit','edit')->name('products.edit');
    Route::put('/products/{products}','update')->name('products.update');
    Route::delete('/products/{products}','destroy')->name('products.destroy');
    });



   