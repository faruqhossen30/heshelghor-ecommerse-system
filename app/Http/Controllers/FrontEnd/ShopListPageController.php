<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShopListPageController extends Controller
{
    public function allshop()
    {
        $shops = Shop::with('market')->latest()->get();
        $brands = Brand::get();
        $products = Product::get();
        $categories = Category::get();
        // return $shops;
        return view('frontend.viewshoplist', compact('shops','products', 'brands', 'categories'));
    }
}
