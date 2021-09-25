<?php


use Illuminate\Support\Facades\Route;
// Admin Controller
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\AdminController;
// Location Controller
use App\Http\Controllers\Admin\Location\DivisionController;
use App\Http\Controllers\Admin\Location\DistrictController;
use App\Http\Controllers\Admin\Location\UpazilaController;


// Marchant Controller
use App\Http\Controllers\Admin\MarchantController;
use App\Http\Controllers\Admin\MarchantHomeController;
use App\Http\Controllers\Admin\MarchantRegisterController;
// Product Controller
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\SubCategoryController;
// Order Controller
use App\Http\Controllers\Merchant\OrderController;
// Merchant Profile Controller
use App\Http\Controllers\Merchant\ProfileController;
// Admin Controller
use App\Http\Controllers\Admin\BrandsController;



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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('districts', [DistrictController::class, 'selectDistrict']);


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
    });
});

Route::prefix('marchant')->group(function () {
    Route::get('login', [MarchantController::class, 'showLoginForm'])->name('marchant.login');
    Route::post('login', [MarchantController::class, 'login'])->name('marchant.login');
    Route::post('logout', [MarchantController::class, 'logout'])->name('marchant.logout');

    Route::get('register', [MarchantRegisterController::class, 'showRegistrationForm'])->name('marchant.register');
    Route::post('register', [MarchantRegisterController::class, 'register'])->name('marchant.register');
    Route::get('home', [MarchantHomeController::class, 'index'])->name('marchant.home');
    // Product
    Route::resource('product', ProductController::class);

    // Route::resource('brand', BrandController::class);

    // Order
    Route::get('order', [OrderController::class, 'index'])->name('marchant.order.index');
    Route::get('show', [OrderController::class, 'show'])->name('marchant.order.show');
    // Merchant Profile
    Route::resource('merchantprofile', ProfileController::class);

});

