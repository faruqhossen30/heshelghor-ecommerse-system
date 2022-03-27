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
                        <aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                            @include(
                                'frontend.partials.shoppage.sidebar',
                                compact('brands')
                            )
                        </aside>
                        {{-- sidebar end --}}

                        <div class="col-lg-9 main-content">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        @if ($shop->image)
                                            <img src="{{ asset('uploads/shop/' . $shop->image) }}"
                                                class="card-img-top img-thumbnail" style="width: 150px; height:150px"
                                                alt="{{ $shop->name }}">
                                        @else
                                            <img src="{{ asset('frontend/images/shop.png') }}"
                                                class="card-img-top img-thumbnail" style="width: 150px; height:150px"
                                                alt="{{ $shop->name }}">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title my-2">
                                                <span><i class="fas fa-cart-plus"></i></span>
                                                {{ $shop->name }}
                                            </h5>
                                            <p class="card-text mb-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $shop->address }}

                                            </p>
                                            @if (optional($shop->market)->name)
                                                <a href="#">
                                                    <p class="card-text mb-2"><small class="text-muted">
                                                            <i class="far fa-building my-2"></i>
                                                            {{ $shop->market->name ?? 'N/A' }}
                                                        </small></p>
                                                </a>
                                            @endif

                                            <a href="{{ route('pruductspage') }}" class="btn btn-primary btn-sm">Product
                                                Gallary</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (count($products) > 0)
                                <nav class="toolbox sticky-content sticky-toolbox fix-top pt-0">
                                    <div class="toolbox-left">
                                        <a href="#"
                                            class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded d-lg-none">Filters<i
                                                class="d-icon-arrow-right"></i></a>
                                        <div class="toolbox-item toolbox-sort select-box">
                                            <label>Sort By :</label>
                                            <select name="orderby" class="form-control" onchange="this.form.submit();">
                                                <option value="latest" @if (!empty($_GET['orderby']) && $_GET['orderby'] == 'latest') selected @endif>
                                                    Latest</option>
                                                <option value="lowtohigh" @if (!empty($_GET['orderby']) && $_GET['orderby'] == 'lowtohigh') selected @endif>
                                                    Low To High</option>
                                                <option value="hightolow" @if (!empty($_GET['orderby']) && $_GET['orderby'] == 'hightolow') selected @endif>
                                                    High To Low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="toolbox-right">
                                        <div class="toolbox-item toolbox-show select-box">
                                            <label>Show :</label>
                                            <select name="count" class="form-control" onchange="this.form.submit();">
                                                <option value="20" @if (request()->query('count') == '20') selected @endif>20</option>
                                                <option value="40" @if (request()->query('count') == '40') selected @endif>40</option>
                                                <option value="60" @if (request()->query('count') == '60') selected @endif>60</option>
                                            </select>
                                        </div>
                                        <div class="toolbox-item toolbox-layout">
                                            <a href="#" class="d-icon-mode-list btn-layout"></a>
                                            <a href="#" class="d-icon-mode-grid btn-layout active"></a>
                                        </div>
                                    </div>
                                </nav>
                                <div class="row cols-3 cols-sm-4 product-wrapper">

                                    @foreach ($products as $product)
                                        <div class="product-wrap">
                                            <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="{{ route('singleproduct', $product->slug) }}">
                                                        <img src="{{ $product->img_small }}" alt="product" width="280"
                                                            height="315">
                                                    </a>
                                                    <div class="product-label-group">
                                                        <label class="product-label label-new">new</label>
                                                        @if ($product->discount > 0)
                                                            <label
                                                                class="product-label label-sale">{{ $product->discount }}%
                                                                OFF</label>
                                                        @endif
                                                    </div>
                                                    <div class="product-action-vertical">
                                                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                            data-target="#addCartModal" title="Add to cart"><i
                                                                class="d-icon-bag"></i></a>
                                                        <a href="#" class="btn-product-icon btn-wishlist"
                                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a class="btn-product view-data" title="Quick View"
                                                            data-id="{{ $product->id }}" type="button"
                                                            class="btn btn-primary">Quick View
                                                        </a>
                                                    </div>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="product-cat">
                                                        <a
                                                            href="{{ route('product.with.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                                        @if (optional($product->subcategory)->name)
                                                            <a
                                                                href="{{ route('product.with.subcategory', ['category' => $product->category->slug,'slug' => $product->subcategory->slug]) }}">|
                                                                {{ $product->subcategory->name }}</a>
                                                        @endif
                                                    </div>
                                                    <h3 class="product-name">
                                                        <a
                                                            href="{{ route('singleproduct', $product->slug) }}">{{ $product->title }}</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <ins class="new-price">৳{{ $product->price }}</ins>
                                                        @if ($product->discount > 0)
                                                            <del
                                                                class="old-price">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
                                                        @endif
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:60%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="{{ route('singleproduct', $product->slug) }}"
                                                            class="rating-reviews">( 16 reviews )</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <nav class="toolbox toolbox-pagination">
                                    {{ $products->appends($_GET)->links('pagination::custompagination') }}
                                </nav>
                            @elseif(count($products) == 0)
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="display-6 text-center">No Product Found </h1>
                                    </div>
                                </div>
                            @endif


                        </div>
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
