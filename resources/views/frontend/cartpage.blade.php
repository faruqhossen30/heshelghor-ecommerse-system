@php
    $serial = 1;
    $totalPrice = Cart::priceTotal();
@endphp

@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Your Cart page
@endsection

@section('content')
<main class="main cart">
    <div class="page-content pt-7 pb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step active"><a href="{{route('cart.page')}}">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step"><a href="checkout.html">2. Checkout</a></h3>
            <h3 class="title title-simple title-step"><a href="order.html">3. Order Complete</a></h3>
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
                                    {{$serial++}}
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="product-simple.html">{{$item->name}}</a>
                                    </div>
                                </td>
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="product-simple.html">
                                            <img src="{{ asset('uploads/product/'.$item->options->photo) }}" width="75" height="75"
                                                alt="product">
                                        </a>
                                    </figure>
                                </td>

                                <td class="product-subtotal">
                                    <span class="amount">৳{{$item->price}}</span>
                                </td>
                                {{-- Update start --}}
                                <form action="{{route('cart.ItemUpdate', $item->rowId)}}" method="post">
                                    @csrf
                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <button id="qty_minus{{$item->rowId}}" class="d-icon-minus" type="button"></button>
                                            <input name="quantity" id="qty_number{{$item->rowId}}" class="form-control" type="number" min="1"
                                                max="1000000" value="{{$item->qty}}">
                                            <button id="qty_plus{{$item->rowId}}" class="d-icon-plus" type="button"></button>
                                        </div>
                                    </td>
                                   <td>
                                    <button type="submit" class="btn btn-sm btn-light">Update</button>
                                   </td>
                                </form>
                                {{-- Update start --}}
                                <td class="product-price">
                                    <span class="amount">৳{{$item->subtotal}}</span>
                                </td>
                                <td class="product-close">
                                    <a href="{{route('cart.removeItem', $item->rowId)}}" class="product-remove" title="Remove this product">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class="text-end" style="text-align: right">
                        @if (count($items) > 0)
                        <a href="{{route('cart.removeallItem')}}" >Clear All</a>
                        @endif
                    </div>
                    <div class="cart-actions mb-6 pt-4">
                        <a href="{{route('homepage')}}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continue Shopping</a>
                        {{-- <button type="submit" class="btn btn-outline btn-dark btn-md btn-rounded btn-disabled">Update Cart</button> --}}
                    </div>
                    <div class="cart-coupon-box mb-8">
                        <h4 class="title coupon-title text-uppercase ls-m">Coupon Discount</h4>
                        <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mb-4"
                            id="coupon_code" value="" placeholder="Enter coupon code here...">
                        <button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply Coupon</button>
                    </div>
                </div>
                <aside class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                        <div class="summary mb-4">
                            <h3 class="summary-title text-left">Cart Totals</h3>
                            <table class="shipping">
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Subtotal</h4>
                                    </td>
                                    <td>
                                        <p class="summary-subtotal-price">৳{{$totalPrice}}</p>
                                    </td>
                                </tr>
                                <tr class="sumnary-shipping shipping-row-last">
                                    <td colspan="2">
                                        <h4 class="summary-subtitle">Calculate Shipping</h4>
                                        <ul>
                                            <li>
                                                <div class="custom-radio">
                                                    <input type="radio" id="flat_rate" name="shipping" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="flat_rate">Flat rate</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Free
                                                        shipping</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-radio">
                                                    <input type="radio" id="local_pickup" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="local_pickup">Local pickup</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <div class="shipping-address">
                                <label>Shipping to <strong>CA.</strong></label>
                                <div class="select-box">
                                    <select name="country" class="form-control">
                                        <option value="us" selected>United States (US)</option>
                                        <option value="uk"> United Kingdom</option>
                                        <option value="fr">France</option>
                                        <option value="aus">Austria</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select name="country" class="form-control">
                                        <option value="us" selected>California</option>
                                        <option value="uk">Alaska</option>
                                        <option value="fr">Delaware</option>
                                        <option value="aus">Hawaii</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="code" placeholder="Town / City" />
                                <input type="text" class="form-control" name="code" placeholder="ZIP" />
                                <a href="#" class="btn btn-md btn-dark btn-rounded btn-outline">Update totals</a>
                            </div>
                            <table class="total">
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Total</h4>
                                    </td>
                                    <td>
                                        <p class="summary-total-price ls-s">৳{{$totalPrice}}</p>
                                    </td>
                                </tr>
                            </table>
                            <a href="checkout.html" class="btn btn-dark btn-rounded btn-checkout">Proceed to checkout</a>
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
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/style.min.css">

@endpush

@push('scripts')

<script>
// $(document).ready(function(){
//     function increase(){
//         console.log('ok');
//     }
// });

window.onload = function() {
    if (window.jQuery) {
        // jQuery is loaded
        alert("Yeah! JQuery is working");
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}

</script>
@endpush
