<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VendorController;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/gioi-thieu', [HomeController::class,'intro'])->name('intro');
Route::get('/tin-tuc', [HomeController::class,'tintuc'])->name('tintuc');
Route::get('/tin-tuc/{slug}', [HomeController::class,'detailTintuc'])->name('detail-Tintuc');
Route::get('/danh-muc/{slug}', [HomeController::class,'category_product'])->name('category-product');
Route::get('/san-pham', [HomeController::class,'products'])->name('products');
Route::get('/san-pham/{slug}', [HomeController::class,'detailSanpham'])->name('detail-Sanpham');




;
Route::get('/admin/login', [AdminController::class,'login'])->name('admin.login');
Route::post('/admin/postLogin', [AdminController::class,'postLogin'])->name('admin.postLogin');
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');
Route::get('/admin/register', [AdminController::class,'show_signup_form'])->name('admin.register');
Route::post('/admin/register', [AdminController::class,'process_signup'])->name('admin.registerPost');



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);

    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('category', CategoryController::class);
    Route::post('category/restore/{id}', [CategoryController::class,'restore'])->name('category.restore');
    Route::resource('brand', BrandController::class);
    Route::resource('vendor', VendorController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('users', UsersController::class);


});
