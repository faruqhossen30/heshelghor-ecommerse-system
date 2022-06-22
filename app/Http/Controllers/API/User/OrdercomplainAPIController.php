<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use App\Models\User\Usercomplain;
use App\Models\User\UserorderComplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class OrdercomplainAPIController extends Controller
{
    public function userorderComplainList(Request $request)
    {
        $userid = $request->user()->id;

        $allcomplain = UserorderComplain::where('user_id', $userid)->get();

        return response()->json([
            'success' => false,
            'code' => 200,
            'data' => $allcomplain,
        ]);
    }

    public function userorderComplainsindetails(Request $request, $id)
    {
        $userid = $request->user()->id;
        $complain = UserorderComplain::where('user_id', $userid)->where('id', $id)->first();

        return response()->json([
            'success' => false,
            'code' => 200,
            'data' => $complain,
        ]);
    }
    public function usercomplainstore(Request $request)
    {

        $userid = $request->user()->id;
        //    return $request->all();
        $request->validate([
            'orderitem_id'        => 'required',
            'delivery_date'        => 'required',
            'delivery_time'        => 'required',
            'alt_customer_phone'   => 'required',
            'alt_customer_address' => 'required',
            'complain_message'     => 'required',
            'defect_pic_1'         => 'required',
            'defect_pic_2'         => 'required',
        ], [
            'orderitem_id.required'        => 'Please input your orderitem_id ',
            'delivery_date.required'        => 'Please input your delivery_date ',
            'delivery_time.required'        => 'Please input your delivery_time ',
            'alt_customer_phone.required'   => 'Please input your alt_customer_phone ',
            'alt_customer_address.required' => 'Please input your alt_customer_address ',
            'complain_message.required'     => 'Please input your complain_message ',
        ]);

        $complain = UserorderComplain::firstWhere('orderitem_id', $request->orderitem_id);
        // return $complain ;
        if ($complain) {
            return response()->json([
                'success' => false,
                'code' => 200,
                'message' => 'Complain already exist for this order.',
            ]);
        }
        if (!$complain) {
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

            $complain = UserorderComplain::Create([
                'orderitem_id'         => $request->orderitem_id,
                'user_id'              => $userid,
                'complain_number'      => rand(0001, 9999),
                'delivery_date'        => $request->delivery_date,
                'delivery_time'        => $request->delivery_time,
                'alt_customer_phone'   => $request->alt_customer_phone,
                'alt_customer_address' => $request->alt_customer_address,
                'complain_message'     => $request->complain_message,
                'defect_pic_1'         => $photo1,
                'defect_pic_2'         => $photo2,
                'defect_pic_3'         => $photo3,
                'defect_pic_4'         => $photo4,
                'defect_pic_5'         => $photo5,

            ]);
            return response()->json([
                'success' => true,
                'code' => 201,
                'message' => 'product Complain data store ',
                'data' => $complain
            ]);
        }
    }
}
