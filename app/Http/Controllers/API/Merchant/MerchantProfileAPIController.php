<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Auth\Marchant;
use Illuminate\Http\Request;

class MerchantProfileAPIController extends Controller
{
    public function viewProfile(Request $request)
    {
        $merchant = $request->user();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $merchant
        ]);


    }

    public function profileUpdate(Request $request)
    {
        $merchant = $request->user();
        $merchantId = $request->user()->id;

        $merchant = Marchant::where('id', $merchantId)->update([
            'name'               => $request->name,
            // 'email '          => $request->name,
            'address'            => $request->address,
            'photo'              => $request->photo,
            'nid_no'             => $request->nid_no,
            'tradelicense_no'    => $request->tradelicense_no,
            'tin_no'             => $request->tin_no,
            'nid_photo'          => $request->nid_photo,
            'tradelicense_photo' => $request->tradelicense_photo,
            'tin_photo'          => $request->tin_photo
        ]);

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'Merchant Profile Update done!'
        ]);
    }
}
