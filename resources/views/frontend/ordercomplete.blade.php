@extends('frontend.layouts.app')

@section('content')
{{-- {{ $order }} --}}
<!-- breadcrumb start -->
<div class="breadcrumb-area no-padding">
    <div class="container">
        <DIV class="row">
            <div class="col-xl-6 offset-xl-3 offset-lg-3 col-lg-6">
                <div class="breadcrumb-search-bar text-center">
                    <h2 class="text-white">Order Complete</h2>
                </div>
            </div>
        </DIV>
    </div>
</div>
<!-- breadcrumb end -->

<div class="thank-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 offset-xl-4  col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                <div class="thank-content d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check2-circle"
                        viewBox="0 0 16 16">
                        <path
                            d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                        <path
                            d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                    </svg>
                    <div class="content">
                        <h3>thank you</h3>
                        <span>Your order has been received</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="-complete-content">
                    <div class="order-item">
                        <span>ORDER NUMBER</span> <br>
                        <strong>{{ $order->invoice_number }}</strong>
                    </div>
                    <div class="order-item">
                        <span>STATUS</span> <br>
                        <strong>{{ $order->status }}</strong>
                    </div>
                    <div class="order-item">
                        <span>DATE</span> <br>
                        <strong>{{ $order->created_at->format('d M Y') }}</strong>
                    </div>
                    <div class="order-item">
                        <span>EMAIL</span> <br>
                        <strong>{{ $order->email }}</strong>
                    </div>
                    <div class="order-item">
                        <span>TOTAL</span> <br>
                        <strong>৳ {{ $order->total_product_price }}</strong>
                    </div>
                    <div class="order-item">
                        <span>PAYMENT METHOD</span> <br>
                        <strong>{{ $order->payment_type }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4>ORDER DETAILS</h4>
                <div class="card order-summery">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <h6>Product</h6>
                        </li>
                        <li class="list-group-item">
                            <ul class="product-item-show">
                                @foreach($order->orderitems as $item)
                                <li>
                                    <p>{{ $item->product->title }}<strong> x </strong>{{ $item->quantity }}</p>
                                    <p>৳ {{ $item->price * $item->quantity }}</p>
                                </li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-between">
                                <h6>Subtotal</h6>
                                <span>৳ {{ $order->total_product_price }}</span>
                            </div>
                        </li>
                        {{-- <li class="list-group-item d-flex justify-content-between">
                            <h6>Shipping</h6>
                            <span>Free shipping
                            </span>
                        </li> --}}
                        <li class="list-group-item d-flex justify-content-between">
                            <h6>Payment method</h6>
                            <span><strong>{{ $order->payment_type }}</strong></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <h6>Delivery Cost</h6>
                            <span><strong>৳ {{ $order->total_delivery_cost }}</strong></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <h6>Total</h6>
                            <span><strong>৳ {{ $order->total_product_price + $order->total_delivery_cost
                                    }}</strong></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="billing-address ">
                    <h4>Billing Address</h4>
                    <span>{{ $order->name }}</span>
                    {{-- <span>{{ $order->name }}</span> --}}
                    <span>{{ $order->address }}</span>
                    <span>{{ $order->phone }}</span>
                    <span>{{ $order->email }}</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="continue_shopping">
            <a href="#"><button><i class="fa-solid fa-arrow-left-long"></i> BACK TO LIST</button></a>
        </div>
    </div>
</div>

@endsection