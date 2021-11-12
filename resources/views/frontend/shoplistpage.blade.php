@extends('frontend.layouts.app')
@section('title')
    HeshelGhor|Shop Page
@endsection

@section('content')
    <main class="main">
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('homepage') }}"><i class="d-icon-home"></i></a></li>
                    <li><a href="{{ route('shoplist') }}">Shops</a></li>
                </ul>
                <!-- End Breadcrumb -->
                <div class="row main-content-wrap gutter-lg">
                    <aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                        @include('frontend.partials.shoppage.sidebar', compact('brands'))
                    </aside>
                    {{-- sidebar end --}}

                    <div class="col-lg-9 main-content">
                        {{-- <div class="shop-banner banner"
                        style="background-image: url('{{ asset('frontend') }}/images/demos/demo3/shop_banner.jpg'); background-color: #f2f2f3;">
                        <div class="banner-content">
                            <h4
                                class="banner-subtitle mb-2 d-inline-block text-uppercase font-weight-bold text-white bg-dark">
                                Through Thursday</h4>
                            <h1 class="banner-title text-uppercase text-dark font-weight-bold ls-l">20% off
                                Suede Bags</h1>
                            <a href="#" class="btn btn-outline btn-rounded btn-dark">Shop now</a>
                        </div>
                    </div> --}}
                        {{-- <nav class="toolbox sticky-content sticky-toolbox fix-top pt-0">
                        <div class="toolbox-left">
                            <a href="#"
                                class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded d-lg-none">Filters<i
                                    class="d-icon-arrow-right"></i></a>
                            <div class="toolbox-item toolbox-sort select-box">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default">Default</option>
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Average rating</option>
                                    <option value="date">Latest</option>
                                    <option value="price-low">Sort forward price low</option>
                                    <option value="price-high">Sort forward price high</option>
                                    <option value="">Clear custom sort</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <label>Show :</label>
                                <select name="count" class="form-control">
                                    <option value="12">10</option>
                                    <option value="24">20</option>
                                    <option value="36">30</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="#" class="d-icon-mode-list btn-layout"></a>
                                <a href="#" class="d-icon-mode-grid btn-layout active"></a>
                            </div>
                        </div>
                    </nav> --}}
                        <div class="row">
                            @foreach ($shops as $shop)
                                <div class="col-xl-4 col-sm-6 my-4">
                                    <div class="card">
                                        @if ($shop->image)
                                        <img src="{{asset('uploads/shop/'.$shop->image)}}"
                                        class="card-img-top img-thumbnail" style="max-height: 200px" alt="...">
                                        @else
                                        <img src="https://picsum.photos/seed/picsum/200/300"
                                        class="card-img-top img-thumbnail" style="max-height: 200px" alt="...">
                                        @endif

                                        <div class="card-body">
                                            <a href="#">
                                                <h6 class="card-title">{{$shop->name}}</h6>
                                            </a>
                                            <p class="text-muted text-truncate mb-0">
                                                <i class="d-icon-map mr-2"></i>{{$shop->address}}
                                            </p>
                                            @if ($shop->market)
                                            <a href="#">
                                                <p class="text-muted text-truncate mb-0">
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
