<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FinishController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\RefferalController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\InstallationController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionPeriodeController;
use App\Http\Controllers\InstallitationControlController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('articles', ArticleController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/autocomplete/{id}', [ProductController::class, 'autocomplete'])->name('autocomplete');
    Route::resource('categories', CategoryController::class);
    Route::resource('user_details', UserDetailController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('transaction_details', TransactionDetailController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('refferals', RefferalController::class);
    Route::resource('events', EventController::class);
    Route::resource('promos', PromoController::class);
    Route::resource('transaction_periodes', TransactionPeriodeController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('events', EventController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('installitation_control', InstallitationControlController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('list_survey', SurveyController::class);
    Route::resource('list_pemasangan', InstallationController::class);
    Route::resource('selesai_pemasangan', FinishController::class);
    Route::resource('gallerys', GalleryController::class);
    Route::get('employees-report', [EmployeeController::class, 'reportForm']);
    Route::get('employee/report', [EmployeeController::class, 'report'])->name('employees/report');
    Route::get('products-report', [ProductController::class, 'reportForm']);
    Route::get('product/report', [ProductController::class, 'report'])->name('products/report');
    Route::get('stocks-report', [StockController::class, 'reportForm']);
    Route::get('stock/report', [StockController::class, 'report'])->name('stocks/report');
});

Route::middleware('auth', 'roles:USER')->group(function () {
    Route::get('/404', [NotFoundController::class, 'index'])->name('notfound');
});
//super admin
// Route::middleware('auth','roles:ADMIN')->group(function(){
//     Route::resource('users', UserController::class);
//     Route::resource('articles', ArticleController::class);
//     Route::resource('brands', BrandController::class);
//     Route::resource('products', ProductController::class);
//     Route::resource('categories', CategoryController::class);
//     Route::resource('user_details', UserDetailController::class);
//     Route::resource('transactions', TransactionController::class);
//     Route::resource('transaction_details', TransactionDetailController::class);
//     Route::resource('coupons', CouponController::class);
//     Route::resource('refferals', RefferalController::class);
//     Route::resource('events', EventController::class);
//     Route::resource('promos', PromoController::class);
//     Route::resource('transaction_periodes', TransactionPeriodeController::class);
//     Route::resource('banners', BannerController::class);
//     Route::resource('events', EventController::class);
// });

// //content admin
// Route::middleware('auth', 'roles:CONTENT ADMIN')->group(function(){
//     Route::resource('articles', ArticleController::class);
// });

// //marketing admin
// Route::middleware('auth', 'roles:MARKETING ADMIN')->group(function(){
//     Route::resource('transactions', TransactionController::class);
//     Route::resource('transaction_details', TransactionDetailController::class);
// });

// //accounting admin
// Route::middleware('auth', 'roles:ACCOUNTING ADMIN')->group(function(){
//     Route::resource('users', UserController::class);
//     Route::resource('user_details', UserDetailController::class);
// });

// //warehouse admin
// Route::middleware('auth', 'roles:WAREHOUSE ADMIN')->group(function(){

// });


// Route::resource('articles', ArticleController::class)->middleware('auth');
// Route::resource('brands', BrandController::class)->middleware('auth');
// Route::resource('products', ProductController::class)->middleware('auth');
// Route::resource('categories', CategoryController::class)->middleware('auth');
// Route::resource('user_details', UserDetailController::class)->middleware('auth');
// Route::resource('transactions', TransactionController::class)->middleware('auth');
// Route::resource('transaction_details', TransactionDetailController::class)->middleware('auth');
// Route::resource('coupons', CouponController::class)->middleware('auth');
// Route::resource('refferals', RefferalController::class)->middleware('auth');
// Route::resource('events', EventController::class)->middleware('auth');
// Route::resource('promos', PromoController::class)->middleware('auth');
// Route::resource('transaction_periodes', TransactionPeriodeController::class)->middleware('auth');
// Route::resource('banners', BannerController::class)->middleware('auth');
// Route::resource('events', EventController::class)->middleware('auth');
