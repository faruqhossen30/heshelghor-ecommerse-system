@php
    $header = App\Models\Setting\SettingHeader::first();
    $contact = App\Models\Setting\SettingContact::first();
    $socialmedia = App\Models\Setting\SettingSocialMedia::first();
    $categories = App\Models\Product\Category::with('subcategories')->get();
    $divissions = App\Models\Admin\Location\Division::with('districts')
        ->orderBy('name', 'asc')
        ->get();
@endphp
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- For push --}}
    @stack('styles')
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/demo3.min.css">
    <style>
        .header-middle {
            padding-top: .7rem;
            padding-bottom: .7rem;
            color: #222;
            background: #fff;
            font-size: 1.2rem;
            font-weight: 700;
        }

        a .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, 0.06);
        }

    </style>
</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <header class="header">
            {{-- Topbar --}}
            @include('frontend.layouts.topbar', compact('header'))
            {{-- Headeer --}}
            @include('frontend.layouts.searchbar')
            @php
                // cart count
                $totalitem = Cart::count();
                $totalprice = Cart::priceTotal();
            @endphp
            {{--
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
                            <form action="{{route('searchtest')}}" method="GET" class="input-wrapper border" style="position: relative"
                                id="searchFrom">
                                <div class="select-box">
                                    <select id="category" name="location">
                                        <option value="all">All Location</option>
                                        @foreach ($divissions as $divission)
                                            <option value="" style="font-weight: bolder">
                                                <strong>{{ $divission->name }}</strong></option>
                                            @foreach ($divission->districts as $district)
                                                <option value="{{ $district->slug }}" @if(request()->query('location') == $district->slug) selected @endif >- {{ $district->name }}</option>
                                            @endforeach

                                        @endforeach
                                    </select>
                                </div>
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
                                <p>{{ $header->mobile ?? '' }}</p>
                            </div>
                        </a>
                        <span class="divider"></span>
                        <a href="wishlist.html" class="wishlist">
                            <i class="d-icon-heart"></i>
                        </a>
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">

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

            --}}

            {{-- Menu --}}
            @include('frontend.layouts.menu')
        </header>
        <!-- End Header -->
        @include('frontend.partials.modal');
        <!-- Start of Main/content -->
        @yield('content')
        <!-- End of Main/content -->

        @include('frontend.layouts.footer', compact('contact', 'socialmedia'))

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
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
                                    return `<a href="${window.location.origin}/product/${post.slug}" class="list-group-item d-flex justify-content-between align-items-center">
                                       <div>
                                           <img src="${post.img_small}" alt="${post.title}" class="img-thumbnail" style="width: 40px; height:40px">
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
            // var searchFrom = $('#searchFrom');
            // var searchInpur = $('#searchInpur');
            // $(document).on('submit', 'form[id="searchFrom"]', function(event) {
            //     event.preventDefault()
            //     var value = $(this).val();
            //     console.log(searchInpur.val())
            // });
        </script>
        {{-- For Quic View Product --}}
        {{-- <script>
            var modalbody = $('#modalbody');
            var loading = $('#loading');

            $(document).on('click', '#quickviewbutton', function(){
                var productId = $(this).children('input[name="some"]').val();
                if(productId){
                    $.ajax({
                        url: `/product/quickview/${productId}`,
                        type: 'GET',
                        success: function(product){
                            console.log(product);
                            modalbody.empty()
                            modalbody.append(`
                            <div class="product product-single row product-popup">
                <div class="col-md-6">
                    <div class="product-gallery">
                        <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                            <figure class="product-image">
                                <img src="{{asset('frontend')}}/images/product/product-1-1-580x652.jpg"
                                    data-zoom-image="images/product/product-1-1-800x900.jpg" alt="Blue Pinafore Denim Dress"
                                    width="580" height="580">
                            </figure>
                            <figure class="product-image">
                                <img src="{{asset('frontend')}}/images/product/product-1-2-580x652.jpg"
                                    data-zoom-image="images/product/product-1-2-800x900.jpg" alt="Blue Pinafore Denim Dress"
                                    width="580" height="580">
                            </figure>
                            <figure class="product-image">
                                <img src="{{asset('frontend')}}/images/product/product-1-3-580x652.jpg"
                                    data-zoom-image="images/product/product-1-3-800x900.jpg" alt="Blue Pinafore Denim Dress"
                                    width="580" height="580">
                            </figure>
                            <figure class="product-image">
                                <img src="{{asset('frontend')}}/images/product/product-1-4-580x652.jpg"
                                    data-zoom-image="images/product/product-1-4-800x900.jpg" alt="Blue Pinafore Denim Dress"
                                    width="580" height="580">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details scrollable pr-0 pr-md-3">
                        <h1 class="product-name mt-0">${product.title}</h1>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 11 reviews )</a>
                        </div>
                        <div class="product-price">৳${product.price}</div>
                        <p class="product-short-desc">${product.short_description}</p>

                        <div class="product-form product-color">
                            <label>Color:</label>
                            <div class="product-variations">
                                <a class="color" data-src="images/demos/demo7/products/big1.jpg" href="#"
                                    style="background-color: #1e73be"></a>
                                <a class="color" data-src="images/demos/demo7/products/2.jpg" href="#"
                                    style="background-color: #56962e"></a>
                                <a class="color" data-src="images/demos/demo7/products/3.jpg" href="#"
                                    style="background-color: #965000"></a>
                            </div>
                        </div>
                        <div class="product-form product-size">
                            <label>Size:</label>
                            <div class="product-form-group">
                                <div class="product-variations">
                                    <a class="size" href="#">M</a>
                                    <a class="size" href="#">L</a>
                                </div>
                                <a href="#" class="product-variation-clean">Clean All</a>
                            </div>
                        </div>
                        <div class="product-variation-price">
                            <span>$239.00</span>
                        </div>

                        <hr class="product-divider">

                        <div class="product-form product-qty">
                            <div class="product-form-group">
                                <div class="input-group mr-2">
                                    <button class="quantity-minus d-icon-minus"></button>
                                    <input class="quantity form-control" type="number" min="1" max="1000000">
                                    <button class="quantity-plus d-icon-plus"></button>
                                </div>
                                <button class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold"><i
                                        class="d-icon-bag"></i>Add to
                                    Cart</button>
                            </div>
                        </div>

                        <hr class="product-divider mb-3">
                        <div class="product-footer">
                            <div class="social-links mr-4">
                                <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                            </div>
                            <a href="#" class="btn-product btn-wishlist mr-4"><i class="d-icon-heart"></i>Add to wishlist</a>

                            <a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add
                                to compare</a>

                        </div>
                    </div>
                </div>
            </div>
                            `)
                        }
                    });
                }
            });

        </script> --}}

        <script>
            // function showModal(){
            //     // alert('form modal function');
            //     $('#viewDataModal').modal('show')
            // }
            var modalLoading = $('#modalLoading');
            $(document).on('click', '.view-data', function() {
                let id = $(this).data('id');

                if (id) {
                    $('#viewDataModal').modal('show')
                    modalLoading.show();
                    $('#viewDataModal #modalBody').html('');
                    $.ajax({
                        url: '{{ route('showproduct') }}',
                        type: 'GET',
                        data: {
                            id: id
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            modalLoading.hide();
                            $('#viewDataModal #modalBody').html(data);
                            // console.log(data);
                        }
                    });
                };


            });
        </script>
@include('frontend.inc.shopsearchscripts')
</body>

</html>
