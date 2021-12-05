<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ====================== Admin Controller Srtart ===========================
use App\Http\Controllers\APIController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
// Admin Controller
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\MarketController;
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
use App\Http\Controllers\Admin\Order\AdminOrderItemListController;
// Merchant
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\CustomerController;
// ====================== Admin Controller End ===========================


// ====================== Admin User Order Start =========================
use App\Http\Controllers\Merchant\ProfileController;
// ====================== Admin User Order End ===========================

// ======================  User Order Start =========================
use App\Http\Controllers\User\UserDashboardController;
// ======================  User Order End ===========================


// Marchant Controller
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\HomepageController;
use App\Http\Controllers\FrontEnd\ShopPageController;

// Point Manager Controller

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
use App\Http\Controllers\Merchant\MerchatProfileController;

// Front-End Controller
use App\Http\Controllers\Admin\Location\DistrictController;
use App\Http\Controllers\Admin\Location\DivisionController;
use App\Http\Controllers\Admin\Order\PaymentMethodController;
use App\Http\Controllers\Admin\Order\DeliverySystemController;
use App\Http\Controllers\FrontEnd\SearchPageController;
use App\Http\Controllers\FrontEnd\ShopListPageController;
use App\Http\Controllers\FrontEnd\ShopWiseProductListController;
use App\Http\Controllers\FrontEnd\CommentController;
use App\Http\Controllers\FrontEnd\ProductQuickViewController;

// Test Controller
use App\Http\Controllers\TestController;


Route::get('/', [HomepageController::class, 'homePage'])->name('homepage');

Route::get('/products', [ShopPageController::class, 'index'])->name('pruductspage');
Route::post('/products/filter', [ShopPageController::class, 'productFilter'])->name('pruductspage-filter');
Route::get('/product/category/{id}', [ShopPageController::class, 'productWithCategory'])->name('product.with.category');
Route::get('/product/subcategory/{id}', [ShopPageController::class, 'productWithSubCategory'])->name('product.with.subcategory');
Route::get('/product/brand/{id}', [ShopPageController::class, 'productWithBrand'])->name('product.with.brand');
Route::get('/product/{id}', [SingleProductController::class, 'index'])->name('singleproduct');
Route::get('/product/quickview/{id}', [ProductQuickViewController::class, 'quickView'])->name('quickview');
Route::get('shop-product/{id}', [ShopWiseProductListController::class, 'shopWiseProduct'])->name('product.with.shop');

// Comment product
Route::post('comment/{id}', [CommentController::class, 'store'])->name('comment.store');
// Shop List
Route::get('/shops', [ShopListPageController::class, 'allshop'])->name('shoplist');
// search
Route::get('/search/{keyword}', [HomepageController::class, 'search'])->name('search');
Route::get('/searchs/', [SearchPageController::class, 'index'])->name('searchpage');
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
        Route::get('trackorder', [UserDashboardController::class, 'trackOrder'])->name('user.order.track');
        Route::get('order/{id}', [UserDashboardController::class, 'showOrder'])->name('user.order.show');
        Route::get('account', [UserDashboardController::class, 'account'])->name('user.account');
        Route::get('account/update', [UserDashboardController::class, 'editAccount'])->name('user.account.edit');
        Route::post('account/update', [UserDashboardController::class, 'updateAccount'])->name('user.account.update');
    });
});



