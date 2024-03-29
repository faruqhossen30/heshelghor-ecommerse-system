<?php

use App\Http\Controllers\Admin\Promotion\SliderajaxController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Location Controller
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;

use App\Http\Controllers\APIController;
// ====================== Admin User Order Start =========================
use App\Http\Controllers\Merchant\ProfileController;
// ======================  User Order Start =========================
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserorderController;
// ======================  User Order End ===========================
use App\Http\Controllers\User\UserProductReviewController;

// Product Controller
use App\Http\Controllers\Product\SubCategoryController;


// Front-End Controller
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\SingleProductController;

use App\Http\Controllers\Frontend\SearchPageController;
use App\Http\Controllers\Frontend\ShopListPageController;
use App\Http\Controllers\Frontend\ShopWiseProductListController;
use App\Http\Controllers\Frontend\MarketListPageController;
use App\Http\Controllers\Frontend\ProductQuickViewController;
use App\Http\Controllers\Frontend\Filter\SearchWiseFilterController;

use App\Http\Controllers\Frontend\Filter\CategoryWiseFilterController;
use App\Http\Controllers\Frontend\Filter\SubCategoryWiseFilterController;

use App\Http\Controllers\Frontend\BuyNowController;

use App\Http\Controllers\Frontend\Shoplist\ShoplistAjaxController;
// Test Controller
use App\Http\Controllers\TestController;
// Modal Ajax
use App\Http\Controllers\Ajax\Frontend\SearchShopAjaxController;
use App\Http\Controllers\Ajax\Frontend\SearchMarketAjaxController;
use App\Http\Controllers\Ajax\Frontend\SingleproductShopAndMarketAjaxController;
use App\Http\Controllers\Ajax\Frontend\CourierajaxController;
use App\Http\Controllers\Ajax\Frontend\CheckoutCourierajaxController;
use App\Http\Controllers\Frontend\CategorylistpageController;
use App\Http\Controllers\Frontend\CategorypageController;
use App\Http\Controllers\Frontend\ProductpageController;
use App\Http\Controllers\Frontend\SearchpageController as FrontendSearchpageController;
use App\Http\Controllers\Frontend\ShoppageController;
use App\Http\Controllers\Frontend\SubcategorypageController;
use App\Http\Controllers\User\UsercomplainController;
use App\Http\Controllers\User\UsercomplainControllerr;
use App\Http\Controllers\User\UserorderinvoiceController;

Route::get('/', [HomepageController::class, 'homePage'])->name('homepage');
Route::get('/about-us', [HomepageController::class, 'aboutUs'])->name('aboutus');
Route::get('/privacy-policy', [HomepageController::class, 'privacyPolicy'])->name('privacypolicy');
Route::get('/promotion', [HomepageController::class, 'promotion'])->name('promotion');
Route::get('/terms-and-condition', [HomepageController::class, 'termsAndCondition'])->name('termsandcondition');
Route::get('/return-policy', [HomepageController::class, 'returnPolicy'])->name('returnpolicy');

Route::get('/jobs/{id}', [HomepageController::class, 'jobsShow'])->name('jobs.show');
Route::get('/jobs', [HomepageController::class, 'jobs'])->name('jobs');
Route::post('/ajax/offcanvascategories', [HomepageController::class, 'ajaxOffcanvascategory']);
Route::post('ajax/live/search', [HomepageController::class, 'ajaxSearch']);


// Products Area
Route::get('/products', [ProductpageController::class, 'index'])->name('pruductspage');
Route::get('shop/{slug}', [ShoppageController::class, 'index'])->name('shoppage');
Route::get('category/{slug}', [CategorypageController::class, 'index'])->name('categorypage');
Route::get('subcategory/{slug}', [SubcategorypageController::class, 'index'])->name('subcategorypage');


Route::get('/categories', [CategorylistpageController::class, 'index'])->name('categorylistpage');
Route::get('/category/{category}/{slug}', [SubCategoryWiseFilterController::class, 'productWithSubCategory'])->name('product.with.subcategory');
Route::get('/product/brand/{id}', [ShopPageController::class, 'productWithBrand'])->name('product.with.brand');
Route::get('/product/{slug}', [SingleProductController::class, 'index'])->name('singleproduct');

