<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use Illuminate\Http\Request;

class MarketListPageController extends Controller
{
    public function marketList()
    {
        $markets = Market::orderBy('name','asc')->get();
        return view('frontend.marketlist.marketlist', compact('markets'));
    }

    public function ajaxmarketlist(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $location = $request->location;

            // return $location;

            $markets = Market::where('name', 'like', '%' . $request->keyword . '%')->get();

            $markets = Market::when($location, function ($query, $location) {
                    return $query->where('district_id', $location);
                })
                ->when($keyword, function ($query, $keyword) {
                    return $query->where('name', 'like', '%' . $keyword . '%');
                })
                ->get();

            $data = view('frontend.inc.ajaxmarketlist', compact('markets'))->render();
            return response()->json($data);
            // return $data;
        }
    }
}
