@extends('frontend.layouts.app')

@section('content')
        <!-- breadcrumb start -->
        <div class="breadcrumb-area pt-5 pb-5">
            <div class="container">
                <class class="row">
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
                                </div>
                                <div class="breadcrumb-icon">
                                    <i class="fa fa-search"></i>
                                </div>
                            </form>

                        </div>
                    </div>
                </class>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- market start -->
        <div class="market-area pt-5 pb-5" style="background-color: #d9bcb3;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-heading text-center mb-5">
                            <h4>Market</h4>
                            <span>Get Your Product from Market</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($markets as $market)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <a href="#" class="market-links">
                            <div class="single-market bg-white d-flex ">
                                <div class="market-photo">
                                    <img data-src="images/slide1.jpg" data-placeholder-background="white" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';" class="lozad" alt="market">
                                </div>
                                <div class="market-content">
                                    <h5>{{$market->name}}</h5>
                                    <span> <i class="fa fa-map-marker"></i> {{$market->address}}</span> <br>
                                    {{-- <span> <i class="fa-solid fa-location-arrow"></i> Panthapath,Dhaka</span> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    {{$markets->appends($_GET)->links()}}
                </div>
            </div>
        </div>
        <!-- market end -->
@endsection
