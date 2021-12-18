@extends('frontend.layouts.app')
@section('title')
    HeshelGhor|Shop Page
@endsection

@section('content')
<main class="main">
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo3.html"><i class="d-icon-home"></i></a></li>
                <li>Shop</li>
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
                    <form action="{{route('pruductspage-filter')}}" method="GET">
                        {{-- @csrf --}}
                        <nav class="toolbox sticky-content sticky-toolbox fix-top pt-0">
                            <div class="toolbox-left">
                                <a href="#"
                                    class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded d-lg-none">Filters<i
                                        class="d-icon-arrow-right"></i></a>
                                <div class="toolbox-item toolbox-sort select-box">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control" onchange="this.form.submit();">
                                        <option value="latest" @if(request()->get('orderby') == 'latest') selected @endif >Latest</option>
                                        <option value="lowtohigh" @if(request()->get('orderby') == 'lowtohigh') selected @endif  >Low To High</option>
                                        <option value="hightolow" @if(request()->get('orderby') == 'hightolow') selected @endif >Hith To Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box">
                                    <label>Show :</label>
                                    <select name="count" class="form-control" onchange="this.form.submit();">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="#" class="d-icon-mode-list btn-layout"></a>
                                    <a href="#" class="d-icon-mode-grid btn-layout active"></a>
                                </div>
                            </div>
                        </nav>
                    </form>
                    <div class="row cols-2 cols-sm-3 product-wrapper">
                        @foreach ($products as $product)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('singleproduct', $product->slug)}}">
                                            <img src="{{ asset('uploads/product/'.$product->photo) }}" alt="product" width="280" height="315">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
                                            <label class="product-label label-sale">12% OFF</label>
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
                                                    data-id="{{$product->id}}" type="button" class="btn btn-primary"
                                                    >Quick View
                                                </a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="{{route('product.with.category', $product->category->id)}}">{{$product->category->name}}</a>
                                            <a href="{{route('product.with.subcategory', $product->category->id)}}">| {{$product->subcategory->name}}</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="{{route('singleproduct', $product->id)}}">{{$product->title}}</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">৳{{ $product->price }}</ins><del class="old-price">৳{{ $product->regular_price }}</del>
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
                    {{$products->appends($_GET)->links()}}
                    {{-- <nav class="toolbox toolbox-pagination">
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
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End Main -->
@endsection
@push('styles')
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/nouislider/nouislider.min.css">
@endpush

@push('scripts')
    <script src="{{asset('frontend')}}/vendor/nouislider/nouislider.min.js"></script>
@endpush
