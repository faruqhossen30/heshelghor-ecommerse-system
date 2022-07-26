<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShoppageController extends Controller
{
    public function index(Request $request, $slug)
    {
        $shop = Shop::where('slug', $slug)->first();

        // return $shop;

        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);
        }
        $price = null;
        if (isset($_GET['price'])) {
            $price = trim($_GET['price']);
        }
        $count = null;
        if (isset($_GET['count'])) {
            $count = trim($_GET['count']);
        }

        $category = null;
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }

        $brand = null;
        if (isset($_GET['brand'])) {
            $brand = $_GET['brand'];
        }
        $view = null;
        if (isset($_GET['view'])) {
            $view = $_GET['view'];
        }

        $products = Product::where('shop_id', $shop->id)
        ->when($keyword, function ($query, $keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })
        ->when($price, function ($query, $price) {
            return $query->orderBy('price', $price);
        })
        ->when($category, function ($query, $category) {
            return $query->whereIn('category_id', $category);
        })
        ->when($brand, function ($query, $brand) {
            return $query->whereIn('brand_id', $brand);
        })
        ->latest()
        ->paginate($count ?? 30);

        // $maxPrice=count(Product::all());
        $categories =Category::all();
        $maxPrice=Product::max('price');
        $minPrice=Product::min('price');


        $productbrandids = array_unique($products->pluck('brand_id')->toArray());
        $brandids =  array_values($productbrandids);
        $brands =Brand::whereIn('id', $brandids)->orderBy('name','asc')->get();


        if($view && $view == 'list'){
            return view('frontend.productlistpage.shop-products-list', compact('products', 'shop', 'maxPrice','minPrice','categories','brands'));
        }
        return view('frontend.productlistpage.shop-products',compact('products', 'shop', 'maxPrice','minPrice','categories','brands'));

        // return $products;
        // return view('frontend.productlistpage.shop-products',compact('products', 'shop', 'maxPrice','minPrice','categories','brands'));
    }
}
