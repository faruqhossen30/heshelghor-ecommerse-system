<?php

namespace App\Http\Controllers\API\User;

use Exception;
use Illuminate\Http\Request;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order\DeliveryAddress;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Validator;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Auth\Marchant;
use DB;

class UserOrderAPIController extends Controller
{
    public function createOrder(Request $request)
    {
        $userId = $request->user()->id;

        $order = Order::create([
            // For Heshelghor
            'user_id'             => $userId,
            'invoice_number'      => invoiceGenerate(),
            'total_item'          => $request->total_item,
            'total_prodcut'       => $request->total_prodcut,
            'total_product_price' => $request->total_product_price,
            'total_delivery_cost' => $request->total_delivery_cost,
            'payment_type'        => 'online',
            //For SSL Commerce
            'name'                => $request->name,
            'email'               => $request->email,
            'phone'               => $request->phone,
            'amount'              => $request->amount,
            'status'              => 'Pending',
            'address'             => $request->address,
            'transaction_id'      =>  Uuid::uuid(),
            'currency'            => $request->currency,
            'note'                => $request->note,
            'division_id'         => $request->division_id,
            'district_id'         => $request->district_id,
            'upazila_id'         => $request->upazila_id,
            'created_at'         => Carbon::now(),
            'updated_at'         => Carbon::now(),
        ]);

        if ($order) {
            // Notification start
            $android_token = $request->user()->android_token;
            if ($android_token) {
                $data = array(
                    'title' => 'Thank you for your order.',
                    'body' => 'Check your account for order status.'
                );
                sendNotificateion($data, $android_token);
            }
            // Notification end
            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Order create successfully',
                'data'    => $order
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code'    => 203,
                'message' => 'Opps! Somethis is wrong !',
            ]);
        }
    }

    public function createOrderitem(Request $request)
    {
        $userId = $request->user()->id;

        $orderItem = OrderItem::create([
            'order_id'             => $request->order_id,
            'user_id'              => $request->user_id,
            'product_id'           => $request->product_id,
            'merchant_id'          => $request->merchant_id,
            'shop_id'              => $request->shop_id,
            'order_number'         => orderNumber(),
            'quantity'             => $request->quantity,
            'price'                => $request->price,
            'discount_type'        => 'percent',
            'discount'             => $request->discount,
            'varient'              => json_encode($request->varient),
            'courier_id'           => $request->courier_id,
            'courier_packege_desc' => $request->courier_packege_desc,
            'delivery_cost'        => $request->delivery_cost,
            'total_delivery_cost'  => $request->total_delivery_cost,
            'order_pin_no'         => rand(0, 4)
        ]);

        if ($orderItem) {
            // Notification start
            $merchantinfo = Marchant::firstWhere('id', $request->merchant_id);
            $merchant_token = $merchantinfo->android_token;

            if ($merchant_token) {
                $data = array(
                    'title' => 'Great News ! You have received an order',
                    'body' => 'Please Cheack your order and prepare for the customer.'
                );
                sendNotificateion($data, $merchant_token);
            }
            // Notification End

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Order Item create successfully',
                'data'    => $orderItem
            ]);
        } else {
            return response()->json([
                'success' => true,
                'code'    => 203,
                'message' => 'Opps! Somethis is wrong !',
            ]);
        }
    }

    public function success(Request $request)
    {
        $userId = $request->user()->id;
        $android_token = $request->user()->android_token;
        // echo "Transaction is Successful";
        $request->validate([
            'tran_id'  => 'required',
            'amount'   => 'required',
            'currency' => 'required',
        ]);


        // return 'welcome';

        $res = [];


        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        // $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('user_id', $userId)
            ->where('transaction_id', $tran_id)
            ->where('amount', $amount)
            ->where('currency', $currency)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        // return !empty($order_detials);
        // return boolval($order_detials);

        if ($order_detials) {
            if ($order_detials->status == 'Pending') {

                /*
                    That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successfull transaction to customer
                    */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                // echo "<br >Transaction is successfully Completed";

                // Notification start

                if ($android_token) {
                    $data = array(
                        'title' => 'Thaks for your order.',
                        'body' => 'Check your account for order status.'
                    );
                    sendNotificateion($data, $android_token);
                }
                // Notification End





                $res[] = "Transaction is successfully Completed";
            } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
                /*
                 That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
                 */
                // echo "Transaction is successfully Completed";
                $update_product = Order::firstWhere('transaction_id', $order_detials->transaction_id);
                $res[] = "Transaction is already complete";
            }
        } else {
            $res[] = "Invalid Transaction or something is wrong !";
        }


        return response()->json([
            'success' => true,
            'code'    => 201,
            'data'    => $res
        ]);
    }
}
