@extends('admin.layouts.app')
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
                    <div class="card-header border-bottom bg-transparent d-flex justify-content-between">
                        <h5 class="">Order Detaild: {{$orderItem->order_no}}</h5>
                        @if ($orderItem->accept_status == 1 && $orderItem->cancel_status == 0)
                            <div>
                                <button type="button" class="btn btn-success btn-sm">Accepted !</button>
                                <small class="text-muted mr-3">
                                    {{$orderItem->accepted_at->format('d M - H:m A')}}
                                </small>

                            </div>
                        @endif
                        @if ($orderItem->cancel_status == 1 && $orderItem->accept_status == 0)
                        <div>
                            <button type="button" class="btn btn-danger btn-sm">Canceled !</button>
                            <small class="text-danger mr-3">
                                {{$orderItem->canceled_at->format('d M - H:m A')}}
                            </small>
                        </div>
                        @endif
                        @if ($orderItem->accept_status == 0 && $orderItem->cancel_status == 0)
                            <div>
                                <a href="{{route('admin.cancelorder', $orderItem->id)}}" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Suer ? Cancel Order ?');">
                                    <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>
                                    Cancel Order !
                                </a>
                                <a href="{{route('admin.acceptorder', $orderItem->id)}}" class="btn btn-success btn-sm ml-2" onclick="return confirm('Suer ? Accept Order ?');">
                                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>
                                    Accept Order !
                                </a>
                            </div>
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
                                            <p class="mb-1">Order No.</p>
                                            <h5 class="mt-0">
                                                #{{$orderItem->order_number}}
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
                                                {{$orderItem->order->name}}
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
                                                {{Carbon\Carbon::parse($orderItem->created_at)->format('d M')}}
                                                <small class="text-muted">
                                                    {{Carbon\Carbon::parse($orderItem->created_at)->format('h:m A')}}
                                                </small>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="d-flex mb-2">
                                        <div class="me-2 align-self-center">
                                            <i class="ri-money-dollar-box-line h2 m-0 text-muted"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="mb-1">Payment Type</p>
                                            <h5 class="mt-0">
                                                @if ($orderItem->order->payment_type == 'cash')
                                                Cash On Delivery

                                                @endif
                                                @if ($orderItem->order->payment_type == 'online')
                                                <span class="badge badge-soft-success">Paid !</span>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            {{-- <h4 class="header-title mb-3">Items from Order {{$orderItem->order_no}}</h4> --}}
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table table-centered border table-nowrap mb-lg-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Discount</th>
                                                        <th>Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-3">
                                                                    <img src="{{$orderItem->product->img_small}}" alt="product-img" height="40">
                                                                </div>
                                                                <div class="flex-1">
                                                                    <h5 class="m-0">{{$orderItem->product->title}}</h5>
                                                                    <p class="mb-0">Size : Large</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{$orderItem->quantity}}</td>
                                                        <td>{{$orderItem->discount}}%</td>
                                                        <td>৳{{$orderItem->price}}</td>
                                                        <td>৳{{$orderItem->price * $orderItem->quantity}}</td>
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
                                                        <th scope="row">Price :</th>
                                                        <td>{{$orderItem->quantity}}x{{$orderItem->price}}</td>
                                                        <td>৳{{$orderItem->price * $orderItem->quantity}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Delivery :</th>
                                                        <td>{{$orderItem->quantity}}x{{$orderItem->delivery_cost}}</td>
                                                        <td>৳{{$orderItem->total_delivery_cost}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Toral: </th>
                                                        <th>৳{{$orderItem->price * $orderItem->quantity + $orderItem->total_delivery_cost}}</th>
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
                            <h4 class="font-15 mb-2">Shop Information</h4>

                            <div class="card p-2 mb-lg-0">
                                <table class="table table-borderless table-sm mb-0">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>:{{$orderItem->shop->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address :</th>
                                            <td>:{{$orderItem->shop->address}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile :</th>
                                            <td>:{{$orderItem->shop->mobile}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <h4 class="font-15 mb-2">Delivery Information</h4>

                            <div class="card p-2 mb-lg-0">
                                <div class="my-2 text-center">
                                    <i class="mdi mdi-bike h1 text-muted"></i>
                                </div>

                                <table class="table table-borderless table-sm mb-0">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>:{{$orderItem->order->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email :</th>
                                            <td>:{{$orderItem->order->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile :</th>
                                            <td>:{{$orderItem->order->phone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>
                            <h4 class="font-15 mb-2">Courier Service</h4>

                            <div class="card p-2 mb-lg-0">
                                <div class="text-center">
                                    <div class="my-2">
                                        <i class="mdi mdi-truck-fast h1 text-muted"></i>
                                    </div>
                                    <h5><b>{{$orderItem->courier_packege_desc}}</b></h5>
                                    <div class="mt-2 pt-1">
                                        <p class="mb-1"><span class="fw-semibold">Courier Service :</span> {{$orderItem->courier->name}}</p>
                                        {{-- <p class="mb-0"><span class="fw-semibold">Payment Mode :</span> COD</p> --}}
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
