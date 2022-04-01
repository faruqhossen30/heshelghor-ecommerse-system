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
        <div class="page-content pt-7 pb-10 mb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step"><a href="#">Buy Now</a></h3>
            </div>
            <div class="container mt-7">
                <form action="{{route('pay')}}" method="POST" class="form">
                    @csrf

                    <input type="hidden" value="1" name="total_prodcut">
                    <input type="hidden" value="1" name="total_item">
                    <input type="hidden" value="0" name="delivery_cost">
                    <input type="hidden" value="{{$product->price}}" name="product_price">
                    <input type="hidden" value="0" name="total_price">


                    <div class="row">
                        <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                            <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                            <div class="row">
                                <div class="col">
                                    <label>Full Name *</label>
                                    <input type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" />
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
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" required />
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
                                    <input value="{{ $user->mobile }}" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                         />
                                    <div class="text-danger">
                                        @error('mobile')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <label>Email Address *</label>
                            <input type="text" value="{{ $user->email }}" class="form-control" name="email"
                                 />
                            <div>
                                <label>Select Divission *</label>
                                <div class="select-box">
                                    <select name="division_id" class="form-control" >
                                        <option value="" >Select Divission</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label>Select District *</label>
                                <div class="select-box">
                                    <select name="district_id" class="form-control @error('district_id') is-invalid @enderror" disabled required>
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
                                    <select name="upazila_id" class="form-control @error('upazila_id') is-invalid @enderror" disabled required>
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
                            <label>Order Message (Optional)</label>
                            <textarea name="message" class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                                placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                        <aside class="col-lg-5 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                                <div class="summary pt-5">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                                        <img src="{{$product->img_small}}" class="img-thumbnail" style="max-width: 100px; max-height:150px">

                                    </div>
                                    <table class="table order-table">

                                        <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td>{{ $product->title }}</td>
                                                    <td>1 x ৳{{ $product->price }}</td>
                                                    <td>৳{{ $product->price }}</td>
                                                </tr>
                                            <hr>
                                            <tr>
                                                <td class="text-start" colspan="2">
                                                    <h6>Sub total:</h6>
                                                </td>
                                                <td class="text-end" colspan="2">
                                                    <h6>৳<span id="sub_total">{{ $product->price }}</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" colspan="2">
                                                    <h6>Total Item: </h6>
                                                </td>
                                                <td class="text-end" colspan="2">
                                                    <h6><span id="product_quantity">1</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" colspan="2">
                                                    <h6>Delivery Cost:</h6>
                                                </td>
                                                <td class="text-end" colspan="2">
                                                    <h6>৳<span id="delivery_charge">0</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start" colspan="2">
                                                    <h6>Total:</h6>
                                                </td>
                                                <td class="text-end" colspan="2">
                                                    <h6>৳<span id="total_product_price">{{ $subTotal }}</span></h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="shipping-address">
                                        <label>Delivery System<strong></strong></label>
                                        <div class="select-box">
                                            <select name="delivery_system" class="form-control @error('delivery_system') is-invalid @enderror" required>
                                                <option value="" >Select one</option>
                                                @foreach ($deliverysystems as $system)
                                                    <option value="{{ $system->id }}">{{ $system->name }} -
                                                        ৳{{ $system->price }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('delivery_system')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" value="" name="delivery_system_name">
                                        <input type="hidden" value="" name="payment_method_name">

                                    </div>
                                    <div class="">
                                        <label>Payment Method<strong></strong></label>
                                        <div class="select-box">
                                            <select name="payment_method_id" class="form-control @error('payment_method_id') is-invalid @enderror" required>
                                                <option value="" >Select one</option>
                                                @foreach ($pamymentmethods as $system)
                                                    <option value="{{ $system->id }}" name="welcome" >{{ $system->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('payment_method_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div id="payment_img">
                                                <img src="{{asset('frontend/images/walletmix2.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-checkbox mt-4 mb-5">
                                        <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                            name="terms-condition" value="1" />
                                        <label class="form-control-label" for="terms-condition">
                                            I have read and agree to the website <a href="#">terms and conditions </a>*
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
    <script>
        $(function() {
            var division = $('select[name=division_id]');
            var district = $('select[name=district_id]');
            var upazila = $('select[name=upazila_id]');

            // For District
            division.change(function() {
                district.removeAttr('disabled');
                var divisionID = $(this).val();
                if (divisionID) {
                    $.get(`{{ url('/getdistrict/${divisionID}') }}`, function(data, status) {
                        district.empty();
                        if (data) {
                            data.forEach(function(row) {
                                district.append(
                                    `<option selected value="${row.id}">${row.name}</option>`
                                );
                            });
                        }
                    });
                }

            });

            // For Upazilla
            district.change(function() {
                upazila.removeAttr('disabled');
                var districtID = $(this).val();
                if (districtID) {
                    $.get(`{{ url('/getupazila/${districtID}') }}`, function(data, status) {
                        upazila.empty();
                        if (data) {
                            data.forEach(function(row) {
                                upazila.append(
                                    `<option selected value="${row.id}">${row.name}</option>`
                                );
                            });
                        }
                    });
                }
            });

        });

        // For Price Calculation
        var sub_total = $('#sub_total');
        var product_quantity = $('#product_quantity');
        var productNumber = parseInt(product_quantity.text())
        var delivery_charge = $('#delivery_charge');
        var total_product_price = $('#total_product_price');

        // For Hidden input
        var delivery_cost = $('input[name="delivery_cost"]');
        var total_price = $('input[name="total_price"]');
        var delivery_system_name = $('input[name="delivery_system_name"]');


        $(document).on('change', 'select[name="delivery_system"]', function() {
            var deliverySystemId = $('select[name="delivery_system"]').val();
            if (deliverySystemId) {
                $.get(`{{ url('deliverycost/${deliverySystemId}') }}`, function(data, status) {
                    if (data) {
                        console.log(data);
                        delivery_system_name.val(data.name);
                        // console.log(delivery_system_name.val());
                        // console.log(payment_system_name.val());
                        delivery_cost.val(data.price *productNumber); // for hidden input
                        delivery_charge.text(data.price * productNumber); // For Show calculate
                        totalAmount();
                    }
                });
            };

        });
        // claculate
        function totalAmount() {
            var inTotal = parseFloat(sub_total.text()) + parseFloat(delivery_charge.text());
            var sum  = inTotal.toFixed(2)
            total_price.val(sum);
            total_product_price.html(sum);
        }


        var payment_method_name = $('input[name="payment_method_name"]');
        var payment_img = $('#payment_img');
        payment_img.hide()

        $(document).on('change', 'select[name="payment_method_id"]', function() {
            var payment_method_id = $('select[name="payment_method_id"]').val();
            payment_img.hide()
            if (payment_method_id) {
                // console.log(payment_method_id);
                $.get(`{{ url('paymentsystemname/${payment_method_id}') }}`, function(data, status) {
                    if (data) {
                        // console.log(data);
                        payment_method_name.val(data.name)
                    }
                });
                // Online payment
                $.get(`setting/setting-payment-system`, function(data, status) {
                    if (data) {
                        data.map(function(d){
                            if(payment_method_id == d.payment_method_id){
                                payment_img.show();
                            }
                        });

                    }
                });
            };


        });
    </script>
@endpush