Route::get('/product/quickview/{id}', [ProductQuickViewController::class, 'quickView'])->name('quickview');

// Shop List
Route::get('/shops', [ShopListPageController::class, 'allshop'])->name('shoplist');
Route::get('/market/{slug}', [ShopListPageController::class, 'allmarketshop'])->name('allmarketshop');
Route::get('/ajaxshoplist', [ShoplistAjaxController::class, 'ajaxshoplist'])->name('ajaxshoplist');
Route::get('/shop/{id}', [ShopWiseProductListController::class, 'shopWiseProduct'])->name('product.with.shop');

// Market List
Route::get('/markets', [MarketListPageController::class, 'marketList'])->name('market.list');
Route::get('/market/{id}', [MarketListPageController::class, 'marketWiseShopList'])->name('market.wise.shoplist');

Route::get('/ajaxmarketlist', [MarketListPageController::class, 'ajaxmarketlist'])->name('ajaxmarketlist');

// search
Route::get('/search', [SearchpageController::class, 'index'])->name('searchpage');


// For Shoping Cart
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'cartPage'])->name('cart.page');
Route::post('/cart/update/{rowId}', [CartController::class, 'cartItemUpdate'])->name('cart.ItemUpdate');
Route::get('/cart/remove', [CartController::class, 'removeAllItem'])->name('cart.removeallItem');
Route::post('/cart/remove/{rowId}', [CartController::class, 'removeCartItem'])->name('cart.removeItem');
Route::post('ajax/cart-item/list', [CartController::class, 'ajaxCartItemList'])->name('cart.items.list');
Route::get('/buy-now/{id}', [BuyNowController::class, 'buyNow'])->name('buynow')->middleware('auth');
Route::get('/buynow/complete-order', [BuyNowController::class, 'buynowOrdercomplete'])->name('buynowordercomplete');
// Wishlist
Route::get('wishlist', [WishlistController::class, 'wishlistPage'])->name('wishlist')->middleware('auth');
Route::get('wishlist/{id}', [WishlistController::class, 'removeProduct'])->name('wishlistremove')->middleware('auth');
// Route::get('wishlist/removeall', [WishlistController::class, 'removeAll'])->name('addwishlistremoveall')->middleware('auth')->where('name', '[A-Za-z]+');
Route::post('addtowishlist', [WishlistController::class, 'wishlistStore'])->name('addwishlist.store')->middleware('auth');


// dd

Auth::routes();
// For Authincate User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkoutpage');
Route::post('ordernow', [UserOrderController::class, 'orderNow'])->name('ordernow');
Route::get('order/complete', [UserOrderController::class, 'orderComplete'])->name('ordercomplete');

// Four User
Route::prefix('user')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        Route::get('orders', [UserDashboardController::class, 'orders'])->name('user.order');
        Route::get('order/{id}', [UserDashboardController::class, 'showOrder'])->name('user.order.show');
        Route::get('order/cancel/{id}', [UserorderController::class, 'cancelOrder'])->name('user.order.cancel')->where('id', '[0-9]+');


        Route::get('pdf/{id}',[UserorderinvoiceController::class,'pdf'])->name('user.order.pdf');

        Route::get('trackorder/{id}', [UserDashboardController::class, 'trackOrder'])->name('user.order.track')->where('id', '[0-9]+');
        Route::get('account', [UserDashboardController::class, 'account'])->name('user.account');
        Route::get('account/update', [UserDashboardController::class, 'editAccount'])->name('user.account.edit');
        Route::post('account/update', [UserDashboardController::class, 'updateAccount'])->name('user.account.update');

        Route::get('review', [UserProductReviewController::class, 'index'])->name('user.product.review.list');

        Route::get('review/product/{id}', [UserProductReviewController::class, 'reviewproduct'])->name('user.product.review.product');
        Route::post('review/product/{id}', [UserProductReviewController::class, 'reviewproductstore'])->name('user.product.review.store');
        Route::get('/review/edit/{id}', [UserProductReviewController::class, 'reviewproductedit'])->name('user.product.review.edit');
        Route::post('review/{id}', [UserProductReviewController::class, 'reviewproductupadte'])->name('user.product.review.update');

        Route::get('complain/{id}', [UsercomplainController::class, 'usercomplain'])->name('user.order.complain')->where('id', '[0-9]+');
        Route::post('complainstore', [UsercomplainController::class, 'usercomplainstore'])->name('user.order.complain.store');

        Route::get('complain', [UsercomplainController::class, 'allcomplain'])->name('user.order.complain.all');
    });
});

