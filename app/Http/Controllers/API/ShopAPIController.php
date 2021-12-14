<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant\Shop;

class ShopAPIController extends Controller
{
    // Shop list with pagination
    public function shops()
    {
        $shops = Shop::latest()->paginate(30);
        return $shops;
    }

    public function districtWiseShop(Request $request, $id)
    {
        $shops = Shop::with('division', 'district', 'upazila')->where('district_id', $id)->get();

        return response()->json([
            'success' => true,
            'code'=>200,
            'data' => $shops
        ]);
    }
}
