@extends('deliveryman.layouts.app')
@section('content')
<div class="content">
    <!-- Start Content-->
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom bg-transparent">
                        <h5 class="header-title mb-0">Order Detaild: {{$product->orderitem->order_number}}
                        <div class="float-end">
                            @if ($product->accept_status == 1)
                        <span class="btn btn-success btn-sm">Accepted</span>
                        @endif
                        @if ($product->accept_status == 0)
                            <a href="{{route('deliveryman.stack.product.accept', $product->id)}}" class="btn btn-warning btn-sm" onclick="return confirm('Suer ! Accept for collect product ?');">Accept Now !</a>
                        @endif
                        </div>
                    </h5>

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
                                            <p class="mb-1">Order No.</p>
                                            <h5 class="mt-0">
                                                #{{$product->orderitem->order_number}}
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
                                                {{$product->deliveryaddress->name}}
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
                                                {{Carbon\Carbon::parse($product->created_at)->format('d M')}}
                                                <small class="text-muted">
                                                    {{Carbon\Carbon::parse($product->created_at)->format('h:m A')}}
                                                </small>
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
                            <h4 class="header-title mb-3">Items from Order {{$product->order_no}}</h4>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table table-centered border table-nowrap mb-lg-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>commission</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-3">
                                                                    <img src="{{asset('uploads/product/'.$product->product->photo)}}" alt="product-img" height="40">
                                                                </div>
                                                                <div class="flex-1">
                                                                    <h5 class="m-0">{{$product->product->title}}</h5>
                                                                    <p class="mb-0">Size : Large</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{$product->orderitem->quantity}}</td>
                                                        <td>৳{{$product->commission}}</td>
                                                        <td>৳{{$product->total_commission}}</td>
                                                    </tr>

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
                                                        <th colspan="3">Order summary</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Merchant :</th>
                                                        <td>{{$product->quantity}}x{{$product->merchant_price}}</td>
                                                        <td>৳{{$product->merchant_price_total}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Delivery :</th>
                                                        <td>{{$product->quantity}}x{{$product->delivery_cost}}</td>
                                                        <td>৳{{$product->total_delivery_cost}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Toral: </th>
                                                        <th>৳110</th>
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
                            <h4 class="font-15 mb-2">
                                <i class="mdi mdi-bike-fast h4 text-muted"></i>
                                Shop  Address</h4>

                            <div class="card p-2 mb-lg-0">
                                <table class="table table-borderless table-sm mb-0">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Shop Name:</th>
                                            <td>{{$product->shop->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address :</th>
                                            <td>{{$product->shop->address}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile :</th>
                                            <td>01xxxxxxxxxxx</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <h4 class="font-15 mb-2">
                                <i class="mdi mdi-gift h4 text-muted"></i>
                                Point Manager Office</h4>

                            <div class="card p-2 mb-lg-0">

                                <table class="table table-borderless table-sm mb-0">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Name:</th>
                                            <td>{{$product->point->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address:</th>
                                            <td>{{$product->point->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone :</th>
                                            <td>{{$product->point->mobile}}</td>
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
