<?php

namespace App\Http\Controllers\FrontEnd\Filter;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class CategoryWiseFilterController extends Controller
{
    public function productWithCategory(Request $request, $slug)
    {
        try {
            $cat = Category::firstWhere('slug', $slug);
            // return $cat;
            $categories = Category::with('products', 'subcategorylist')->orderBy('name', 'asc')->get();
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $cat->id)->latest('id')->paginate(12);
            $brands = Brand::get();

            // return $products;

            return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
        } catch (\Exception $e) {
            // return $e->getMessage();
            return abort(404);
        }



    }
}
