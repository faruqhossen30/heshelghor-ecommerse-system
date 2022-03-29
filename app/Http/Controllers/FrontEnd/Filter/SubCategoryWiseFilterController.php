<?php

namespace App\Http\Controllers\FrontEnd\Filter;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class SubCategoryWiseFilterController extends Controller
{
    public function filterProductWithSubCategory(Request $request, $slug)
    {
        return "subcategory product";
    }


    public function productWithSubCategory(Request $request, $category, $slug)
    {
        $subcat = SubCategory::firstWhere('slug', $slug);
        $categories = Category::with('subcategories')->orderBy('name', 'asc')->get();
        $brands_id = array_unique(Product::where('subcategory_id', $subcat->id)->pluck('brand_id')->toArray());
        $brands = Brand::whereIn('id', $brands_id)->get();


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
        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        }

        $products = Product::with('category', 'subcategory')->where('subcategory_id', $subcat->id)
        ->when($filter_brand, function ($query, $filter_brand) {
            return $query->whereIn('brand_id', $filter_brand);
        })
        ->when($orderby, function ($query, $orderby) {
            return $query->orderBy('price', $orderby);
        })
        ->paginate($count ?? 20);

        return view('frontend.product-filter.subcategory-wise-filter', compact('categories', 'products', 'brands'));
    }
}