use App\Http\Controllers\PointManager\PointManagerLoginController;
use App\Http\Controllers\PointManager\PointManagerHomeController;
use App\Http\Controllers\PointManager\PointManagerCollectProductController;

// Point-Manager
Route::prefix('pointmanager')->group(function () {
    Route::get('login', [PointManagerLoginController::class, 'showLoginForm'])->name('pointmanager.login');
    Route::post('login', [PointManagerLoginController::class, 'login'])->name('pointmanager.login');

    Route::group(['middleware' => 'IsPointmanager'], function () {
        Route::post('logout', [PointManagerLoginController::class, 'logout'])->name('pointmanager.logout');
        Route::get('home', [PointManagerHomeController::class, 'index'])->name('pointmanager.home');
        Route::get('stack-products', [PointManagerCollectProductController::class, 'stackProducts'])->name('pointmanager.stack.products');
        Route::get('stack-product/{id}', [PointManagerCollectProductController::class, 'stackSingleProduct'])->name('pointmanager.stack.single');
        Route::get('stack-products/accept/{id}', [PointManagerCollectProductController::class, 'acceptProduct'])->name('pointmanager.stack.products.accept');
        Route::get('queue-products', [PointManagerCollectProductController::class, 'queueProducts'])->name('pointmanager.queue.products');
        Route::get('queue-product/{id}', [PointManagerCollectProductController::class, 'queueSingleProduct'])->name('pointmanager.queue.single');
        Route::get('processing-products', [PointManagerCollectProductController::class, 'processingProducts'])->name('pointmanager.processing.products');
        Route::get('processing-product/{id}', [PointManagerCollectProductController::class, 'processingSingleProduct'])->name('pointmanager.processing.single');
        Route::get('processing-product/receive/{id}', [PointManagerCollectProductController::class, 'processingProductReceive'])->name('pointmanager.processing.product.receive');

        Route::get('processing-productlist/{id}', [PointManagerCollectProductController::class, 'singleProcessingProductList'])->name('pointmanager.single.processing.product');
        Route::get('collectproductlist/{id}', [PointManagerCollectProductController::class, 'singleCollectProduct'])->name('pointmanager.collect.single');
        Route::get('collectproduct/accept/{id}', [PointManagerCollectProductController::class, 'acceptProduct'])->name('pointmanager.product.accept');
    });
});

use App\Http\Controllers\DeliveryMan\DeliveryManLoginController;
use App\Http\Controllers\DeliveryMan\DeliveryManHomeController;
use App\Http\Controllers\DeliveryMan\DeliveryManProductController;
use App\Http\Controllers\DeliveryMan\DeliveryManCollectProductController;

// Delivery Man
Route::prefix('deliveryman')->group(function () {
    Route::get('login', [DeliveryManLoginController::class, 'showLoginForm'])->name('deliveryman.login');
    Route::post('login', [DeliveryManLoginController::class, 'login'])->name('deliveryman.login');

    Route::group(['middleware' => 'IsDeliveryman'], function () {
        Route::post('logout', [DeliveryManLoginController::class, 'logout'])->name('deliveryman.logout');
        Route::get('home', [DeliveryManHomeController::class, 'index'])->name('deliveryman.home');
        Route::get('stack-products', [DeliveryManCollectProductController::class, 'stackProducts'])->name('deliveryman.stack.products');
        Route::get('stack-product/{id}', [DeliveryManCollectProductController::class, 'stackSingleproduct'])->name('deliveryman.stack.single');
        Route::get('stack-products/accept/{id}', [DeliveryManCollectProductController::class, 'acceptStackProduct'])->name('deliveryman.stack.product.accept');
        Route::get('processing-products', [DeliveryManCollectProductController::class, 'processingProducts'])->name('deliveryman.processing.products');
        Route::get('processing-products', [DeliveryManCollectProductController::class, 'processingProducts'])->name('deliveryman.processing.products');
        Route::get('submited-products', [DeliveryManCollectProductController::class, 'submitedProducts'])->name('deliveryman.submited.products');


        Route::get('collectproductlist', [DeliveryManProductController::class, 'productList'])->name('deliveryman.productlist');
        Route::get('collectproduct/{id}', [DeliveryManProductController::class, 'singleproduct'])->name('deliveryman.singleproduct');
        Route::get('collectproduct/accept/{id}', [DeliveryManProductController::class, 'acceptproduct'])->name('deliveryman.product.accept');
    });
});

