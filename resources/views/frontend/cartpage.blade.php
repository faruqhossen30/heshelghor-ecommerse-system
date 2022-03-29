@php
$serial = 1;
$totalPrice = Cart::priceTotal();
$totalitem = Cart::count();
@endphp

@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Your Cart page
@endsection

@section('content')
    <main class="main cart">
        <div class="page-content pt-7 pb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step active"><a href="{{ route('cart.page') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step"><a href="{{route('checkoutpage')}}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
            </div>
            <div class="container mt-7 mb-2">
                <div class="row">
                    <div class="col-lg-8 col-md-12 pr-lg-4">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th><span>S.N</span></th>
                                    <th><span>Product</span></th>
                                    <th><span>Photo</span></th>
                                    <th><span>Price</span></th>
                                    <th><span>quantity</span></th>
                                    <th></th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            {{ $serial++ }}
                                        </td>
                                        <td class="product-name">
                                            <div class="product-name-section">
                                                <a href="product-simple.html">{{ $item->name }}</a>
                                            </div>
                                        </td>
                                        <td class="product-thumbnail">
                                            <figure>
                                                <a href="product-simple.html">
                                                    <img src="{{ $item->options->photo }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">৳{{ $item->price }}</span>
                                        </td>
                                        {{-- Update start --}}
                                        <form action="{{ route('cart.ItemUpdate', $item->rowId) }}" method="post">
                                            @csrf
                                            <td class="product-quantity">
                                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                                <div class="input-group">
                                                    {{-- <button id="qty_minus{{$item->rowId}}" class="d-icon-minus" type="button"></button> --}}
                                                    <input name="quantity" id="qty_number{{ $item->rowId }}"
                                                        class="form-control border" type="number" min="1" max="1000000"
                                                        value="{{ $item->qty }}">
                                                    {{-- <button id="qty_plus{{$item->rowId}}" class="d-icon-plus" type="button"></button> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-light" onclick="return confirm('Are want to update cart ?');">Update</button>
                                            </td>
                                        </form>
                                        {{-- Update start --}}
                                        <td class="product-price">
                                            <span class="amount">৳{{ $item->subtotal }}</span>
                                        </td>
                                        <td class="product-close">
                                            <a href="{{ route('cart.removeItem', $item->rowId) }}" class="product-remove"
                                                title="Remove this product" onclick="return confirm('Are want to remove this product from cart ?');">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="text-end" style="text-align: right">
                            @if (count($items) > 0)
                                <a href="{{ route('cart.removeallItem') }}" onclick="return confirm('Are want to empty you shoping cart ?');">Clear All</a>
                            @endif
                        </div>
                        <div class="cart-actions mb-6 pt-4">
                            <a href="{{ route('homepage') }}"
                                class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i
                                    class="d-icon-arrow-left"></i>Continue Shopping</a>
                            {{-- <button type="submit" class="btn btn-outline btn-dark btn-md btn-rounded btn-disabled">Update Cart</button> --}}
                        </div>
                        <div class="cart-coupon-box mb-8">
                            <h4 class="title coupon-title text-uppercase ls-m">Coupon Discount</h4>
                            <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mb-4"
                                id="coupon_code" value="" placeholder="Enter coupon code here...">
                            <button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply Coupon</button>
                        </div>
                    </div>
                    {{-- Checkout Section --}}
                    <aside class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                            <div class="summary mb-4">
                                <h3 class="summary-title text-left">Order Summery</h3>
                                {{-- <div class="shipping-address">
                                    <label style="margin-bottom:0px">Delivery System<strong></strong></label>
                                    <div class="select-box">
                                        <select name="delivery_system" class="form-control">
                                            <option value="" selected>Select one</option>
                                            @foreach ($deliverysystems as $system)
                                                <option value="{{ $system->id }}">{{ $system->name }} -
                                                    ৳{{ $system->price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <table class="shipping">
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Subtotal</h4>
                                        </td>
                                        <td>
                                            <p class="summary-subtotal-price" >৳ <span id="sub_total">{{ $totalPrice }}</span></p>
                                        </td>
                                    </tr>
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Total Quantity</h4>
                                        </td>
                                        <td>
                                            <p class="summary-subtotal-price"><span id="product_quantity">{{$totalitem}}</span></p>
                                        </td>
                                    </tr>
                                    {{-- <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Delivery Charge</h4>
                                        </td>
                                        <td>
                                            <p class="summary-subtotal-price">$<span id="delivery_charge">0</span></p>
                                        </td>
                                    </tr> --}}


                                </table>

                                <table class="total">
                                    <tr class="summary-subtotal">
                                        <td>
                                            <h4 class="summary-subtitle">Total</h4>
                                        </td>
                                        <td>
                                            <p class="summary-total-price ls-s">৳<span id="total_product_price">{{ $totalPrice }}</span>
                                                </p>
                                        </td>
                                    </tr>
                                </table>
                                <a href="{{route('checkoutpage')}}" class="btn btn-dark btn-rounded btn-checkout">Proceed to
                                    checkout</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.min.css">

@endpush

@push('scripts')
    {{-- <script type="text/javascript">
        $(document).ready(function() {

            // var deliveryCost = 0;
            var sub_total = $('#sub_total');
            var product_quantity = $('#product_quantity');
            var productNumber = parseInt(product_quantity.text())
            var delivery_charge = $('#delivery_charge');
            var total_product_price = $('#total_product_price');

            $(document).on('change', 'select[name="delivery_system"]', function() {
                var deliverySystemId = $('select[name="delivery_system"]').val();
                if (deliverySystemId) {
                    $.get(`{{ url('deliverycost/${deliverySystemId}') }}`, function(data, status) {
                        if (data) {
                            delivery_charge.text(data.price * productNumber);
                            console.log(delivery_charge.text());
                            totalAmount();
                        }
                    });
                };

            });

            // For Calculation
            function totalAmount(){
                var inTotal = parseFloat(sub_total.text()) + parseFloat(delivery_charge.text());
                total_product_price.text(inTotal.toFixed(2));
            }
            console.log()

        }); // Document ready

    </script> --}}
@endpush
