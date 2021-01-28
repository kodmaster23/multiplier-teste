<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', '\App\Api\Users\Controllers\LoginController@login');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('category', \App\Api\Products\Controllers\CategoryController::class);
    Route::apiResource('product', \App\Api\Products\Controllers\ProductController::class);

    Route::group(['prefix' => 'order'], function () {
        Route::post('add-item', '\App\Api\Orders\Controllers\OrderItemController::class@store');
        Route::post('remove-item', '\App\Api\Orders\Controllers\OrderItemController::class@destroy');
    });

    Route::apiResource('order', \App\Api\Orders\Controllers\OrderController::class);
});
