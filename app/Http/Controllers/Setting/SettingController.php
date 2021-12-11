<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\SettingContact;
use App\Models\Setting\SettingSocialMedia;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showSetting()
    {
        $socialmedia = SettingSocialMedia::first();
        $contact = SettingContact::first();

        // return $socialmedia;

        return view('admin.settings.setting', compact('contact','socialmedia'));
    }
    public function contactInformation(Request $request)
    {
        // return $request->all();

        SettingContact::updateOrInsert([
            'id'        => 1
        ], [
            'phone'        => $request->phone,
            'mobile'       => $request->mobile,
            'email'        => $request->email,
            'address'      => $request->address,
            'working_day'  => $request->working_day,
            'working_time' => $request->working_time,
        ]);

        return redirect()->back();
    }

    public function socialMediaLink(Request $request)
    {
        // return $request->all();

        SettingSocialMedia::updateOrInsert([
            'id'        => 1
        ], [
            'facebook'       => $request->facebook,
            'facebook_group' => $request->facebook_group,
            'twitter'        => $request->twitter,
            'linkedin'       => $request->linkedin,
            'instagram'      => $request->instagram,
            'youtube'        => $request->youtube,
        ]);
        return redirect()->route('setting');
    }
}
