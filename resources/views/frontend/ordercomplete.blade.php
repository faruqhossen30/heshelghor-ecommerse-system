
@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Your Cart page
@endsection

@section('content')
<main class="main order">
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step">1. Shopping Cart</h3>
            <h3 class="title title-simple title-step">2. Checkout</h3>
            <h3 class="title title-simple title-step active">3. Order Complete</h3>
        </div>
        <div class="container mt-8">
            <div class="order-message mr-auto ml-auto">
                <div class="icon-box d-inline-flex align-items-center">
                    <div class="icon-box-icon mb-0">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                            <g>
                                <path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" d="
                                    M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
                                    c0-0.7,0-1.4-0.1-2.1"></path>
                                    <polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel" stroke-miterlimit="10" points="
                                    48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
                            </g>
                        </svg>
                    </div>
                    <div class="icon-box-content text-left">
                        <h5 class="icon-box-title font-weight-bold lh-1 mb-1">Thank You!</h5>
                        <p class="lh-1 ls-m">Your order has been received</p>
                    </div>
                </div>
            </div>


            <div class="order-results">
                <div class="overview-item">
                    <span>Order number:</span>
                    <strong>{{$update_product->invoice_number}}</strong>
                </div>
                <div class="overview-item">
                    <span>Status:</span>
                    <strong>{{$update_product->status}}</strong>
                </div>
                <div class="overview-item">
                    <span>Date:</span>
                    <strong>{{$update_product->created_at->format('d M Y')}}</strong>
                </div>
                <div class="overview-item">
                    <span>Mobile:</span>
                    <strong>{{$update_product->phone}}</strong>
                </div>
                <div class="overview-item">
                    <span>Total:</span>
                    <strong>৳{{$update_product->amount}}</strong>
                </div>
                <div class="overview-item">
                    <span>Payment method:</span>
                    @if ($update_product->payment_type == 'cash')
                        <strong>Cash on delivery</strong>
                    @endif
                    @if ($update_product->payment_type == 'online')
                        <strong>Online "Paid !" </strong>
                    @endif
                </div>
            </div>

            <a href="{{route('pruductspage')}}" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4"><i class="d-icon-arrow-left"></i> Shop Again</a>
        </div>
    </div>
</main>
<!-- End Main -->
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.min.css">
@endpush

@push('scripts')

@endpush
