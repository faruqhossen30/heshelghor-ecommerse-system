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
        $products = Product::active()->where('id', $id)->with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors.color', 'sizes.size')->first();
        return $products;
    }
    // All Product
    public function allProduct()
    {
        $products = Product::active()->with('brand', 'category', 'subCategory', 'merchant', 'images')->get();
        return $products;
    }

    // All Product by paginateion
    public function productByPage()
    {

        $products = Product::active()->select('id', 'title', 'regular_price', 'discount', 'price', 'quantity', 'review', 'photo', 'img_small', 'img_small')->latest()->paginate(15);

        // $products = Product::active()->with('category.subcategories')->get();
        return $products;
        // return 'ok';
    }
    // Category wise Product
    public function productByCategory(Request $request, $category_id)
    {
        $price = null;
        if (isset($_GET['price'])) {
            $price = $_GET['price'];
        }

        $products = Product::active()
            ->when($price, function ($query, $price) {
                $query->orderBy('price', $price);
            })
            ->where('category_id', $category_id)
            ->select('id', 'title', 'regular_price', 'discount', 'price', 'review', 'photo', 'img_small', 'img_small')
            ->paginate(10);
        return $products;
    }
    // Sub-Category wise Product
    public function productBySubCategory(Request $request, $subcategory_id)
    {
        $products = Product::active()->with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors', 'sizes')->where('subcategory_id', $subcategory_id)->get();
        return $products;
    }
    // Brand wise Product
    public function productByBrand(Request $request, $brand_id)
    {
        $products = Product::active()->with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors', 'sizes')->where('brand_id', $brand_id)->get();
        return $products;
    }
    // Merchant wise Product
    public function productByMerchant(Request $request, $author_id)
    {
        $products = Product::active()->with('brand', 'category', 'subCategory', 'merchant', 'shop', 'images', 'colors', 'sizes')->where('author_id', $author_id)->get();
        return $products;
    }
    // Shop wise product
    public function productByShop($id)
    {
        $products = Product::active()->where('shop_id', $id)->latest()->paginate(15);
        return $products;
    }
}
