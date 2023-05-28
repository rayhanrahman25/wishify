<?php

use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(WishlistController::class)->group(function () { 
    Route::post('/check-wishlist', 'check_wishlist')->name('check.wishlist');
    Route::post('/add-to-wishlist', 'add_wishlist')->name('add.wishlist');
    Route::post('/remove-wishlist', 'remove_wishlist')->name('remove.wishlist');
});
