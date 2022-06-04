<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Location\DistrictController;
use App\Http\Controllers\Admin\Location\DivisionController;
use App\Http\Controllers\Admin\Order\PaymentMethodController;
use App\Http\Controllers\Admin\Order\DeliverySystemController;
use App\Http\Controllers\Admin\Courier\CourierController;
use App\Http\Controllers\Admin\Courier\CourierDeliverPlace;
use App\Http\Controllers\Admin\Courier\CourierPickupPlace;


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
use App\Http\Controllers\Admin\Promotion\SliderajaxController;
use App\Http\Controllers\Admin\Promotion\SliderController;
use App\Http\Controllers\Setting\FooterSetting;
use App\Http\Controllers\Product\SubCategoryController;
// Ajax
use App\Http\Controllers\Ajax\Admin\CourierAjaxController;
use App\Http\Controllers\Product\BrandController;

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
        //Product
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        // Brand for Admin
        Route::resource('brands', BrandsController::class);
        // Route::get('trashbrand', [BrandController::class, 'trashbrand'])->name('brand.trashlist');
        Route::get('trashbrand',[BrandsController::class,'trashbrand'])->name('tansh.bland.list');
        Route::get('brand-restor/{id}',[BrandsController::class,'trashbrandrestor'])->name('tansh.bland.restor');
        Route::get('permanent-brand-delete/{id}',[BrandsController::class,'permanentBrandDelete'])->name('permanent.bland.delete');
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

        // Courier Start
        Route::resource('courier', CourierController::class);
        Route::get('courier/delivery-place/{id}', [CourierDeliverPlace::class, 'addDeliveryPlace'])->name('courier.adddeliveryplace');
        Route::post('courier/delivery-place/{id}', [CourierDeliverPlace::class, 'updateDeliveryPlace'])->name('courier.updateDeliveryplace');
        // Pick Up
        Route::get('courier/pickup-place/{id}', [CourierPickupPlace::class, 'addPickupPlace'])->name('courier.addpickupplace');
        Route::post('courier/pickup-place/{id}', [CourierPickupPlace::class, 'updateDeliveryPlace'])->name('courier.updatepickplace');
        Route::resource('paymentmethod', PaymentMethodController::class);

        // Order
        Route::get('allorderitem', [AdminOrderItemListController::class, 'allOrderItem'])->name('admin.order.all');
        Route::get('allorder/pending', [AdminOrderItemListController::class, 'pendingOrders'])->name('admin.allorder.pending');
        Route::get('allorder/courier', [AdminOrderItemListController::class, 'courierOrders'])->name('admin.allorder.courier');
        Route::get('allorder/complete', [AdminOrderItemListController::class, 'completeOrders'])->name('admin.allorder.complete');

        Route::get('order/{id}', [AdminOrderItemListController::class, 'singeOrderItem'])->name('admin.order.single')->where('id', '[0-9]+');;
        Route::get('order/acceptstatus/{id}', [AdminOrderItemListController::class, 'orderAccept'])->name('admin.acceptorder')->where('id', '[0-9]+');
        Route::get('order/canceltatus/{id}', [AdminOrderItemListController::class, 'orderCancel'])->name('admin.cancelorder')->where('id', '[0-9]+');
        Route::get('order/courierstatus/{id}', [AdminOrderItemListController::class, 'orderCourier'])->name('admin.courierorder')->where('id', '[0-9]+');
        Route::get('order/completestatus/{id}', [AdminOrderItemListController::class, 'orderComplete'])->name('admin.completeorder')->where('id', '[0-9]+');

        Route::get('allorderitem/search', [AdminOrderItemListController::class, 'searchOrderItem'])->name('admin.order.search');
        // Merchant Section
        Route::get('/merchants', [MerchantController::class, 'allMerchant'])->name('merchant.list.all');
        Route::get('/shops', [MerchantController::class, 'allshoplist'])->name('shop.list.all');
        Route::get('/shop/view/{id}', [MerchantController::class, 'viewshop'])->name('merchantshop.viewshop');
        Route::get('/shop/active/{id}', [MerchantController::class, 'activeshop'])->name('merchantshop.active');
        Route::get('/shop/deactive/{id}', [MerchantController::class, 'deactive'])->name('merchantshop.deactive');

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
        Route::get('promotion/shop', [PromotionController::class, 'shop'])->name('allshop.shop');
        Route::resource('slider', SliderController::class);
        // Job
        Route::resource('job', JobController::class);
    });
});


//--------------------------------category dependency-----------------
Route::get('/category-to-subcategory/{id}', [SliderajaxController::class, 'CategorytoSubcategory'])->name('categorytosubcategory');
