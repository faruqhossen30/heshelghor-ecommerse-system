@extends('user.layouts.app')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Product List</li>
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
                            <h5 class="header-title mb-0">Order {{$order->order_no}}</h5>
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
                                                <p class="mb-1">ID No.</p>
                                                <h5 class="mt-0">
                                                    {{$order->order_no}}
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
                                                    {{$order->deliveryaddress->name}}
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
                                                    {{$order->created_at}} <small class="text-muted">10:29 PM</small>
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
                                <h4 class="header-title mb-3">Items from Order {{$order->order_no}}</h4>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table table-centered border table-nowrap mb-lg-0">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orderItems as $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-3">
                                                                            <img src="{{asset('uploads/product/'.$item->product->photo)}}" alt="product-img" height="40">
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <h5 class="m-0">{{$item->product->title}}</h5>
                                                                            <p class="mb-0">Size : Large</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{$item->quantity}}</td>
                                                                <td>৳{{$item->price}}</td>
                                                                <td>৳{{$item->quantity * $item->price}}</td>
                                                                <td>
                                                                    @if ($item->order_status == 0)
                                                                    <span class="badge bg-danger">Pending</span></div>
                                                                    @else
                                                                        <span class="badge badge-soft-success">Aproved</span></div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>

                                            <div class="table-responsive">
                                                <table class="table table-centered border mb-0">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th colspan="2">Order summary</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Sub Total :</th>
                                                            <td>৳{{$order->product_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Shipping Charge :</th>
                                                            <td>৳{{$order->delivery_cost}}</td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th scope="row">Estimated Tax :</th>
                                                            <td>$12</td>
                                                        </tr> --}}
                                                        <tr>
                                                            <th scope="row">Total :</th>
                                                            <td>৳{{$order->total_price}}</td>
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
                                <h4 class="font-15 mb-2">Shipping Information</h4>

                                <div class="card p-2 mb-lg-0">

                                    <table class="table table-borderless table-sm mb-0">

                                        <tbody>
                                            <tr>
                                                <th colspan="2"><h5 class="font-15 m-0">{{$order->deliveryaddress->name}}</h5></th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address:</th>
                                                <td>{{$order->deliveryaddress->address}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile :</th>
                                                <td>{{$order->deliveryaddress->mobile}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4 class="font-15 mb-2">Billing  Information</h4>

                                <div class="card p-2 mb-lg-0">
                                    <table class="table table-borderless table-sm mb-0">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Payment Type:</th>
                                                <td>Credit Card</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Provider :</th>
                                                <td>Visa ending in 2851</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Valid Date :</th>
                                                <td>02/2021</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">CVV :</th>
                                                <td>xxx</td>
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
