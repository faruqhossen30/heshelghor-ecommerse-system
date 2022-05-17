<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductsearchandfilterapiController extends Controller
{
    public function searchProduct(Request $request)
    {

        $keyword = '';
        $location = null;
        $category = [];
        $brand = [];
        $orderby = null;
        $sort = null;
        $count = null;


        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

        if (isset($_GET['location'])) {
            $location = $_GET['location'];
        }

        if (isset($_GET['category'])) {
            $category = json_decode($_GET['category']);
        }

        if (isset($_GET['brand'])) {
            $brand = json_decode($_GET['brand']);
        }
        if (isset($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }

        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        }

        // return $location;

        $products = Product::where('title', 'like', '%' . $keyword . '%')
        ->select('id', 'category_id', 'brand_id', 'price')
        ->get();

        $categories_id    = array_unique($products->pluck('category_id')->toArray());
        $subcategories_id = array_unique($products->pluck('subcategory_id')->toArray());
        $brands_id        = array_unique($products->pluck('brand_id')->toArray());

        $categories    = Category::whereIn('id', $categories_id)->orderBy('name', 'asc')->get();
        // $subcategories = SubCategory::whereIn('id', $subcategories_id)->orderBy('name', 'asc')->get();
        $brands        = Brand::whereIn('id', $brands_id)->orderBy('name', 'asc')->get();




        $products = Product::where('title', 'like', '%' . $keyword . '%')
            ->when($category, function ($query, $category) {
                return $query->whereIn('category_id', $category);
            })
            ->when($location, function ($query, $location) {
                return $query->where('district_id', $location);
            })
            ->when($brand, function ($query, $brand) {
                return $query->whereIn('brand_id', $brand);
            })
            ->when($sort, function ($query, $sort) {
                return $query->orderBy('id', $sort);
            })
            ->when($orderby, function ($query, $orderby) {
                return $query->orderBy('price', $orderby);
            })

            ->paginate($count ?? 25);

        return response()->json([
            'success' => true,
            'status'  => 200,
            // 'count'  => $products->count(),
            'message' => 'Ok',
            'categories' => $categories,
            'brands' => $brands,
            'data'    => $products
        ]);
    }
}
