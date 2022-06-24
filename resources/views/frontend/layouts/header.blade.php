@php
// cart count
$totalitem = Cart::count();
$totalprice = Cart::priceTotal();
@endphp
<header>
    <div class="header-area  position-relative header-sticky">
        <div class="container">
            <div class="row ">
                <div class="col-xl-2 col-lg-2 col-md-9 col-sm-9 col-9">
                    <div class="logo">
                        <a href="{{route('homepage')}}">
                            <img src="{{asset('frontend')}}/images/logo.jpg" class="img-fluid" alt="logo" style="height: 50px" />
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                    <div class="search-bar">
                        <form action="{{route('searchpage')}}" class="d-flex">
                            <div class="search-btn" data-bs-toggle="modal" data-bs-target="#mobile_search_button">
                                Search
                            </div>
                            <input name="keyword" type="search" placeholder="I'm shopping" />
                            <div class="header-search-icon">
                                <i class="fa fa-search"></i>
                            </div>
                        </form>

                        <!-- product search show area -->
                        <div class="search-item-show d-none">
                            <div class="noting-found text-center">
                                <span>sorry,nothing found "product name"</span>
                            </div>
                            <div class="search-item-product-loader">
                                <img class="lozad" data-src="{{asset('frontend')}}/images/loader.gif" alt="loader" style="width: 80px;">
                            </div>
                            <div class="search-item-show-product">
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img data-src="{{asset('frontend')}}/images/products/product.jpg" class="img-thumbnail lozad" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span class="text-secondary">৳ 50000</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img data-src="{{asset('frontend')}}/images/shop/shop.png" alt="" class="img-thumbnail lozad">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW HD Laptop</h6>
                                        <span class="text-secondary">৳ 50000</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img data-src="{{asset('frontend')}}/images/shop/shop.png" alt="" class="img-thumbnail lozad">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 4 B10MW Core i3 10th Gen 14" Full
                                            HD Laptop</h6>
                                        <span class="text-secondary">৳ 50000</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img data-src="{{asset('frontend')}}/images/shop/shop.png" alt="" class="img-thumbnail lozad">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span class="text-secondary">৳ 50000</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img data-src="{{asset('frontend')}}/images/shop/shop.png" alt="" class="img-thumbnail lozad">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span class="text-secondary">৳ 50000</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img data-src="{{asset('frontend')}}/images/shop/shop.png" alt="" class="img-thumbnail lozad">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span class="text-secondary">৳ 50000</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- product search show area -->

                    </div>
                </div>
                <!-- search button area -->
                <!-- Modal -->
                <div class="modal fade" id="mobile_search_button" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Market</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Shop</button>
                                    </li>
                                </ul>
                                <!-- header product search button area -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form action="">
                                            <div class="input-group mb-3">
                                                <div class="form-group search-button-select">
                                                    <select name="sample" id="sample" class="fa">
                                                        <option value="" selected>Select Area</option>
                                                        <option value="#"> Dhaka</option>
                                                        <!-- <option value="#">&#xf3c5; chittagong</option>
                                                        <option value="#">&#xf3c5; bandorban</option> -->
                                                    </select>
                                                </div>
                                                <div class="form-group search-button-area">
                                                    <input type="search" class="form-control" placeholder="Search">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                        <form action="">
                                            <div class="input-group mb-3">
                                                <div class="form-group search-button-select">
                                                    <select name="sample" id="sample" class="fa">
                                                        <option value="">Select Area</option>
                                                        <!-- <option value="#">&#xf3c5; Dhaka</option> -->
                                                        <option value="#"> Dhaka</option>
                                                    </select>
                                                </div>
                                                <div class="form-group search-button-area">
                                                    <input type="search" class="form-control" placeholder="Search">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="" class="single-shop single-market bg-white d-flex single-search">
                                                    <div class="shop-photo market-photo">
                                                        <img src="{{asset('frontend')}}/images/slide3.jpg" alt="shop">
                                                    </div>
                                                    <div class="shop-content market-content">
                                                        <h5>bashundhara shopping</h5>
                                                        <span> <i class="fa fa-map-marker"></i>
                                                            Panthapath,Dhaka</span> <br>
                                                        <span> <i class="fa-solid fa-location-arrow"></i>
                                                            Panthapath,Dhaka</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- mobile serach -->
                <div class="mobile-search-form d-flex align-items-center d-none">
                    <div class="mobile-search-bar-close">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <div class="mobile-search">
                        <input type="search" placeholder="search" />
                        <div class="search-item-show" id="mobile-search-realtime">
                            <div class="noting-found text-center">
                                <span>sorry,nothing found "product name"</span>
                            </div>
                            <div class="search-item-product-loader">
                                <img src="{{asset('frontend')}}/images/loader.gif" alt="loader" style="width: 80px;">
                            </div>
                            <div class="search-item-show-product">
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img class="lozad" data-src="{{asset('frontend')}}/images/products/product.jpg" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 1th Gen 14" Full HD Laptop</h6>
                                        <span>50000 TK</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img src="{{asset('frontend')}}/images/shop/shop.png" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span>50000 TK</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img src="{{asset('frontend')}}/images/shop/shop.png" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span>50000 TK</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img src="{{asset('frontend')}}/images/shop/shop.png" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span>50000 TK</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img src="{{asset('frontend')}}/images/shop/shop.png" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span>50000 TK</span>
                                    </div>
                                </a>
                                <a href="" class="d-flex align-items-center">
                                    <div class="search-item-show-product-photo">
                                        <img src="{{asset('frontend')}}/images/shop/shop.png" alt="">
                                    </div>
                                    <div class="search-item-show-product-content">
                                        <h6> MSI Modern 14 B10MW Core i3 10th Gen 14" Full HD Laptop</h6>
                                        <span>50000 TK</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-3 col-3">
                    <div class="header-right d-flex justify-content-between align-items-center">
                        <div class="d-lg-none col-md-7">
                            <div class="search-form-mobile" id="showForm">
                                <i class="fa fa-search d-flex justify-content-end"></i>
                            </div>
                        </div>
                        <a href="#" class="d-none d-lg-block">
                            <i class="fa-solid fa-bolt"></i></a>
                        <a href="#" class="d-none d-lg-block"><i class="fa-solid fa-heart"></i></a>
                        <a href="{{ route('cart.page') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="itemReload">{{ $totalitem }}</span>
                        </a>
                        <div class="dropdown d-none d-lg-block">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                @auth
                                {{Auth::user()->name}}
                                @endauth
                                @guest
                                My Account
                                @endguest
                            </button>
                            @guest
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                                <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                            </ul>
                            @endguest
                            @auth
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
                                {{-- <li><a class="dropdown-item" href="#">Register</a></li> --}}
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
