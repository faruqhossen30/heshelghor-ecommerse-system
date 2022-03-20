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
        $keyword = '';
        $filter_location = [];
        $filter_category = [];
        $filter_brand = [];
        $orderby = '';



        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

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


        $products = Product::with('category', 'subcategory')->where('title', 'like', '%' . $keyword . '%')
        ->when($filter_category, function ($query, $filter_category) {
            return $query->whereIn('category_id', $filter_category);
        })
        ->when($filter_brand, function ($query, $filter_brand) {
            return $query->whereIn('brand_id', $filter_brand);
        })
        ->when($orderby, function ($query, $orderby) {
            return $query->orderBy('price', $orderby);
        })
        ->latest()->get();

        $categories_id    = array_unique($products->pluck('category_id')->toArray());
        $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
        $brands_id        = array_unique($products->pluck('brand_id')->toArray());

        $categories    = Category::whereIn('id', $categories_id)->orderBy('name', 'asc')->get();
        $subcategories = SubCategory::whereIn('id', $subcategories_id)->orderBy('name', 'asc')->get();
        $brands        = Brand::whereIn('id', $brands_id)->orderBy('name', 'asc')->get();

        // return $orderby;

        return view('frontend.product-filter.search-wise-filter', compact('products', 'brands', 'categories', 'subcategories'));




    }
}
