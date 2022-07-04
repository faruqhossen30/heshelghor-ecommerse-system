<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;

class ShoppromotionController extends Controller
{
    public function index()
    {
        $promotion_shops = option('promotion_shops');
        $shops = Shop::get();

        return view('admin.promotion.shoppromotion', compact('shops', 'promotion_shops'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        option(['promotion_shops'=> $request->shop_id]);

        return redirect()->route('shoppromotion');
    }
}
