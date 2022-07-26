<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class SubcategorypageController extends Controller
{
    public function index(Request $request, $slug)
    {
        try {

            // return "subcategory page";

            $subcategory = SubCategory::firstWhere('slug', $slug);

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

            $brand = null;
            if (isset($_GET['brand'])) {
                $brand = $_GET['brand'];
            }

            $view = null;
            if (isset($_GET['view'])) {
                $view = $_GET['view'];
            }

            // return $subcategory;

            $products = Product::where('subcategory_id', $subcategory->id)
                ->when($districtid, function ($query, $districtid) {
                    return $query->where('district_id', $districtid);
                })
                ->when($price, function ($query, $price) {
                    return $query->orderBy('price', $price);
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

            if($view && $view == 'list'){
                return view('frontend.productlistpage.subcategory-products-list', compact('products', 'subcategory', 'maxPrice', 'minPrice', 'brands'));
            }
    
            return view('frontend.productlistpage.subcategory-products', compact('products', 'subcategory', 'maxPrice', 'minPrice', 'brands'));
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
