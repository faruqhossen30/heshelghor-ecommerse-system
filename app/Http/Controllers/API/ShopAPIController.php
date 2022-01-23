<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use Illuminate\Http\Request;
use App\Models\Merchant\Shop;


class ShopAPIController extends Controller
{
    // Shop list with pagination
    public function shops()
    {
        $shops = Shop::latest()->paginate(15);
        return $shops;
    }

    public function marketWiseShopList(Request $request, $id)
    {
        try {
            $shops = Shop::where('market_id', $id)->paginate(15);

            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $shops
            ]);
        } catch (\Exception $e) {
            return abort(404);
        };
    }

    public function districtWiseShop(Request $request, $id)
    {
        $shops = Shop::with('division', 'district', 'upazila')->where('district_id', $id)->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $shops
        ]);
    }
    public function districtWiseShopByName(Request $request, $slug)
    {
        try {
            $district = District::where('slug', $slug)->first();
            $shops = Shop::where('district_id', $district->id)->get();

            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $shops
            ]);
        } catch (\Exception $e) {
            return abort(404);
        };
    }
}
