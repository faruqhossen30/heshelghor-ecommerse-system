<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Marchant Controller

use App\Http\Controllers\Merchant\MerchantGalleryController;

// Merchant Profile Controller
use App\Http\Controllers\Merchant\MerchantProfileController;

use App\Http\Controllers\Admin\MarchantHomeController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Admin\MarchantController;
use App\Http\Controllers\Merchant\MyBrandController;
use App\Http\Controllers\Admin\MarchantRegisterController;
use App\Http\Controllers\Merchant\Shop\ShopController;
use App\Http\Controllers\Merchant\OrderController;
use App\Http\Controllers\Merchant\ProductstoctController;
use App\Http\Controllers\Merchant\SalseReportsController;
use App\Http\Controllers\Merchant\Withdrawals\WithdrawrlsController;
use App\Http\Controllers\Product\ProductController;

Route::prefix('merchant')->group(function () {
    Route::get('login', [MarchantController::class, 'showLoginForm'])->name('marchant.login');
    Route::post('login', [MarchantController::class, 'login'])->name('marchant.login');
    Route::post('logout', [MarchantController::class, 'logout'])->name('marchant.logout');

    Route::get('register', [MarchantRegisterController::class, 'showRegistrationForm'])->name('marchant.register');
    Route::post('register', [MarchantRegisterController::class, 'register'])->name('marchant.register');


    Route::group(['middleware' => ['isMarchent']], function () {
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

        Route::get('shop/vacation/{id}', [ShopController::class, 'shopVacation'])->name('shop.vacation');
        // Order
        Route::get('orders', [OrderController::class, 'index'])->name('marchant.order.index');
        Route::get('order/{id}', [OrderController::class, 'orderItem'])->name('marchant.order.show');
        Route::get('order/acceptstatus/{id}', [OrderController::class, 'orderAccept'])->name('marchant.order.accept');
        Route::get('order/canceltatus/{id}', [OrderController::class, 'orderCancel'])->name('marchant.order.cancel');
        // Profile
        Route::get('profile', [MerchantProfileController::class, 'index'])->name('merchant.profile');

        // Gallery
        Route::get('gallary', [MerchantGalleryController::class, 'viewGallery'])->name('merchant.veiw.gallery');
        Route::post('gallary/sotre', [MerchantGalleryController::class, 'soteGallery'])->name('merchant.store.gallery');
        Route::post('gallary/delete/{id}', [MerchantGalleryController::class, 'deleteSingleMedia'])->name('merchant.delete.gallery');
        // merchent sales report
       Route::get('reports/sales_report',[SalseReportsController::class,'SalesReport'])->name('sales.report');
       Route::get('saleslist-filter/currentDate', [SalseReportsController::class,'currentDate'])->name('sales.list.currentDate');
       Route::get('saleslist-filte/date', [SalseReportsController::class, 'salesListByDate'])->name('sales.list.date');
       Route::get('saleslist-filter/week', [SalseReportsController::class,'salestListByWeek'])->name('sales.list.week');
       Route::get('saleslist-filter/month', [SalseReportsController::class,'salseListByMonth'])->name('sales.list.month');


       Route::get('stock/product/{id}', [ProductstoctController::class,'stockProduct'])->name('stock.product');
       Route::get('shoplist', [ProductstoctController::class,'shoplist'])->name('shop.list');

        Route::group(['prefix'=>'withdrawal','as'=>'Withdrawal.'], function(){

            Route::get('/',      [WithdrawrlsController::class,'index'])->name('index');
            Route::get('create/',[WithdrawrlsController::class,'create'])->name('create');
            Route::post('store/', [WithdrawrlsController::class,'store'])->name('store');

        });
        

    });
});

Route::get('merchant/galary/modalgallery', [MerchantGalleryController::class, 'merchantModalGallery'])->name('merchant.modal.gallery');
Route::get('merchant/galary/modalgallerymultiple', [MerchantGalleryController::class, 'merchantModalGalleryMultiple'])->name('merchant.modal.gallerymultiple');
