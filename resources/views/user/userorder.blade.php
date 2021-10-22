@extends('user.layouts.app')


@section('content')
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">My Order List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="row mb-2">
                                <div class="col-lg-8">
                                    <form class="d-flex flex-wrap align-items-center">
                                        <div class="d-flex flex-wrap align-items-center mb-2">
                                            <label for="inputPassword2" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center mx-sm-3 mb-2">
                                            <label for="status-select" class="me-2">Status</label>
                                            <div>
                                                <select class="form-select " id="status-select">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Paid</option>
                                                    <option value="2">Awaiting Authorization</option>
                                                    <option value="3">Payment failed</option>
                                                    <option value="4">Cash On Delivery</option>
                                                    <option value="5">Fulfilled</option>
                                                    <option value="6">Unfulfilled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-end">
                                        <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                                        <button type="button" class="btn btn-light mb-2">Export</button>
                                    </div>
                                </div><!-- end col-->
                            </div> --}}

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck">
                                                    <label class="form-check-label" for="orderlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>S.N</th>
                                            <th>Order ID</th>
                                            <th>Billing Name</th>
                                            <th>Date</th>
                                            <th>Payment</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck01">
                                                    <label class="form-check-label" for="orderlistCheck01">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{$serial++}}</td>
                                            <td>{{$order->order_no}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>
                                                <small class="text-muted">{{$order->created_at}}</small>
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="badge badge-soft-success">Paid</span>
                                                </div>
                                            </td>
                                            <td>
                                                ৳{{$order->total_price}}
                                            </td>
                                            <td>
                                                <div>
                                                    @if ($order->status == 0)
                                                        <span class="badge bg-danger">Pending</span></div>
                                                    @else
                                                        <span class="badge badge-soft-success">Aproved</span></div>
                                                    @endif

                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-sm"> View</a>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            {{-- <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div>
                                        <h5 class="font-14 text-body">Showing orders 1 to 10 of 112</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-sm-end">
                                        <ul class="pagination pagination-rounded mb-sm-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection
@endsection
