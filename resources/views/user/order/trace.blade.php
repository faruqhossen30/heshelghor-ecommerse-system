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
            <div class="col-md-12">
                <div class="card">
                    <div class="row card-header border-bottom bg-transparent">
                        <div class="col-lg-3 col-sm-6">
                            <div class="d-flex mb-2">
                                <div class="me-2 align-self-center">
                                    <i class="ri-hashtag h2 m-0 text-muted"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="mb-1">Invoice No</p>
                                    <h5 class="mt-0">
                                        sdfsdf
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
                                        sdfsdf
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
                                        22 decebmder
                                        <small class="text-muted">sdfsdf</small>
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
                    <div class="card-body">

                        <div class="flexbox_container text-center" style="display: flex">
                            <div class="col p-2 m-1 border  text-success border-success">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col border p-2 m-1">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col border p-2 m-1">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col border p-2 m-1">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col border p-2 m-1">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col border p-2 m-1">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5>Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>



                        </div> <!-- flexbox_container -->
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
        <style>
            .flexbox_container{
                justify-content: center;
                flex-flow: wrap row;
            }
            .flexbox_container div{
                min-width: 120px;
                max-width: 150px;
            }

        </style>
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
