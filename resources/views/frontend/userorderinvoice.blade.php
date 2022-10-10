<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <style>
        body {
            font-family: 'examplefont', sans-serif;
        }
    </style>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: Nikosh;
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
            font-family: Nikosh;
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
            font-family: Nikosh;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        th {
            color: #fff;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: Nikosh;
        }

        .small-heading {
            font-size: 18px;
            font-family: Nikosh;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: Nikosh;
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
            font-family: Nikosh;
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
                <th width="50%" colspan="2" class="text-end company-data" style="color: #000;">
                    <span>Invoice Id: # {{ $order[0]->invoice_number ?? 'none' }} </span> <br>
                    <span>Address: #58,Karbala Road, Jessore Sadar,jessore</span> <br>
                    <span>Zip code : 7400 </span> <br>
                    <span>Mobile:01928406434</span> <br>
                    <span>Phone:+8802477763843</span> <br>
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
                <td> {{ $order[0]->orderitems[0]->order_number ?? 'none' }} </td>

                <td>Full Name:</td>
                <td>{{ $order[0]->name }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $order[0]->transaction_id }}</td>

                <td>Email Id:</td>
                <td>{{ $order[0]->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $order[0]->created_at }}</td>

                <td>Phone:</td>
                <td>{{ $order[0]->phone }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{ $order[0]->payment_type }}</td>

                <td>Address:</td>
                <td>{{ $order[0]->address }}</td>
            </tr>

            <tr>
                <td>Order Status:</td>
                <td>{{ $orderstatus->status }}</td>

                <td>Pin code:</td>
                <td>{{ $order[0]->orderitems[0]->order_pin_no }}</td>
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
                <th>SL</th>
                <th>Product</th>
                <th>Price</th>
                <th>Delivery Cost </th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>

            @php
                $serial = 1;
            @endphp


            @foreach ($order[0]->orderitems as $item)
                <tr>
                    <td width="10%">{{ $serial++ }}</td>

                    <td >
                        <p style="font-size: 20px;">{{ $item->product->title }}  &#160; {{ $item->price }}<strong> x </strong>{{ $item->quantity }}</p>
                        {{-- <p>৳ {{ $item->price * $item->quantity }}</p> --}}
                    </td>


                    <td width="10%">

                        <p>{{ $item->price * $item->quantity }}

                            {{-- <p>{{ $order[0]->orderitems[0]->price }}</p> --}}
                    </td>
                    <td width="10%">{{ $item->delivery_cost* $item->quantity}}</td>
                    <td width="10%">
                        {{ $item->quantity }}
                    </td>
                    <td width="10%">
                       {{$item->price * $item->quantity + ($item->delivery_cost* $item->quantity) }}
                    </td>


                </tr>
            @endforeach


            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">Total</td>
                <td colspan="1" class="total-heading">{{ $order[0]->total_product_price + $order[0]->total_delivery_cost}}</td>
            </tr>
        </tbody>

    </table>
    <p class="text-center">
        Thank your for shopping with Heshelghor.com
    </p>

    <br>


</body>

</html>
