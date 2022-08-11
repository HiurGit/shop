<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return view('frontend.client.home');
});

Route::get('/admin/login', [AdminController::class,'login'])->name('admin.login');
Route::post('/admin/postLogin', [AdminController::class,'postLogin'])->name('admin.postLogin');
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);

    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('vendor', VendorController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('users', UsersController::class);


});
