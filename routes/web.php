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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/booking', [\App\Http\Controllers\BookingController::class, 'index'])->name('booking');
Route::get('/booking/{id}/deposit', [\App\Http\Controllers\BookingController::class, 'deposit'])->name('booking.getDeposit');
Route::post('/booking', [\App\Http\Controllers\BookingController::class, 'store'])->name('booking.post');
Route::get('/profile/bookings', [\App\Http\Controllers\HomeController::class, 'bookingDetail'])->name('booking.detail');
Route::get('/introduction', [\App\Http\Controllers\HomeController::class, 'introduction'])->name('introduction');
Route::get('/disk-of-the-month', [\App\Http\Controllers\HomeController::class, 'topDiskMonth'])->name('month');
Route::get('/menus', [\App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/news', [\App\Http\Controllers\HomeController::class, 'news'])->name('news');
Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Route::middleware(['auth', 'staff'])->name('staff.')->prefix('staff')->group(function () {
    Route::get('/', function () {
        return redirect()->route('staff.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('/bookings', \App\Http\Controllers\Admin\TableBookingController::class);
    Route::resource('/orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::get('/report', [\App\Http\Controllers\Admin\ReportController::class, 'report'])->name('report');

});
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('/restaurants/info', \App\Http\Controllers\Admin\RestaurantInformationController::class);
    Route::resource('/restaurants/branches', \App\Http\Controllers\Admin\RestaurantBranchController::class);
    Route::resource('/menu', \App\Http\Controllers\Admin\MenuController::class);
    Route::resource('/foods-drinks', \App\Http\Controllers\Admin\MenuItemsController::class);
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/bookings', \App\Http\Controllers\Admin\TableBookingController::class);
    Route::resource('/orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('/categories', \App\Http\Controllers\Admin\NewsCategoriesController::class);
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/report', [\App\Http\Controllers\Admin\ReportController::class, 'report'])->name('admin.report');
});

Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'doLogin'])->name('login');
Route::post('register', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'doRegister'])->name('register');
Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/cart/count', [\App\Http\Controllers\CartController::class, 'getTotal'])->name('cart.total');
Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::get('/pay',[\App\Http\Controllers\PaymentController::class, 'pay'])->name('pay');
Route::post('/dopay/online', [\App\Http\Controllers\PaymentController::class, 'handleonlinepay'])->name('dopay.online');
Route::post('/dodeposit/online', [\App\Http\Controllers\PaymentController::class, 'handledeposit'])->name('dodeposit.online');
