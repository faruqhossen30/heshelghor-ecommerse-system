<?php

namespace App\Http\Controllers\FrontEnd\Filter;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Prophecy\Promise\ReturnPromise;

class SearchWiseFilterController extends Controller
{

    public function index(Request $request)
    {
        // return "sdkfjsldkfjkl";
        // return $request->all();
        if (!empty($_GET['search'])) {
            return 'jsut for test';
        }
    }
    public function productWithSearch(Request $request)
    {
        $location = '';
        $filter_brands_id = [];
        $filter_categories_id = [];


        $request->session()->put('location', $request->location);
        $request->session()->put('search', $request->search);

        if ($request->location == 'all') {
            $location = null;
        } else {
            $location = $request->location;
        }
        $locationid = District::where('slug', $location)->first()->id ?? null;

        // Filter Categories
        $filter_categories_id = [];
        if (!empty($_GET['filter_categories'])) {
            $filter_categories = $_GET['filter_categories'];
            $filter_categories_id = array_unique(Category::whereIn('slug', $filter_categories)->pluck('id')->toArray());
        }

        // Filter Brands
        $filter_brands_id = [];
        if (!empty($_GET['filter_brands'])) {
            $filter_brands = $_GET['filter_brands'];
            $filter_brands_id = array_unique(Brand::whereIn('slug', $filter_brands)->pluck('id')->toArray());
        }

        // Filter sorting
        $orderby = null;
        if (!empty($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }
        // Filter Count
        $count = null;
        if(!empty($_GET['count'])){
            $count = $_GET['count'];
        }


        // return $filter_brands_id;

        if ($locationid) {
            if (!empty($_GET['search'])) {
                $products         = Product::where('district_id', $locationid)->where('title', 'like', '%' . $_GET['search'] . '%')->get();
                $categories_id    = array_unique($products->pluck('category_id')->toArray());
                $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
                $brands_id        = array_unique($products->pluck('brand_id')->toArray());

                $categories    = Category::whereIn('id', $categories_id)->get();
                $subcategories = SubCategory::whereIn('id', $subcategories_id)->get();
                $brands        = Brand::whereIn('id', $brands_id)->get();

                if($filter_categories_id && $filter_brands_id && $orderby){
                    $products = collect($products)->whereIn('brand_id', $filter_brands_id);

                    // return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                    // return $products;
                }

                return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
            }
            if (empty($_GET['search'])) {
                // return "location ase  search empty";
                $products         = Product::where('district_id', $locationid)->get();
                $categories_id    = array_unique($products->pluck('category_id')->toArray());
                $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
                $brands_id        = array_unique($products->pluck('brand_id')->toArray());

                $categories    = Category::whereIn('id', $categories_id)->get();
                $subcategories = SubCategory::whereIn('id', $subcategories_id)->get();
                $brands        = Brand::whereIn('id', $brands_id)->get();

                if($filter_categories_id && $filter_brands_id && $orderby){
                    $products = collect($products)->whereIn('category_id', $filter_categories_id);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                    // return $products;
                }

                return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
            }
        }
        // All location
        if (!$location) {
            if (!empty($_GET['search'])) {
                $products         = Product::where('title', 'like', '%' . $_GET['search'] . '%')->get();
                $categories_id    = array_unique($products->pluck('category_id')->toArray());
                $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
                $brands_id        = array_unique($products->pluck('brand_id')->toArray());

                $categories    = Category::whereIn('id', $categories_id)->get();
                $subcategories = SubCategory::whereIn('id', $subcategories_id)->get();
                $brands        = Brand::whereIn('id', $brands_id)->get();

                return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
            }
        }





        if (!empty($_GET['search'])) {

            return "search ase";



            if (!empty($_GET['filter_brands']) && !empty($_GET['orderby']) && !empty($_GET['count'])) {
                // Brand Filter
                $filter_brands = $_GET['filter_brands'];
                $filter_brands_id = array_unique(Brand::whereIn('slug', $filter_brands)->pluck('id')->toArray());

                // OrderBy Filter
                $orderBy = $_GET['orderby'];
                // Count Filter
                $count = $_GET['count'];

                if ($_GET['orderby'] == 'latest') {
                    $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->whereIn('brand_id', $filter_brands_id)->orderBy('id', 'asc')->paginate($count);
                    return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
                }
                if ($_GET['orderby'] == 'lowtohigh') {
                    $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', 'asc')->paginate($count);
                    return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
                }
                if ($_GET['orderby'] == 'hightolow') {
                    $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', 'desc')->paginate($count);
                    return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
                }

                $brands = Brand::whereIn('id', $brands_id)->get();
                // return '$filter_brands && $orderby && $count';
            }
            if (!empty($_GET['orderby']) && !empty($_GET['count']) && empty($_GET['filter_brands'])) {
                // Count Filter
                $count = $_GET['count'];

                if ($_GET['orderby'] == 'latest') {
                    $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->orderBy('id', 'asc')->paginate($count);
                    return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
                }
                if ($_GET['orderby'] == 'lowtohigh') {
                    $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->orderBy('price', 'asc')->paginate($count);
                    return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
                }
                if ($_GET['orderby'] == 'hightolow') {
                    $products = Product::with('brand', 'category', 'subcategory')->where('category_id', $cat->id)->orderBy('price', 'desc')->paginate($count);
                    return view('frontend.product-filter.category-wise-filter', compact('categories', 'products', 'brands'));
                }
            }
        }



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
