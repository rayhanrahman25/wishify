<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingsController;
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


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware(['verify.shopify'])->group(function () {

    Route::controller(DashboardController::class)->group(function(){
        Route::get('/', 'index')->name('home');
    });

    Route::controller(ProductsController::class)->group(function(){
        Route::get('/products', 'index')->name('products');
    });

    Route::controller(SettingsController::class)->group(function () { 
        Route::get('/settings', 'index')->name('settings');
        Route::post('/configure-theme', 'configureTheme')->name('theme.configuration');
    });

    Route::get('/customers', function () {
        return view('customers');
    })->name('customers');
    
});



