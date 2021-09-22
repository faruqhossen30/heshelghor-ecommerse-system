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

		<!-- App css -->
		<link href="{{ asset('backend') }}/assets/css/creative/bootstrap-creative.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('backend') }}/assets/css/creative/app-creative.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{ asset('backend') }}/assets/css/creative/bootstrap-creative-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{ asset('backend') }}/assets/css/creative/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="#" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('backend') }}/assets/images/logo.jpg" alt="Heshel Ghor" height="50" width="200">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="mt-1 text-uppercase text-secondary"><strong>Login As Admin</strong></p>
                                </div>
                                <div class="mt-4"></div>
                                {{-- @include('backend.partials.messages') --}}

                                @yield('content')

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->



                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> &copy;All right reserved <a href="" class="text-dark">Heshelghor</a>
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('backend') }}/assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="{{ asset('backend') }}/assets/js/app.min.js"></script>

    </body>
</html>
