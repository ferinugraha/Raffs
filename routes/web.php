<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkout\CheckoutController;
use Illuminate\Auth\Events\Logout;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ViewController;
use App\Models\Menu;

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


Route::get('/', [ViewController::class, 'landingpage1']);

Route::get('auth/google', [RegisterUserController::class, 'redirectToGoogle'])->name('google.login');

Route::get('auth/google/callback', [RegisterUserController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('registeruser', [RegisterUserController::class, 'index'])->name('registeruser');

Route::get('registeruser.store', [RegisterUserController::class, 'store'])->name('registeruser.store');

Route::get('/homemenu', [ViewController::class, 'getProducts'])->name('product.index');

Route::get('/detail-product/{id}', [LandingController::class, 'getDetailProduct']);

Route::post('/tambah-order/{id}', [LandingController::class, 'addToCart'])->name('add.order');

Route::get('/hapus-order/{id}', [LandingController::class, 'getRemoveItem'])->name('remove.order');

Route::get('/order-kamu', [LandingController::class, 'getCart']);

Route::post('/bayar', [LandingController::class, 'checkout'])->name('checkout');

Route::post('/bayar-belanjaan', [LandingController::class, 'checkoutuser'])->name('checkout.user');

Route::get('/sukses-bayar/{id}', [LandingController::class, 'checkoutSuccess'])->name('checkout.success')->middleware('block.access');

Route::get('/user-sukses-bayar/{id}', [LandingController::class, 'checkoutSuccess'])->name('user.checkout.success');

Route::get('/detail-order', [LandingController::class, 'detailOrder'])->name('detail.order')->middleware('block.access');

// Route::get('/export-pdf', [LandingController::class, 'exportPDF'])->name('export.pdf');

Route::resource('login', LoginController::class);

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('login')->group(function() {

    Route::resource('admin', AdminController::class)->middleware('admin');
   
    Route::get('/chart', [ChartController::class, 'index']);
   
    Route::resource('userview', UserController::class)->middleware('admin');
   
    Route::resource('profile', ProfileController::class)->middleware('admin');
   
    Route::resource('register', RegisterController::class)->middleware('admin');
   
    Route::get('/editlogo/{id}', [ProfileController::class, 'editlogo'])->name('profile.editlogo')->middleware('admin');
   
    Route::get('/updatelogo/{id}', [ProfileController::class, 'updatelogo'])->name('profile.updatelogo')->middleware('admin');
   
    Route::get('historyadmin', [HistoryController::class, 'historyadmin'])->name('history.historyadmin')->middleware('admin');
    
    Route::resource('menu', MenuController::class)->middleware('admin');
    
    Route::get('pendapatan', [HistoryController::class, 'pendapatan'])->name('pendapatan.pendapatanadmin')->middleware('admin');
    
    Route::get('filter', [HistoryController::class, 'filter'])->name('filter.filteradmin')->middleware('admin');

    Route::get('print-pdf/{bulan}/{tahun}', [HistoryController::class, 'export'])->name('print-pdf');

    Route::get('/getdata', 'App\Http\Controllers\GetDataController@index');


    Route::get('Dashboard-Kasir', function() {
    
        return view('pages.kasir.index');
    
    })->middleware('kasir')->name('kasir.index');

    
    Route::get('menukasir', [MenuController::class, 'menukasir'])->name('menu.menukasir')->middleware('kasir');
    
    Route::get('addmenukasir', [MenuController::class, 'addmenukasir'])->name('menu.addmenukasir')->middleware('kasir');
    
    Route::get('storemenukasir', [MenuController::class, 'storemenukasir'])->name('menu.storemenukasir')->middleware('kasir');
    
    Route::get('/editmenukasir/{id}', [MenuController::class, 'editmenukasir'])->name('menu.editmenukasir')->middleware('kasir');
    
    Route::get('/updatemenukasir/{id}', [MenuController::class, 'updatemenukasir'])->name('menu.updatemenukasir')->middleware('kasir');
    
    Route::get('/deletemenukasir/{id}', [MenuController::class, 'deletemenukasir'])->name('menu.deletemenukasir')->middleware('kasir');
    
    Route::get('/kasir/laporan', function() {
    
        return view('pages.kasir.laporan.index');
    
    })->middleware('kasir');

    Route::get('/kasir/orders', [OrderController::class, 'getOrders'])->name('order.kasir')->middleware('kasir');
    
    Route::get('/kasir/orders/{id}', [OrderController::class, 'getOrderDetail'])->name('order-detail.kasir')->middleware('kasir');
    
    Route::get('/kasir/orders/status-update/{id}', [OrderController::class, 'statusUpdate'])->name('status.update')->middleware('kasir');

    Route::resource('history', HistoryController::class)->middleware('kasir');    

    Route::get('chart-data', function () {

        $data = [
            'Januari' => rand(10, 100),
            'Februari' => rand(10, 100),
            'Maret' => rand(10, 100),
            'April' => rand(10, 100),
            'Mei' => rand(10, 100),
            'Juni' => rand(10, 100),
            'Juli' => rand(10, 100),
            'Oktober' => rand(10, 100),
            'November' => rand(10, 100),
            'Desember' => rand(10, 100),

        ];
    
        return response()->json($data);

    });


    Route::get('List-Menu-Anda', [ViewController::class, 'usergetProducts'])->name('list-menu-user')->middleware('user');

    Route::get('Detail-Produk/{id}', [LandingController::class, 'usergetDetailProduct'])->name('Detail-Produk')->middleware('user');

    Route::post('Tambah-Order/{id}', [LandingController::class, 'addToCart'])->name('tambah-orderan')->middleware('user');

    Route::get('/Pesanan-anda', [LandingController::class, 'usergetCart'])->middleware('user');
   
});