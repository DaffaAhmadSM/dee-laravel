<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Catalog\ForRentController;
use App\Http\Controllers\Catalog\ForSellController;
use App\Http\Controllers\CheckoutController;

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
Route::redirect('/', '/for-sell');

// login view
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
// register view
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/for-sell',[ForSellController::class, 'index']);
    Route::get('/for-rent',[ForRentController::class, 'index']);
    Route::get('/item-detail/{ItemList:slug}', [ItemController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::prefix('/review')->group(function () {
        Route::post('/post/{id}', [ReviewController::class, 'store']);
        Route::post('/reply/item/{item_id}/id/{id}', [ReviewController::class, 'reply']);
    });

    // add to cart
    Route::prefix('/add-to-cart')->group(function () {
        // view
        Route::get('/cart-sell/{ItemList:id}', [CartController::class, 'cartSell']);
        Route::get('/cart-rent/{ItemList:id}', [CartController::class, 'cartRent']);
        Route::get('/cart-reserve/{ItemList:id}', [CartController::class, 'cartReserve']);
        // post
        Route::post('/cart-sell/{id}', [CartController::class, 'cartSellPost']);
        Route::post('/cart-reserve/{id}', [CartController::class, 'cartReservePost']);
        Route::post('/cart-rent/{id}', [CartController::class, 'cartRentPost']);
    });


    Route::prefix('/delete-cart')->group(function () {
        Route::post('/cart/{id}', [CartController::class, 'cartDelete']);
        Route::post('/cart-reserve/{id}', [CartController::class, 'cartReserve']);
    });

    Route::prefix('/cart')->group(function () {
        Route::get('/cart-sell-rent', [CartController::class, 'cartSellRentView']);
        Route::get('/cart-reserve', [CartController::class, 'cartReserve']);
    });

    Route::prefix('/checkout')->group(function () {
        Route::post('/{id}', [CheckoutController::class, 'index']);
        Route::post('/cart/store', [CheckoutController::class, 'store']);
    });
    Route::get('/payment-method/{id}/', [CheckoutController::class, 'paymentMethod']);
    
});
