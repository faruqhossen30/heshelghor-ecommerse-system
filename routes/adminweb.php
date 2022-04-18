<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Location\DistrictController;
use App\Http\Controllers\Admin\Location\DivisionController;
use App\Http\Controllers\Admin\Order\PaymentMethodController;
use App\Http\Controllers\Admin\Order\DeliverySystemController;
use App\Http\Controllers\Admin\Courier\CourierController;
use App\Http\Controllers\Admin\Courier\CourierDeliverPlace;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
// Admin Controller
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\MarketController;

use App\Http\Controllers\Admin\AdminHomeController;
// For Order

use App\Http\Controllers\Admin\AdminLoginController;

use App\Http\Controllers\Admin\Order\AdminOrderItemListController;
// Merchant
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\CustomerController;
// Setting
use App\Http\Controllers\Setting\SettingController;
// Product Attribute
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Admin\Attribute\SizeController;
// Cart and Order Controller
use App\Http\Controllers\Admin\Attribute\ColorController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\Location\UpazilaController;
use App\Http\Controllers\Admin\Promotion\PromotionController;
use App\Http\Controllers\Setting\FooterSetting;
use App\Http\Controllers\Product\SubCategoryController;
// Ajax
use App\Http\Controllers\Ajax\Admin\CourierAjaxController;


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
        // Market
        Route::resource('market', MarketController::class);
        // For location
        Route::resource('divission', DivisionController::class);
        Route::resource('district', DistrictController::class);
        Route::resource('upazila', UpazilaController::class);
        Route::resource('color', ColorController::class);
        Route::resource('size', SizeController::class);
        // For order section
        Route::resource('deliverysystem', DeliverySystemController::class);

        Route::resource('courier', CourierController::class);

        Route::get('courier/delivery-place/{id}', [CourierDeliverPlace::class, 'addDeliveryPlace'])->name('courier.adddeliveryplace');
        Route::post('courier/delivery-place/{id}', [CourierDeliverPlace::class, 'updateDeliveryPlace'])->name('courier.updateDeliveryplace');

        Route::resource('paymentmethod', PaymentMethodController::class);
        Route::get('allorderitem', [AdminOrderItemListController::class, 'allOrderItem'])->name('admin.order.all');
        Route::get('allorderitem/search', [AdminOrderItemListController::class, 'searchOrderItem'])->name('admin.order.search');
        Route::get('order/{id}', [AdminOrderItemListController::class, 'singeOrderItem'])->name('admin.order.single');
        // Merchant Section
        Route::get('/merchants', [MerchantController::class, 'allMerchant'])->name('merchant.list.all');
        Route::get('allmerchant/search', [MerchantController::class, 'searchMerchant'])->name('admin.merchant.search');
        Route::get('/customers', [CustomerController::class, 'allCustomer'])->name('customer.list.all');
        Route::get('allcustomer/search', [CustomerController::class, 'searchCustomer'])->name('admin.customer.search');
        // Settings
        Route::get('setting', [SettingController::class, 'showSetting'])->name('setting');
        Route::post('setting/contact', [SettingController::class, 'contactInformation'])->name('setting.contact');
        Route::post('setting/social-media', [SettingController::class, 'socialMediaLink'])->name('setting.socialmedia');
        Route::post('setting/header', [SettingController::class, 'header'])->name('setting.header');
        Route::post('setting/check-payment', [SettingController::class, 'checkForOnlinePayment'])->name('setting.checkpayment');
        // Promotion
        Route::get('promotion', [PromotionController::class, 'index'])->name('promotion.index');
        // Job
        Route::resource('job', JobController::class);
    });
});


