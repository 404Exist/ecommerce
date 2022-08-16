<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product');
Route::get('/brand/{slug}', [BrandController::class, 'show'])->name('brand');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category');

Route::middleware('guest:web')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('register');

    Route::prefix('/oauth/{driver}')->where(['driver' => 'facebook|google'])->group(function () {
        Route::get('/redirect', [AuthController::class, 'socialRedirect']);
        Route::get('/callback', [AuthController::class, 'socialAuth']);
    });
});

Route::middleware('auth:web')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // Route::post('/logout', 'logout')->name('logout');

        Route::prefix('verification')->name('verification.')->middleware('not_verified')->group(function () {
            Route::get('/notice', 'verifyNotice')->name('notice');
            Route::post('/resend', 'verifyResend')->middleware('throttle:6,1')->name('resend');
            Route::get('/{id}/{hash}', 'verify')->middleware('signed')->name('verify');
        });
    });

    Route::middleware('verified')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
