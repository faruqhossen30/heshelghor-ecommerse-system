@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Home
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
                            <h2 class="title title-line title-underline with-link appear-animate" data-animation-options="{'delay': '.3s'}">Featured Product
                                <a href="#" class="font-weight-semi-bold">View more<i class="d-icon-arrow-right"></i></a>
                            </h2>
                            <div class="row gutter-xs appear-animate" data-animation-options="{'delay': '.3s'}">
                                {{-- single product --}}
                                @foreach ($products as $product)
                                <div class="col-md-3 col-6 mb-4">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            @php
                                                $images = json_decode($product->image);
                                                // echo print_r($images);
                                                // echo $images[0]
                                            @endphp

                                            <a href="demo3-product.html">
                                                <img src="{{asset('uploads/products/'.$images[0])}}" alt="product" width="280"
                                                    height="315" style="background-color: #f5f5f5;" />
                                            </a>



                                            <div class="product-label-group">
                                                <label class="product-label label-new">new</label>
                                                <label class="product-label label-sale">15% off</label>
                                            </div>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                    data-target="#addCartModal" title="Add to cart"><i
                                                        class="d-icon-bag"></i></a>
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                                        class="d-icon-heart"></i></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat"><a href="demo3-shop.html">{{$product->category->name}}</a></div>
                                            <h3 class="product-name">
                                                <a href="demo3-product.html">{{$product->title}}</a>
                                            </h3>
                                            <div class="product-price">
                                                <ins class="new-price">৳{{$product->price}}</ins><del
                                                    class="old-price">৳{{$product->regular_price}}</del>
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
                                                        <img src="images/demos/demo3/products/9.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/10.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/11.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/12.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/13.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/14.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/15.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/16.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
                                                        <img src="images/demos/demo3/products/17.jpg" alt="product"
                                                            width="100" height="100" style="background-color: #f5f5f5;" />
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
