<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use Illuminate\Http\Request;

class MarketAPIController extends Controller
{
    public function districtWiseMarkets(Request $request, $id)
    {
        try {

            $markets = Market::where('district_id', $id)->orderBy('name', 'asc')->paginate(20);

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
