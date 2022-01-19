<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting\SettingContact;
use App\Models\Setting\SettingHeader;
use App\Models\Setting\SettingPaymentSystem;
use App\Models\Setting\SettingSocialMedia;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    // public function __construct()
    // {
    //     if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('setting')){
    //         abort(403, 'You have no access this page.');
    //     };
    // }
    public function showSetting()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('setting')){
            abort(403, 'You have no access this page.');
        };
        $socialmedia = SettingSocialMedia::first();
        $contact = SettingContact::first();
        $header = SettingHeader::first();

        // return $socialmedia;

        return view('admin.settings.setting', compact('header','contact', 'socialmedia'));
    }
    public function contactInformation(Request $request)
    {
        // return $request->all();

        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('setting')){
            abort(403, 'You have no access this page.');
        };

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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('setting')){
            abort(403, 'You have no access this page.');
        };

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

        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('setting')){
            abort(403, 'You have no access this page.');
        };

        SettingHeader::updateOrInsert([
            'id'        => 1
        ], [
            'quate'  => $request->quate,
            'email'  => $request->email,
            'mobile' => $request->mobile
        ]);
        return redirect()->route('setting');
    }
    // Payment Method sellect for online payment
    public function checkForOnlinePayment(Request $request)
    {
        // return $request->all();

        $datas = $request->paymentmethod;
        if(!empty($datas)){
            SettingPaymentSystem::truncate();

            foreach ($datas as $row) {
                SettingPaymentSystem::create(['payment_method_id' => $row]);
            }
        }

        return redirect()->route('setting');
    }
}
