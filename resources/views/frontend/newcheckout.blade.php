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
                                <tr>
                                    <th scope="row">{{ $serial++ }}</th>
                                    <td>{{ $cartItem->name }}</td>
                                    <td><img src="" alt="Photo"></td>
                                    <td>{{ $cartItem->qty }}</td>
                                    <td>৳{{ $cartItem->price }}</td>
                                    <td>৳{{ $cartItem->subtotal }}</td>
                                    {{-- Delivery --}}
                                    <td id="division{{ $cartItem->id }}">

                                        <button onclick="loadDivision({{ $cartItem->id }});">Select</button>
                                        {{-- <select class="form-select">
                                            <option selected>Select </option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select> --}}
                                    </td>
                                    <td>Jessore</td>
                                    <td>Sadar</td>
                                    <td>Heshel</td>
                                    <td>35</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr class="text-center">
                                <th scope="col" colspan="5" class="text-right">Product Price =</th>
                                <th scope="col" colspan="1" class="text-left">{{ $subTotal }}</th>
                                <th scope="col" colspan="4" class="text-right">Delivery Price =</th>
                                <th scope="col" colspan="1">200TK</th>
                            </tr>
                            {{-- <tr>
                                <th scope="col" colspan="10">Total Payable Price</th>
                                <th scope="col" colspan="1">23423Tk</th>
                            </tr> --}}
                        </thead>
                    </table>
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
        function loadDivision(data) {
            let division = $(`#division${data}`)

            // get Division
            $.ajax({
                url: `/ajax/check-courier-division`,
                method: 'GET',
                data: {
                    id:data
                },
                success(data) {
                    division.empty()
                    division.append(data)
                    // console.log('checkout page = ', data);

                },
                error() {
                    console.log('courier error');
                },
            });

        }

        function loadDistrict(){
            console.log('district')
        }

        $(document).ready(function() {






        }); // Document ready
    </script>
@endpush
