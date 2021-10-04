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
                    <section class="product-wrapper mb-8">
                        <h2 class="title title-line title-underline with-link appear-animate"
                            data-animation-options="{
                            'delay': '.3s'
                        }">Featured Product
                            <a href="#" class="font-weight-semi-bold">View more<i
                                    class="d-icon-arrow-right"></i></a>
                        </h2>
                        <div class="row gutter-xs appear-animate" data-animation-options="{
                            'delay': '.3s'
                        }">
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/1.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />

                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
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
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Women’s</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Comfortable Brown Scarf</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">$28.74</span>
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
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/2.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart"><i
                                                    class="d-icon-bag"></i></a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Bags</a></div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Fashional Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">$83.32</span>
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
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/3.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
                                            <label class="product-label label-sale">35% off</label>
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
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Shoes</a></div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Converse Season Shoes</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$140.00</ins><del
                                                class="old-price">$187.00</del>
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
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/4.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
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
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Bags</a></div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">A Dress-suit Valise</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">$242.12</span>
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
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/5.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">27% off</label>
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
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Watch</a></div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Fashion Electric Wrist Watch</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">$472.14</ins><del
                                                class="old-price">$524.45</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:40%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/6.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart"><i
                                                    class="d-icon-bag"></i></a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Women’s</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Fashional Handbag</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">$72.34</span>
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
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/7.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">new</label>
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
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Cosmetic</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Flush Blue Tank</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">$16.45</span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:40%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-4">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="demo3-product.html">
                                            <img src="images/demos/demo3/products/8.jpg" alt="product"
                                                width="280" height="315" style="background-color: #f5f5f5;" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart"><i
                                                    class="d-icon-bag"></i></a>
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="demo3-shop.html">Shoes</a></div>
                                        <h3 class="product-name">
                                            <a href="demo3-product.html">Women’s Red Sneaker</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="price">$49.76</span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="banner banner-cta mb-7 text-center"
                        style="background-image: url(images/demos/demo3/banner.jpg);  background-color: #c5d1d2;">
                        <div class="banner-content w-100 appear-animate" data-animation-options="{
                            'delay': '.2s',
                            'name': 'blurIn'
                        }">
                            <h4 class="banner-subtitle font-weight-bold ls-s text-white text-uppercase">Coming
                                soon</h4>
                            <h2 class="banner-title font-weight-normal ls-m"><strong>Black Friday</strong>
                                Sale</h2>
                            <p class="font-primary text-dark ls-normal text-capitalize lh-1">Get 10% off first
                                order</p>
                            <form action="#" method="get" class="input-wrapper input-wrapper-inline">
                                <input type="email" class="form-control mb-4" name="email" id="email"
                                    placeholder="Email address here..." required />
                                <button class="btn btn-secondary btn-sm" type="submit">Subscribe<i
                                        class="d-icon-arrow-right"></i></button>
                            </form>
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
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/10.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/11.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/12.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/13.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/14.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/15.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/16.jpg" alt="product"
                                                        width="100" height="100"
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
                                                    <img src="images/demos/demo3/products/17.jpg" alt="product"
                                                        width="100" height="100"
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

                    <section class="mb-10 pb-6">
                        <h2 class="title title-line title-underline">Featured Brands</h2>
                        <div class="container">
                            <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                                data-owl-options="{
                                'nav': false,
                                'dots': false,
                                'autoplay': true,
                                'margin': 20,
                                'loop': true,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 5
                                    }
                                }
                            }">
                                <figure><img src="images/brands/1.png" alt="brand" width="180" height="100" />
                                </figure>
                                <figure><img src="images/brands/2.png" alt="brand" width="180" height="100" />
                                </figure>
                                <figure><img src="images/brands/3.png" alt="brand" width="180" height="100" />
                                </figure>
                                <figure><img src="images/brands/4.png" alt="brand" width="180" height="100" />
                                </figure>
                                <figure><img src="images/brands/5.png" alt="brand" width="180" height="100" />
                                </figure>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

