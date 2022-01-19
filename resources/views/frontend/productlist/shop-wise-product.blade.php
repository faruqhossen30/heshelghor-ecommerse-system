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
                        <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-md-3">
                                  @if ($shop->image)
                                  <img src="{{asset('uploads/shop/'.$shop->image)}}"
                                  class="card-img-top img-thumbnail" style="width: 200px; height:200px" alt="{{$shop->name}}">
                                  @else
                                  <img src="https://picsum.photos/seed/picsum/200/300"
                                          class="card-img-top img-thumbnail" style="width: 200px; height:200px" alt="{{$shop->name}}">

                                  @endif
                              </div>
                              <div class="col-md-9">
                                <div class="card-body">
                                  <h5 class="card-title my-2">
                                      <span><i class="fas fa-cart-plus"></i></span>
                                      {{$shop->name}}
                                  </h5>
                                  <p class="card-text mb-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{$shop->address}}

                                  </p>
                                  <a href="#">
                                    <p class="card-text mb-2"><small class="text-muted">
                                        <i class="far fa-building my-2"></i>
                                        Basun Dara shoping complex
                                    </small></p>
                                  </a>
                                <a href="{{route('pruductspage')}}" class="btn btn-primary btn-sm">Product Gallary</a>
                                </div>
                              </div>
                            </div>
                          </div>

                          @if (count($products)>0)
                          <nav class="toolbox sticky-content sticky-toolbox fix-top pt-0">
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
                        </nav>
                        <div class="row cols-2 cols-sm-3 product-wrapper">

                            @foreach ($products as $product)
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('singleproduct', $product->id) }}">
                                                <img src="{{$product->img_small }}" alt="product"
                                                    width="280" height="315">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">new</label>
                                                <label class="product-label label-sale">12% OFF</label>
                                            </div>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                    data-target="#addCartModal" title="Add to cart"><i
                                                        class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                                        class="d-icon-heart"></i></a>
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
                                                <a
                                                    href="{{ route('product.with.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                                    @if (optional($product->subcategory)->name)

                                                    <a href="{{ route('product.with.subcategory',['category' => $product->category->slug, 'slug'=> $product->subcategory->slug]) }}">|
                                                        {{ $product->subcategory->name }}</a>
                                                    @endif
                                            </div>
                                            <h3 class="product-name">
                                                <a href="{{route('singleproduct', $product->slug)}}">{{ $product->title }}</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">৳{{ $product->price }}</ins><del
                                                    class="old-price">৳{{ $product->regular_price }}</del>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:60%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{route('singleproduct', $product->slug)}}" class="rating-reviews">( 16 reviews )</a>
                                            </div>
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
    </main>
    <!-- End Main -->
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/vendor/nouislider/nouislider.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('frontend') }}/vendor/nouislider/nouislider.min.js"></script>
@endpush
