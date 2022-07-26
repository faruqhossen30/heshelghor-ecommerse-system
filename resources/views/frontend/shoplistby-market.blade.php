@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb start -->
<div class="bradcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('market.list') }}">Market</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $market->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

        <!-- shop start -->
        <div class="shop-area pt-5 pb-5" style="background-color: #FCE6DF;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-heading text-center mb-5">
                            <h4>Shop List of {{ $market->name }}</h4>
                            <span>Get Your Product from Shop</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($shops as $shop)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="{{route('shoppage', $shop->slug)}}" class="shop_links market-links ">
                            <div class="single-shop single-market d-flex ">
                                <div class="shop-photo market-photo">
                                    <img class="lozad" data-src="{{ asset('uploads/shop/' . $shop->image) }}"
                                        data-placeholder-background="white"
                                        onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';"
                                        alt="{{ $shop->name }}">

                                </div>
                                <div class="shop-content market-content">
                                    <h5>{{ $shop->name }}</h5>
                                    <span> <i class="fa fa-map-marker"></i> {{ $shop->address }}</span>
                                    {{-- <span> <i class="fa-solid fa-location-arrow"></i> Panthapath,Dhaka</span> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    {{-- {{$shops->appends($_GET)->links()}} --}}
                </div>
            </div>
        </div>
        <!-- shop end -->
@endsection
