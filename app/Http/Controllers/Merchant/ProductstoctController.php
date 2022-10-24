<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use App\Models\Merchant\Shop;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductstoctController extends Controller
{
        public function stockProduct(Request $request , $id ){
            $userID = Auth::guard('marchant')->user()->id;
            $products = Product::with('shop')->where('shop_id', $id)->where('author_id', $userID)->latest()->get();
        // return $products;
            return view('reports.products-stock-report',compact('products'));
        }

        public function shoplist(){
             $userID = Auth::guard('marchant')->user()->id;
             $shops = Shop::where('author_id', $userID)->orderBy('id', 'desc')->get();
            //  return $shops;
             return view('marchant.shop.shoplist',compact('shops'));
        }

}
