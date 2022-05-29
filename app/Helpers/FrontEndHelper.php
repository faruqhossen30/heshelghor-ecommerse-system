<?php

use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\Auth;

function invoiceGenerate()
{
    $userId = Auth::user()->id;
    $invoice = 'HG-' . $userId . '000';

    $count = Order::where('invoice_number', 'LIKE', $invoice . '%')->count();
    $suffix = $count ? $count + 1 : $count + 1;
    $invoice .= $suffix;
    return $invoice;
}


function orderNumber()
{
    $today = date("ymd");
    $number = intval($today . '000');
    $count = OrderItem::where('order_number', 'LIKE', $number . '%')->count();
    $suffix = $count ? $count + 1 : $count + 1;
    $number .= $suffix;
    return $number;
}
