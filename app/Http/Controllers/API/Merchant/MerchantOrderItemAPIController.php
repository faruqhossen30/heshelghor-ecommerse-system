<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;

class MerchantOrderItemAPIController extends Controller
{
    public function allOrder(Request $request)
    {
        $merchantId = $request->user()->id;
        $orderItem = OrderItem::with('product')->where('merchant_id', $merchantId)->get();
        if(!empty($orderItem)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orderItem
            ]);
        }
    }
    public function singleOrder(Request $request, $orderItemId)
    {
        $merchantId = $request->user()->id;
        $orderItem = OrderItem::with('product')->where('merchant_id', $merchantId)->get();
        if(!empty($orderItem)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orderItem
            ]);
        }
    }
}
