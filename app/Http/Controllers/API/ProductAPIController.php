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
        $products = Product::where('id', $id)->with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors.color', 'sizes.size')->first();
        return $products;
    }
    // All Product
    public function allProduct()
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant', 'images')->get();
        return $products;
    }

    // All Product by paginateion
    public function productByPage()
    {

        $products = Product::select('id', 'title', 'regular_price', 'discount', 'price', 'review', 'photo')->latest()->paginate(30);

        // $products = Product::with('category.subcategories')->get();
        return $products;
        // return 'ok';
    }
    // Category wise Product
    public function productByCategory(Request $request, $category_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant','shop', 'images', 'colors', 'sizes')->where('category_id', $category_id)->get();
        return $products;
    }
    // Sub-Category wise Product
    public function productBySubCategory(Request $request, $subcategory_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors', 'sizes')->where('subcategory_id', $subcategory_id)->get();
        return $products;
    }
    // Brand wise Product
    public function productByBrand(Request $request, $brand_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors', 'sizes')->where('brand_id', $brand_id)->get();
        return $products;
    }
    // Merchant wise Product
    public function productByMerchant(Request $request, $author_id)
    {
        $products = Product::with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors', 'sizes')->where('author_id', $author_id)->get();
        return $products;
    }
    // Shop wise product
    public function productByShop($id)
    {
        $products = Product::where('shop_id', $id)->latest()->paginate(30);
        return $products;
    }
}
