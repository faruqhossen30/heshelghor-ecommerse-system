<?php

namespace App\Http\Controllers;

use App\Models\Admin\Location\Division;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\PointManager\PointManagerCollectProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Auth\Marchant;
use Faker\Provider\Uuid;

use function PHPSTORM_META\type;

class TestController extends Controller
{
    public function forinvoice()
    {
        return "invoiceGenerate";
    }


    public function checkAarray()
    {
        return view('test');
    }

    public function ontest()
    {
return Uuid::uuid();
        // return invoiceGenerate();
    }




    public function test()
    {
        return "ok";


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
            "callback_url"      => "https://heshelghor.com/merchant_callback.php",
            "access_app_key"    => "509cadc12023e05d7e85a3355b472632141a4c16",
            "authorization"     => "Basic aGVzaGVsZ2hvcl8xNjE1MDY4MTk2Omhlc2hlbGdob3JfODU2NTIzNTkz"
        ]);

        $token =  $response['token'];

        if ($token) {
            return redirect("https://sandbox.walletmix.com/bank-payment-process/" . $token);
        }

        // return $response;
        // return redirect("https://sandbox.walletmix.com/bank-payment-process/".$token);
    }

    public function carbon()
    {
        $pt = PointManagerCollectProduct::create([
            'product_id'          => 2,
            'invoice_id'          => 2,
            'orderitem_id'        => 2,
            'commission'          => 23,
            'total_commission'    => 3,
            'accept_statuss'      => false,
            'accept_time'         => Carbon::now(),
        ]);
        return $pt;
    }


    public function allmedia()
    {
        $merchant = Marchant::where('id', 1)->first();
        $medias = $merchant->getMedia();

        $data = [];
        // $library = $$medias->transform(function ($item, $key) {
        foreach ($merchant->getMedia() as $media) {
            $data[] = [
                'file_name'    => $media->file_name,
                'original_url' => $media->getUrl(),
                'small_url'    => $media->getUrl('small'),
                'medium_url'   => $media->getUrl('medium'),
                'large_url'    => $media->getUrl('large')

            ];
            // return $data;

        }

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $data
        ]);
    }


    public function testserver()
    {
        return phpinfo();
    }
}
