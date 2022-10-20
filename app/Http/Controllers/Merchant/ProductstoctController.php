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
  public function stockProduct(Request $request , $shopid ){

    $products = Product::where('shop_id', $shopid)->latest()->get();

// return $products;
    return view('reports.products-stock-report',compact('products'));

  }
}
