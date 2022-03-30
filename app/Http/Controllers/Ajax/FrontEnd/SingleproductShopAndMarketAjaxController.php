<?php

namespace App\Http\Controllers\Ajax\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;

class SingleproductShopAndMarketAjaxController extends Controller
{
    public function shopAndMarket(Request $request)
    {
        if($request->ajax()){
            $shop = Shop::with('market')->firstWhere('id', $request->id);
            $data = view('frontend.inc.ajaxproductshopandmarket', compact('shop'));

            return $data;

        }
    }
}
