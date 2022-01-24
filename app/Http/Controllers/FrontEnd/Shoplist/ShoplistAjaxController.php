<?php

namespace App\Http\Controllers\FrontEnd\Shoplist;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShoplistAjaxController extends Controller
{
    public function ajaxshoplist(Request $request)
    {
        if($request->ajax()){
            $requestlocation = $request->location;
            if($request->keyword && $request->location == 'all'){
               $shops = Shop::where('name', 'like', '%'.$request->keyword.'%')->get();

               $data = view('frontend.inc.ajaxshoplist', compact('shops', 'requestlocation'))->render();
               return response()->json($data);

            }
            if($request->keyword && $request->location && !($request->location == 'all') ){
                $locationid = District::where('slug', $request->location)->first()->id;
                $shops = Shop::where('district_id', $locationid)->where('name', 'like', '%'.$request->keyword.'%')->get();

                $data = view('frontend.inc.ajaxshoplist', compact('shops', 'requestlocation'))->render();
                return response()->json($data);
            };
            if($request->location == 'all' && !($request->keyword)){
                // $locationid = District::where('slug', $request->location)->first()->id;
                $shops = Shop::get();

                $data = view('frontend.inc.ajaxshoplist', compact('shops', 'requestlocation'))->render();
                return response()->json($data);
                // return "some";
            };
            if($request->location && !($request->keyword)){
                $locationid = District::where('slug', $request->location)->first()->id;
                $shops = Shop::where('district_id', $locationid)->get();

                $data = view('frontend.inc.ajaxshoplist', compact('shops', 'requestlocation'))->render();
                return response()->json($data);
            };


        }


        // $brands = Brand::get();
        // $products = Product::get();
        // $categories = Category::get();
        // // return $shops;
        // $shops = Shop::with('market')->latest()->get();
        // if(!empty($_GET['shoploaction']) && !empty($_GET['shopsearch'])){
        //     $locationid = District::where('slug', $_GET['shoploaction'])->first()->id;

        //     $shops = Shop::where('district_id', $locationid)->where('name', 'like', '%'.$_GET['shopsearch'].'%')->get();

        //     return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        // }
        // if(!empty($_GET['shoploaction'])){
        //     $locationid = District::where('slug', $_GET['shoploaction'])->first()->id;
        //     $shops = Shop::where('district_id', $locationid)->get();
        //     return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
        // }

        // return view('frontend.shoplist.viewshoplist', compact('shops','products', 'brands', 'categories'));
    }
}
