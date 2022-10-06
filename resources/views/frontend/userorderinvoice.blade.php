<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{ $order->invoice_number }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #3c3c43;
            color: #fff;
        }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="40%" colspan="2">
                    {{-- <h2 class="text-start">Heshelghor Ecommerce</h2> --}}

                    <img src="{{ public_path('frontend/images/logo.jpg') }}" height="80px" alt="">
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $order->invoice_number }}</span> <br>
                    <span>{{ $order->updated_at }}</span> <br>
                    <span>Zip code : 7400 </span> <br>
                    <span>Address: #58,Karbala Road, Jessore Sadar,jessore</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Number:</td>
                <td>{{ $order->order_number }}</td>

                <td>Full Name:</td>
                <td>{{ $order->user->name }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td></td>

                <td>Email Id:</td>
                <td>{{ $order->user->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $order->updated_at }}</td>

                <td>Phone:</td>
                <td>{{ $order->user->mobile }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{ $order->payment_type }}</td>

                <td>Address:</td>
                <td>{{ $order->user->address }}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>completed</td>

                <td>Pin code:</td>
                <td>{{ $order->order_pin_no }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Delivery Cost </th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>


            <tr>
                <td width="10%">16</td>
                <td>
                    @foreach ($order->orderitems as $item)
                        <p>{{ $item->product->title  }}</p>
                    @endforeach
                </td>
                <td width="10%">
                    @foreach ($order->orderitems as $item)
                        <p>{{ $item->price * $item->quantity }}</p>
                    @endforeach
                </td>
                <td width="10%">{{ $order->total_delivery_cost   }}</td>
                <td width="10%">
                    @foreach ($order->orderitems as $item)
                        {{ $item->quantity }}
                    @endforeach
                </td>
                <td width="15%" class="fw-bold">  @foreach ($order->orderitems as $item)
                    <p>{{ $item->price * $item->quantity }}</p>
                @endforeach</td>
            </tr>



            <tr>
                <td colspan="5" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">{{  $order->total_product_price + $order->total_delivery_cost }}</td>
            </tr>
        </tbody>

    </table>
    <p class="text-center">
        Thank your for shopping with Heshelghor.com
    </p>

    <br>


</body>

</html>
