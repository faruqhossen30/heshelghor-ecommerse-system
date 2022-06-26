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
        $type = null;
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }


        $products = Product::
        when($price, function ($query, $price) {
            return $query->orderBy('price', $price);
        })
        ->latest()
        ->paginate($count ?? 30);


        // $maxPrice=count(Product::all());
        $maxPrice=Product::max('price');
        $minPrice=Product::min('price');

        $categories =Category::all();
        $brands =Brand::all();

        // return $products;
        return view('frontend.searchpage',compact('products','maxPrice','minPrice','categories','brands'));
    }

}
