<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\Brands\BrandController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Categories\SubCategoryController;
use App\Http\Controllers\Admin\Coupons\CouponController;
use App\Http\Controllers\Admin\Products\ProductColorController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\ProductImageController;
use App\Http\Controllers\Admin\Products\ProductSizeController;
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


Route::middleware('jwt.verify', 'Admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/getOne/{id}', [CategoryController::class, 'show']);
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/getAll', [CategoryController::class, 'index']);
        Route::get('/search', [CategoryController::class, 'search']);

    });

    Route::prefix('subCategories')->group(function () {
        Route::get('/getOne/{id}', [SubCategoryController::class, 'show']);
        Route::get('/getSubCategoryForSpecificCategory/{category_id}', [SubCategoryController::class, 'getSubCategoryForSpecificCategory']);
        Route::post('/update/{id}', [SubCategoryController::class, 'update']);
        Route::delete('/delete/{id}', [SubCategoryController::class, 'destroy']);
        Route::post('/create/{category_id}', [SubCategoryController::class, 'store']);
        Route::get('/getAll', [SubCategoryController::class, 'index']);
        Route::get('/search', [SubCategoryController::class, 'search']);

    });

    Route::prefix('products')->group(function () {
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/getOne/{id}', [ProductController::class, 'show']);
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
        Route::get('/getProductsForSpecificCategory/{id}', [ProductController::class, 'getProductsForSpecificCategory']);
        Route::get('/getProductsForSpecificSubCategory/{id}', [ProductController::class, 'getProductsForSpecificSubCategory']);
        Route::get('/getProductsForSpecificBrand/{id}', [ProductController::class, 'getProductsForSpecificBrand']);
        Route::get('/getAll', [ProductController::class, 'all']);
        Route::get('/search', [ProductController::class, 'search']);
    });

    Route::prefix('productColors')->group(function () {
        Route::delete('/{id}', [ProductColorController::class, 'destroy']);
        Route::post('/product/{id}', [ProductColorController::class, 'store']);
        Route::get('/product/{id}', [ProductColorController::class, 'index']);
    });

    Route::prefix('productImages')->group(function () {
        Route::delete('/{id}', [ProductImageController::class, 'destroy']);
        Route::post('/product/{id}', [ProductImageController::class, 'store']);
        Route::get('/product/{id}', [ProductImageController::class, 'index']);
    });

    Route::prefix('productSizes')->group(function () {
        Route::delete('/{id}', [ProductSizeController::class, 'destroy']);
        Route::post('/product/{id}', [ProductSizeController::class, 'store']);
        Route::get('/product/{id}', [ProductSizeController::class, 'index']);
    });

    Route::prefix('brands')->group(function () {
        Route::get('/getOne/{id}', [BrandController::class, 'show']);
        Route::post('/update/{id}', [BrandController::class, 'update']);
        Route::delete('/delete/{id}', [BrandController::class, 'destroy']);
        Route::post('/create', [BrandController::class, 'store']);
        Route::get('/getAll', [BrandController::class, 'index']);
        Route::get('/search', [BrandController::class, 'search']);
    });

    Route::prefix('coupons')->group(function () {
        Route::get('/getOne/{id}', [CouponController::class, 'show']);
        Route::patch('/update/{id}', [CouponController::class, 'update']);
        Route::delete('/delete/{id}', [CouponController::class, 'destroy']);
        Route::post('/create', [CouponController::class, 'store']);
        Route::get('/getAll', [CouponController::class, 'index']);
        Route::get('/search', [CouponController::class, 'search']);
    });

    Route::prefix('updateOrderStatus')->group(function () {
        Route::get('/search', [AdminOrderController::class, 'search']);
        Route::get('/{id}', [AdminOrderController::class, 'show']);
        Route::patch('/{id}', [AdminOrderController::class, 'update']);
        Route::get('/', [AdminOrderController::class, 'index']);
    });

});



