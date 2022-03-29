@extends('frontend.layouts.app')
@section('title')
    HeshelGhor|Shop Page
@endsection

@section('content')
    <main class="main">
        <form action="{{ url()->current() }}" method="GET">
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo3.html"><i class="d-icon-home"></i></a></li>
                        <li>Shop</li>
                    </ul>
                    <!-- End Breadcrumb -->
                    <div class="row main-content-wrap gutter-lg">
                        <aside class="col-lg-3 sidebar sidebar-fixed shop-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                            <div class="sidebar-content">
                                <div class="sticky-sidebar">


                                    {{-- <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Price</h3>
                                    <div class="widget-body mt-3">

                                            <div class="filter-price-slider"></div>

                                            <div class="filter-actions">
                                                <div class="filter-price-text mb-4">Price:
                                                    <span class="filter-price-range"></span>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-dark btn-rounded btn-filter">Filter</button>
                                            </div>

                                    </div>
                                </div> --}}


                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Brand</h3>
                                    <ul class="widget-body filter-items">
                                        @php
                                            $filter_brand = [];
                                            if (isset($_GET['brand'])) {
                                                $filter_brand = $_GET['brand'];
                                            }
                                        @endphp
                                        @foreach ($brands as $brand)
                                            <div class="form-checkbox my-4 pb-2" style="border-bottom: 1px solid #eee">
                                                <input type="checkbox" name="brand[]"
                                                    value="{{ $brand->id }}" class="custom-checkbox"
                                                    id="brand_{{ $brand->id }}" @if (!empty($filter_brand) && in_array($brand->id, $filter_brand)) checked @endif
                                                    onchange="this.form.submit();">
                                                <label class="form-control-label" for="brand_{{ $brand->id }}">
                                                    {{ $brand->name }}</label>
                                            </div>
                                        @endforeach

                                    </ul>
                                </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-filter">Filter</button>


                                </div>
                            </div>


                        </aside>
                        {{-- sidebar end --}}

                        <div class="col-lg-9 main-content">
                            <nav class="toolbox sticky-content sticky-toolbox fix-top pt-0">
                                <div class="toolbox-left">
                                    <a href="#"
                                        class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded d-lg-none">Filters<i
                                            class="d-icon-arrow-right"></i></a>
                                    <div class="toolbox-item toolbox-sort select-box">
                                        <label>Sort By :</label>
                                        <select name="orderby" class="form-control" onchange="this.form.submit();">
                                            <option value="latest" @if (!empty($_GET['orderby']) && $_GET['orderby'] == 'latest') selected @endif>Latest</option>
                                            <option value="lowtohigh" @if (!empty($_GET['orderby']) && $_GET['orderby'] == 'lowtohigh') selected @endif>Low To High</option>
                                            <option value="hightolow" @if (!empty($_GET['orderby']) && $_GET['orderby'] == 'hightolow') selected @endif>High To Low</option>
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
                                                        <label class="product-label label-sale">{{ $product->discount }}%
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
                                                            href="{{ route('product.with.subcategory', ['category' => $product->category->slug, 'slug' => $product->subcategory->slug]) }}">|
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
                                                    <a href="demo3-product.html" class="rating-reviews">( 16 reviews )</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <nav class="toolbox toolbox-pagination">
                                {{ $products->appends($_GET)->links('pagination::custompagination') }}
                            </nav>
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
