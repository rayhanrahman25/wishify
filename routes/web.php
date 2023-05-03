<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('login');
})->name('login');

Route::middleware(['verify.shopify'])->group(function () {
   
});

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



