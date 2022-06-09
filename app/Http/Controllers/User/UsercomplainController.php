<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use App\Models\User\Usercomplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsercomplainController extends Controller
{
    public function usercomplain($id)
    {

        $orderitem = OrderItem::where('user_id', Auth::user()->id)->where('id', $id)->first();
        // return $orderitem ;
        $complain = Usercomplain::firstWhere('orderitem_id', $id);

        if ($complain) {
            return "complain already exit";
        }
        if (!$complain) {

            return view('user.complain.usercomplain', compact('orderitem'));
        }
    }

    public function usercomplainstore(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'delivery_date'        => 'required',
            'delivery_time'        => 'required',
            'alt_customer_name'    => 'required',
            'alt_customer_phone'   => 'required',
            'alt_customer_email'   => 'required',
            'alt_customer_address' => 'required',
            'complain_message'     => 'required',
            'defect_pic_1'         => 'required',
            'defect_pic_2'         => 'required',
        ], [
            'delivery_date.required'        => 'Please input your delivery_date ',
            'delivery_time.required'        => 'Please input your delivery_time ',
            'alt_customer_name.required'    => 'Please input your alt_customer_name ',
            'alt_customer_phone.required'   => 'Please input your alt_customer_phone ',
            'alt_customer_email.required'   => 'Please input your alt_customer_email ',
            'alt_customer_address.required' => 'Please input your alt_customer_address ',
            'complain_message.required'     => 'Please input your complain_message ',
        ]);

        $photo1 = null;
        if ($request->file('defect_pic_1')) {
            $photo1 = $request->defect_pic_1->getClientOriginalName();
            $request->defect_pic_1->storeAs('images/defectphoto/1', $photo1, 'public');
        }
        $photo2 = null;
        if ($request->file('defect_pic_2')) {
            $photo2 = $request->defect_pic_2->getClientOriginalName();
            $request->defect_pic_2->storeAs('images/defectphoto/2', $photo2, 'public');
        }
        $photo3 = null;
        if ($request->file('defect_pic_3')) {
            $photo3 = $request->defect_pic_3->getClientOriginalName();
            $request->defect_pic_3->storeAs('images/defectphoto/3', $photo3, 'public');
        }
        $photo4 = null;
        if ($request->file('defect_pic_4')) {
            $photo4 = $request->defect_pic_4->getClientOriginalName();
            $request->defect_pic_4->storeAs('images/defectphoto/4', $photo4, 'public');
        }
        $photo5 = null;
        if ($request->file('defect_pic_5')) {
            $photo5 = $request->defect_pic_5->getClientOriginalName();
            $request->defect_pic_5->storeAs('images/defectphoto/5', $photo5, 'public');
        }

        Usercomplain::Create([
            'orderitem_id'         => $request->orderitem_id,
            'product_id'           => $request->product_id,
            'user_id'              => Auth()->user()->id,
            'complain_number'      => rand(0001, 9999),
            'order_number'         => $request->order_number,
            'customer_name'        => $request->customer_name,
            'customer_email'       => $request->customer_email,
            'customer_address'     => $request->customer_address,
            'customer_mobile'      => $request->customer_mobile,
            'delivery_date'        => $request->delivery_date,
            'delivery_time'        => $request->delivery_time,
            'alt_customer_name'    => $request->alt_customer_name,
            'alt_customer_phone'   => $request->alt_customer_phone,
            'alt_customer_email'   => $request->alt_customer_email,
            'alt_customer_address' => $request->alt_customer_address,
            'complain_message'     => $request->complain_message,
            'defect_pic_1'         => $photo1,
            'defect_pic_2'         => $photo2,
            'defect_pic_3'         => $photo3,
            'defect_pic_4'         => $photo4,
            'defect_pic_5'         => $photo5,
        ]);
        return redirect()->route('user.order')->with('success', 'Successfully data added');
    }
}
