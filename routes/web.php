<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminRegisterController;
use App\HTTP\Controllers\AdminLoginController;
use App\HTTP\Controllers\AdminForgotPasswordController;

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

//Main pages
Route::get('/', function () {
    return view('main.home');
})->name('main.home');

Route::get('/login', function () {
    return view('main.auth.login');
})->name('main.auth.login');

Route::get('/register', function () {
    return view('main.auth.register');
})->name('main.auth.register');

Route::get('/products/show', function () {
    return view('main.products.show');
})->name('main.products.show');

//Admin pages
Route::group(['middleware' => 'check.admin'], function () {
    // Các route chỉ được truy cập bởi admin
   

    //Logout
    Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.auth.login.logout');


    //Dashboard
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');



    //Products
    Route::get('/admin/products', function () {
        return view('admin.products.index');
    })->name('admin.products.index');


    //Articles
    Route::get('/admin/articles', function () {
        return view('admin.articles.index');
    })->name('admin.articles.index');

    //Errors
    Route::get('/admin/errors/no-role', function(){
        return view('admin.errors.no-role');
    })->name('admin.errors.no-role');

});
//Admin toàn quyền
Route::group(['middleware' => 'check.admin.role'], function () {
     //Register chỉ dành cho admin quyền 1
     Route::get('/admin/register', [AdminRegisterController::class, 'show'])->name('admin.auth.register.show');
     Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.auth.register.register');
});




//Login
Route::get('/admin/login', [AdminLoginController::class, 'show'])->name('admin.auth.login.show');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.auth.login.authenticate');




