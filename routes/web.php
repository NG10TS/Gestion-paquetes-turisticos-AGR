<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
use App\Http\Middleware\LocaleCookieMiddleware;

use App\Http\Controllers\Crud\CustomerController;
use App\Http\Controllers\Crud\CategoryController;
use App\Http\Controllers\Crud\ProductController;
use App\Http\Controllers\Crud\SaleController;
use App\Http\Controllers\Crud\SaleDetailController;
use App\Http\Controllers\Crud\PaymentDetailController;
use App\Http\Controllers\Crud\PaymentMethodController;
use App\Http\Controllers\Crud\BookingController;
use App\Http\Controllers\Crud\CustomerTypeController;
use App\Http\Controllers\Crud\ActivityController;
use App\Http\Controllers\Crud\EntertainmentController;
use App\Http\Controllers\Crud\PackageController;
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
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
});

// -------------------------- user management ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('user/table', 'index')->middleware('auth')->name('user/table');
    Route::post('user/update', 'updateRecord')->name('user/update');
    Route::post('user/delete', 'deleteRecord')->name('user/delete');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user/profile');

});

// -------------------------- type form ----------------------//
Route::controller(TypeFormController::class)->group(function () {
    Route::get('form/input/new', 'index')->middleware('auth')->name('form/input/new');

});

Route::get('locale/{locale}', function($locale){
    return redirect()->black()->withCookie('locale', $locale);
});


Route::group(['middleware' => 'auth'], function () {
    //User Management Routes
    Route::get('user/table', [UserManagementController::class, 'index'])->name('user/table');
    Route::post('user/update', [UserManagementController::class, 'updateRecord'])->name('user/update');
    Route::post('user/delete', [UserManagementController::class, 'deleteRecord'])->name('user/delete');
    Route::get('user/profile', [UserManagementController::class, 'profileUser'])->name('user/profile');

    // Customer Routes
    Route::get('customer/table', [CustomerController::class, 'index'])->name('customer/table');
    Route::post('customer/store', [CustomerController::class, 'store'])->name('customer/store');
    Route::post('customer/update', [CustomerController::class, 'update'])->name('customer/update');
    Route::post('customer/delete', [CustomerController::class, 'delete'])->name('customer/delete');

    // Category Routes
    Route::get('category/table', [CategoryController::class, 'index'])->name('category/table');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category/store');
    Route::post('category/update', [CategoryController::class, 'update'])->name('category/update');
    Route::post('category/delete', [CategoryController::class, 'delete'])->name('category/delete');

    // Product Routes
    Route::get('product/table', [ProductController::class, 'index'])->name('product/table');
    Route::post('product/store', [ProductController::class, 'store'])->name('product/store');
    Route::post('product/update', [ProductController::class, 'update'])->name('product/update');
    Route::post('product/delete', [ProductController::class, 'delete'])->name('product/delete');

    // Sale Routes
    Route::get('sale/table', [SaleController::class, 'index'])->name('sale/table');
    Route::post('sale/store', [SaleController::class, 'store'])->name('sale/store');
    Route::post('sale/update', [SaleController::class, 'update'])->name('sale/update');
    Route::post('sale/delete', [SaleController::class, 'delete'])->name('sale/delete');

    // Sale Detail Routes
    Route::get('sale/detail/table', [SaleDetailController::class, 'index'])->name('sale/detail/table');
    Route::post('sale/detail/store', [SaleDetailController::class, 'store'])->name('sale/detail/store');
    Route::post('sale/detail/update', [SaleDetailController::class, 'update'])->name('sale/detail/update');
    Route::post('sale/detail/delete', [SaleDetailController::class, 'delete'])->name('sale/detail/delete');

    // Payment Detail Routes
    Route::get('payment/detail/table', [PaymentDetailController::class, 'index'])->name('payment/detail/table');
    Route::post('payment/detail/store', [PaymentDetailController::class, 'store'])->name('payment/detail/store');
    Route::post('payment/detail/update', [PaymentDetailController::class, 'update'])->name('payment/detail/update');
    Route::post('payment/detail/delete', [PaymentDetailController::class, 'delete'])->name('payment/detail/delete');

    // Payment Method Routes
    Route::get('payment/method/table', [PaymentMethodController::class, 'index'])->name('payment/method/table');
    Route::post('payment/method/store', [PaymentMethodController::class, 'store'])->name('payment/method/store');
    Route::post('payment/method/update', [PaymentMethodController::class, 'update'])->name('payment/method/update');
    Route::post('payment/method/delete', [PaymentMethodController::class, 'delete'])->name('payment/method/delete');

    // Booking Routes
    Route::get('booking/table', [BookingController::class, 'index'])->name('booking/table');
    Route::post('booking/store', [BookingController::class, 'store'])->name('booking/store');
    Route::post('booking/update', [BookingController::class, 'update'])->name('booking/update');
    Route::post('booking/delete', [BookingController::class, 'delete'])->name('booking/delete');

    // Customer Type Routes
    Route::get('customer/type/table', [CustomerTypeController::class, 'index'])->name('customer/type/table');
    Route::post('customer/type/store', [CustomerTypeController::class, 'store'])->name('customer/type/store');
    Route::post('customer/type/update', [CustomerTypeController::class, 'update'])->name('customer/type/update');
    Route::post('customer/type/delete', [CustomerTypeController::class, 'delete'])->name('customer/type/delete');

    // Activity Routes
    Route::get('activity/table', [ActivityController::class, 'index'])->name('activity/table');
    Route::post('activity/store', [ActivityController::class, 'store'])->name('activity/store');
    Route::post('activity/update', [ActivityController::class, 'update'])->name('activity/update');
    Route::post('activity/delete', [ActivityController::class, 'delete'])->name('activity/delete');

    // Entertainment Routes
    Route::get('entertainment/table', [EntertainmentController::class, 'index'])->name('entertainment/table');
    Route::post('entertainment/store', [EntertainmentController::class, 'store'])->name('entertainment/store');
    Route::post('entertainment/update', [EntertainmentController::class, 'update'])->name('entertainment/update');
    Route::post('entertainment/delete', [EntertainmentController::class, 'delete'])->name('entertainment/delete');

    // Package Routes
    Route::get('package/table', [PackageController::class, 'index'])->name('package/table');
    Route::post('package/store', [PackageController::class, 'store'])->name('package/store');
    Route::post('package/update', [PackageController::class, 'update'])->name('package/update');
    Route::post('package/delete', [PackageController::class, 'delete'])->name('package/delete');
});
// Route::middleware(LocaleCookieMiddleware::class)->group(function(){

//     Route::group(['middleware' => 'auth'], function () {
//         Route::get('home', function () {
//             return view('home');
//         });
//         Route::get('home', function () {
//             return view('home');
//         });
//     });
// });
