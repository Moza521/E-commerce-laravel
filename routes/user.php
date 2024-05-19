<?php

use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\User\Orders\OrderController;
use App\Http\Controllers\User\Orders\OrderHistoryController;
use App\Http\Controllers\User\Orders\OrderItemController;
use App\Http\Controllers\User\Reviews\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('jwt.verify', 'User')->group(function () {

    Route::prefix('orders')->group(function () {
        Route::post('/create', [OrderController::class, 'store']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::delete('/{id}', [OrderController::class, 'destroy']);
        Route::get('/', [OrderController::class, 'index']);
    });

    Route::prefix('orderItems')->group(function () {

        Route::get('/{order_id}', [OrderItemController::class, 'index']);
    });

    Route::prefix('orderHistory')->group(function () {

        Route::get('/', [OrderHistoryController::class, 'index']);
        Route::get('/{email}', [OrderHistoryController::class, 'userHistory']);
    });

    Route::prefix('reviews')->group(function () {
        Route::patch('/{id}/product/{product_id}', [ReviewController::class, 'update']);
        Route::delete('/{id}', [ReviewController::class, 'destroy']);
        Route::post('/product/{product_id}', [ReviewController::class, 'store']);
        Route::get('/product/{product_id}', [ReviewController::class, 'index']);
        Route::get('/{id}', [ReviewController::class, 'show']);
    });

    Route::prefix('ratings')->group(function () {
        Route::patch('/updateRating/{id}', [ProductController::class, 'updateRating']);
        Route::delete('/destroyRating/{id}', [ProductController::class, 'destroyRating']);
    });

});