// For API
Route::get('subcategory', [SubCategoryController::class, 'getSubcategoryById'])->name('get.subcategory');
Route::get('getdistrict/{division_id}', [APIController::class, 'getDistrictByDivisionID']);
Route::get('getupazila/{district_id}', [APIController::class, 'getUpazilaByDistrictID']);
Route::get('commission/{id}', [APIController::class, 'getCommission']);
Route::get('deliverycost/{id}', [APIController::class, 'getDeliveryCost']);
Route::get('paymentsystemname/{id}', [APIController::class, 'getPaymentSystemName']);
Route::get('getshop/{id}', [APIController::class, 'getShop']);
Route::get('setting/setting-payment-system', [APIController::class, 'settingPaymentSystem']);

Route::get('checkdistrictwisecourierupalizalist', [CourierajaxController::class, 'districtWiseCourierServiceList']);
Route::get('ajax/courier/', [CourierajaxController::class, 'districtWiseCourierServiceList']);

Route::get('ajax/courier/getdistrictbydivisionid/{division_id}', [CourierajaxController::class, 'getdistrictbydivisionid']);
Route::get('ajax/courier/getgetupazilabydistrictid/{district_id}', [CourierajaxController::class, 'getgetupazilabydistrictid']);
Route::get('checkupazilawisecourierupalizalist/{upazila_id}', [CourierajaxController::class, 'upazilaWiseCourierServiceList']);
Route::get('courierlistforcartchekoutpage/{upazila_id}', [CourierajaxController::class, 'courierlistforcartchekoutpage']);

// For Checkout page
Route::get('/ajax/checkupazilawisecourierupalizalistforcheckoutpage/{upazila_id}', [CourierajaxController::class, 'upazilaWiseCourierServiceListForCheckoutPage']);



// Modal Ajax
// For Quick View
Route::get('showproduct', [SingleProductController::class, 'showProduct'])->name('showproduct');

Route::get('/ajax/search/trendingshoplist', [SearchShopAjaxController::class, 'trendingShopList'])->name('search.ajax.trendingshoplist');
Route::get('/ajax/search/shoplist/{name}', [SearchShopAjaxController::class, 'shopList'])->name('search.ajax.shoplist');

Route::get('/ajax/search/marketlist/{name}', [SearchMarketAjaxController::class, 'marketList'])->name('search.ajax.marketlist');
Route::get('/ajax/search/latestmarketlist', [SearchMarketAjaxController::class, 'latestMarket'])->name('search.ajax.latestMarketlist');
Route::get('/ajax/prodcut-shop-and-market', [SingleproductShopAndMarketAjaxController::class, 'shopAndMarket'])->name('product.ajax.shop.and.market');
Route::get('/ajax/check-courier-division', [CheckoutCourierAjaxController::class, 'getDivision']);





// For Testing
use App\Http\Controllers\FolderCreateControler;

Route::get('folder', [FolderCreateControler::class, 'folder'])->name('folder');

Route::get('/test', [TestController::class, 'forinvoice'])->name('test');
Route::get('/test-server', [TestController::class, 'testserver'])->name('test');
Route::get('ontest', [TestController::class, 'ontest'])->name('ontest');
Route::get('allmedia', [TestController::class, 'allmedia'])->name('test');


// SSLCOMMERZ Start
use App\Http\Controllers\SslCommerzPaymentController;

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');

Route::post('/pay', [SslCommerzPaymentController::class, 'index2'])->name('pay');
Route::post('/buy-now-page', [SslCommerzPaymentController::class, 'buynow'])->name('buynowpay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
