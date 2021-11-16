<?php

namespace App\Http\Controllers;

use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {

        $userId = 19;
        $invoice ='HG-'.$userId.'000';
        function numGenerate($invoice){
            $count = Order::where('order_no', 'LIKE', $invoice.'%')->count();
            $suffix = $count ? $count+1 : $count+1;
            $invoice .= $suffix;
            return $invoice;
        }
        $invoiceNumber = numGenerate($invoice);

        echo $invoiceNumber;

    }
}
