<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Cart;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        // return $request->all();
        $request->validate([
            'total_amount' => 'required',
            'delivery_system' => 'required',
        ]);

        $post_data = array();
        $post_data['total_amount'] = $request->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->mobile;
        $post_data['cus_fax'] = "";

        # Order Information
        $post_data['total_prodcut'] = $request->mobile;
        $post_data['total_item'] = $request->mobile;
        $post_data['product_price'] = $request->product_price;
        $post_data['delivery_cost'] = $request->delivery_cost;


        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $request->total_price,
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);


        if ($request->buytype == 'buynow') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'user_id'        => Auth::user()->id,
                    'invoice_number' => invoiceGenerate(),
                    'name'           => $post_data['cus_name'],
                    'email'          => $post_data['cus_email'],
                    'phone'          => $post_data['cus_phone'],
                    'amount'         => $post_data['total_amount'],
                    'status'         => 'Pending',
                    'address'        => $post_data['cus_add1'],
                    'transaction_id' => $post_data['tran_id'],
                    'currency'       => $post_data['currency'],
                    // HeshelGhor table
                    'currency'       => $post_data['currency']

                ]);
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
    public function index2(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        // return $request->all();
        $cartItems = Cart::content();

        $request->validate([
            'total_amount' => 'required',
            // 'delivery_system' => 'required',
        ]);

        $post_data = array();
        $post_data['total_amount'] = $request->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->mobile;
        $post_data['cus_fax'] = "";

        # Order Information
        $post_data['total_prodcut'] = $request->mobile;
        $post_data['total_item'] = $request->mobile;
        $post_data['product_price'] = $request->product_price;
        $post_data['delivery_cost'] = $request->delivery_cost;


        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";



        $update_product = Order::create([
            // For Heshelghor
            'user_id'             => Auth::user()->id,
            'invoice_number'      => invoiceGenerate(),
            'total_item'          => $request->total_item,
            'total_prodcut'       => $request->total_prodcut,
            'total_product_price' => $request->total_product_price,
            'total_delivery_cost' => $request->total_delivery_cost,
            'payment_type'        => $request->payment_type,
            //For SSL Commerce
            'name'                => $post_data['cus_name'],
            'email'               => $post_data['cus_email'],
            'phone'               => $post_data['cus_phone'],
            'amount'              => $post_data['total_amount'],
            'status'              => 'Pending',
            'address'             => $post_data['cus_add1'],
            'transaction_id'      => $post_data['tran_id'],
            'currency'            => $post_data['currency'],
            'note'                => $request->note,
            'division_id'         => $request->division_id,
            'district_id'         => $request->district_id,
            'upazila_id'         => $request->upazila_id,
            'created_at'         => Carbon::now(),
            'updated_at'         => Carbon::now(),
        ]);

        if ($update_product) {
            foreach ($cartItems as $item) {

                // $post_data['courier_id'.$item->id] = $request->courier_id.$item->id;

                $product = Product::firstWhere('id', $item->id);
                // return $update_product;
                OrderItem::create([
                    'order_id'             => $update_product->id,
                    'user_id'              => Auth::user()->id,
                    'product_id'           => $item->id,
                    'merchant_id'          => $product->author_id,
                    'shop_id'              => $product->shop_id,
                    'order_number'         => '123',
                    'quantity'             => $item->qty,
                    'price'                => $item->price,
                    'discount_type'        => 'percent',
                    'discount'             => $item->discount,
                    'varient'              => json_encode($item->options->varient),
                    'courier_id'           => $request->courier_id[$item->id],
                    'courier_packege_desc' => $request->courier_packege_desc[$item->id],
                    'delivery_cost'        => $request->delivery_cost[$item->id],
                    'total_delivery_cost'  => intval($request->delivery_cost[$item->id]) * intval($item->qty),
                    'order_pin_no'         => rand(0, 4)
                ]);
            } // foreach end



        } // if close end


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
    public function buynow(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        // return $request->all();

        $cartItems = Cart::content();
        $payment_type = $request->payment_type;

        $request->validate([
            'total_amount' => 'required',
            // 'delivery_system' => 'required',
        ]);

        $post_data = array();
        $post_data['total_amount'] = $request->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->mobile;
        $post_data['cus_fax'] = "";

        # Order Information
        $post_data['total_prodcut'] = $request->mobile;
        $post_data['total_item'] = $request->mobile;
        $post_data['product_price'] = $request->product_price;
        $post_data['delivery_cost'] = $request->delivery_cost;


        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";



        // return $request->all();
        $update_product = Order::create([
            // For Heshelghor
            'user_id'             => Auth::user()->id,
            'invoice_number'      => invoiceGenerate(),
            'total_item'          => $request->total_item,
            'total_prodcut'       => $request->total_prodcut,
            'total_product_price' => $request->total_product_price,
            'total_delivery_cost' => $request->total_delivery_cost,
            'payment_type'        => $request->payment_type,
            //For SSL Commerce
            'name'                => $post_data['cus_name'],
            'email'               => $post_data['cus_email'],
            'phone'               => $post_data['cus_phone'],
            'amount'              => $post_data['total_amount'],
            'status'              => 'Pending',
            'address'             => $post_data['cus_add1'],
            'transaction_id'      => $post_data['tran_id'],
            'currency'            => $post_data['currency'],
            'note'                => $request->note,
            'division_id'         => $request->division_id,
            'district_id'         => $request->district_id,
            'upazila_id'         => $request->upazila_id,
            'created_at'         => Carbon::now(),
            'updated_at'         => Carbon::now(),
        ]);

        if ($update_product) {

            $product = Product::firstWhere('id', $request->product_id);
            // return $update_product;
            OrderItem::create([
                'order_id'             => $update_product->id,
                'user_id'              => Auth::user()->id,
                'product_id'           => $request->product_id,
                'merchant_id'          => $product->author_id,
                'shop_id'              => $product->shop_id,
                'order_number'         => '123',
                'quantity'             => $request->total_prodcut,
                'price'                => $request->product_price,
                'discount_type'        => 'percent',
                'discount'             => $product->discount,
                'varient'              => json_encode($request->varient),
                'courier_id'           => $request->courier_id,
                'courier_packege_desc' => $request->courier_packege_desc,
                'delivery_cost'        => $request->delivery_cost,
                'total_delivery_cost'  => $request->total_delivery_cost,
                'order_pin_no'         => rand(0, 4)
            ]);
            if($payment_type == 'cash'){
                // return $update_product;
                return view('frontend.ordercomplete', compact('update_product'));
            }
        } // if close end


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                echo "<br >Transaction is successfully Completed";
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Failed']);
                echo "validation Fail";
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            // echo "Transaction is successfully Completed";
            $update_product = Order::firstWhere('transaction_id', $order_detials->transaction_id);
            return view('frontend.ordercomplete', compact('update_product'));
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }
}