// Admin
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
        Route::resource('market', MarketController::class);
        // For location
        Route::resource('divission', DivisionController::class);
        Route::resource('district', DistrictController::class);
        Route::resource('upazila', UpazilaController::class);
        Route::resource('color', ColorController::class);
        Route::resource('size', SizeController::class);
        // For order section
        Route::resource('deliverysystem', DeliverySystemController::class);
        Route::resource('paymentmethod', PaymentMethodController::class);
        Route::get('allorderitem', [AdminOrderItemListController::class, 'allOrderItem'])->name('admin.order.all');
        Route::get('allorderitem/search', [AdminOrderItemListController::class, 'searchOrderItem'])->name('admin.order.search');
        Route::get('order/{id}', [AdminOrderItemListController::class, 'singeOrderItem'])->name('admin.order.single');
        // Merchant Section
        Route::get('/merchants', [MerchantController::class, 'allMerchant'])->name('merchant.list.all');
        Route::get('allmerchant/search', [MerchantController::class, 'searchMerchant'])->name('admin.merchant.search');
        Route::get('/customers', [CustomerController::class, 'allCustomer'])->name('customer.list.all');
        Route::get('allcustomer/search', [CustomerController::class, 'searchCustomer'])->name('admin.customer.search');
    });
});
// Merchant
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
        // Route::resource('shop', ShopController::class);
        Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
        Route::get('shop/create', [ShopController::class, 'create'])->name('shop.create');
        Route::post('shop/store', [ShopController::class, 'store'])->name('shop.store');
        Route::get('shop/edit/{id}', [ShopController::class, 'edit'])->name('shop.edit');
        Route::post('shop/update/{id}', [ShopController::class, 'update'])->name('shop.update');
        Route::get('shop/delete/{id}', [ShopController::class, 'destroy'])->name('shop.delete');
        // Order
        Route::get('orders', [OrderController::class, 'index'])->name('marchant.order.index');
        Route::get('order/{id}', [OrderController::class, 'orderItem'])->name('marchant.order.show');
        Route::get('order/acceptstatus/{id}', [OrderController::class, 'orderAccept'])->name('marchant.order.accept');
        // Profile
        Route::get('profile', [MerchatProfileController::class, 'index'])->name('merchant.profile');
        Route::get('profile/create', [MerchatProfileController::class, 'create'])->name('merchant.profile.create');
        Route::post('profile/create', [MerchatProfileController::class, 'store'])->name('merchant.profile.store');
    });
});
use App\Http\Controllers\PointManager\PointManagerLoginController;
use App\Http\Controllers\PointManager\PointManagerHomeController;
use App\Http\Controllers\PointManager\PointManagerCollectProductController;
// Point-Manager
Route::prefix('pointmanager')->group(function(){
    Route::get('login', [PointManagerLoginController::class, 'showLoginForm'])->name('pointmanager.login');
    Route::post('login', [PointManagerLoginController::class, 'login'])->name('pointmanager.login');

    Route::group(['middleware' => 'IsPointmanager'],function () {
        Route::post('logout', [PointManagerLoginController::class, 'logout'])->name('pointmanager.logout');
        Route::get('home', [PointManagerHomeController::class, 'index'])->name('pointmanager.home');
        Route::get('collectproductlist', [PointManagerCollectProductController::class, 'allCollectProductList'])->name('pointmanager.collect.product');
    });
});

use App\Http\Controllers\DeliveryMan\DeliveryManLoginController;
use App\Http\Controllers\DeliveryMan\DeliveryManHomeController;

// Delivery Man
Route::prefix('deliveryman')->group(function(){
    Route::get('login', [DeliveryManLoginController::class, 'showLoginForm'])->name('deliveryman.login');
    Route::post('login', [DeliveryManLoginController::class, 'login'])->name('deliveryman.login');

    Route::group(['middleware' => 'IsDeliveryman'],function () {
        Route::post('logout', [DeliveryManLoginController::class, 'logout'])->name('deliveryman.logout');
        Route::get('home', [DeliveryManHomeController::class, 'index'])->name('deliveryman.home');
    });
});



// For API
Route::get('subcategory', [SubCategoryController::class, 'getSubcategoryById'])->name('get.subcategory');
Route::get('getdistrict/{division_id}', [APIController::class, 'getDistrictByDivisionID']);
Route::get('getupazila/{district_id}', [APIController::class, 'getUpazilaByDistrictID']);
Route::get('commission/{id}', [APIController::class, 'getCommission']);
Route::get('deliverycost/{id}', [APIController::class, 'getDeliveryCost']);
Route::get('getshop/{id}', [APIController::class, 'getShop']);
// For Testing
Route::get('test', [TestController::class, 'carbon'])->name('test');
