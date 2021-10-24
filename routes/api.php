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
// Location API
use App\Http\Controllers\API\Location\LocationAPIController;

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

// User API
Route::post('/register', [UserAPIController::class, 'userRegister']);
Route::post('/login', [UserAPIController::class, 'userLogin']);

// Location api
Route::get('divisions', [LocationAPIController::class, 'divisions']); // all divission list
Route::get('districts', [LocationAPIController::class, 'districts']); // all divission list
Route::get('upazilas', [LocationAPIController::class, 'upazilas']); // all divission list
Route::get('district/{id}', [LocationAPIController::class, 'getDristrictByDivision']); // all divission list
Route::get('upazila/{id}', [LocationAPIController::class, 'getUpazillaByDistrict']); // all divission list

// Merchant Order Items api
Route::prefix('user')->group(function () {
    Route::post('createorder', [UserOrderAPIController::class, 'createOrder']);
    Route::post('createitem', [UserOrderAPIController::class, 'createOrderitemAddress']);
});


