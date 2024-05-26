<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataCustomerController;
use App\Http\Controllers\DataOrderController;
use App\Http\Controllers\DataProductController;
use App\Http\Controllers\DataPromotionController;
use App\Http\Controllers\HistoryOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/home', [DashboardController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::group(['middleware' => ['cek_login:1']], function () {
        // route admin
        Route::resource('users', UserController::class, [
            'except'    => 'show'
        ]);
        Route::resource('data_products', DataProductController::class, [
            'except'    => 'show'
        ]);
        Route::resource('data_promotions', DataPromotionController::class);
        Route::resource('data_customers', DataCustomerController::class, [
            'except'    => 'show'
        ]);
        Route::resource('data_orders', DataOrderController::class, [
            'except'    => 'create', 'store'
        ]);
    });

    Route::group(['middleware' => ['cek_login:0']], function () {
        // route customer
        Route::resource('orders', OrderController::class, [
            'except'    => 'create', 'show', 'edit', 'update', 'destroy'
        ]);
        Route::post('orders/checkout', [OrderController::class, 'checkout']);
        Route::resource('carts', CartController::class, [
            'except'    => 'create', 'edit', 'update', 'show'
        ]);
        Route::resource('history_orders', HistoryOrderController::class, [
            'except'  => 'create', 'store', 'edit', 'update', 'destroy'
        ]);
        Route::get('/data_akuns', [DataAkunController::class, 'index']);
        Route::get('/data_akuns/{id}', [DataAkunController::class, 'detail_customer']);
        Route::get('/data_akuns/edit/{id}', [DataAkunController::class, 'edit']);
        Route::put('/data_akuns/{id}', [DataAkunController::class, 'update']);

    });

    Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [LoginController::class, 'authetincate']);
        Route::get('/login', [LoginController::class, 'index'])->name('login');

        Route::get('/check_products', [ProductController::class, 'index']);
        Route::post('/product_detail', [ProductController::class, 'product_detail']);

        Route::get('/promotions', [PromotionController::class, 'index']);
        Route::get('/promotions/{id}', [PromotionController::class, 'promotion_detail']);

        
    });