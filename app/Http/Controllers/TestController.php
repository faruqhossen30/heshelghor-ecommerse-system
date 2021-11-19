<?php

namespace App\Http\Controllers;

use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function test()
    {
        $response = Http::post('https://sandbox.walletmix.com/init-payment-process', [
            "wmx_id"            => "WMX618a0f25cb7f4",
            "merchant_order_id" => "123",
            "merchant_ref_id"   => uniqid(),
            "app_name"          => "HeshelGhor",
            "cart_info"         => "Tshiet12Heshelgohor",
            "customer_name"     => "Jamal Mia",
            "customer_email"    => "jamal@gmail.com",
            "customer_add"      => "Test Address",
            "customer_phone"    => "01928406434",
            "product_desc"      => "Product Description",
            "amount"            => "250",
            "currency"          => "BDT",
            "options"           => "cz1wYXltZW50LnRlc3QsaT0xMjcuMC4wLjE=",
            "callback_url"      => "http://payment.test/merchant_callback.php",
            "access_app_key"    => "509cadc12023e05d7e85a3355b472632141a4c16",
            "authorization"     => "Basic aGVzaGVsZ2hvcl8xNjE1MDY4MTk2Omhlc2hlbGdob3JfODU2NTIzNTkz"
        ]);

        $token =  $response['token'];
        return redirect("https://sandbox.walletmix.com/bank-payment-process/".$token);
    }
}
