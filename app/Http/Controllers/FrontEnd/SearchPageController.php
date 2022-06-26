<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;


class SearchpageController extends Controller
{
    public function index()
    {

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
<<<<<<< HEAD
        $brand = null;
        if (isset($_GET['brand'])) {
            $brand = $_GET['brand'];
        }
=======
>>>>>>> a462c89f9a9f1727e5e5ff4cff72725a57a5e9d2
        $type = null;
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }
<<<<<<< HEAD
        $products = Product::when($keyword, function ($query, $keyword) {
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

        $productbrandids = array_unique($products->pluck('brand_id')->toArray());
        $brandids =  array_values($productbrandids);

=======


        $products = Product::
        when($price, function ($query, $price) {
            return $query->orderBy('price', $price);
        })
        ->latest()
        ->paginate($count ?? 30);


        // $maxPrice=count(Product::all());
>>>>>>> a462c89f9a9f1727e5e5ff4cff72725a57a5e9d2
        $maxPrice=Product::max('price');
        $minPrice=Product::min('price');

        $categories =Category::all();
<<<<<<< HEAD
        $brands =Brand::whereIn('id', $brandids)->orderBy('name','asc')->get();

=======
        $brands =Brand::all();

        // return $products;
>>>>>>> a462c89f9a9f1727e5e5ff4cff72725a57a5e9d2
        return view('frontend.searchpage',compact('products','maxPrice','minPrice','categories','brands'));
    }

}
