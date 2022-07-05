<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class PromotionalproductController extends Controller
{
    public function subcategoryProducts(Request $request)
    {


        $price = null;
        if (isset($_GET['price'])) {
            $price = $_GET['price'];
        }

        $location = null;
        if (isset($_GET['location'])) {
            $location = $_GET['location'];
        }

        $products = Product::active()->where('category_id', 38)
        ->when($price, function($query, $price){
            $query->orderBy('price', $price);
        })
        ->when($location, function ($query, $location) {
            return $query->where('district_id', $location);
        })
        ->select('id', 'title', 'regular_price', 'quantity', 'discount', 'price', 'review', 'photo', 'img_small')
        ->paginate(15);

        // return response()->json([
        //     'success' => true,
        //     'code'=>200,
        //     'data' => $products
        // ]);

        return $products;
    }


    public function subcategoryProductsrandom()
    {
        $price = null;
        if (isset($_GET['price'])) {
            $price = $_GET['price'];
        }

        $location = null;
        if (isset($_GET['location'])) {
            $location = $_GET['location'];
        }

        $products = Product::active()
        ->where('category_id', 38)
        ->when($price, function($query, $price){
            $query->orderBy('price', $price);
        })
        ->when($location, function ($query, $location) {
            return $query->where('district_id', $location);
        })
        ->select('id', 'title', 'regular_price', 'quantity', 'discount', 'price', 'review', 'photo', 'img_small')->inRandomOrder()->paginate(15);

        // return response()->json([
        //     'success' => true,
        //     'code'=>200,
        //     'data' => $products
        // ]);

        return $products;
    }

    public function promotionalProduct()
    {

        $price = null;
        if (isset($_GET['price'])) {
            $price = $_GET['price'];
        }

        $location = null;
        if (isset($_GET['location'])) {
            $location = $_GET['location'];
        }

        $promotion_products = option('promotion_products');
        $products = null;
        if($promotion_products){
            $products = Product::whereIn('id', $promotion_products)
            ->when($price, function($query, $price){
                $query->orderBy('price', $price);
            })
            ->when($location, function ($query, $location) {
                return $query->where('district_id', $location);
            })
            ->select('id', 'title', 'regular_price', 'quantity', 'discount', 'price', 'review', 'photo', 'img_small')->paginate(15);

            return $products;
        }else{
            return [];
        };

    }
    public function promotionalProductRandom()
    {

        $price = null;
        if (isset($_GET['price'])) {
            $price = $_GET['price'];
        }

        $location = null;
        if (isset($_GET['location'])) {
            $location = $_GET['location'];
        }

        $products = Product::take(50)
        ->when($price, function($query, $price){
            $query->orderBy('price', $price);
        })
        ->when($location, function ($query, $location) {
            return $query->where('district_id', $location);
        })
        ->inRandomOrder()
        ->select('id', 'title', 'regular_price', 'quantity', 'discount', 'price', 'review', 'photo', 'img_small')
        ->paginate(15);
        return $products;
    }
}
