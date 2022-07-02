<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class SearchpageController extends Controller
{
    public function index()
    {

        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);
        }

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

        $category = null;
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }

        $brand = null;
        if (isset($_GET['brand'])) {
            $brand = $_GET['brand'];
        }
        $district = null;
        if (isset($_GET['district'])) {
            $district = $_GET['district'];
        }


        $products = Product::when($keyword, function ($query, $keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })
        ->when($districtid, function ($query, $districtid) {
            return $query->where('district_id', $districtid);
        })
        ->when($price, function ($query, $price) {
            return $query->orderBy('price', $price);
        })
        ->when($category, function ($query, $category) {
            return $query->whereIn('category_id', $category);
        })
        ->when($district, function ($query, $district) {
            return $query->whereIn('district_id', $district);
        })
        ->when($brand, function ($query, $brand) {
            return $query->whereIn('brand_id', $brand);
        })
        ->latest()
        ->paginate($count ?? 30);

        // $maxPrice=count(Product::all());
        $categories =Category::all();
        $maxPrice=Product::max('price');
        $minPrice=Product::min('price');


        $productbrandids = array_unique($products->pluck('brand_id')->toArray());
        $brandids =  array_values($productbrandids);
        $brands =Brand::whereIn('id', $brandids)->orderBy('name','asc')->get();


        // $division_id = Division::where('id',$id)->first();


        // return $division_list;

        return view('frontend.searchpage',compact('products','maxPrice','minPrice','categories','brands'));
    }


}
