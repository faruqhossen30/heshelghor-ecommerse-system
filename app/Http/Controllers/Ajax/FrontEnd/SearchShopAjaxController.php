<?php

namespace App\Http\Controllers\Ajax\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;

class SearchShopAjaxController extends Controller
{
    public function trendingShopList(Request $request)
    {
        $locationid = $request->locationid;

        $shops = Shop::
        when($locationid, function ($query, $locationid) {
            return $query->where('district_id', $locationid);
        })->
        get()->take(8);

        return $data =  view('frontend.partials.modal.searchshoptrendingList', compact('shops'))->render();
    }
    public function shopList(Request $request, $name)
    {
        if ($request->ajax()) {
            $locationid = $request->locationid;

            $shops = Shop::where('name', 'like', '%' . $name . '%')
            ->when($locationid, function ($query, $locationid) {
                return $query->where('district_id', $locationid);
            })
            ->get();

            return $data =  view('frontend.partials.modal.searchshoptrendingList', compact('shops'))->render();
            // return $locationid;
        }
    }
}
