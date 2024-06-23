<?php


use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PolicyController;
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
use App\HTTP\Controllers\ImageController;
use App\HTTP\Controllers\AdminForgotPasswordController;
use App\HTTP\Controllers\LoginController;
use App\HTTP\Controllers\RegisterController;
use App\HTTP\Controllers\SettingController;
use App\Http\Controllers\CartController;

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
Route::get('/', [ProductController::class, 'homePageGetAll'])->name('main.home');
Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('main.products.show');
Route::get('/products/{catalog}', [ProductController::class, 'listNoBrand'])->name('main.products.list-no-brand');
Route::get('/products', [ProductController::class, 'listAllProducts'])->name('main.products.list-all-products');
Route::get('/products/{catalog_id}/{brand_id}', [ProductController::class, 'listWithBrand'])->name('main.products.list-with-brand');
Route::get('/search', [ProductController::class, 'headerSearch'])->name('main.search');
//Articles
Route::get('/articles', [ArticleController::class, 'listAllArticles'])->name('main.articles.list-all-articles');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('main.articles.show');
//Policy
Route::get('/secure-policy', [PolicyController::class, 'securePolicy'])->name('main.policies.securePolicy');
Route::get('/service-policy', [PolicyController::class, 'servicePolicy'])->name('main.policies.servicePolicy');
Route::get('/return-policy', [PolicyController::class, 'returnPolicy'])->name('main.policies.returnPolicy');



Route::get('/login', function () {
    return view('main.auth.login');
})->name('main.auth.login');

