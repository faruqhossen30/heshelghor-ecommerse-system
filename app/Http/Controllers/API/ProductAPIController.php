<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Modle
use App\Models\Product\Product;

class ProductAPIController extends Controller
{
    // Single Product
    public function singleProduct(Request $request, $id)
    {
        $products = Product::where('id', $id)->with('brand', 'category', 'subCategory', 'merchant')->first();
        return $products;
    }
    // All Product
    public function allProduct()
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->get();
        return $products;
    }

    // All Product by paginateion
    public function productByPage()
    {

        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->paginate(5);
        return $products;
    }
    // Category wise Product
    public function productByCategory(Request $request, $category_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->where('category_id', $category_id)->get();
        return $products;
    }
    // Sub-Category wise Product
    public function productBySubCategory(Request $request, $subcategory_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->where('subcategory_id', $subcategory_id)->get();
        return $products;
    }
    // Brand wise Product
    public function productByBrand(Request $request, $brand_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->where('brand_id', $brand_id)->get();
        return $products;
    }
    // Merchant wise Product
    public function productByMerchant(Request $request, $author_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->where('author_id', $author_id)->get();
        return $products;
    }
}
