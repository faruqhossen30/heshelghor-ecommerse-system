<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Marchant Controller
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Merchant\MerchantGalleryController;

// Merchant Profile Controller

use App\Http\Controllers\Merchant\MerchatProfileController;
use App\Http\Controllers\Admin\MarchantHomeController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Admin\MarchantController;
use App\Http\Controllers\Merchant\MyBrandController;


use App\Http\Controllers\Product\ProductController;

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
        // Gallery
        Route::get('gallary', [MerchantGalleryController::class, 'viewGallery'])->name('merchant.veiw.gallery');
        Route::post('gallary/sotre', [MerchantGalleryController::class, 'soteGallery'])->name('merchant.store.gallery');
        Route::post('gallary/delete/{id}', [MerchantGalleryController::class, 'deleteSingleMedia'])->name('merchant.delete.gallery');
    });
});

Route::get('merchant/galary/modalgallery', [MerchantGalleryController::class, 'merchantModalGallery'])->name('merchant.modal.gallery');
Route::get('merchant/galary/modalgallerymultiple', [MerchantGalleryController::class, 'merchantModalGalleryMultiple'])->name('merchant.modal.gallerymultiple');
