@php
$serial = 1;
$subTotal = Cart::priceTotal();
$totalProduct = Cart::count();
$totalItem = count(Cart::content());
@endphp
@extends('frontend.layouts.app')

@section('content')
    <div class="checkout-area pt-5 pb-5">
        <div class="container">
            <div class="row">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Billing & Deliver
                            Address</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Checkout</button>
                    </li> --}}
                </ul>
                <form action="{{ route('pay') }}" method="POST">
                    @csrf
                    <input type="hidden" name="buytype" value="checkout">
                    <input type="hidden" name="total_item" value="{{ Cart::content()->count() }}">
                    <input type="hidden" name="total_prodcut" value="{{ Cart::count() }}">
                    <input type="hidden" name="total_product_price" value="{{ Cart::priceTotal() }}">
                    {{-- Delivery --}}
                    <input type="hidden" name="total_delivery_cost" value="">
                    <input type="hidden" name="total_amount" value="">


                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="billing-details">
                                        <h4>Billing Details </h4>

                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Full Name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email Address" value="{{ $user->email }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Mobile No.</label>
                                                    <input type="text" class="form-control" name="mobile"
                                                        placeholder="Enter Your Mobile Number" value="{{ $user->mobile }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Zip code</label>
                                                    <input type="text" class="form-control" name="zip"
                                                        placeholder="Enter Your Zip Code">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="">Delivery Address</label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Enter Your Address" value="{{ $user->address }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Order Message (Optional) </label>
                                            <textarea name="note" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="location-details billing-details">
                                        <h4>Please Select Location For deliver service</h4>

                                        <div class="form-group">
                                            <label for="">Select Division</label>
                                            <select name="division_id" class="form-select form-control">
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select District </label>
                                            <select name="district_id" class="form-select">
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Select Upazila </label>
                                            <select name="upazila_id" class="form-select">
                                            </select>
                                        </div>

                                    </div>
                                    {{-- <div class="location-details">
                                    <button type="button" class="btn btn-secondary mt-4">Next</button>
                                </div> --}}
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link " style="background-color:rgb(245, 26, 26); color:#fff" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Checkout</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-xl-8  col-lg-8 ">
                                    <div class="cart-list">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.N</th>
                                                    <th scope="col">PRODUCT</th>
                                                    <th scope="col">PHOTO</th>
                                                    <th scope="col">PRICE</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">Delivery</th>
                                                    <th scope="col">Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cartItems as $item)
                                                    <input type="hidden" name="courier_id[{{ $item->id }}]"
                                                        value="">
                                                    <input type="hidden"
                                                        name="courier_packege_desc[{{ $item->id }}]" value="">
                                                    <input type="hidden" name="delivery_cost[{{ $item->id }}]"
                                                        value="">
                                                    <tr>
                                                        <td>{{ $serial++ }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td><img src="{{ $item->options->photo }}"
                                                                style="width:auto;height:50px" alt="">
                                                        </td>
                                                        <td>{{ $item->qty }} x ৳{{ $item->price }}</td>
                                                        <td><strong>৳{{ $item->subtotal }}</strong></td>
                                                        <td>
                                                            <select name="deliver_system[]" class="form-select"
                                                                id="delivery{{ $item->id }}"
                                                                data-id={{ $item->id }} data-qty={{ $item->qty }}>

                                                            </select>
                                                            <small id="dtime{{ $item->id }}" ></small>
                                                        </td>
                                                        <td id="dcost{{ $item->id }}">৳0</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-4 ">
                                    <div class="card order-summery">
                                        <ul class="list-group list-group-flush">
                                            <h4>Summery</h4>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <h6>Total Product Price: </h6>
                                                <span>৳{{ $subTotal }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <h6>Total Delivery Cost: </h6>
                                                <span id="totaldelivercost">৳0</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <h6>Total</h6>
                                                <span id="totalAmount">৳{{ $subTotal }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <h6>Payment Method</h6>


                                                <div class="form-group">
                                                    {{-- <span><input type="radio" name="payment_type" value=""> None</span> --}}
                                                    <span><input type="radio" name="payment_type" value="cash"> Cash
                                                        On Delivery</span>
                                                    <span><input type="radio" name="payment_type" value="online">
                                                        Payment Now</span>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <span>
                                                        <input type="checkbox" name="terms-condition" value="1"> I
                                                        have read and agree to <a href="#">terms and conditions</a>
                                                        and <a href="#">privacy
                                                            policy</a>
                                                    </span>
                                                    <span>
                                                        <input type="checkbox" name="terms-condition2" value="1"> I
                                                        have read and agree to <a href="#">Return & Refund Policy</a>
                                                    </span>
                                                </div>

                                            </li>
                                        </ul>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-secondary">Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- checkout end -->
    </div>
@endsection

@push('script')
    @include('frontend.script.checkoutpagescript')
@endpush
