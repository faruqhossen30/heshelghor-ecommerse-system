<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class CategorypageController extends Controller
{
    public function index(Request $request, $slug)
    {
        try {

            $category = Category::firstWhere('slug', $slug);
            $subcategories = SubCategory::where('category_id', $category->id)->get();

            // return $subcategories;

            $price = null;
            if (isset($_GET['price'])) {
                $price = trim($_GET['price']);
            }
            $count = null;
            if (isset($_GET['count'])) {
                $count = trim($_GET['count']);
            }


            $products = Product::where('category_id', $category->id)
                ->when($price, function ($query, $price) {
                    return $query->orderBy('price', $price);
                })
                ->latest()
                ->paginate($count ?? 30);


            // $maxPrice=count(Product::all());
            $maxPrice = Product::max('price');
            $minPrice = Product::min('price');

            $categories = Category::all();
            $brands = Brand::all();

            // return $products;
            return view('frontend.productlistpage.category-products', compact('products', 'category', 'subcategories', 'maxPrice', 'minPrice', 'categories', 'brands'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
