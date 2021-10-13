@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Store of needs
@endsection

@section('content')
    <main class="main mt-lg-4">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    {{-- This is sidebar --}}
                    @include('frontend.partials.sidebar')
                    <div class="col-xl-9 col-lg-8">
                        {{-- Slider --}}
                        @include('frontend.partials.slider')
                        {{-- Featured product --}}
                        <section class="product-wrapper mb-8">
                            <h2 class="title title-line title-underline with-link appear-animate"
                                data-animation-options="{'delay': '.3s'}">Featured Product
                                <a href="#" class="font-weight-semi-bold">View more<i class="d-icon-arrow-right"></i></a>
                            </h2>
                            <div class="row gutter-xs appear-animate" data-animation-options="{'delay': '.3s'}">
                                {{-- single product --}}
                                @foreach ($products as $product)
                                    <div class="col-md-3 col-6 mb-4">
                                        <div class="product text-center">
                                            <figure class="product-media">

                                                <a href="{{route('singleproduct', $product->id)}}">
                                                    <img src="{{ asset('uploads/product/' . $product->photo) }}" alt="product"
                                                        width="280" height="315" style="background-color: #f5f5f5;" />
                                                </a>



                                                <div class="product-label-group">
                                                    <label class="product-label label-new">new</label>
                                                    <label class="product-label label-sale">15% off</label>
                                                </div>
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                        data-target="#addCartModal" title="Add to cart"><i
                                                            class="d-icon-bag"></i></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                        View</a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="{{route('product.with.category', $product->category->id)}}">{{$product->category->name}}</a>
                                                    <a href="{{route('product.with.subcategory', $product->category->id)}}">| {{$product->subcategory->name}}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="demo3-product.html">{{ $product->title }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <ins class="new-price">৳{{ $product->price }}</ins><del
                                                        class="old-price">৳{{ $product->regular_price }}</del>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </section>

                        {{-- Show Category --}}
                        <section class="pt-6 mt-10">
                            <div class="container">
                                <h2 class="title title-simple">Popular Categories</h2>
                                <div class="owl-carousel owl-theme owl-loaded owl-drag" data-owl-options="{
                                            'nav': false,
                                            'dots': true,
                                            'autoplay': true,
                                            'margin': 20,
                                            'responsive': {
                                                '0': {
                                                    'items': 1
                                                },
                                                '480': {
                                                    'items': 2
                                                },
                                                '768': {
                                                    'items': 3
                                                },
                                                '992': {
                                                    'items': 4,
                                                    'dots': false
                                                }
                                            }
                                        }">

                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">

                                            @foreach ($subcategories as $subcategory)
                                                <div class="owl-item " style="width: 280px; margin-right: 20px;">
                                                    <div class="category category-absolute category-classic">
                                                        <a href="{{route('product.with.subcategory', $subcategory->id)}}">
                                                            <figure class="category-media">
                                                                <img src="{{$subcategory->image}}"
                                                                    alt="Cateogry" width="280" height="280">
                                                            </figure>
                                                            <div class="category-content">
                                                                <h4 class="category-name">{{ $subcategory->name }}</h4>
                                                                <span class="category-count">1 Products</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach






                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation"
                                            class="owl-prev"><i class="d-icon-angle-left"></i></button><button
                                            type="button" role="presentation" class="owl-next"><i
                                                class="d-icon-angle-right"></i></button></div>
                                    <div class="owl-dots disabled"></div>
                                </div>
                            </div>
                        </section>

                        {{-- Category wirse product --}}
                        @foreach ($categories as $category)
                        @if (count($category->products) > 0)
                        <section class="product-wrapper mb-8">
                            <h2 class="title title-line title-underline with-link appear-animate"
                                data-animation-options="{'delay': '.3s'}">{{ $category->name }}
                                <a href="{{ route('product.with.category', $category->id) }}"
                                    class="font-weight-semi-bold">View more<i class="d-icon-arrow-right"></i></a>
                            </h2>
                            <div class="row gutter-xs appear-animate" data-animation-options="{'delay': '.3s'}">
                                {{-- single product --}}
                                @php
                                    $newporducts = \App\Models\Product\Product::latest('id')
                                        ->where('category_id', $category->id)
                                        ->paginate(4);
                                @endphp

                                @foreach ($newporducts as $product)
                                    <div class="col-md-3 col-6 mb-4">
                                        <div class="product text-center">
                                            <figure class="product-media">

                                                <a href="{{route('singleproduct', $product->id)}}">
                                                    <img src="{{ asset('uploads/product/' . $product->photo) }}"
                                                        alt="product" width="280" height="315"
                                                        style="background-color: #f5f5f5;" />
                                                </a>



                                                <div class="product-label-group">
                                                    <label class="product-label label-new">new</label>
                                                    <label class="product-label label-sale">15% off</label>
                                                </div>
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                        data-target="#addCartModal" title="Add to cart"><i
                                                            class="d-icon-bag"></i></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-quickview"
                                                        title="Quick View">Quick
                                                        View</a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="{{route('product.with.category', $product->category->id)}}">{{$product->category->name}}</a>
                                                    <a href="{{route('product.with.subcategory', $product->category->id)}}">| {{$product->subcategory->name}}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="demo3-product.html">{{ $product->title }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <ins class="new-price">৳{{ $product->price }}</ins><del
                                                        class="old-price">৳{{ $product->regular_price }}</del>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </section>
                        @endif

                        @endforeach




                        <section class="mb-3">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="widget widget-products appear-animate" data-animation-options="{
                                                'name': 'fadeInLeftShorter',
                                                'delay': '.5s'
                                            }">
                                        <h4 class="widget-title font-weight-bold">Sale Products</h4>
                                        <div class="products-col">
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/9.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Women’s Beautiful
                                                            Headgear</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$78.24</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:40%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/10.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Hand Electric Cell</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$26.00</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/11.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Women Hempen Hood
                                                            a Mourner</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$30.00</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:20%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4 ">
                                    <div class="widget widget-products appear-animate" data-animation-options="{
                                                'name': 'fadeIn',
                                                'delay': '.3s'
                                            }">
                                        <h4 class="widget-title font-weight-bold">Latest Products</h4>
                                        <div class="products-col">
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/12.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Fashionable Orginal
                                                            Trucker</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$78.64</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:40%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/13.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Men Summer Sneaker</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$79.45</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:60%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/14.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Season Sports Cap</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$64.27</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:20%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="widget widget-products appear-animate" data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'delay': '.5s'
                                            }">
                                        <h4 class="widget-title font-weight-bold">Best of the Week</h4>
                                        <div class="products-col">
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/15.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Blue Sports Shoes</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$36.00</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:20%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/16.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Fashion Handbag</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <ins class="new-price">$53.99</ins><del
                                                            class="old-price">$67.99</del>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-list-sm">
                                                <figure class="product-media">
                                                    <a href="demo3-product.html">
                                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/17.jpg"
                                                            alt="product" width="100" height="100"
                                                            style="background-color: #f5f5f5;" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-name">
                                                        <a href="demo3-product.html">Women’s Beautiful
                                                            Headgear</a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="price">$82.23</span>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width:60%"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        @include('frontend.partials.brand')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

