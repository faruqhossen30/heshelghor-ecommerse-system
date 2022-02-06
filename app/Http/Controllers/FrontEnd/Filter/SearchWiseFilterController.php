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

                $products         = Product::where('district_id', $locationid)->where('title', 'like', '%' . $_GET['search'] . '%')->paginate($count ?? 20);

                if($filter_categories_id && $filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('district_id', $locationid)->where('title', 'like', '%' . $_GET['search'] . '%')->whereIn('category_id', $filter_categories_id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);
                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }
                if($filter_categories_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('district_id', $locationid)->where('title', 'like', '%' . $_GET['search'] . '%')->whereIn('category_id', $filter_categories_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }
                if($filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('district_id', $locationid)->where('title', 'like', '%' . $_GET['search'] . '%')->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
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

                $products         = Product::where('district_id', $locationid)->paginate($count ?? 20);

                if($filter_categories_id && $filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('district_id', $locationid)->whereIn('category_id', $filter_categories_id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);
                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                    return 'cat and brand';
                }
                if($filter_categories_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('district_id', $locationid)->whereIn('category_id', $filter_categories_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }
                if($filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('district_id', $locationid)->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }

                return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
            }
        }

        //***************** Without location ***************************//
        if (!$location) {
            if (!empty($_GET['search'])) {
                $products         = Product::where('title', 'like', '%' . $_GET['search'] . '%')->get();
                $categories_id    = array_unique($products->pluck('category_id')->toArray());
                $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
                $brands_id        = array_unique($products->pluck('brand_id')->toArray());

                $categories    = Category::whereIn('id', $categories_id)->get();
                $subcategories = SubCategory::whereIn('id', $subcategories_id)->get();
                $brands        = Brand::whereIn('id', $brands_id)->get();

                $products         = Product::where('title', 'like', '%' . $_GET['search'] . '%')->paginate($count ?? 20);

                if($filter_categories_id && $filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('title', 'like', '%' . $_GET['search'] . '%')->whereIn('category_id', $filter_categories_id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);
                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }
                if($filter_categories_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('title', 'like', '%' . $_GET['search'] . '%')->whereIn('category_id', $filter_categories_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }
                if($filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->where('title', 'like', '%' . $_GET['search'] . '%')->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }

                return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
            }
            if(empty($_GET['search'])){

                $products         = Product::get();
                $categories_id    = array_unique($products->pluck('category_id')->toArray());
                $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
                $brands_id        = array_unique($products->pluck('brand_id')->toArray());

                $categories    = Category::whereIn('id', $categories_id)->get();
                $subcategories = SubCategory::whereIn('id', $subcategories_id)->get();
                $brands        = Brand::whereIn('id', $brands_id)->get();

                $products         = Product::paginate($count ?? 20);

                if($filter_categories_id && $filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->whereIn('category_id', $filter_categories_id)->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);
                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                    return 'cat and brand';
                }
                if($filter_categories_id && $orderby){
                    $products = Product::with('category', 'subcategory')->whereIn('category_id', $filter_categories_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }
                if($filter_brands_id && $orderby){
                    $products = Product::with('category', 'subcategory')->whereIn('brand_id', $filter_brands_id)->orderBy('price', $orderby =='lowtohigh' ? 'asc' : 'desc')->paginate($count ?? 20);

                    return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
                }

                return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));
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
