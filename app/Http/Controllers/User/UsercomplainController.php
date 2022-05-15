<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Usercomplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsercomplainController extends Controller
{
    public function usercomplain(){

        // $userComplain = Usercomplain::with('user','order')->latest()->get();
        $userComplain = Usercomplain::get();


        // dd($user);
        // return $userComplain;
        return view('user.complain.usercomplain',compact('userComplain'));
    }

    // public function usercomplainstore(Request $request)
    // {
    //     //    return $request->all();
    //     $request->validate([
    //         'delivery_date'        => 'required',
    //         'delivery_time'        => 'required',
    //         'alt_customer_name'    => 'required',
    //         'alt_customer_phone'   => 'required',
    //         'alt_customer_email'   => 'required',
    //         'alt_customer_address' => 'required',
    //         'complain_message'     => 'required',
    //         'defect_pic_1'         => 'required',
    //         'defect_pic_2'         => 'required',
    //         'defect_pic_3'         => 'required',
    //         'defect_pic_4'         => 'required',
    //         'defect_pic_5'         => 'required',

    //     ],[
    //         'delivery_date.required'        => 'Please input your delivery_date ',
    //         'delivery_time.required'        => 'Please input your delivery_time ',
    //         'alt_customer_name.required'    => 'Please input your alt_customer_name ',
    //         'alt_customer_phone.required'   => 'Please input your alt_customer_phone ',
    //         'alt_customer_email.required'   => 'Please input your alt_customer_email ',
    //         'alt_customer_address.required' => 'Please input your alt_customer_address ',
    //         'complain_message.required'     => 'Please input your complain_message ',

    //     ]);
    //     Usercomplain::Create([
    //         'delivery_date'        => $request->delivery_date,
    //         'delivery_time'        => $request->delivery_time,
    //         'alt_customer_name'    => $request->alt_customer_name,
    //         'alt_customer_phone'   => $request->alt_customer_phone,
    //         'alt_customer_email'   => $request->alt_customer_email,
    //         'alt_customer_address' => $request->alt_customer_address,
    //         'complain_message'     => $request->complain_message,
    //         'complain_message'     => $request->complain_message,
    //         'complain_message'     => $request->complain_message,
    //         'complain_message'     => $request->complain_message,
    //         'defect_pic_1'         => $request->defect_pic_1,
    //         'defect_pic_2'         => $request->defect_pic_2,
    //         'defect_pic_3'         => $request->defect_pic_3,
    //         'defect_pic_4'         => $request->defect_pic_4,
    //         'defect_pic_5'         => $request->defect_pic_5,
    //     ]);
    //     return redirect()->route('complain.index')->with('success', 'Successfully data added');

}
