<?php

use App\Http\Controllers\API\TransactionPeriodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RefferalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserDetailController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('articles', ArticleController::class)->middleware('auth');
Route::resource('brands', BrandController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('user_details', UserDetailController::class)->middleware('auth');
Route::resource('transactions', TransactionController::class)->middleware('auth');
Route::resource('transaction_details', TransactionDetailController::class)->middleware('auth');
Route::resource('coupons', CouponController::class)->middleware('auth');
Route::resource('refferals', RefferalController::class)->middleware('auth');
Route::resource('events', EventController::class)->middleware('auth');
Route::resource('promos', PromoController::class)->middleware('auth');
Route::resource('transaction_periodes', TransactionPeriodeController::class)->middleware('auth');
Route::resource('banners', BannerController::class)->middleware('auth');
Route::resource('events', EventController::class)->middleware('auth');