<?php

namespace App\Http\Controllers\FrontEnd\Filter;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class CategoryWiseFilterController extends Controller
{
    public function productWithCategory(Request $request, $slug)
    {
        $cat = Category::firstWhere('slug', $slug);

        $filter_location = [];
        $filter_category = [];
        $filter_brand = [];
        $orderby = '';
        $count = null;


        if (isset($_GET['location'])) {
            $filter_location = $_GET['location'];
        }

        if (isset($_GET['category'])) {
            $filter_category = $_GET['category'];
        }

        if (isset($_GET['brand'])) {
            $filter_brand = $_GET['brand'];
        }

        if (isset($_GET['orderby'])) {

            if($_GET['orderby'] == 'lowtohigh'){
                $orderby = 'asc';
            }
            if($_GET['orderby'] == 'hightolow'){
                $orderby = 'desc';
            }

        }


        $products = Product::with('category', 'subcategory')->where('category_id', $cat->id)->get();

        $categories_id    = array_unique($products->pluck('category_id')->toArray());
        $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
        $brands_id        = array_unique($products->pluck('brand_id')->toArray());

        $categories    = Category::whereIn('id', $categories_id)->orderBy('name', 'asc')->get();
        $subcategories = SubCategory::whereIn('id', $subcategories_id)->orderBy('name', 'asc')->get();
        $brands        = Brand::whereIn('id', $brands_id)->orderBy('name', 'asc')->get();


        $products = Product::with('category', 'subcategory')->where('category_id', $cat->id)
        ->when($filter_brand, function ($query, $filter_brand) {
            return $query->whereIn('brand_id', $filter_brand);
        })
        ->when($orderby, function ($query, $orderby) {
            return $query->orderBy('price', $orderby);
        })
        ->paginate($count ?? 20);

        return view('frontend.product-filter.category-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));



        // try {
        //     $cat = Category::firstWhere('slug', $slug);
        //     $brands_id = array_unique(Product::where('category_id', $cat->id)->pluck('brand_id')->toArray() );

        //     $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        //     $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $cat->id)->latest('id')->paginate(12);
        //     $brands = Brand::whereIn('id', $brands_id)->get();

        //     return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
        // } catch (\Exception $e) {
        //     // return $e->getMessage();
        //     return abort(404);
        // }



    }
}
