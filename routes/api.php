<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\BrandProductController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\PromoController;
use App\Http\Controllers\API\RefferalController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserDetailController;
use App\Http\Controllers\API\StockController;
use App\Http\Controllers\API\SurveyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Events API
Route::controller(EventController::class)->group(function (){
    Route::get('/events','all');
});

//Promos API
Route::controller(PromoController::class)->group(function(){
    Route::get('/promos','all');
});

//Banner API
Route::controller(BannerController::class)->group(function(){
    Route::get('/banners','all');
});

//Refferals API
Route::controller(RefferalController::class)->group(function (){
    Route::get('/refferals','all');
});

//Product API
Route::controller(ProductController::class)->group(function () {
    Route::get('/products',[ProductController::class, 'index']);
    Route::get('/products/show', 'show');
});

//Article API
Route::controller(ArticleController::class)->group(function(){
    Route::get('/articles','all');
});

//Coupon API
Route::controller(CouponController::class)->group(function(){
    Route::get('/coupons','all');
});

//Category product API
Route::controller(ProductCategoryController::class)->group(function () {
    Route::get('/categories', 'all');
    Route::post('/categories/store', 'store');
    Route::put('/categories/update/{id}', 'update');
    Route::delete('/categories/delete/{id}', 'destroy');
});

//Brand product API
Route::controller(BrandProductController::class)->group(function () {
    Route::get('/brands', 'all');
});
//User Controller API
Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']); //function untuk fecth/get data user
    Route::post('user', [UserController::class, 'updateProfile']); //function untuk ubah data user
    Route::post('logout', [UserController::class, 'logout']); //function untul logout user
    Route::get('transaction', [TransactionController::class, 'all']); //function untuk transaction controller
    Route::post('checkout', [TransactionController::class, 'checkout']); //function untuk transaction checkout
    Route::get('user_details',[UserDetailController::class, 'all']);
});

//Stock API
Route::controller(StockController::class)->group(function () {
    Route::get('/stocks', 'index');
    Route::post('/stocks/store', 'store');
    Route::put('/stocks/update/{id}', 'update');
    Route::delete('/stocks/delete/{id}', 'destroy');
});

//Gallery API
Route::controller(GalleryController::class)->group(function () {
    Route::get('/gallerys', 'index');
    Route::post('/gallerys/store', 'store');
    Route::put('/gallerys/update/{id}', 'update');
    Route::delete('/gallerys/delete/{id}', 'destroy');
});

//Technician API
Route::controller(SurveyController::class)->group(function () {
    Route::get('/surveys', 'index');
    Route::put('/surveys/update/{id}', 'update');
});
