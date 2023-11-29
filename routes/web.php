<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// controller backsite
use App\Http\Controllers\Backsite\ClaimController;
use App\Http\Controllers\Backsite\MemberController;
use App\Http\Controllers\MasterData\CustomerController;
use App\Http\Controllers\MasterData\ItemBuahController;
use App\Http\Controllers\ManagementAccess\UserController;
use App\Http\Controllers\MasterData\KategoriBuahController;
use App\Http\Controllers\ManagementAccess\ProfileController;
use App\Http\Controllers\ManagementAccess\TypeUserController;
use App\Http\Controllers\Transaksi\HistoryOrderController;
use App\Http\Controllers\Transaksi\OrderController;

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
    // cek apakah sudah login atau belum
    if (Auth::user() != null) {
        return redirect()->intended('backsite/dashboard');
    }

    return view('auth.login');
});

// backsite
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // dashboard
    Route::resource('dashboard', DashboardController::class);
    // type_user
    Route::resource('type_user', TypeUserController::class);
    // detial_user
    Route::resource('user', UserController::class);
    // profile
    Route::resource('profile', ProfileController::class);
    // kategori_buah
    Route::resource('kategori_buah', KategoriBuahController::class);
    // item_buah
    Route::resource('item_buah', ItemBuahController::class);
    // customer
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer/form_tambah_pelanggan', 'form_tambah_pelanggan')->name('customer.form_tambah_pelanggan');
        Route::get('/customer/form_cari_pelanggan', 'form_cari_pelanggan')->name('customer.form_cari_pelanggan');
    });
    Route::resource('customer', CustomerController::class);
    // order
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('order.index');
        Route::post('/order/add_cart/{id}', 'add_cart')->name('order.add_cart');
        Route::post('/order/get_cart', 'get_cart')->name('order.get_cart');
        Route::post('/order/min_qty/{id}', 'min_qty')->name('order.min_qty');
        Route::post('/order/plus_qty/{id}', 'plus_qty')->name('order.plus_qty');
        Route::post('/order/delete_cart/{id}', 'delete_cart')->name('order.delete_cart');
        Route::post('/order/clear_cart/{id}', 'clear_cart')->name('order.clear_cart');
        Route::get('/order/payment', 'payment')->name('order.payment');
        Route::post('/order/save_payment', 'save_payment')->name('order.save_payment');
    });
    // riwayat transaksi
    Route::resource('riwayat_transaksi', HistoryOrderController::class);
});
