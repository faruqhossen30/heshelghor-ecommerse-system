@php
$serial = 1;
$subTotal = Cart::priceTotal();
$totalProduct = Cart::count();
$totalItem = count(Cart::content());
@endphp

@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Checkoutpage
@endsection

@section('content')
    <main class="main checkout">
        <div class="page-content pb-10 mb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step"><a href="{{ route('cart.page') }}">1. Shopping Cart</a></h3>
                <h3 class="title title-simple title-step active"><a href="{{ route('checkoutpage') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
            </div>

            <form action="{{ route('pay') }}" method="POST">
                @csrf
                <input type="hidden" name="buytype" value="checkout">
                <input type="hidden" name="total_item" value="{{ Cart::content()->count() }}">
                <input type="hidden" name="total_prodcut" value="{{ Cart::count() }}">
                <input type="hidden" name="total_product_price" value="{{ Cart::subtotal() }}">
                {{-- Delivery --}}
                <input type="hidden" name="total_delivery_cost" value="">
                <input type="hidden" name="total_amount" value="">



                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="tab tab-nav-boxed tab-nav-solid">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="billingtabbutton" href="#tab3-1">Billing &
                                                Deliver Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="checkouttabbutton" href="#tab3-2">Checkout</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab3-1">
                                            <div class="col-md-12 mb-6 mb-lg-0 pr-lg-4">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <h3 class="title title-simple text-left text-uppercase">Billing
                                                            Details
                                                        </h3>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Full Name *</label>
                                                                <input type="text" value="{{ $user->name }}"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" />
                                                                <div class="text-danger">
                                                                    @error('name')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label>Company Name (Optional)</label>
                                                        <input type="text" class="form-control" name="company_name" />
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Delivery Address *</label>
                                                                <input type="text"
                                                                    class="form-control @error('address') is-invalid @enderror"
                                                                    name="address" />
                                                                <div class="text-danger">
                                                                    @error('address')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <label>ZIP</label>
                                                                <input type="text" class="form-control" name="zip" />
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <label>Mobile No *</label>
                                                                <input value="{{ $user->mobile }}" type="text"
                                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                                    name="mobile" />
                                                                <div class="text-danger">
                                                                    @error('mobile')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label>Email Address *</label>
                                                        <input type="text" value="{{ $user->email }}"
                                                            class="form-control" name="email" />
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <h2 class="title title-simple text-uppercase text-left">Please
                                                            Select
                                                            Location For deliver
                                                            service</h2>
                                                        <div>
                                                            <label>Select Divission *</label>
                                                            <div class="select-box">
                                                                <select name="division_id" class="form-control">
                                                                    <option value="">Select Divission</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{ $division->id }}">
                                                                            {{ $division->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label>Select District *</label>
                                                            <div class="select-box">
                                                                <select name="district_id"
                                                                    class="form-control @error('district_id') is-invalid @enderror"
                                                                    disabled required>
                                                                    <option value="">select </option>
                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('district_id')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label>Select Upazila *</label>
                                                            <div class="select-box">
                                                                <select name="upazila_id"
                                                                    class="form-control @error('upazila_id') is-invalid @enderror"
                                                                    disabled required>
                                                                    <option value="" selected>Select</option>

                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('upazila_id')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h2 class="title title-simple text-uppercase text-left">Additional
                                                            Information</h2>
                                                        <label>Order Message (Optional)</label>
                                                        <textarea name="note" class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                                                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                                        <button class="btn btn-primary" id="nextchebtn" type="button">Next &
                                                            Checkout</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3-2">
                                            @include('frontend.inc.checkoutproductanddelivery')

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </form>
        </div>
    </main>
    <!-- End Main -->
@endsection
@push('styles')
    <style>
        .shop-table td {
            padding: 0 !important;
            border-top: 1px solid #e1e1e1;
            font-size: 1.4rem;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endpush

@push('scripts')
    @include('frontend.inc.cartcheckoutscript')

@endpush
