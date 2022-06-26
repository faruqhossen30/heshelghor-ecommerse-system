<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Market;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;

class MarketListPageController extends Controller
{
    public function marketList()
    {
        $divisions = Division::with('districts')
            ->orderBy('name', 'asc')
            ->get();

        $district_id = null;
        if (isset($_GET['district_id'])) {
            $district_id = $_GET['district_id'];
        }

        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

        $markets = Market::
            when($district_id, function ($query, $district_id) {
                $query->where('district_id', $district_id);
            })
            ->when($keyword, function ($query, $keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->select('id', 'name', 'slug', 'address', 'image', 'photo')
            ->paginate(30);
        // return $markets;
        return view('frontend.marketlist-page', compact('markets', 'divisions'));
    }

    public function marketWiseShopList(Request $request, $id)
    {
        try {
            $market = Market::with('district')->findOrFail($id);
            $shops = Shop::where('market_id', $id)->get();

            // return $market;

            return view('frontend.marketlist.singlemarket', compact('market', 'shops'));
        } catch (\Exception $e) {
            return abort(404);
        }
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
                ->paginate(20);

            $data = view('frontend.inc.ajaxmarketlist', compact('markets'))->render();
            return response()->json($data);
            // return $data;
        }
    }
}
