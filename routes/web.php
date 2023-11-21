<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Catalog\ForRentController;
use App\Http\Controllers\Catalog\ForSellController;

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
});
