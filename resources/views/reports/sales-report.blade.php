@extends('marchant.layouts.app')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('sales.list.currentDate') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Find sales list</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ml-2">
                            <label class="" for="created_at">Current
                                date</label>
                            <input type="date" name="created_at" class="form-control " id="created_at" value="{{  $_GET['created_at'] ?? '' }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Find list</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="datefilterModal" tabindex="-1" aria-labelledby="dateByfilterModelLable" aria-hidden="true">
        <div class="modal-dialog">
           <form action="{{ route('sales.list.date') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dateByfilterModelLable">Find sales list</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                            <div class="row">

                                <div class="form-group ml-2">
                                    <label class="" for="from_date">From date</label>
                                    <input type="date" name="from_date" class="form-control " id="from_date"
                                        placeholder="From" value="{{ $_GET['created_at'] ?? '' }}">
                                </div>

                                <div class="form-group ml-2">
                                    <label class="" for="to_date">To date</label>
                                    <input type="date" name="to_date" class="form-control" id="to_date"
                                        placeholder="To" value="{{ $_GET['created_at'] ?? '' }}">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Find list</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Product List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">HeshelGhor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Order List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between  ">
                                <ul class="list-group list-group-horizontal btn-group-sm  mt-3"  style="align-items: center; margin:0 auto">
                                    <a href="{{ route('sales.report') }}"
                                        class="list-group-item btn btn-primary text-dark btn-sm @if (request()->routeIs('sales.report')) text-white  active @endif">All
                                        Time</a>
                                    <a href="{{ route('sales.list.week') }}"
                                        class="list-group-item btn btn-primary text-dark btn-sm @if (request()->routeIs('sales.list.week')) text-white active @endif ">This
                                        week</a>
                                    <a href="{{ route('sales.list.month') }}"
                                        class="list-group-item btn btn-primary text-dark btn-sm @if (request()->routeIs('sales.list.month')) text-white active @endif ">This
                                        Month</a>
                                    <a href="{{ route('sales.list.currentDate') }}"
                                        class="list-group-item btn btn-primary text-dark  @if (request()->routeIs('sales.list.currentDate')) text-white active @endif "
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Find current Date
                                    </a>
                                    <a href="{{ route('sales.list.date') }}"
                                        class="list-group-item btn btn-primary text-dark  @if (request()->routeIs('sales.list.date'))  text-white active @endif "
                                        data-bs-toggle="modal" data-bs-target="#datefilterModal">
                                        Filter date
                                    </a>
                                </ul>
                            </div>



                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="basic-datatable"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check mb-0 font-16">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="productlistCheck">
                                                    <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all"> Order Date</th>
                                            <th class="all">Order No</th>
                                            <th>Product Name</th>
                                            <th>Subtotal</th>
                                            <th>Shipping</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($orderitems as $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-0 font-16">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="productlistCheck1">
                                                        <label class="form-check-label"
                                                            for="productlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M') }}
                                                    <small class="text-muted">
                                                        {{ Carbon\Carbon::parse($item->created_at)->format('h:m A') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    #{{ $item->order_number }}
                                                </td>
                                                <td>
                                                    {{ $item->product->title }} <strong> x</strong> {{ $item->quantity }}
                                                </td>

                                                <td>
                                                    {{ $item->price * $item->quantity }}
                                                </td>
                                                <td>
                                                    {{ $item->delivery_cost }}
                                                </td>


                                                <td>
                                                    {{ $item->price * $item->quantity + $item->delivery_cost }}
                                                </td>



                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"> <strong>Total <b>:</b></strong></th>
                                            <th rowspan="1" colspan="1"> ৳ {{ $subtotal }}</th>
                                            <th rowspan="1" colspan="1">৳ {{ $totaldalivery }} </th>
                                            <th rowspan="1" colspan="1">৳ {{ $subtotal + $totaldalivery }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
    <!-- sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
