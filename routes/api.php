<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\AllListAPIController;
use App\Http\Controllers\API\ShopAPIController;
use App\Http\Controllers\API\BrandAPIController;
// User API
use App\Http\Controllers\API\User\UserAPIController;
use App\Http\Controllers\API\User\UserOrderAPIController;
use App\Http\Controllers\API\SearchAPIController;
use App\Http\Controllers\API\User\UserOrderListAPIController;
use App\Http\Controllers\API\User\UserAuthAPIController;
// Location API
use App\Http\Controllers\API\Location\LocationAPIController;
use App\Http\Controllers\API\Merchant\MerchantBrandAPIController;
// Merchant API
use App\Http\Controllers\API\Merchant\MerchantOrderItemAPIController;
use App\Http\Controllers\API\Merchant\MerchantShopAPIController;
use App\Http\Controllers\API\Merchant\MerchantAuthAPIController;
use App\Http\Controllers\API\Merchant\MerchantProductAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Search API
Route::get('search/{keyword}', [SearchAPIController::class, 'searchProduct']);
Route::get('search/brand/{keyword}', [SearchAPIController::class, 'searchBrand']);
Route::get('search/shop/{keyword}', [SearchAPIController::class, 'searchShop']);

// All Product
Route::get('product/{id}', [ProductAPIController::class, 'singleProduct']);
Route::get('allproduct/', [ProductAPIController::class, 'allProduct']);
Route::get('products', [ProductAPIController::class, 'productByPage']);
Route::get('product/category/{id}', [ProductAPIController::class, 'productByCategory']); // Category wise product
Route::get('product/subcategory/{id}', [ProductAPIController::class, 'productBySubCategory']); // Sub-Category wise product
Route::get('product/brand/{id}', [ProductAPIController::class, 'productByBrand']); // Brand wise product
Route::get('product/merchant/{id}', [ProductAPIController::class, 'productByMerchant']); // Merchant wise product


// All List
Route::get('categories', [AllListAPIController::class, 'allCategory']); // Category List
Route::get('subcategories', [AllListAPIController::class, 'allSubCategory']); // Sub-Category List
Route::get('subcategory/category/{id}', [AllListAPIController::class, 'subCategoryByCategory']); // Sub-Category List
Route::get('allbrand', [AllListAPIController::class, 'allBrand']); // Category List
Route::get('brands', [BrandAPIController::class, 'brands']); // Category List
Route::get('merchants', [AllListAPIController::class, 'allMerchant']); // Merchant List
Route::get('allshop', [AllListAPIController::class, 'allShop']); // Shop List
Route::get('shops', [ShopAPIController::class, 'shops']); // Shop List by pagination
Route::get('deliverysystem', [AllListAPIController::class, 'deliverySystem']); // Shop List by pagination



// Location api
Route::get('divisions', [LocationAPIController::class, 'divisions']); // all divission list
Route::get('districts', [LocationAPIController::class, 'districts']); // all divission list
Route::get('upazilas', [LocationAPIController::class, 'upazilas']); // all divission list
Route::get('district/{id}', [LocationAPIController::class, 'getDristrictByDivision']); // all divission list
Route::get('upazila/{id}', [LocationAPIController::class, 'getUpazillaByDistrict']); // all divission list



// Merchant Order Items api
Route::prefix('merchant')->group(function () {
    Route::post('/login', [MerchantAuthAPIController::class, 'login']);
    Route::post('/register', [MerchantAuthAPIController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', [MerchantAuthAPIController::class, 'logout']);
        // Order
        Route::get('/orders', [MerchantOrderItemAPIController::class, 'allOrder']);
        Route::get('/order/{orderItemId}', [MerchantOrderItemAPIController::class, 'singleOrder']);
        Route::get('/order/accept/{orderItemId}', [MerchantOrderItemAPIController::class, 'acceptOrder']);
        Route::get('/order/cancel/{orderItemId}', [MerchantOrderItemAPIController::class, 'cancelOrder']);
        // Product
        Route::get('products', [MerchantProductAPIController::class, 'index']);
        Route::get('product/{id}', [MerchantProductAPIController::class, 'show']);
        Route::get('product/delete/{id}', [MerchantProductAPIController::class, 'destroy']);
        // Brand
        Route::get('/brand', [MerchantBrandAPIController::class, 'index']);
        Route::post('/brand', [MerchantBrandAPIController::class, 'store']);
        Route::get('/brand/{id}', [MerchantBrandAPIController::class, 'show']);
        Route::post('/brand/update/{id}', [MerchantBrandAPIController::class, 'update']);
        Route::get('/brand/delete/{id}', [MerchantBrandAPIController::class, 'destroy']);
        // Shop
        Route::get('/shop', [MerchantShopAPIController::class, 'index']);
        Route::post('/shop/create', [MerchantShopAPIController::class, 'store']);
        Route::get('/shop/{id}', [MerchantShopAPIController::class, 'show']);
        Route::post('/shop/update/{id}', [MerchantShopAPIController::class, 'update']);
        Route::get('/shop/delete/{id}', [MerchantShopAPIController::class, 'destroy']);
    });


});

// User API
Route::post('/register', [UserAPIController::class, 'userRegister']);

// User Order Items api

Route::prefix('user')->group(function () {
    Route::post('/login', [UserAuthAPIController::class, 'login']);
    Route::post('/register', [UserAuthAPIController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', [UserAuthAPIController::class, 'logout']);
        Route::get('/orders', [UserOrderListAPIController::class, 'order']);
        Route::get('/order/{id}', [UserOrderListAPIController::class, 'orderItem']);
        Route::post('/createorder', [UserOrderAPIController::class, 'createOrder']);
        Route::post('createitem', [UserOrderAPIController::class, 'createOrderitem']);
        Route::post('deliveryaddress', [UserOrderAPIController::class, 'deliveryAddress']);

    });

});

