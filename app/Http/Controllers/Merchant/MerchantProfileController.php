<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Auth\Marchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantProfileController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        $merchant = Marchant::where('id', $merchantId)->first();

        // return $merchant;

        return view('marchant.profile.merchantprofile', compact('merchant'));
    }

    public function update(Request $request, $id)
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        return $request->all();

        $merchant = Marchant::where('id', $merchantId)->update([
            'name' => $request->name,
            // 'email ' => $request->name,
            'address' => $request->name,
            'photo' => $request->name,
            'nid_no' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
        ]);

    }
}
