<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShopListPageController extends Controller
{
    public function allshop()
    {
        // $brands = Brand::get();
        // $products = Product::get();
        // $categories = Category::get();
        // // return $shops;
        // $shops = Shop::active()->with('market')->latest()->paginate(20);
        // // return $shops;
        // if(!empty($_GET['shoploaction']) && !empty($_GET['shopsearchkeyword'])){
        //     $locationid = District::where('slug', $_GET['shoploaction'])->first()->id;

        //     $shops = Shop::active()->where('district_id', $locationid)->where('name', 'like', '%'.$_GET['shopsearchkeyword'].'%')->get();

        //     return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        // }
        // if(!empty($_GET['shoploaction'])){
        //     $locationid = District::where('slug', $_GET['shoploaction'])->first()->id;
        //     $shops = Shop::active()->where('district_id', $locationid)->get();
        //     return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        // }

        // return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        $district_id = null;
        if (isset($_GET['district_id'])) {
            $district_id = $_GET['district_id'];
        }

        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

        $shops = Shop::active()
            ->when($district_id, function ($query, $district_id) {
                $query->where('district_id', $district_id);
            })
            ->when($keyword, function ($query, $keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->select('id', 'name', 'slug', 'address', 'image', 'img_small')
            ->paginate(30);

        // return $shops;
        $divisions = Division::with('districts')
            ->orderBy('name', 'asc')
            ->get();

        return view('frontend.shoppage', compact('shops', 'divisions'));
    }
}
