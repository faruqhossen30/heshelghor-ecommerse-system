@extends('user.layouts.app')
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
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Content-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-horizontal mb-3 text-center">
                            <li class="list-group-item m-1" style="color: green;">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>
                            <li class="list-group-item m-1">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px"></i></p>
                                <h5>Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>
                            <li class="list-group-item">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px"></i></p>
                                <h5>Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>
                            <li class="list-group-item">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px"></i></p>
                                <h5>Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>
                            <li class="list-group-item">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px"></i></p>
                                <h5>Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>
                            <li class="list-group-item">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px"></i></p>
                                <h5>Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>
                            <li class="list-group-item">
                                <p><i class="mdi mdi-check-circle" style="font-size: 30px"></i></p>
                                <h5>Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div> <!-- content -->
@endsection

@push('css')

    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
    <!-- third party js ends -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>

@endpush
