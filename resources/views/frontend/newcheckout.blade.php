@php
$serial = 1;
$subTotal = Cart::priceTotal();
$totalProduct = Cart::count();
$totalItem = count(Cart::content());
@endphp

@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Your Cart page
@endsection

@section('content')
    <main class="main cart">
        <div class="page-content pt-7 pb-10">
            <div class="step-by pr-4 pl-4">
                <h3 class="title title-simple title-step active"><a href="{{ route('cart.page') }}">1. Shopping Cart</a>
                </h3>
                <h3 class="title title-simple title-step"><a href="{{ route('checkoutpage') }}">2. Checkout</a></h3>
                <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
            </div>
            <div class="container mb-2">
                <div class="row">
                    <p>Please Select deliver system for individual product.</p>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" colspan="6">Product Section</th>
                                <th scope="col" colspan="5">Delivery Section</th>
                            </tr>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Q.T</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                {{-- Delivery --}}

                                <th scope="col">Division</th>
                                <th scope="col">District</th>
                                <th scope="col">Upazila</th>
                                <th scope="col">Delivey</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $serial = 1;
                            @endphp
                            @foreach ($cartItems as $cartItem)
                                @php
                                    $product = App\Models\Product\Product::firstWhere('id', $cartItem->id);

                                    // $pickup = App\Models\Admin\Courier\CourierHasPickup::where('division_id', $product->upazila_id)->pluck('division_id')->unique();
                                    $delivery = App\Models\Admin\Courier\CourierHasDelivery::pluck('division_id')->unique();

                                    $divisions = App\Models\Admin\Location\Division::whereIn('id', $delivery)->get();
                                    $count = 0;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $serial++ }}</th>
                                    <td>{{ $cartItem->name }}</td>
                                    <td><img src="" alt="Photo"></td>
                                    <td>{{ $cartItem->qty }}</td>
                                    <td>৳{{ $cartItem->price }}</td>
                                    <td>৳{{ $cartItem->subtotal }}</td>
                                    {{-- Delivery --}}
                                    <td id="division">

                                        {{-- <button onclick="loadDivision({{ $cartItem->id }});">Select</button> --}}
                                        <select class="form-select " name="division" data-id="{{ $cartItem->id }}">
                                            <option selected>Select </option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select id="district{{ $cartItem->id }}" class="form-select" name="district">
                                            <option selected>Select </option>

                                        </select>
                                    </td>
                                    <td>
                                        <select id="upazila{{ $cartItem->id }}" class="form-select" name="upazila">
                                            <option selected>Select </option>

                                        </select>
                                    </td>
                                    <td>
                                        <select id="delivery{{ $cartItem->id }}" class="form-select" name="upazila">
                                            <option selected>Select </option>

                                        </select>
                                    </td>
                                    <td id="price{{ $cartItem->id }}" class="test">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr class="text-center">
                                <th scope="col" colspan="5" class="text-right">Product Price =</th>
                                <th scope="col" colspan="1" class="text-left">{{ $subTotal }}</th>
                                <th scope="col" colspan="4" class="text-right">Delivery Price =</th>
                                <th scope="col" colspan="1" id="deliveyPriciTable">৳0</th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="11"> </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-right mt-3">Total :	৳0</h6>
                            <p class="text-right mt-0">Estimate delivey time 3 to 5 days.</p>


                        </div>
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

            let division = $('select[name=division]');

            $(document).on('change', 'select[name=division]', function() {
                let divisionid = $(this).val();
                var productid = $(this).data('id');

                if (divisionid) {
                    $.ajax({
                        url: `/ajax/courier/getdistrictbydivisionid/${divisionid}`,
                        method: 'GET',
                        success(data) {
                            $(`#district${productid}`).empty()
                            $(`#district${productid}`).append(
                                `<option selected>Select</option>`
                            );
                            // console.log(data);
                            data.forEach(function(row) {
                                $(`#district${productid}`).append(
                                    `<option value="${row.id}">${row.name}</option>`
                                );
                            });
                        },
                        error() {
                            console.log('courier error');
                        },
                    });
                } // division ajax

                $(document).on('change', `#district${productid}`, function() {
                    let districtid = $(this).val();
                    // console.log(districtid)
                    if (districtid) {

                        $.ajax({
                            url: `/ajax/courier/getgetupazilabydistrictid/${districtid}`,
                            method: 'GET',
                            success(data) {
                                // console.log(data);
                                $(`#upazila${productid}`).empty()
                                $(`#upazila${productid}`).append(
                                    `<option selected>Select</option>`
                                );
                                data.forEach(function(row) {
                                    $(`#upazila${productid}`).append(
                                        `<option value="${row.id}">${row.name}</option>`
                                    );
                                });
                            },
                            error() {
                                console.log('courier error');
                            },
                        });
                    }

                })

                $(document).on('change', `#upazila${productid}`, function() {
                    let upazilaid = $(this).val();
                    // console.log(districtid)
                    if (upazilaid) {

                        $.ajax({
                            url: `/ajax/checkupazilawisecourierupalizalistforcheckoutpage/${upazilaid}`,
                            method: 'GET',
                            data: {
                                productid: productid,
                                product_delivery_upazila_id: upazilaid
                            },
                            success(data) {
                                // console.log(data);
                                $(`#delivery${productid}`).empty()
                                $(`#delivery${productid}`).append(
                                    `<option selected>Select</option>`)
                                $(`#delivery${productid}`).append(data)
                            },
                            error() {
                                console.log('courier error');
                            },
                        });
                    }

                })
                // For Price
                $(document).on('change', `#delivery${productid}`, function() {
                    let price = $(this).val();
                    // console.log(districtid)
                    if (price) {
                        $(`#price${productid}`).empty();
                        $(`#price${productid}`).append(
                            `<span class="deliveryprice" data-price="${price}">৳${price}</span>`
                        );
                        // console.log(price)
                        deliveryprice();
                    }

                })

                function deliveryprice() {
                    var sum = 0;

                    $('.test').children('.deliveryprice').
                    each(function() {
                        sum += Number($(this).data('price'));
                    });
                    $('#deliveyPriciTable').html('৳'+sum)

                    console.log(sum)
                }


            }) // Division change event



            var testdata = <?php echo $subTotal ?>;


            console.log('on test', )

        }); // Document ready
    </script>
@endpush
