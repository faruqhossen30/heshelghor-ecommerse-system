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
        <div class="page-content pb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step"><a href="#">Buy Now</a></h3>
            </div>
            <div class="container">
                <form action="{{ route('buynowpay') }}" method="POST" class="form">
                    @csrf
                    <input type="text" name="product" data-price="{{ $product->price }}"
                        data-prdoduct_upazila_id="{{ $product->upazila_id }}">
                    <input type="hidden" name="buytype" value="buynow">
                    {{-- Heshelghor field --}}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                    <input type="hidden" name="total_product_price" value="{{ $product->price }}">
                    <input type="hidden" name="total_item" value="1">
                    <input type="hidden" name="delivery_cost" value="0">
                    <input type="hidden" name="total_delivery_cost" value="">
                    {{-- Order Item --}}

                    <input type="hidden" name="courier_id" value="1">
                    <input type="hidden" name="courier_packege_desc" value="paperfly">
                    {{-- SSL --}}
                    <input type="hidden" value="0" name="total_amount">




                    <div class="row">
                        <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                            <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                            <div class="row">
                                <div class="col">
                                    <label>Full Name *</label>
                                    <input type="text" value="{{ $user->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name" />
                                    <div class="text-danger">
                                        @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Delivery Address *</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" required />
                                    <div class="text-danger">
                                        @error('address')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Email Address *</label>
                                    <input type="text" value="{{ $user->email }}" class="form-control" name="email" />
                                </div>
                                <div class="col-xs-6">
                                    <label>Mobile No *</label>
                                    <input value="{{ $user->mobile }}" type="text"
                                        class="form-control @error('mobile') is-invalid @enderror" name="mobile" />
                                    <div class="text-danger">
                                        @error('mobile')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <h2 class="title title-simple text-uppercase text-left">Please Select Location For deliver
                                service</h2>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Select Divission *</label>
                                    <div class="select-box">
                                        <select name="division_id" class="form-control" required>
                                            <option value="">Select Divission</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">

                                    <label>Select District *</label>
                                    <div class="select-box">
                                        <select name="district_id"
                                            class="form-control @error('district_id') is-invalid @enderror" disabled
                                            required>
                                            <option value="">select </option>
                                        </select>
                                        <div class="text-danger">
                                            @error('district_id')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label>Select Upazila *</label>
                                <div class="select-box">
                                    <select name="upazila_id" class="form-control @error('upazila_id') is-invalid @enderror"
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

                            <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                            <label>Order Note/Message (Optional)</label>
                            <textarea name="note" class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                                placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                        <aside class="col-lg-5 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                                <div class="summary pt-5">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                                        <img src="{{ $product->img_small }}" class="img-thumbnail"
                                            style="max-width: 100px; max-height:150px">

                                    </div>
                                    <table class="table order-table">

                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>{{ $product->title }}</td>
                                                <td class="text-bold"> <span id="pqty">1</span> x ৳{{ $product->price }}</td>
                                                {{-- <td>৳{{ $product->price }}</td> --}}
                                            </tr>
                                            <hr>
                                            <tr>
                                                <td class="text-start" colspan="2">
                                                    <h6>Product Price:</h6>
                                                </td>
                                                <td class="text-end" colspan="2">
                                                    <h6>৳<span id="total_product_price">{{ $product->price }}</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" colspan="1">
                                                    <h6>Delivery Cost:</h6>
                                                </td>
                                                {{-- <td class="text-start" colspan="1">
                                                    <h6>2x100</h6>
                                                </td> --}}
                                                <td class="text-end"  colspan="2">
                                                    <h6>৳<span id="totalDeliverCost">0</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" colspan="2">
                                                    <h6>Total:</h6>
                                                </td>
                                                <td class="text-end" colspan="2">
                                                    <h6>৳<span id="intotal">{{ $product->price }}</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="mt-3">Total Quantity</h6>
                                                </td>
                                                <td colspan="2">
                                                    <div class="d-flex mt-2">
                                                        <button type="button" style="" class="border" id="qtyminusbtn">-</button>
                                                        <input name="total_prodcut" value="1" class="" type="number" style="text-align: center"
                                                            min="1" max="{{$product->quantity}}" >
                                                        <button type="button" style="" class="border" id="qtyplusbtn">+</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if (count($product->colors)>0)
                                            <tr>
                                                <td class="text-start" colspan="4">
                                                    <h6 class="m-2 ">Color:</h6>
                                                    <select name="varient[]" class="form-control">
                                                        <option value="">Select Color</option>
                                                        @foreach ($product->colors as $color)
                                                            <option value="color-{{ $color->color->name }}">
                                                                {{ $color->color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            @endif
                                            @if (count($product->sizes)>0)
                                            <tr>
                                                <td class="text-start" colspan="4">
                                                    <h6 class="m-2 ">Size:</h6>
                                                    <select name="varient[]" class="form-control">
                                                        <option value="">Select Size</option>
                                                        @foreach ($product->sizes as $size)
                                                            <option value="size-{{ $size->size->name }}">
                                                                {{ $size->size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            @endif
                                            <tr class="sumnary-shipping shipping-row-last" id="couriertablerow">

                                            </tr>
                                            <tr class="sumnary-shipping shipping-row-last">
                                                <td colspan="2">
                                                    <h4 class="summary-subtitle">Payment Method</h4>
                                                    <ul>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="flat_rate" name="payment_type"
                                                                    value="cash" class="custom-control-input">
                                                                <label class="custom-control-label" for="flat_rate">Cash On
                                                                    Delivery</label>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="free-shipping" name="payment_type"
                                                                    value="online" class="custom-control-input">
                                                                <label class="custom-control-label"
                                                                    for="free-shipping">Payment Now </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>

                                    <div>
                                        <input type="hidden" value="" name="delivery_system_name">
                                        <input type="hidden" value="" name="payment_method_name">

                                    </div>

                                    <div>
                                        @error('total_amount')
                                            <span class="text-danger">Please select location and deliver system for complete
                                                order.</span>
                                        @enderror
                                        @error('delivery_system')
                                            <span class="text-danger">Delivery system not found.</span>
                                            <br>
                                            <span class="text-danger">Please select location and deliver system for complete
                                                order.</span>
                                        @enderror
                                    </div>
                                    <div class="form-checkbox mt-4 mb-5">
                                        <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                            name="terms-condition" value="1" required />
                                        <label class="form-control-label" for="terms-condition">
                                            I have read and agree to <a href="{{ route('termsandcondition') }}"
                                                class="text-primary" target="_blank">terms and conditions </a> and
                                            <a href="{{ route('privacypolicy') }}" class="text-primary"
                                                target="_blank">privacy policy</a>
                                        </label>
                                    </div>
                                    <div class="form-checkbox mt-4 mb-5">
                                        <input type="checkbox" class="custom-checkbox" id="terms-condition2"
                                            name="terms-condition2" value="1" required />
                                        <label class="form-control-label" for="terms-condition2">
                                            I have read and agree to <a href="{{ route('returnpolicy') }}"
                                                class="text-primary" target="_blank">Return & Refund Policy</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-order">Place Order</button>
                                </div>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endpush

@push('scripts')
@include('frontend.inc.buynowscript')
@endpush
