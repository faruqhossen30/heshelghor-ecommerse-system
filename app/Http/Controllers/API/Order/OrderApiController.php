<?php

namespace App\Http\Controllers\API\Order;

use Exception;
use Illuminate\Http\Request;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderApiController extends Controller
{
    public function placeOrder(Request $request)
    {
        return response()->json($request->all());
    }
}
