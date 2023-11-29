<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Catalog\ForRentController;
use App\Http\Controllers\Catalog\ForSellController;
use App\Http\Controllers\SuggestController;

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
    Route::get('/logout', [LoginController::class, 'destroy']);
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
        Route::get('/cart-reserve', [CartController::class, 'cartReserveView']);
    });

    Route::prefix('/checkout')->group(function () {
        Route::post('/{id}', [CheckoutController::class, 'index']);
        Route::post('/cart/store', [CheckoutController::class, 'store']);
    });
    Route::get('/payment-method/{id}', [CheckoutController::class, 'paymentMethod']);

    Route::group(['prefix'=>'/admin', 'middleware'=>['role:admin']], function () {
        // confirm order
        Route::get('/order', [AdminController::class, 'order']);
        Route::post('/order/confirm/{id}', [AdminController::class, 'orderConfirmPost']);
        // confirm rent
        Route::get('/rent', [AdminController::class, 'rent']);
        Route::post('/rent/confirm/{id}', [AdminController::class, 'rentConfirmPost']);
        // reserve
        Route::get('/reservation', [AdminController::class, 'reservation']);
        Route::post('/reserve/confirm/{id}', [AdminController::class, 'reservationConfirmPost']);
        // half paid list
        Route::get('/rent-reserve-half-paid', [AdminController::class, 'rentReserveHalfPaid']);
        // pickup
        Route::get('/pickup', [AdminController::class, 'pickup']);
        Route::post('/pickup/confirm/{id}', [AdminController::class, 'pickupConfirmPost']);
        Route::post('/pickup/arrival/{id}', [AdminController::class, 'pickupArrivalPost']);
    });

    Route::group(['prefix'=>'/user'], function () {
        Route::get('/profile', [UserController::class, 'index']);
        // edit profile
        Route::get('/edit', [UserController::class, 'edit']);
        Route::post('/edit', [UserController::class, 'editPost']);
        // view
        Route::get('/order', [UserController::class, 'order']);
        Route::get('/rent', [UserController::class, 'rent']);
        Route::get('/reservation', [UserController::class, 'reservation']);
        Route::get('/rent-reserve-half-paid', [UserController::class, 'rentReserveHalfPaid']);
        Route::get('/pickup', [UserController::class, 'pickup']);
        // pay half payment
        Route::get('/payment-method/{id}', [UserController::class, 'paymentMethod']);
        Route::post('/pay/half/{id}', [UserController::class, 'payHalf']);
        Route::post('/pay/store', [UserController::class, 'payHalfPost']);
        // confirm order arrival
        Route::post('/order/confirm/{id}', [UserController::class, 'orderConfirmPost']);
        // confirm rent arrival
        Route::post('/rent/confirm/{id}', [UserController::class, 'rentConfirmPost']);
        // confirm reservation arrival
        Route::post('/reserve/confirm/{id}', [UserController::class, 'reservationConfirmPost']);
    });

    Route::group(['prefix'=>'/suggestion'], function () {
        Route::get('/', [SuggestController::class, 'index']);
        Route::post('/store', [SuggestController::class, 'store']);
        Route::post('/like/{id}', [SuggestController::class, 'like']);
        Route::post('/dislike/{id}', [SuggestController::class, 'dislike']);
        Route::post('/unlike/{id}', [SuggestController::class, 'unlike']);
        Route::post('/undislike/{id}', [SuggestController::class, 'undislike']);
    });
    
});
