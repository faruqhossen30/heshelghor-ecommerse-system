<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
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

            $districtid = null;
            if (isset($_GET['districtid'])) {
                $districtid = $_GET['districtid'];
            }

            $price = null;
            if (isset($_GET['price'])) {
                $price = trim($_GET['price']);
            }
            $count = null;
            if (isset($_GET['count'])) {
                $count = trim($_GET['count']);
            }

            $subcategory = null;
            if (isset($_GET['subcategory'])) {
                $subcategory = $_GET['subcategory'];
            }

            $brand = null;
            if (isset($_GET['brand'])) {
                $brand = $_GET['brand'];
            }

            // return $subcategory;

            $products = Product::where('category_id', $category->id)
                ->when($districtid, function ($query, $districtid) {
                    return $query->where('district_id', $districtid);
                })
                ->when($price, function ($query, $price) {
                    return $query->orderBy('price', $price);
                })
                ->when($subcategory, function ($query, $subcategory) {
                    return $query->whereIn('subcategory_id', $subcategory);
                })
                ->when($brand, function ($query, $brand) {
                    return $query->whereIn('brand_id', $brand);
                })
                ->latest()
                ->paginate($count ?? 30);


            // $maxPrice=count(Product::all());
            $maxPrice = Product::max('price');
            $minPrice = Product::min('price');

            $productbrandids = array_unique($products->pluck('brand_id')->toArray());
            $brandids =  array_values($productbrandids);
            $brands = Brand::whereIn('id', $brandids)->orderBy('name', 'asc')->get();


            // return $products;
            return view('frontend.productlistpage.category-products', compact('products', 'category', 'subcategories', 'maxPrice', 'minPrice', 'brands'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
