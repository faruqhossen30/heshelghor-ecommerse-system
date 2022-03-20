<?php

namespace App\Http\Controllers\Ajax\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;

class SearchShopAjaxController extends Controller
{
    public function trendingMarketList()
    {
        $shops = Shop::get()->take(8);
        return $data =  view('frontend.partials.modal.searchshoptrendingMarketList', compact('shops'))->render();
    }
    public function marketlist(Request $request, $name)
    {
        $shops = Shop::where('name', 'like', '%' . $name . '%')->get();

        return $data =  view('frontend.partials.modal.searchshoptrendingMarketList', compact('shops'))->render();
    }
}
