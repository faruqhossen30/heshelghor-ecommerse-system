<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />
    <!-- Stack css Start -->
    @stack('css')
    <!-- Stack css End -->

    <!-- App css -->
    <link href="{{ asset('backend') }}/assets/css/material/bootstrap-material.min.css" rel="stylesheet"
        type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/material/app-material.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ asset('backend') }}/assets/css/material/bootstrap-material-dark.min.css" rel="stylesheet"
        type="text/css" id="bs-dark-stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/material/app-material-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/selectmediadropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addmediadropzone.css') }}">



</head>

<body class="loading">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('marchant.layouts.topbar')
        <!-- end Topbar -->




        <!-- ========== Left Sidebar Start ========== -->
        @include('marchant.layouts.left-sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">



                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                    Launch demo modal
                </button>

                <x-mediamodal/>
                <x-mediacropmodal/>
                <!-- Modal -->
                <div class="modal" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
                    data-bs-keyboard="false" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                        </div>
                                        <div class="col-md-4">
                                            <h4 class="text-center">Final Image</h4>
                                            <hr>
                                            <div class="preview" style="margin: 0 auto"></div>
                                            <hr>
                                            <div class="row">
                                                {{-- <div class="col-10" style="margin: 0 auto">
                                                    <select class="form-select" name="collectionname" id="">
                                                        <option value="none">None</option>
                                                        <option value="brand">brand</option>
                                                        <option value="product">product</option>
                                                    </select>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="display: flex; justify-content:space-between">
                                <div>
                                    {{-- <div class="btn-group">
                                        <button type="button" class="btn btn-success" data-method="move"
                                            data-option="-10" data-second-option="0" title="Move Left">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(-10, 0)">
                                                <span class="fa fa-arrow-left"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="move"
                                            data-option="10" data-second-option="0" title="Move Right">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(10, 0)">
                                                <span class="fa fa-arrow-right"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="move" data-option="0"
                                            data-second-option="-10" title="Move Up">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(0, -10)">
                                                <span class="fa fa-arrow-up"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="move" data-option="0"
                                            data-second-option="10" title="Move Down">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(0, 10)">
                                                <span class="fa fa-arrow-down"></span>
                                            </span>
                                        </button>
                                    </div> --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success" data-method="rotate"
                                            data-option="-45" title="Rotate Left" id="roatedMinus">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.rotate(-45)">
                                                <span class="fa fa-undo-alt"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="rotate"
                                            data-option="45" title="Rotate Right" id="roatedPlus">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.rotate(45)">
                                                <span class="fa fa-redo-alt"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="reset" title="Reset" id="roatedReset">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.reset()" aria-describedby="tooltip78370">
                                              <span class="fa fa-sync-alt"></span>
                                            </span>
                                          </button>
                                    </div>

                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop & Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- For Croping Modal --}}








                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('marchant.layouts.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('marchant.layouts.right-sidebar')

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    @stack('summernote')
    <script src="{{ asset('backend') }}/assets/js/vendor.min.js"></script>


    <!-- KNOB JS -->
    <script src="{{ asset('backend') }}/assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <!-- Apex js-->
    {{-- <script src="{{ asset('backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script> --}}

    <!-- Plugins js-->
    <script src="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script
        src="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
    </script>

    <!-- Dashboard init-->
    {{-- <script src="{{ asset('backend') }}/assets/js/pages/dashboard-sales.init.js"></script> --}}
    <!-- Stack JS Start -->
    @stack('scripts')
    <!-- Stack JS Start -->
    <!-- App js -->
    <script src="{{ asset('backend') }}/assets/js/app.min.js"></script>
    <script src="{{asset('js/merchantgallerycrop.js')}}"></script>
    <script src="{{asset('js/merchantmediacrop.js')}}"></script>
</body>

</html>
