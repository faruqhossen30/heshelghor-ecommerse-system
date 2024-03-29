@extends('frontend.layouts.app')

@section('content')
        <!-- breadcrumb start -->
        <div class="breadcrumb-area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 offset-lg-3 col-lg-6">
                        <div class="breadcrumb-search-bar">
                            <form action="" class="d-flex align-items-center justify-content-center">
                                <div class="input-group">
                                    <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button> -->
                                    <select name="district_id" onchange="this.form.submit()">
                                        <option value="">All Location</option>
                                            @foreach ($divisions as $divission)
                                                <option value="" disabled style="font-weight: bolder">
                                                    <strong>{{ $divission->name }}</strong>
                                                </option>
                                                @foreach ($divission->districts as $district)
                                                    <option value="{{ $district->id }}" class="fw-light" style="margin-left: 3px !important"
                                                        @if (isset($_GET['district_id'])&& $_GET['district_id'] == $district->id) selected @endif
                                                        > &nbsp; &nbsp;
                                                         {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                    </select>
                                    <input type="text" name="keyword" class="form-control" placeholder="Enter Shop Name"
                                    @if (isset($_GET['keyword'])) value="{{$_GET['keyword']}}" @endif
                                    >
                                    <button type="submit" class=" border-1 border-white pl-3 pr-3  overflow-auto "> <i class="fa fa-search"></i></button>
                                </div>
                                {{-- <div class="breadcrumb-icon"> --}}
                                {{-- </div> --}}
                            </form>

                        </div>
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
                            <h4>Shop</h4>
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
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    {{$shops->appends($_GET)->links()}}
                </div>
            </div>
        </div>
        <!-- shop end -->
@endsection
