<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
 use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Front\CurrencyConverterController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthSeller;
use App\Http\Middleware\AuthUser;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// use PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




/**
 * routes Front
 */
// Route::group([
//     'middleware' => 'guest',
// ], function () {
//     Route::get('/login', [App\Http\Controllers\AuthController::class, 'showlogin'])->name('login');
//     Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
//     Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
//     Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
//  });

//  Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => 'guest',
], function() {

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/register/seller', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('register.seller');
});

 


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'as' => 'front.'
], function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/front/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/front/cart', [CartController::class, 'store']);
    Route::delete('/front/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/front/checkout', [CheckoutController::class, 'create'])->name('checkout')->middleware(AuthUser::class);
    Route::post('/front/checkout', [CheckoutController::class, 'store'])->middleware(AuthUser::class);
    Route::get('/front/category/{id}',[HomeController::class,'show'])->name('category.show');
    Route::resource('/front/products',App\Http\Controllers\Front\ProductsController::class);
    Route::resource('/front/categories',App\Http\Controllers\Front\CategoryController::class);
    Route::resource('/front/profiles',App\Http\Controllers\Front\ProfileController::class);
    Route::resource('/front/orders',App\Http\Controllers\Front\OrderController::class);
    Route::resource('/front/wishlist',App\Http\Controllers\Front\WishlistController::class);
    Route::resource('/front/sellers',App\Http\Controllers\Front\SellerController::class);
    Route::resource('/front/tickets',App\Http\Controllers\Front\SupportTicketController::class);
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function() {


Route::post('products/{product}/rate', [ProductRatingController::class, 'rate'])->name('rate.product')->middleware(AuthUser::class);
Route::post('currency', [CurrencyConverterController::class, 'store'])->name('currency.store');

Route::view('/directions','pages.directions')->name('directions');

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware(AuthUser::class);
Route::get('/logout/seller', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout.seller');

});
/**
 * routes Admin
 */
 
Route::middleware([AuthAdmin::class])->group(function () {
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'orders' => OrderController::class,
        'customers' => CustomerController::class,
        'sellers' => SellerController::class,
        'dashboards' => DashboardController::class,
        'tickets' => SupportTicketController::class,
        'roles' => RolesController::class,
    ]);
});


