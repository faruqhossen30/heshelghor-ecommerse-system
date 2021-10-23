<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Marchant;
use App\Models\Merchant\MerchantProfile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        $merchant = Marchant::where('id', $merchantId)->first();

        return view('marchant.profile.merchantprofile', compact('merchant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marchant.profile.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        MerchantProfile::create([
            'merchant_id'        => $merchantId,
            'photo'              => $request->profile_photo,
            'nid_no'             => $request->nid_no,
            'tradelicense_no'    => $request->tradelicense_no,
            'tin_no'             => $request->tin_no,
            'nid_photo'          => $request->nid_photo,
            'tradelicense_photo' => $request->name,
            'tin_photo'          => $request->tradelicense_photo
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
