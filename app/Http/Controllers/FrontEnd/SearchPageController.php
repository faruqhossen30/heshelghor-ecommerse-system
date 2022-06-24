<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        ->paginate($count ?? 30);
        // return $products;
        return view('frontend.searchpage',compact('products'));
    }

}
