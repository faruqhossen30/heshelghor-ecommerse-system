<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class ShopWiseProductListController extends Controller
{
    public function shopWiseProduct($id)
    {

        $shop = Shop::where('id', $id)->first();

        $products = Product::with('category', 'subcategory')->where('shop_id', $id)->get();

        $categories_id    = array_unique($products->pluck('category_id')->toArray());
        $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
        $brands_id        = array_unique($products->pluck('brand_id')->toArray());

        $categories    = Category::whereIn('id', $categories_id)->orderBy('name', 'asc')->get();
        $subcategories = SubCategory::whereIn('id', $subcategories_id)->orderBy('name', 'asc')->get();
        $brands        = Brand::whereIn('id', $brands_id)->orderBy('name', 'asc')->get();

        $products = Product::with('category', 'subcategory')->where('shop_id', $id)->paginate(4);

        // return $products;

        return view('frontend.productlist.shop-wise-product', compact('products', 'categories', 'brands', 'shop'));
    }
}
