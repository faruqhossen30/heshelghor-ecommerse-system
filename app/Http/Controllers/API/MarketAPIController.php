<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Market;
use Illuminate\Http\Request;

class MarketAPIController extends Controller
{
    public function districtWiseMarkets(Request $request, $slug)
    {
        try {

            $district = District::where('slug', $slug)->orWhere('slug2', $slug)->first();

            $markets = Market::where('district_id', $district->id)->orderBy('name', 'asc')->paginate(20);

            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $markets
            ]);
        } catch (\Exception $e) {
            return abort(404);
        };
    }
    public function marketSearch(Request $request, $keyword)
    {
        try {
            $markets = Market::where('name', 'like', '%' . $keyword . '%')->paginate(20);
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $markets
            ]);
        } catch (\Exception $e) {
            return abort(404);
        };
    }
}
