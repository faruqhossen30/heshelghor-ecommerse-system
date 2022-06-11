<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShopListPageController extends Controller
{
    public function allshop()
    {
        $brands = Brand::get();
        $products = Product::get();
        $categories = Category::get();
        // return $shops;
        $shops = Shop::active()->with('market')->latest()->paginate(20);
        // return $shops;
        if(!empty($_GET['shoploaction']) && !empty($_GET['shopsearchkeyword'])){
            $locationid = District::where('slug', $_GET['shoploaction'])->first()->id;

            $shops = Shop::active()->where('district_id', $locationid)->where('name', 'like', '%'.$_GET['shopsearchkeyword'].'%')->get();

            return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        }
        if(!empty($_GET['shoploaction'])){
            $locationid = District::where('slug', $_GET['shoploaction'])->first()->id;
            $shops = Shop::active()->where('district_id', $locationid)->get();
            return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        }

        return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
    }
}
