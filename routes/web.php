<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminRegisterController;
use App\HTTP\Controllers\AdminLoginController;
use App\HTTP\Controllers\CatalogController;
use App\HTTP\Controllers\ProductController;
use App\HTTP\Controllers\FeatureController;
use App\HTTP\Controllers\TypeController;
use App\HTTP\Controllers\BrandController;
use App\HTTP\Controllers\ArticleController;
use App\HTTP\Controllers\MemberController;
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

    //Catalogs
    Route::get('/admin/catalogs',[CatalogController::class, 'index'])->name('admin.catalogs.index');
    Route::get('/admin/catalogs/search',[CatalogController::class, 'search'])->name('admin.catalogs.search');
    Route::get('/admin/catalogs/create', [CatalogController::class, 'create'])->name('admin.catalogs.create');
    Route::post('/admin/catalogs/store', [CatalogController::class, 'store'])->name('admin.catalogs.store');
    Route::get('admin/catalogs/{catalog}/edit', [CatalogController::class, 'edit'])->name('admin.catalogs.edit');
    Route::put('admin/catalogs/{catalog}/update', [CatalogController::class, 'update'])->name('admin.catalogs.update');
    Route::get('admin/catalogs/{catalog}/delete', [CatalogController::class, 'delete'])->name('admin.catalogs.delete');
    Route::delete('admin/catalogs/{catalog}/destroy', [CatalogController::class, 'destroy'])->name('admin.catalogs.destroy');

    //Brands
    Route::get('/admin/brands',[BrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/admin/brands/search',[BrandController::class, 'search'])->name('admin.brands.search');
    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
    Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('admin/brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
    Route::put('admin/brands/{brand}/update', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::get('admin/brands/{brand}/delete', [BrandController::class, 'delete'])->name('admin.brands.delete');
    Route::delete('admin/brands/{brand}/destroy', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    //Types
    Route::get('/admin/types',[TypeController::class, 'index'])->name('admin.types.index');
    Route::get('/admin/types/search',[TypeController::class, 'search'])->name('admin.types.search');
    Route::get('/admin/types/create', [TypeController::class, 'create'])->name('admin.types.create');
    Route::post('/admin/types/store', [TypeController::class, 'store'])->name('admin.types.store');
    Route::get('admin/types/{type}/edit', [TypeController::class, 'edit'])->name('admin.types.edit');
    Route::put('admin/types/{type}/update', [TypeController::class, 'update'])->name('admin.types.update');
    Route::get('admin/types/{type}/delete', [TypeController::class, 'delete'])->name('admin.types.delete');
    Route::delete('admin/types/{type}/destroy', [TypeController::class, 'destroy'])->name('admin.types.destroy');

    //Features
    Route::get('/admin/features',[FeatureController::class, 'index'])->name('admin.features.index');
    Route::get('/admin/features/search',[FeatureController::class, 'search'])->name('admin.features.search');
    Route::get('/admin/features/create', [FeatureController::class, 'create'])->name('admin.features.create');
    Route::post('/admin/features/store', [FeatureController::class, 'store'])->name('admin.features.store');
    Route::get('admin/features/{feature}/edit', [FeatureController::class, 'edit'])->name('admin.features.edit');
    Route::put('admin/features/{feature}/update', [FeatureController::class, 'update'])->name('admin.features.update');
    Route::get('admin/features/{feature}/delete', [FeatureController::class, 'delete'])->name('admin.features.delete');
    Route::delete('admin/features/{feature}/destroy', [FeatureController::class, 'destroy'])->name('admin.features.destroy');

    //Products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/search',[ProductController::class, 'search'])->name('admin.products.search');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('admin/products/{product}/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('admin/products/{product}/delete', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::delete('admin/products/{product}/destroy', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    
    //Articles
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/search',[ArticleController::class, 'search'])->name('admin.articles.search');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('admin/articles/{article}/update', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::get('admin/articles/{article}/delete', [ArticleController::class, 'delete'])->name('admin.articles.delete');
    Route::delete('admin/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
    

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

    //Chỉ admin quyền 1 được quản lí thông tin các thành viên khác
    Route::get('/admin/members', [MemberController::class, 'index'] )->name('admin.members.index');
    Route::get('/admin/members/search', [MemberController::class, 'search'] )->name('admin.members.search');
    Route::get('admin/members/{member}/edit', [MemberController::class, 'edit'])->name('admin.members.edit');
    Route::put('admin/members/{member}/update', [MemberController::class, 'update'])->name('admin.members.update');
    Route::get('admin/members/{member}/delete', [MemberController::class, 'delete'])->name('admin.members.delete');
    Route::delete('admin/members/{member}/destroy', [MemberController::class, 'destroy'])->name('admin.members.destroy');
});




//Login
Route::get('/admin/login', [AdminLoginController::class, 'show'])->name('admin.auth.login.show');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.auth.login.authenticate');




