@extends('frontend.layouts.app')
@section('title')
    HeshelGhor|Shop Page
@endsection

@section('content')
    <main class="main">
        <div class="page-content mb-10 pb-2">
            {{-- <div class="container" style="display: flex; justify-content:center"> --}}
            <div class="container">
                <div class="page-header" style="background-color:#28475c" >
                    <div class="header-search hs-simple" style="flex: none">
                        <form action="#" method="GET" class="input-wrapper" style="position: relative">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Location</option>
                                    <option value="" style="font-weight: bolder">
                                        Barisal</option>
                                    <option value="24">- Barguna</option>
                                    <option value="25">- Barishal</option>
                                    <option value="26">- Bhola</option>
                                    <option value="27">- Jhalokati</option>
                                    <option value="28">- Patuakhali</option>
                                    <option value="29">- Pirojpur</option>

                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" autocomplete="off"
                                placeholder="Search..." id="searchInpur" style="border-radius: 0">
                            <button class="btn btn-search" type="submit">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                        <div class="" style="z-index: 999999999;position: absolute; width:100%; display:none"
                            id="searchResultDiv">
                            <ul class="list-group" id="searchProductList">
                                <a href="" class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="https://picsum.photos/id/1005/367/267" alt="" class="img-thumbnail"
                                            style="width: 40px; height:40px">
                                        <span>Just for test</span>
                                    </div>
                                    <div>
                                        <span>$500</span>
                                    </div>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">

                {{-- <ul class="breadcrumb">
                    <li><a href="{{ route('homepage') }}"><i class="d-icon-home"></i></a></li>
                    <li><a href="{{ route('shoplist') }}">Shops</a></li>
                </ul> --}}
                <!-- End Breadcrumb -->
                <div class="row main-content-wrap gutter-lg">

                    <div class="col-lg-12 main-content">
                        <div class="row">
                            @foreach ($shops as $shop)
                                <div class="col-xl-2 col-sm-3 col-xs-6 my-4">
                                    <div class="card">
                                        @if ($shop->image)
                                            <img src="{{ asset('/uploads/shop/' . $shop->image) }}"
                                                class="card-img-top img-thumbnail" style="max-height: 200px" alt="...">
                                        @else
                                            <img src="https://picsum.photos/seed/picsum/200/300"
                                                class="card-img-top img-thumbnail" style="max-height: 200px" alt="...">
                                        @endif

                                        <div class="card-body">
                                            <a href="{{ route('product.with.shop', $shop->id) }}">
                                                <h6 class="card-title">{{ $shop->name }}</h6>
                                            </a>
                                            <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                                <i class="d-icon-map mr-2"></i>{{ $shop->address }}
                                            </p>
                                            @if ($shop->market)
                                                <a href="#">
                                                    <p class="text-muted mb-0" style="font-size: 1.3rem">
                                                        <i class="far fa-building mr-2"></i>Basun Dara shopin complex
                                                    </p>
                                                </a>
                                            @endif
                                            <hr style="margin-bottom: 1rem">


                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <nav class="toolbox toolbox-pagination">
                            <p class="show-info">Showing <span>12 of 56</span> Products</p>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                        aria-disabled="true">
                                        <i class="d-icon-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next<i class="d-icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection
{{-- @push('styles')
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/nouislider/nouislider.min.css">
        		<!-- App css -->
		<link href="{{asset('backend')}}/assets/css/material/bootstrap-material.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{asset('backend')}}/assets/css/material/app-material.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<!-- icons -->
		<link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
@endpush --}}

@push('scripts')
    <script src="{{ asset('frontend') }}/vendor/nouislider/nouislider.min.js"></script>
@endpush
