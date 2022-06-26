<?php

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

// SSLCOMMERZ Start
// Route::get('/example1', [\App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [\App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [\App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [\App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [\App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [\App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [\App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [\App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'home'])->name('home');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'google'])->name('google');
Route::post('/auth/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'googleCallback']);
Route::get('/auth/facebook', [\App\Http\Controllers\Auth\LoginController::class, 'facebook'])->name('facebook');
Route::post('/auth/facebook/callback', [\App\Http\Controllers\Auth\LoginController::class, 'facebookcallback']);
Route::get('forgot/password', [\App\Http\Controllers\Auth\LoginController::class, 'forgotPasswordIndex'])->name('forgot.password');
Route::post('forgot/password', [\App\Http\Controllers\Auth\LoginController::class, 'forgotPassword']);
Route::get('update/password/{token}', [\App\Http\Controllers\Auth\LoginController::class, 'updatePassIndex'])->name('update.password');
Route::post('update/password/{token}', [\App\Http\Controllers\Auth\LoginController::class, 'updatePassword']);
Route::get('/register', [\App\Http\Controllers\Frontend\UserController::class, 'register'])->name('register');
Route::post('/register', [\App\Http\Controllers\Frontend\UserController::class, 'doRegister']);

Route::get('/cart/add/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'addCart'])->name('add.cart');
Route::get('/cart', [\App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');
Route::get('/cart/delete/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'cartDelete'])->name('cart.delete');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/user/profile', [\App\Http\Controllers\Frontend\UserController::class, 'profile'])->name('profile');
    Route::post('/user/profile', [\App\Http\Controllers\Frontend\UserController::class, 'update']);
    // Route::get('/order/invoice/{id}', [\App\Http\Controllers\Frontend\UserController::class, 'invoice'])->name('order.invoice');
    Route::get('/checkout', [App\Http\Controllers\Frontend\OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [\App\Http\Controllers\Frontend\OrderController::class, 'order'])->name('order');
    Route::get('/order-view/{id}', [\App\Http\Controllers\Frontend\OrderController::class, 'show'])->name('order.show');

    Route::middleware('IsAdmin')->group(function () {
        Route::prefix('dashbord')->group(function () {
            Route::get('/', [\App\Http\Controllers\Backend\BackendController::class, 'dashbord'])->name('admin.dashbord');
            Route::prefix('product')->group(function () {
                Route::get('/', [\App\Http\Controllers\Backend\BackendController::class, 'product'])->name('admin.product');
                Route::get('/create', [\App\Http\Controllers\Backend\BackendController::class, 'create'])->name('admin.product.create');
                Route::post('/create', [\App\Http\Controllers\Backend\BackendController::class, 'store']);
                Route::get('/edit/{id}', [\App\Http\Controllers\Backend\BackendController::class, 'edit'])->name('admin.product.edit');
                Route::post('/edit/{id}', [\App\Http\Controllers\Backend\BackendController::class, 'update']);
                Route::get('/delete/{id}', [\App\Http\Controllers\Backend\BackendController::class, 'delete'])->name('admin.product.delete');
            });
        });
        Route::prefix('order')->group(function () {
            Route::get('/', [\App\Http\Controllers\Backend\OrderController::class, 'orderIndex'])->name('admin.orderIndex');
            Route::get('/details/{id}', [\App\Http\Controllers\Backend\OrderController::class, 'orderView'])->name('admin.orderView');
            Route::post('/status/{id}', [\App\Http\Controllers\Backend\OrderController::class, 'orderStatus'])->name('admin.orderStatus');
            Route::get('/delete/{id}', [\App\Http\Controllers\Backend\OrderController::class, 'orderDelete'])->name('admin.orderDelete');
        });
    });
});
