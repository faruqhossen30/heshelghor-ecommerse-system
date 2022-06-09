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
                    <div class="col-lg-12 col-md-12 pr-lg-4">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th><span>S.N</span></th>
                                    <th><span>Product</span></th>
                                    <th><span>Photo</span></th>
                                    <th><span>Price</span></th>
                                    <th><span>Action</span></th>
                                    <th><span>Close</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="product-thumbnail">
                                            {{ $serial++ }}
                                        </td>
                                        <td class="product-name">
                                            <div class="product-name-section">
                                                <a href="product-simple.html">{{ $product->product->title }}</a>
                                            </div>
                                        </td>
                                        <td class="product-thumbnail">
                                            <figure>
                                                <a href="product-simple.html">
                                                    <img src="{{ $product->product->img_small }}"
                                                       style="width: 50px" alt="product">
                                                </a>
                                            </figure>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">৳{{ $product->product->price }}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('singleproduct', $product->product->slug)}}" class="btn btn-dark btn-sm">View</a>
                                        </td>
                                        <td class="product-close">
                                            <a href="{{route('wishlistremove', $product->id)}}" class="product-remove"
                                                title="Remove this product" onclick="return confirm('Are want to remove this product from wishlist ?');">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{-- <div class="text-end" style="text-align: right">
                            @if (count($products) > 0)
                                <a href="{{ route('addwishlistremoveall') }}" onclick="return confirm('Are want to empty you wishlist ?');">Clear All</a>
                            @endif
                        </div> --}}
                        <div class="cart-actions mb-6 pt-4">
                            <a href="{{ route('homepage') }}"
                                class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i
                                    class="d-icon-arrow-left"></i>Continue Shopping</a>
                            {{-- <button type="submit" class="btn btn-outline btn-dark btn-md btn-rounded btn-disabled">Update Cart</button> --}}
                        </div>
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
<script type="text/javascript">
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

    </script>
@endpush
