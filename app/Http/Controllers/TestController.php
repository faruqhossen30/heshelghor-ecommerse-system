<?php

namespace App\Http\Controllers;

use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $data = User::get('android_token');
       dd(date('H:i'));
    }
}
