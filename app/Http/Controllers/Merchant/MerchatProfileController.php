<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Auth\Marchant;
use App\Models\Merchant\MerchantProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class MerchatProfileController extends Controller
{
    public function index()
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        $merchant = Marchant::where('id', $merchantId)->first();

        return view('marchant.profile.merchantprofile', compact('merchant'));
    }

    public function create()
    {
        return view('marchant.profile.upload');
        return "ok";
    }

    public function store(Request $request)
    {
        // return $request->all();
        $merchantId = Auth::guard('marchant')->user()->id;



        // return $merchantId;
        $request->validate([
            'profile_photo'      => 'required|mimes:png,jpg,gif,bmp|max:2048',
            'nid_no'             => 'required',
            'tradelicense_no'    => 'max:50',
            'tin_no'             => 'max:50',
            'nid_photo'          => 'required|mimes:png,jpg,gif,bmp|max:2048',
            'tradelicense_photo' => 'mimes:png,jpg,gif,bmp|max:2048',
            'tin_photo'          => 'mimes:png,jpg,gif,bmp|max:2048'
        ]);

        // For Profile Picture
        $profile_photo = $request->file('profile_photo');
        if ($profile_photo) {
            $profile_photofileExtention = $profile_photo->getClientOriginalExtension();
            $profile_photofileName = date('Ymdhis') . '.' . $profile_photofileExtention;
            Image::make($profile_photo)->save(public_path('uploads/merchant/profile') . $profile_photofileName);
        }
        // NID Photo
        $nid_photo = $request->file('nid_photo');
        if ($nid_photo) {
            $nid_photoileExtention = $nid_photo->getClientOriginalExtension();
            $nid_photofileName = date('Ymdhis') . '.' . $nid_photoileExtention;
            Image::make($nid_photo)->save(public_path('uploads/merchant/nid') . $nid_photofileName);
        }


        // For Profile Picture
        // $profile_photo = $request->file('profile_photo');
        // if ($profile_photo) {
        //     $fileExtention = $profile_photo->getClientOriginalExtension();
        //     $profile_photofileName = date('Ymdhis') . '.' . $fileExtention;
        //     Image::make($profile_photo)->save(public_path('uploads/merchant/profile') . $profile_photofileName);
        // }



        MerchantProfile::create([
            'merchant_id'        => $merchantId,
            'photo'              => $request->profile_photofileName,
            'nid_no'             => $request->nid_no,
            'tradelicense_no'    => $request->tradelicense_no,
            'tin_no'             => $request->tin_no,
            'nid_photo'          => $request->nid_photofileName,
            // 'tradelicense_photo' => $request->name,
            // 'tin_photo'          => $request->tradelicense_photo
        ]);
    }
}
