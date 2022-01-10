<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShopWiseProductListController extends Controller
{
    public function shopWiseProduct($id)
    {
        $brands = Brand::get();
        $categories = Category::get();
        $shop = Shop::where('id', $id)->first();

        $products = Product::with('category', 'subcategory')->where('shop_id', $id)->get();
        // return $products;
        return view('frontend.productlist.shop-wise-product', compact('products', 'categories', 'brands', 'shop'));
    }
}
