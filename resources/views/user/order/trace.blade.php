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
                            <div class="col p-2 m-1 border shadow-lg   text-success border-success">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5 class="text-success">Accept</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col p-2 m-1 border shadow-lg text-danger border-danger">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5 class="text-danger">Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col p-2 m-1 border shadow-lg text-danger border-danger">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5 class="text-danger">Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col p-2 m-1 border shadow-lg text-danger border-danger">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5 class="text-danger">Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col p-2 m-1 border shadow-lg text-danger border-danger">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5 class="text-danger">Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                            <div class="col p-2 m-1 border shadow-lg text-danger border-danger">
                                <p><i class="mdi mdi-check-circle" style="font-size: 2rem;"></i></p>
                                <h5 class="text-danger">Pending</h5>
                                <p>25 Nov 21, 2:40 PM</p>
                            </div>
                        </div> <!-- flexbox_container -->


                    </div>

                    <div class="card-body">
                        <div class="accordion" id="accordionExample"> <!-- Accroding -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="mdi mdi-help-circle me-1 text-primary"></i>  Can I use this template for my client?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <div class="tab-pane show active" id="about-me">

                                            <h5 class="mb-4 text-uppercase">Experience</h5>

                                            <ul class="list-unstyled timeline-sm">
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date">2015 - 19</span>
                                                    <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                                    <p>websitename.com</p>
                                                    <p class="text-muted mt-2">Everyone realizes why a new common language
                                                        would be desirable: one could refuse to pay expensive translators.
                                                        To achieve this, it would be necessary to have uniform grammar,
                                                        pronunciation and more common words.</p>

                                                </li>
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date">2012 - 15</span>
                                                    <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                                    <p>Software Inc.</p>
                                                    <p class="text-muted mt-2">If several languages coalesce, the grammar
                                                        of the resulting language is more simple and regular than that of
                                                        the individual languages. The new common language will be more
                                                        simple and regular than the existing European languages.</p>
                                                </li>
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date">2010 - 12</span>
                                                    <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                                    <p>Coderthemes LLP</p>
                                                    <p class="text-muted mt-2 mb-0">The European languages are members of
                                                        the same family. Their separate existence is a myth. For science
                                                        music sport etc, Europe uses the same vocabulary. The languages
                                                        only differ in their grammar their pronunciation.</p>
                                                </li>
                                            </ul>



                                        </div>
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
