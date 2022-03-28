<?php

namespace App\Http\Controllers\Ajax\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use Illuminate\Http\Request;

class SearchMarketAjaxController extends Controller
{
    public function marketList(Request $request, $name)
    {
        if ($request->ajax()) {
            $locationid = $request->locationid;

            $markets = Market::where('name', 'like', '%' . $name . '%')
            ->when($locationid, function ($query, $locationid) {
                return $query->where('district_id', $locationid);
            })
            ->get();

            return $data =  view('frontend.partials.modal.searchMarketList', compact('markets'))->render();
            // return "yes searching market";
        }
    }

    public function latestMarket(Request $request)
    {
        if ($request->ajax()) {
            $locationid = $request->locationid;

            $markets = Market::
            when($locationid, function ($query, $locationid) {
                return $query->where('district_id', $locationid);
            })
            ->latest()->get();

            return $data =  view('frontend.partials.modal.searchMarketList', compact('markets'))->render();
            // return "yes working on focus";
        }
    }
}
