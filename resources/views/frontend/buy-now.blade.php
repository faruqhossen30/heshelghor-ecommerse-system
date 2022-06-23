@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area no-padding">
    <div class="container">
        <class class="row">
            <div class="col-xl-6 offset-xl-3 offset-lg-3 col-lg-6">
                <div class="breadcrumb-search-bar text-center">
                    <h2 class="text-white">Buy Now</h2>
                </div>
            </div>
        </class>
    </div>
</div>
<!-- breadcrumb end -->

<!-- cart start -->
<div class="cart-area pt-5 pb-5">
    <div class="container">
        <form action="{{route('buynowpay')}}" method="post">
            @csrf
            <input type="hidden" name="buytype" value="buynow">
            {{-- Heshelghor field --}}
            <input type="hidden" name="total_item" value="1">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="product_price" value="{{ $product->price }}" data-prdoduct_upazila_id="{{ $product->upazila_id }}">
            <input type="hidden" name="total_product_price" value="{{ $product->price }}">
            <input type="hidden" name="delivery_cost" value="0">
            <input type="hidden" name="total_delivery_cost" value="">
            {{-- Order Item --}}

            <input type="hidden" name="courier_id" value="1">
            <input type="hidden" name="courier_packege_desc" value="none">
            {{-- SSL --}}
            <input type="hidden" value="0" name="total_amount">


            <div class="row">
                <div class="col-xl-7 col-md-7">
                    <div class="billing-details">
                        <h4>Billing Details </h4>
                        <div class="form-group">
                            <label for="" class="d-flex"><strong>Full Name</strong><span class="text-danger">*</span></label>
                            <input value="{{$user->name}}" type="text" class="form-control" name="name" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Email Address</strong><span class="text-danger">*</span></label>
                            <input value="{{$user->email}}" type="email" class="form-control" name="email" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Delivery Address</strong><span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><strong>Mobile No</strong><span class="text-danger">*</span></label>
                                    <input value="{{$user->mobile}}" type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><strong>Zip code</strong></label>
                                    <input type="text" class="form-control" name="zip" placeholder="Enter Your Zip Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="location-details billing-details">
                        <h4>Please Select Location For deliver service</h4>
                        <div class="form-group">
                            <label for=""><strong>Select Division</strong><span class="text-danger">*</span></label>
                            <select name="division_id" class="form-select form-control">
                                <option value="" selected>Select</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Select District</strong><span class="text-danger">*</span></label>
                            <select name="district_id" class="form-select" disabled>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Select Upazila</strong><span class="text-danger">*</span></label>
                            <select name="upazila_id" class="form-select">
                            </select>
                        </div>
                    </div>
                    <div class="location-details">
                        <h4>Additional Information</h4>
                        <div class="form-group">
                            <label for=""><strong>Order Message (Optional)</strong></label>
                            <textarea name="note" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-5">
                    <div class="card order-summery">
                        <ul class="list-group list-group-flush">
                            <h4>Your Order</h4>
                            <li class="list-group-item d-flex justify-content-between">
                                <h6>{{$product->title}}</h6>
                                <span><img data-src="{{$product->img_small}}" class="lozad" alt="" style="height:60px; width: auto;"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span style="width: 50%;font-weight: 400;">{{$product->title}}</span>
                                <span style="width: 25%;"><span id="pqty">1</span> x ৳{{$product->price}}</span>
                                <span style="width: 25%;text-align: right;" > ৳<span id="total_product_price">{{$product->price}}</span></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <h6>Delivery Cost: </h6>
                                {{-- <span>1x৳0</span> --}}
                                <p>৳<span id="totalDeliverCost">0</span></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <h6>total</h6>
                                <p>৳<span id="intotal">{{$product->price}}</span></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <h6>Total Quantity</h6>
                                <div class="quantity product_quantity">
                                    <button type="button" class="btn btn-light" id="qtyminusbtn"><span><i class="fa-solid fa-minus"></i></span></button>
                                    <input name="total_prodcut" max="5" min="1" type="text" class="quantity__input" value="1">
                                    <button type="button" class="btn btn-light" id="qtyplusbtn"><span><i class="fa-solid fa-plus"></i></span></button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <h6>color</h6>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    @foreach ($product->colors as $color)
                                    <input value="{{ $color->color->name }}" type="radio" class="btn-check" name="varient[]" id="color1{{$color->id}}" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="color1{{$color->id}}">{{ $color->color->name }}</label>
                                    @endforeach
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <h6>Size</h6>
                                <div class="btn-group " style="align-items:center" role="group" aria-label="Basic radio toggle button group2">
                                    @foreach ($product->sizes as $size)
                                    {{-- <option value="size-{{ $size->size->name }}">
                                    {{ $size->size->name }}</option> --}}
                                    <input value="{{ $size->size->name }}" type="radio" class="btn-check" name="varient[]" id="size{{$size->id}}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="size{{$size->id}}">{{ $size->size->name }}</label>
                                    @endforeach
                                </div>
                            </li>
                            <li class="" id="courierserviceshow">

                            </li>
                            <li class="list-group-item">
                                <h6>Payment Method</h6>
                                <div class="form-group">
                                    <span><input type="radio" name="payment_type" value="cash" id=""> Cash On Delivery</span>
                                    <span><input type="radio" name="payment_type" value="online" id=""> Payment Now </span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <span> <input type="checkbox" name="" id=""> I have read and agree to <a href="#">terms and conditions</a> and <a href="#">privacy
                                            policy</a></span>
                                    <span><input type="checkbox" name="" id=""> I have read and agree to <a href="#">Return &amp; Refund Policy</a></span>
                                </div>
                            </li>
                        </ul>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-secondary">processed to order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- cart end -->

