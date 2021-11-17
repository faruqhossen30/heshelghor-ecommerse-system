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
        return "jsut for test";
        $user = User::first();
        return view('test', compact('user'));
    }
}
