<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductpageController extends Controller
{
    public function index(Request $request)
    {
        $price = null;
        if (isset($_GET['price'])) {
            $price = trim($_GET['price']);
        }
        $count = null;
        if (isset($_GET['count'])) {
            $count = trim($_GET['count']);
        }

        $view = null;
        if (isset($_GET['view'])) {
            $view = $_GET['view'];
        }


        // return $view;


        $products = Product::active()
            ->when($price, function ($query, $price) {
                return $query->orderBy('price', $price);
            })
            ->select('id', 'title', 'slug', 'price', 'regular_price', 'discount', 'img_small')
            ->latest()->paginate($count ?? 30);

        $categories = Category::select('id', 'name', 'slug', 'image')->orderBy('name', 'asc')->get();
        // return $categories;

        if($view && $view == 'list'){
            return view('frontend.productspage-list', compact('products', 'categories'));
        }

        return view('frontend.productspage', compact('products', 'categories'));
    }
}
