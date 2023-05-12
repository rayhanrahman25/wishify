<?php

use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/products', function () {
        return view('products');
    })->name('products');
    
    Route::get('/customers', function () {
        return view('customers');
    })->name('customers');
    
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::controller(SettingsController::class)->group(function () { 
        Route::post('/configure-theme', 'configureTheme')->name('theme.configuration');
    });
    
});



