@extends('admin.layouts.app')
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Order Detail</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom bg-transparent">
                            <span class="header-title mb-0">Order Detaild: {{$orderItem->order_no}}</span>
                            @if ($orderItem->order_status == 1)
                                <span><button type="button" class="btn btn-success btn-sm float-end">Approved !</button></span>
                            @endif
                            @if ($orderItem->order_status == 0)
                                <span><button class="btn btn-danger btn-sm float-end">Pending</button></span>
                            @endif

                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="d-flex mb-2">
                                            <div class="me-2 align-self-center">
                                                <i class="ri-hashtag h2 m-0 text-muted"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1">ORDER No.</p>
                                                <h5 class="mt-0">
                                                    {{$orderItem->order_no}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">

                                        <div class="d-flex mb-2">
                                            <div class="me-2 align-self-center">
                                                <i class="ri-user-2-line h2 m-0 text-muted"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1">Billing Name</p>
                                                <h5 class="mt-0">
                                                    {{$orderItem->deliveryaddress->name}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">

                                        <div class="d-flex mb-2">
                                            <div class="me-2 align-self-center">
                                                <i class="ri-calendar-event-line h2 m-0 text-muted"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1">Date</p>
                                                <h5 class="mt-0">
                                                    {{$orderItem->created_at}} <small class="text-muted">10:29 PM</small>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">

                                        <div class="d-flex mb-2">
                                            <div class="me-2 align-self-center">
                                                <i class="ri-map-pin-time-line h2 m-0 text-muted"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1">Tracking ID</p>
                                                <h5 class="mt-0">
                                                    123456789
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <h4 class="header-title mb-3">Items from Order {{$orderItem->order_no}}</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table table-centered border table-nowrap mb-lg-0">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Discount</th>
                                                            <th>Delivery Charge</th>
                                                            <th>Subtotal</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="me-3">
                                                                        <img src="{{asset('uploads/product/'.$orderItem->product->photo)}}" alt="product-img" height="40">
                                                                    </div>
                                                                    <div class="flex-1">
                                                                        <h5 class="m-0">{{$orderItem->product->title}}</h5>
                                                                        <p class="mb-0">Size : Large</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{$orderItem->price}}</td>
                                                            <td>{{$orderItem->quantity}}</td>
                                                            <td>{{$orderItem->discount}}%</td>
                                                            <td>৳{{$orderItem->total_delivery_cost}}</td>
                                                            <td>৳{{$orderItem->merchant_price_total}}</td>
                                                            <td>৳{{$orderItem->merchant_price_total}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end card -->

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div>
                                <h4 class="font-15 mb-2">Delivery Address</h4>

                                <div class="card p-2 mb-lg-0">

                                    <table class="table table-borderless table-sm mb-0">

                                        <tbody>
                                            <tr>
                                                <th colspan="2"><h5 class="font-15 m-0">{{$orderItem->deliveryaddress->name}}</h5></th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address:</th>
                                                <td>{{$orderItem->deliveryaddress->address}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email :</th>
                                                <td>{{$orderItem->deliveryaddress->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone :</th>
                                                <td>{{$orderItem->deliveryaddress->mobile}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4 class="font-15 mb-2">Merchant Info: </h4>

                                <div class="card p-2 mb-lg-0">
                                    <table class="table table-borderless table-sm mb-0">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Merchant Name:</th>
                                                <td>{{$orderItem->merchant->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email :</th>
                                                <td>{{$orderItem->merchant->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile :</th>
                                                <td>{{$orderItem->merchant->phone_number}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address :</th>
                                                <td>{{$orderItem->merchant->address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div>
                                <h4 class="font-15 mb-2">Delivery Info</h4>

                                <div class="card p-2 mb-lg-0">
                                    <div class="text-center">
                                        <div class="my-2">
                                            <i class="mdi mdi-truck-fast h1 text-muted"></i>
                                        </div>
                                        <h5><b>UPS Delivery</b></h5>
                                        <div class="mt-2 pt-1">
                                            <p class="mb-1"><span class="fw-semibold">Order ID :</span> xxxx048</p>
                                            <p class="mb-0"><span class="fw-semibold">Payment Mode :</span> COD</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>





        </div> <!-- container -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection

@push('css')
<!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<!-- third party js -->
<script src="{{ asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->
<script src="{{ asset('backend')}}/assets/js/pages/product-list.init.js"></script>

@endpush
