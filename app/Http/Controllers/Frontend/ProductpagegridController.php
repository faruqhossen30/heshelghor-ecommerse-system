<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product\Product;

class ProductpagegridController extends Controller
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

        $category = null;
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }
        $type = null;
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }


        $products = Product::active()->select('id', 'title', 'slug', 'price', 'regular_price', 'discount', 'img_small')
            ->when($price, function ($query, $price) {
                return $query->orderBy('price', $price);
            })
            ->latest()->paginate($count ?? 30);

        $categories = Category::select('id', 'name', 'slug', 'image')->orderBy('name', 'asc')->get();
        // return $request->all();
        return view('frontend.productspage-grid', compact('products', 'categories'));
    } 
}
