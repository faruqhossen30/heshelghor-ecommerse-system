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
        $cat = Category::firstWhere('slug', $slug);
        $categories = Category::with('subcategories')->orderBy('name', 'asc')->get();
        $brands_id = array_unique(Product::where('category_id', $cat->id)->pluck('brand_id')->toArray());
        $brands = Brand::whereIn('id', $brands_id)->get();

        // if (empty($_GET)) {

            // $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $cat->id)->latest('id')->paginate(20);
            // return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
        // }

        if (!empty($_GET['filter_brands']) && !empty($_GET['orderby']) && !empty($_GET['count'])) {
            // Brand Filter
            $filter_brands = $_GET['filter_brands'];
            $filter_brands_id = array_unique(Brand::whereIn('slug', $filter_brands)->pluck('id')->toArray() );

            // OrderBy Filter
            $orderBy = $_GET['orderby'];
            // Count Filter
            $count = $_GET['count'];

            if($_GET['orderby'] == 'latest'){
                $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->whereIn('brand_id', $filter_brands_id)->orderBy('id', 'asc')->paginate($count);
                return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
            }
            if($_GET['orderby'] == 'lowtohigh'){
                $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', 'asc')->paginate($count);
                return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
            }
            if($_GET['orderby'] == 'hightolow'){
                $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', 'desc')->paginate($count);
                return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
            }

            $brands = Brand::whereIn('id', $brands_id)->get();
            // return '$filter_brands && $orderby && $count';
        }
        if (!empty($_GET['orderby']) && !empty($_GET['count']) && empty($_GET['filter_brands'])) {
            // Count Filter
            $count = $_GET['count'];

            if($_GET['orderby'] == 'latest'){
                $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->orderBy('id', 'asc')->paginate($count);
                return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
            }
            if($_GET['orderby'] == 'lowtohigh'){
                $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->orderBy('price', 'asc')->paginate($count);
                return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
            }
            if($_GET['orderby'] == 'hightolow'){
                $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->orderBy('price', 'desc')->paginate($count);
                return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
            }

        }
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $cat->id)->latest('id')->paginate(20);
        return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));



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
