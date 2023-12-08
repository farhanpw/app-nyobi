<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\RedirectController;
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

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/product/{id}', [HomeController::class, 'product']);
Route::get('/action', [HomeController::class, 'action'])->name('action');
Route::get('/about', [HomeController::class, 'about']);

//auth
Route::group(['middleware' => 'guest'], function () {
    //Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'dologin']);

    //Register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'doregister']);
});

// for admin and member
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    //logout
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// for Admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    // Route::get('/', [HomeController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/sizes', [SizeController::class, 'list']);
    Route::get('/variants', [VariantController::class, 'list']);
    Route::get('/slider', [SliderController::class, 'list']);
    Route::get('/barang', [ProductController::class, 'list']);

    Route::get('/pesanan/baru', [OrderController::class, 'list']);
    Route::get('/pesanan/dikonfirmasi', [OrderController::class, 'dikonfirmasi_list']);
    Route::get('/pesanan/dikemas', [OrderController::class, 'dikemas_list']);
    Route::get('/pesanan/dikirim', [OrderController::class, 'dikirim_list']);
    Route::get('/pesanan/diterima', [OrderController::class, 'diterima_list']);
    Route::get('/pesanan/selesai', [OrderController::class, 'selesai_list']);

    Route::get('/laporan', [ReportController::class, 'index']);
    Route::get('/tentang', [AboutController::class, 'index']);
    Route::post('/tentang/{about}', [AboutController::class, 'update']);

    Route::get('/testimoni', [ReviewController::class, 'list']);
    Route::get('/review', [ReviewController::class, 'list']);
    Route::get('/payment', [PaymentController::class, 'list']);
});

// for Member
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/profil', [HomeController::class, 'profil']);
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::post('/add_to_cart', [HomeController::class, 'add_to_cart']);
    Route::get('/delete_from_cart/{cart}', [HomeController::class, 'delete_from_cart']);
    Route::get('/get_kota/{id}', [HomeController::class, 'get_kota']);
    Route::get('/checkout', [HomeController::class, 'checkout']);
    Route::get('/get_ongkir/{destination}/{weight}', [HomeController::class, 'get_ongkir']);
    Route::post('/checkout_orders', [HomeController::class, 'checkout_orders']);
    Route::get('/orders', [HomeController::class, 'orders']);
    Route::post('/payments', [HomeController::class, 'payments']);
    Route::post('/pesanan_selesai/{order}', [HomeController::class, 'pesanan_selesai']);
});
