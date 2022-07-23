<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('category', CategoryController::class);

});
