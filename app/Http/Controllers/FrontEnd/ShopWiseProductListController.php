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

        $filter_category = [];
        $filter_brand = [];
        $orderby = '';
        $count = null;


        if (isset($_GET['category'])) {
            $filter_category = $_GET['category'];
        }

        if (isset($_GET['brand'])) {
            $filter_brand = $_GET['brand'];
        }

        if (isset($_GET['orderby'])) {

            if ($_GET['orderby'] == 'lowtohigh') {
                $orderby = 'asc';
            }
            if ($_GET['orderby'] == 'hightolow') {
                $orderby = 'desc';
            }
        }

        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        }

        $products = Product::with('category', 'subcategory')->where('shop_id', $id)->get();

        $categories_id    = array_unique($products->pluck('category_id')->toArray());
        $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
        $brands_id        = array_unique($products->pluck('brand_id')->toArray());

        $categories    = Category::whereIn('id', $categories_id)->orderBy('name', 'asc')->get();
        $subcategories = SubCategory::whereIn('id', $subcategories_id)->orderBy('name', 'asc')->get();
        $brands        = Brand::whereIn('id', $brands_id)->orderBy('name', 'asc')->get();

        $products = Product::with('category', 'subcategory')->where('shop_id', $id)
            ->when($filter_category, function ($query, $filter_category) {
                return $query->whereIn('category_id', $filter_category);
            })
            ->when($filter_brand, function ($query, $filter_brand) {
                return $query->whereIn('brand_id', $filter_brand);
            })
            ->when($orderby, function ($query, $orderby) {
                return $query->orderBy('price', $orderby);
            })
            ->paginate($count ?? 10);

        // return $products;

        return view('frontend.productlist.shop-wise-product', compact('products', 'categories', 'brands', 'shop'));
    }
}
