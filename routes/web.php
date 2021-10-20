<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ====================== Admin Controller Srtart ===========================
use App\Http\Controllers\APIController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
// Admin Controller
use App\Http\Controllers\Admin\BrandsController;
// Location Controller
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Admin\MarchantController;
// Attribute Controller
use App\Http\Controllers\Merchant\OrderController;
use App\Http\Controllers\Admin\AdminHomeController;
// For Order
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Merchant\MyBrandController;
// ====================== Admin Controller End ===========================


// ====================== Admin User Order Start =========================
use App\Http\Controllers\Merchant\ProfileController;
// ====================== Admin User Order End ===========================

// ======================  User Order Start =========================
use App\Http\Controllers\FrontEnd\UserOrderController;
use App\Http\Controllers\User\UserDashboardController;
// ======================  User Order End ===========================


// Marchant Controller
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\HomepageController;
use App\Http\Controllers\FrontEnd\ShopPageController;

// Product Controller
use App\Http\Controllers\Admin\MarchantHomeController;
use App\Http\Controllers\FrontEnd\UserOrderController;
use App\Http\Controllers\Merchant\Shop\ShopController;
use App\Http\Controllers\Product\SubCategoryController;
use App\Http\Controllers\Admin\Attribute\SizeController;

// Cart and Order Controller
use App\Http\Controllers\Admin\Attribute\ColorController;
use App\Http\Controllers\Admin\Location\UpazilaController;
use App\Http\Controllers\Admin\MarchantRegisterController;
// Merchant Profile Controller
use App\Http\Controllers\FrontEnd\SingleProductController;

// Front-End Controller
use App\Http\Controllers\Admin\Location\DistrictController;
use App\Http\Controllers\Admin\Location\DivisionController;
use App\Http\Controllers\Admin\Order\PaymentMethodController;
use App\Http\Controllers\Admin\Order\DeliverySystemController;


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

Route::get('/', [HomepageController::class, 'homePage'])->name('homepage');
Route::get('/products', [ShopPageController::class, 'index'])->name('pruductspage');
Route::get('/product/{id}', [SingleProductController::class, 'index'])->name('singleproduct');
Route::get('/product/category/{id}', [ShopPageController::class, 'productWithCategory'])->name('product.with.category');
Route::get('/product/subcategory/{id}', [ShopPageController::class, 'productWithSubCategory'])->name('product.with.subcategory');

// For Shoping Cart
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'cartPage'])->name('cart.page');
Route::post('/cart/update/{rowId}', [CartController::class, 'cartItemUpdate'])->name('cart.ItemUpdate');
Route::get('/cart/remove', [CartController::class, 'removeAllItem'])->name('cart.removeallItem');
Route::get('/cart/remove/{rowId}', [CartController::class, 'removeCartItem'])->name('cart.removeItem');


Auth::routes();
// For Authincate User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkoutpage');
Route::post('ordernow', [UserOrderController::class, 'orderNow'])->name('ordernow');
Route::get('order/complete', [UserOrderController::class, 'orderComplete'])->name('ordercomplete');

// Four User
Route::prefix('user')->group(function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        Route::get('orders', [UserDashboardController::class, 'orders'])->name('user.order');
    });

});

// For API
Route::get('subcategory', [SubCategoryController::class, 'getSubcategoryById'])->name('get.subcategory');
Route::get('getdistrict/{division_id}', [APIController::class, 'getDistrictByDivisionID']);
Route::get('getupazila/{district_id}', [APIController::class, 'getUpazilaByDistrictID']);
Route::get('commission/{id}', [APIController::class, 'getCommission']);
Route::get('deliverycost/{id}', [APIController::class, 'getDeliveryCost']);


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('districts', [DistrictController::class, 'selectDistrict'])->name('districts');

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::get('home', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::resource('roles', RolesController::class);
        Route::resource('admin', AdminController::class);
        // For Product
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        // Brand for Admin
        Route::resource('brands', BrandsController::class);
        // For location
        Route::resource('divission', DivisionController::class);
        Route::resource('district', DistrictController::class);
        Route::resource('upazila', UpazilaController::class);
        Route::resource('color', ColorController::class);
        Route::resource('size', SizeController::class);
        // For order section
        Route::resource('deliverysystem', DeliverySystemController::class);
        Route::resource('paymentmethod', PaymentMethodController::class);
    });
});

Route::prefix('merchant')->group(function () {
    Route::get('login', [MarchantController::class, 'showLoginForm'])->name('marchant.login');
    Route::post('login', [MarchantController::class, 'login'])->name('marchant.login');
    Route::post('logout', [MarchantController::class, 'logout'])->name('marchant.logout');

    Route::get('register', [MarchantRegisterController::class, 'showRegistrationForm'])->name('marchant.register');
    Route::post('register', [MarchantRegisterController::class, 'register'])->name('marchant.register');


    Route::group(['middleware' => 'isMarchent'], function () {
        Route::get('home', [MarchantHomeController::class, 'index'])->name('marchant.home');
        // Product
        Route::resource('product', ProductController::class);
        Route::resource('brand', BrandController::class);
        Route::get('mybrand', [MyBrandController::class, 'index'])->name('myaddedbrand');
        Route::resource('shop', ShopController::class);
        // Order
        Route::get('order', [OrderController::class, 'index'])->name('marchant.order.index');
        Route::get('show', [OrderController::class, 'show'])->name('marchant.order.show');
        // Profile
        Route::resource('merchantprofile', ProfileController::class);
    });
});
