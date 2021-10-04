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

        <div class="account-pages mt-3 mb-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 col-xl-5">
                                @yield('content')
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
