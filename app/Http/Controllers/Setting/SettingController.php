<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\SettingContact;
use App\Models\Setting\SettingHeader;
use App\Models\Setting\SettingSocialMedia;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function showSetting()
    {
        $socialmedia = SettingSocialMedia::first();
        $contact = SettingContact::first();
        $header = SettingHeader::first();

        // return $socialmedia;

        return view('admin.settings.setting', compact('header','contact', 'socialmedia'));
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
        $request->validate([
            'email' => 'email'
        ]);

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
    public function header(Request $request)
    {

        SettingHeader::updateOrInsert([
            'id'        => 1
        ], [
            'quate'  => $request->quate,
            'email'  => $request->email,
            'mobile' => $request->mobile
        ]);
        return redirect()->route('setting');
    }
}
