@php
// cart count
$totalitem = Cart::count();
$totalprice = Cart::priceTotal();
@endphp
<x-searchshopmodal />
<div class="header-middle sticky-header fix-top sticky-content" id="stickySearchbar">
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
                <form action="{{route('searchtest')}}" method="get" class="input-wrapper border" style="position: relative"
                    id="searchFrom">
                    {{-- @csrf --}}
                    <div class="select-box">
                        <button class="btn btn-rounded btn-icon-left" type="button" data-bs-toggle="modal" data-bs-target="#searchShopModal">
                            <i class="d-icon-shoppingbag"></i>
                            Find Shop
                        </button>
                        {{-- <select id="category" name="location">
                            <option value="all">All Location</option>
                            @foreach ($divissions as $divission)
                                <option value="" style="font-weight: bolder">
                                    <strong>{{ $divission->name }}</strong></option>
                                @foreach ($divission->districts as $district)
                                    <option value="{{ $district->slug }}" @if(request()->query('location') == $district->slug) selected @endif >- {{ $district->name }}</option>
                                @endforeach

                            @endforeach
                        </select> --}}
                    </div>
                    <input type="text" class="form-control" name="search" autocomplete="off"
                        placeholder="Search product ..." id="searchInpur" />
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