Route::get('/login', [LoginController::class, 'show'])->name('main.auth.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('main.auth.authenticate');


Route::get('/register', [RegisterController::class, 'show'])->name('main.auth.register');
Route::post('/register', [RegisterController::class, 'addnew'])->name('main.auth.addnew');
//Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('main.auth.logout');


//Cart

Route::group(['middleware' => 'auth.user'], function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('main.cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('main.cart.view');
    Route::get('/checkout', [CartController::class, 'showCheckoutForm'])->name('main.cart.showCheckoutForm');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('main.cart.checkout');
    Route::delete('/cart/remove/{cart_item}', [CartController::class, 'removeCartItem'])->name('main.cart.remove');
    Route::get('/order/{order}', [CartController::class, 'viewOrder'])->name('main.orders.view');
    Route::get('/orders', [CartController::class, 'allOrders'])->name('main.orders.all-orders');
    Route::get('/vnpay_return', [PaymentController::class, 'vnpay_return'])->name('main.vnpay_return');

    Route::post('/vnpay_payment',[PaymentController::class,'vnpay_payment'])->name('main.vnpay_payment');
});

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
    Route::get('/admin/catalogs', [CatalogController::class, 'index'])->name('admin.catalogs.index');
    Route::get('/admin/catalogs/search', [CatalogController::class, 'search'])->name('admin.catalogs.search');
    Route::get('/admin/catalogs/create', [CatalogController::class, 'create'])->name('admin.catalogs.create');
    Route::post('/admin/catalogs/store', [CatalogController::class, 'store'])->name('admin.catalogs.store');
    Route::get('admin/catalogs/{catalog}/edit', [CatalogController::class, 'edit'])->name('admin.catalogs.edit');
    Route::put('admin/catalogs/{catalog}/update', [CatalogController::class, 'update'])->name('admin.catalogs.update');
    Route::get('admin/catalogs/{catalog}/delete', [CatalogController::class, 'delete'])->name('admin.catalogs.delete');
    Route::delete('admin/catalogs/{catalog}/destroy', [CatalogController::class, 'destroy'])->name('admin.catalogs.destroy');

    //Brands
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/admin/brands/search', [BrandController::class, 'search'])->name('admin.brands.search');
    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
    Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('admin/brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
    Route::put('admin/brands/{brand}/update', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::get('admin/brands/{brand}/delete', [BrandController::class, 'delete'])->name('admin.brands.delete');
    Route::delete('admin/brands/{brand}/destroy', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    //Types
    Route::get('/admin/types', [TypeController::class, 'index'])->name('admin.types.index');
    Route::get('/admin/types/search', [TypeController::class, 'search'])->name('admin.types.search');
    Route::get('/admin/types/create', [TypeController::class, 'create'])->name('admin.types.create');
    Route::post('/admin/types/store', [TypeController::class, 'store'])->name('admin.types.store');
    Route::get('admin/types/{type}/edit', [TypeController::class, 'edit'])->name('admin.types.edit');
    Route::put('admin/types/{type}/update', [TypeController::class, 'update'])->name('admin.types.update');
    Route::get('admin/types/{type}/delete', [TypeController::class, 'delete'])->name('admin.types.delete');
    Route::delete('admin/types/{type}/destroy', [TypeController::class, 'destroy'])->name('admin.types.destroy');

    //Features
    Route::get('/admin/features', [FeatureController::class, 'index'])->name('admin.features.index');
    Route::get('/admin/features/search', [FeatureController::class, 'search'])->name('admin.features.search');
    Route::get('/admin/features/create', [FeatureController::class, 'create'])->name('admin.features.create');
    Route::post('/admin/features/store', [FeatureController::class, 'store'])->name('admin.features.store');
    Route::get('admin/features/{feature}/edit', [FeatureController::class, 'edit'])->name('admin.features.edit');
    Route::put('admin/features/{feature}/update', [FeatureController::class, 'update'])->name('admin.features.update');
    Route::get('admin/features/{feature}/delete', [FeatureController::class, 'delete'])->name('admin.features.delete');
    Route::delete('admin/features/{feature}/destroy', [FeatureController::class, 'destroy'])->name('admin.features.destroy');

    //Products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/search', [ProductController::class, 'search'])->name('admin.products.search');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('admin/products/{product}/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('admin/products/{product}/delete', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::delete('admin/products/{product}/destroy', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/products/{product}/quick-edit', [ProductController::class, 'quickEdit'])->name('admin.products.quickEdit');
    Route::put('/admin/products/{product}/quick-update', [ProductController::class, 'quickUpdate'])->name('admin.products.quickUpdate');
    Route::get('/admin/products/export/', [ProductController::class, 'export'])->name('admin.products.export');
    Route::get('/admin/products/import/', [ProductController::class, 'formImport'])->name('admin.products.form-import');
    Route::post('/admin/products/import/', [ProductController::class, 'import'])->name('admin.products.import');
    //Articles
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/search', [ArticleController::class, 'search'])->name('admin.articles.search');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('admin/articles/{article}/update', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::get('admin/articles/{article}/delete', [ArticleController::class, 'delete'])->name('admin.articles.delete');
    Route::delete('admin/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');


    //Errors
    Route::get('/admin/errors/no-role', function () {
        return view('admin.errors.no-role');
    })->name('admin.errors.no-role');


    //Images
    Route::get('/admin/images', [ImageController::class, 'index'])->name('admin.images.index');
    Route::get('/admin/images/logo/edit', [ImageController::class, 'editLogo'])->name('admin.images.logo.edit');
    Route::put('/admin/images/logo/update', [ImageController::class, 'updateLogo'])->name('admin.images.logo.update');
    Route::get('/admin/images/long-banners', [ImageController::class, 'editLongBanners'])->name('admin.images.long-banners.edit');
    Route::put('/admin/images/long-banners/update', [ImageController::class, 'updateLongBanners'])->name('admin.images.long-banners.update');
    Route::get('/admin/images/slider-banners', [ImageController::class, 'editSliderBanners'])->name('admin.images.slider-banners.edit');
    Route::put('/admin/images/slider-banners/update', [ImageController::class, 'updateSliderBanners'])->name('admin.images.slider-banners.update');


    //Settings
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/admin/settings/account/edit', [SettingController::class, 'editAccountInfo'])->name('admin.settings.account.edit');
    Route::put('/admin/settings/account/update', [SettingController::class, 'updateAccountInfo'])->name('admin.settings.account.update');


    //Orders
    Route::get('/admin/orders', [CartController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [CartController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{order}/mark-as-delivered', [CartController::class, 'markAsDelivered'])->name('admin.orders.markAsDelivered');
    Route::post('/orders/{order}/mark-as-undelivered', [CartController::class, 'markAsUnDelivered'])->name('admin.orders.markAsUnDelivered');
    Route::post('/orders/{order}/mark-as-paydone', [CartController::class, 'markAsPayDone'])->name('admin.orders.markAsPayDone');
    Route::post('/orders/{order}/mark-as-paynotdone', [CartController::class, 'markAsPayNotDone'])->name('admin.orders.markAsPayNotDone');

   
});
//Admin toàn quyền
Route::group(['middleware' => 'check.admin.role'], function () {
    //Register chỉ dành cho admin quyền 1
    Route::get('/admin/register', [AdminRegisterController::class, 'show'])->name('admin.auth.register.show');
    Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.auth.register.register');

    //Chỉ admin quyền 1 được quản lí thông tin các thành viên khác
    Route::get('/admin/members', [MemberController::class, 'index'])->name('admin.members.index');
    Route::get('/admin/members/search', [MemberController::class, 'search'])->name('admin.members.search');
    Route::get('admin/members/{member}/edit', [MemberController::class, 'edit'])->name('admin.members.edit');
    Route::put('admin/members/{member}/update', [MemberController::class, 'update'])->name('admin.members.update');
    Route::get('admin/members/{member}/delete', [MemberController::class, 'delete'])->name('admin.members.delete');
    Route::delete('admin/members/{member}/destroy', [MemberController::class, 'destroy'])->name('admin.members.destroy');

    //Settings
    Route::get('/admin/settings/general/edit', [SettingController::class, 'editGeneral'])->name('admin.settings.general.edit');
    Route::put('/admin/settings/general/update', [SettingController::class, 'updateGeneral'])->name('admin.settings.general.update');
    Route::get('/admin/settings/network/edit', [SettingController::class, 'editNetwork'])->name('admin.settings.network.edit');
    Route::put('/admin/settings/network/update', [SettingController::class, 'updateNetwork'])->name('admin.settings.network.update');

    //Policy
    Route::get('/admin/settings/secure-policy/edit', [SettingController::class, 'editSecure'])->name('admin.settings.policy.secure');
    Route::put('/admin/settings/secure-policy/edit', [SettingController::class, 'updateSecure'])->name('admin.settings.policy.updateSecure');
    Route::get('/admin/settings/service-policy/edit', [SettingController::class, 'editService'])->name('admin.settings.policy.service');
    Route::put('/admin/settings/service-policy/edit', [SettingController::class, 'updateService'])->name('admin.settings.policy.updateService');
    Route::get('/admin/settings/return-policy/edit', [SettingController::class, 'editReturn'])->name('admin.settings.policy.return');
    Route::put('/admin/settings/return-policy/edit', [SettingController::class, 'updateReturn'])->name('admin.settings.policy.updateReturn');

});




//Login
Route::get('/admin/login', [AdminLoginController::class, 'show'])->name('admin.auth.login.show');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.auth.login.authenticate');




