<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>@yield('title')</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Riode - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800,900']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset('frontend') }}/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/animate/animate.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend') }}/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/owl-carousel/owl.carousel.min.css">
    {{-- For push --}}
    @stack('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/demo3.min.css">


</head>

<body class="home">

    <div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <header class="header">
            {{-- Topbar --}}
            @include('frontend.layouts.topbar')
            {{-- Headeer --}}
            {{-- @include('frontend.layouts.searchbar') --}}
            @php
                // cart count
                $totalitem = Cart::count();
                $totalprice = Cart::priceTotal();
            @endphp
            <div class="header-middle sticky-header fix-top sticky-content">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('frontend/img/logo.jpg') }}" alt="logo" width="153" height="44" />
                        </a>
                        <!-- End Logo -->

                        <div class="header-search hs-simple">
                            <form action="#" method="GET" class="input-wrapper" style="position: relative" id="searchFrom">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Search..." id="searchInpur" />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                            <div class=""
                                style="z-index: 999999999;position: absolute; width:100%; display:none"
                                id="searchResultDiv">
                                <ul class="list-group" id="searchProductList">
                                    <a href=""
                                        class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <img src="https://picsum.photos/id/1005/367/267" alt=""
                                                class="img-thumbnail" style="width: 40px; height:40px">
                                            <span>Just for test</span>
                                        </div>
                                        <div>
                                            <span>$500</span>
                                        </div>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <!-- End Header Search -->
                    </div>
                    <div class="header-right">
                        <a href="tel:#" class="icon-box icon-box-side">
                            <div class="icon-box-icon mr-0 mr-lg-2">
                                <i class="d-icon-phone"></i>
                            </div>
                            <div class="icon-box-content d-lg-show">
                                <h4 class="icon-box-title">Call Us Now:</h4>
                                <p>+88 0421-61720</p>
                            </div>
                        </a>
                        <span class="divider"></span>
                        <a href="wishlist.html" class="wishlist">
                            <i class="d-icon-heart"></i>
                        </a>
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                            {{-- <a href="#" class="cart-toggle label-block link"> --}}
                            <a href="{{ route('cart.page') }}" class="label-block link">
                                <div class="cart-label d-lg-show">
                                    <span class="cart-name">Shopping Cart</span>
                                    <span class="cart-price">৳{{ $totalprice }}</span>
                                </div>
                                <i class="d-icon-bag"><span class="cart-count">{{ $totalitem }}</span></i>
                            </a>
                            <div class="cart-overlay"></div>
                            <!-- End Cart Toggle -->
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <h4 class="cart-title">Shopping Cart</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                            class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                                </div>
                                <div class="products scrollable">
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{ asset('frontend') }}/images/cart/product-1.jpg"
                                                    alt="product" width="80" height="88" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Riode White Trends</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$21.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End of Cart Product -->
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{ asset('frontend') }}/images/cart/product-2.jpg"
                                                    alt="product" width="80" height="88" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Dark Blue Women’s
                                                Leomora Hat</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$118.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Cart Product -->
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">{{ $totalprice }}</span>
                                </div>
                                <!-- End of Cart Total -->
                                <div class="cart-action">
                                    <a href="{{ route('cart.page') }}" class="btn btn-dark btn-link">View Cart</a>
                                    <a href="checkout.html" class="btn btn-dark"><span>Go To Checkout</span></a>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End Dropdown Box -->
                        </div>
                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                </div>
            </div>

            {{-- Menu --}}
            @include('frontend.layouts.menu')
        </header>
        <!-- End Header -->

        <!-- Start of Main/content -->
        @yield('content')
        <!-- End of Main/content -->

        @include('frontend.layouts.footer')


        <!-- Plugins JS File -->
        <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <script src="{{ asset('frontend') }}/vendor/owl-carousel/owl.carousel.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/sticky/sticky.min.js"></script>
        {{-- For stack --}}

        <!-- Main JS File -->
        <script src="{{ asset('frontend') }}/js/main.min.js"></script>

        @stack('scripts')


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            let search = document.getElementById('searchInpur');
            let searchResultDiv = document.getElementById('searchResultDiv');
            let searchProductList = document.getElementById('searchProductList');

            // console.log(search)

            search.addEventListener('keyup', function(event) {
                let keyword = event.target.value.trim();
                let url = `${window.location.origin}/search/${keyword}`;
                if (keyword.length == 0) {
                    searchResultDiv.style.display = 'none'
                };
                if (keyword) {
                    axios.get(url)
                        .then(function(res) {
                            if (res.data.length > 0) {
                                searchResultDiv.style.display = 'block'
                                // console.log(res);
                                li = res.data.map(function(post) {
                                    // return `<a href="product/${post.id}" class="list-group-item">${post.title}</a>`;
                                    return `<a href="${window.location.origin}/product/${post.id}" class="list-group-item d-flex justify-content-between align-items-center">
                                       <div>
                                           <img src="${window.location.origin}/uploads/product/${post.photo}" alt="${post.title}" class="img-thumbnail" style="width: 40px; height:40px">
                                            <span>${post.title}</span>
                                       </div>
                                       <div>
                                            <span>৳${post.price}</span>
                                        </div>
                                    </a>`;
                                });
                                li = li.join(' ');
                                searchProductList.innerHTML = li;
                            };

                        })
                        .catch(function(err) {
                            console.log(err);
                        })
                };
            });
            // Form form search with submit method
            var searchFrom = $('#searchFrom');
            var searchInpur = $('#searchInpur');
            $(document).on('submit', 'form[id="searchFrom"]', function(event){
                event.preventDefault()
                var value = $(this).val();
                console.log(searchInpur.val())
            });
        </script>
</body>

</html>
