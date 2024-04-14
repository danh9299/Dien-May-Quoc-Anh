<?php

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

Route::get('/', function () {
    return view('main.home');
})->name('main.home');


Route::get('/login',function(){
    return view('main.auth.login');
})->name('main.auth.login');

Route::get('/register',function(){
    return view('main.auth.register');
})->name('main.auth.register');

Route::get('/products/show',function(){
    return view('main.products.show');
})->name('main.products.show');

