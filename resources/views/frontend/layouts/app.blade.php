<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.exzoom.css" />
    <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    @yield('OG')

    @stack('style')


    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />
    {{-- <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css" /> --}}
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/re-responsive.css" />

    <title>Heshelghor | Store of needs</title>
</head>

<body>
    @include('frontend.inc.quickview')
    <!-- header start -->
    @include('frontend.layouts.header')
    <!-- header end -->

    <!-- navigation start -->
    @include('frontend.layouts.nav')
    <!-- navigation end -->

    @yield('content')


    <!-- footer start -->
    @include('frontend.layouts.footer')
    <!-- footer end -->

    <!-- mobile bottom nav start -->
    <div class="mobile-bottom-nav text-center d-lg-none">
        <div class="row">
            <div class="col"><a href="{{route('homepage')}}"><i class="fa fa-home"></i>Home</a></div>
            <div class="col" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="fa-solid fa-list-check"></i>Categories</div>
            <div class="col mobile-nav-active"><a href="{{ route('pruductspage') }}"><i class="fa-solid fa-bag-shopping"></i>Products</a></div>
            <div class="col"><a href="{{ route('cart.page') }}"><i class="fa-solid fa-cart-plus"></i>Cart</a></div>
            <div class="col"><a href="{{ route('login') }}"><i class="fa fa-user"></i>Account</a></div>
        </div>
    </div>

    <!-- mobile bottom nav end -->


    <script src="{{ asset('frontend') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="{{ asset('frontend') }}/js/jquery.exzoom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js""></script>
    <script src=" {{ asset('frontend') }}/js/jquery.scrollUp.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>


    <script type="text/javascript">
        // scrollToTop
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '<i class="fa fa-long-arrow-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        const observer = lozad();
        observer.observe();

    </script>
    @stack('script')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#offcanvasExample').on('shown.bs.offcanvas', function() {
                $.ajax({
                    // xhr: function(some){
                    //     var xhr = new window.XMLHttpRequest();
                    //     console.log(xhr);
                    // },
                    url: '/ajax/offcanvascategories'
                    , type: 'POST'
                    , beforeSend: function() {
                        console.log('beforesend')
                        $('#categoriyOffcanvas').append(
                            `
                            <div class="snippet" data-title=".dot-flashing" style="padding: 10px 0;">
                                        <div class="stage d-flex justify-content-center">
                                            <div class="dot-flashing"></div>
                                        </div>
                                    </div>
                            `
                        )
                    }
                    , success: function(data) {
                        console.log('success')
                        $('#categoriyOffcanvas').empty()
                        $('#categoriyOffcanvas').append(data)
                    }
                    , error: function(error) {
                        console.log(error)
                    }
                })

            });

            // Quick View
            $('.quickviewbutton').on('click', function() {
                let productid = $(this).data('productid');
                // console.log('without modal', productid)
                $('#quickViewProduct').modal('show');

                if (productid) {
                    $.ajax({
                        url: '{{ route('showproduct') }}'
                        , type: 'GET'
                        , data: {
                            id: productid
                        }
                        , beforeSend: function() {
                            $('#queicViewModalBody').html(`
                            <div class="animationLoading">
                    <div id="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="quick-view-product-photo"></div>
                            </div>
                            <div class="col-xl-6">
                                <div class="quick-view-product-content"></div>
                                <div class="quick-view-product-content"></div>
                                <div class="quick-view-product-content"></div>
                                <div class="quick-view-product-content"></div>
                                <div class="quick-view-product-content"></div>
                                <div class="quick-view-product-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
                            `)
                        }
                        , dataType: 'JSON'
                        , success: function(data) {
                            // modalLoading.hide();
                            // $('#viewDataModal #modalBody').html(data);
                            console.log(data);
                            $('#queicViewModalBody').html(data)
                        }
                        , error: function() {
                            console.log('error')
                        }
                    });
                }


            })

            $('#quickViewProduct').on('hidden.bs.modal', function() {
                $('#quickViewProduct').html()
            });

            $(document).on('keyup', 'input[name="keyword"], input[name="mkeyword"]', function() {
                // $('#searchResultShowArea').removeClass('d-none')
                    search();
            });


            function search(){
                let keyword = $('input[name="keyword"]').val();
                if(keyword.length > 0){
                    $('#searchResultShowArea').removeClass('d-none')
                    $.ajax({
                    url: '/ajax/live/search'
                    , type: 'POST'
                    , data: {keyword:keyword}
                    , beforeSend: function() {
                        console.log('beforesend')
                        $('#searchResultShowArea').empty()
                        $('#searchResultShowArea').append(
                            `
                            <div class="noting-found text-center">
                                <div class="snippet" data-title=".dot-flashing" style="padding: 10px 0; background:white">
                                    <div class="stage d-flex justify-content-center">
                                        <div class="dot-flashing"></div>
                                    </div>
                                </div>
                            </div>

                            `
                        )
                    }
                    , success: function(data) {
                        console.log('success function')
                        // console.log(data)

                        // console.log(data)
                        $('#searchResultShowArea').empty()
                        $('#searchResultShowArea').append(data)
                    }
                    , error: function(error) {
                        console.log(error)
                    }
                })
                }else{
                    $('#searchResultShowArea').addClass('d-none')
                }
            };


        });

    </script>
</body>

</html>
