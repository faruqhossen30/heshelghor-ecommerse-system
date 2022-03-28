@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Shop Page
@endsection

@section('content')
    <main class="main">
        <form action="" method="GET">
            <div class="page-content mb-10 pb-2">
                <div class="container">

                    <!-- End Breadcrumb -->
                    <div class="row main-content-wrap gutter-lg">
                        {{-- <aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                            @include(
                                'frontend.partials.shoppage.sidebar',
                                compact('brands')
                            )
                        </aside> --}}
                        {{-- sidebar end --}}

                        <div class="col-lg-12 main-content">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        @if ($market->image)
                                            <img src="{{ asset('uploads/market/' . $market->image) }}"
                                                class="card-img-top img-thumbnail" style="width: 150px; height:150px"
                                                alt="{{ $market->name }}">
                                        @else
                                            <img src="{{ asset('frontend/images/skyscraper.png') }}"
                                                class="card-img-top img-thumbnail" style="width: 150px; height:150px"
                                                alt="{{ $market->name }}">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title my-2">
                                                <span><i class="fas fa-cart-plus"></i></span>
                                                {{ $market->name }}
                                            </h5>
                                            <p class="card-text mb-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $market->address }}

                                            </p>
                                            <p class="card-text mb-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $market->district->name }}, Bangladesh

                                            </p>
                                            @if (optional($market->market)->name)
                                                <a href="#">
                                                    <p class="card-text mb-2"><small class="text-muted">
                                                            <i class="far fa-building my-2"></i>
                                                            {{ $market->market->name ?? 'N/A' }}
                                                        </small></p>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @if (count($shops) > 0)
                        <div class="col-12 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="display-4 text-center">
                                        Shop List Of {{ $market->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                            @foreach ($shops as $shop)
                                <div class="col-md-4 col-sm-6">
                                    <a href="{{route('product.with.shop', $shop->id)}}">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-4">
                                                    <img src="{{ asset('frontend/images/shop.png') }}"
                                                        style="width: 75px" class="img-fluid rounded-start mt-1" alt="...">
                                                </div>
                                                <div class="col-8">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ $shop->name }} </h6>
                                                        <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                                            <i class="d-icon-map mr-2"></i>{{ $shop->address }}
                                                        </p>
                                                        {{-- <p class="text-muted mb-0" style="font-size: 1.3rem">
                            <i class="far fa-building mr-2"></i>58 Karbala Road , Jessore
                        </p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                        <div class="card">
                            <div class="card-body">
                                <div class="display-3 text-center">
                                    There is no shop  in {{ $market->name }}.
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- End Main -->
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/nouislider/nouislider.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('frontend') }}/vendor/nouislider/nouislider.min.js"></script>
@endpush