@endsection

@push('script')
<script>
    $(document).ready(function() {
        var division = $('select[name=division_id]');
        var district = $('select[name=district_id]');
        var upazila = $('select[name=upazila_id]');
        let prdoduct_upazila_id = $('input[name="product_price"]').data('prdoduct_upazila_id')

        // In Division
        $(document).on('change', 'select[name=division_id]', function() {
            district.removeAttr('disabled');
            district.empty();
            upazila.empty();
            var divisionID = $(this).val();

            if (divisionID) {
                // console.log(divisionID)
                district.append(
                    `<option selected>Select</option>`
                );
                $.ajax({
                    url: `/ajax/courier/getdistrictbydivisionid/${divisionID}`
                    , method: 'GET'
                    , success(data) {
                        // console.log(data);
                        data.forEach(function(row) {
                            district.append(
                                `<option value="${row.id}">${row.name}</option>`
                            );
                        });
                    }
                    , error() {
                        console.log('courier error');
                    }
                , });
            }
        }); // Division id change event

        // In District
        $(document).on('change', 'select[name=district_id]', function() {
            upazila.removeAttr('disabled');
            upazila.empty();
            var districtID = $(this).val();
            if (districtID) {
                upazila.append(
                    `<option selected>Select</option>`
                );
                $.ajax({
                    url: `/ajax/courier/getgetupazilabydistrictid/${districtID}`
                    , method: 'GET'
                    , success(data) {
                        // console.log(data);
                        data.forEach(function(row) {
                            upazila.append(
                                `<option value="${row.id}">${row.name}</option>`
                            );
                        });
                    }
                    , error() {
                        console.log('courier error');
                    }
                });
            }
        }); // District id change event

        // In Upazila
        $(document).on('change', 'select[name=upazila_id]', function() {
            // upazila.removeAttr('disabled');
            var upazilaid = $(this).val();
            if (upazilaid) {
                // console.log(upazilaid)

                $.ajax({
                    url: `/checkupazilawisecourierupalizalist/${upazilaid}`
                    , method: 'GET'
                    , data: {
                        prdoduct_upazila_id: prdoduct_upazila_id
                        , product_delivery_upazila_id: upazilaid
                        , product_weight: 1
                    }
                    , success(data) {
                        console.log('for courier list', data);
                        $('#courierserviceshow').empty()
                        $('#courierserviceshow').append(data).hide().fadeIn(1000);

                    }
                    , error() {
                        console.log('courier error');
                    }
                });
            }

        }); // Upazila id change event



        $(document).on('click', '#qtyplusbtn', function() {
            let maxval = $('input[name="total_prodcut"]').prop('max')
            let cval = $('input[name="total_prodcut"]').val()
            if (parseInt(maxval) > parseInt(cval)) {
                $('input[name="total_prodcut"]').val(function(i, oldval) {
                    return ++oldval;
                });
                totalAmount()
            }
        })
        $(document).on('click', '#qtyminusbtn', function() {
            let minval = $('input[name="total_prodcut"]').prop('min')
            let cval = $('input[name="total_prodcut"]').val()
            if (parseInt(minval) < parseInt(cval)) {
                $('input[name="total_prodcut"]').val(function(i, oldval) {
                    return --oldval;
                });
                totalAmount()
            }
        })

        $(document).on('change select', 'input[name="delivery_system"]', function() {
            totalAmount()
        });


        // claculate

        function totalAmount() {
            let product_price = $('input[name="product_price"]').val()
            let quantity = $('input[name="total_prodcut"]').val();
            let totalprice = parseInt(product_price) * parseInt(quantity)

            $('input[name="total_product_price"]').val(totalprice)

            let dcost = $('input[name="delivery_system"]:checked').val();
            if (dcost) {
                let tdcost = parseInt(dcost) * parseInt(quantity);
                $('input[name="delivery_cost"]').val(dcost);
                $('input[name="total_delivery_cost"]').val(tdcost);

                let totalAmount = parseInt(tdcost) + parseInt(totalprice)
                $('input[name="total_amount"]').val(totalAmount);

                $('#totalDeliverCost').html(tdcost);
                $('#pqty').html(quantity);
                $('#total_product_price').html(totalprice);
                $('#intotal').html(totalAmount);


                // console.log('courier ase')
                // console.log('dcost', dcost)
                // console.log('tdcost', tdcost)
                // console.log('totalAmount', totalAmount)
            } else {
                $('#pqty').html(quantity);
                $('#total_product_price').html(totalprice);
                $('#intotal').html(totalprice);
            }

        }






    }); // Document Ready

</Script>
@endpush
