@extends('frontend.layouts.app')

@section('content')
<!-- slider start -->
@include('frontend.inc.homepage.slider')
<!-- slider end -->


<!-- shop start -->
<div class="shop-area section-padding" style="background-color: #FCE6DF;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-heading text-center mb-5">
                    <h4>Featured Shop</h4>
                    <span>Get Your Product from Shop</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($shops as $shop)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
                <a href="single-shop.html" class="shop_links market-links ">
                    <div class="single-shop single-market d-flex ">
                        <div class="shop-photo market-photo">
                            <img class="lozad" data-src="{{asset('uploads/shop/'.$shop->image)}}" data-placeholder-background="white" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';"  alt="{{$shop->name}}" style="height: 75px; width:auto">

                        </div>
                        <div class="shop-content market-content">
                            <h5>{{$shop->name}}</h5>
                            <span> <i class="fa fa-map-marker"></i> {{$shop->address}}</span>
                            <span> <i class="fa-solid fa-location-arrow"></i> Panthapath,Dhaka</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-button text-center">
                    <a href="{{route('shoplist')}}"><button type="button" class="btn btn-secondary">See All Shop</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop end -->

<!-- product start -->
<div class="product-area section-padding" style="background-color: #d9bcb3;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-heading text-center mb-5">
                    <h4>Featured Products</h4>
                    <span>Get Your Product from Shop</span>
                </div>
            </div>
        </div>
        <div class="row g-2">
            @foreach ($featursproducts as $product)
            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="single-product ">
                    <div class="product-photo position-relative">
                        <img data-src="{{$product->img_small}}" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';" data-placeholder-background="white" alt="product_img" class="product_img lozad">
                        <div class="product-offers">
                            @if($product->discount > 0)
                            <span>{{$product->discount}}% off</span>
                            @endif
                            <span class="new_product">new</span>
                        </div>
                        <div class="product-icon">
                            <i class="fa fa-heart"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="product-btn">
                            <button class="quickviewbutton" data-productid="{{$product->id}}">quick view</button>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <a href="single_product.html" class="product_title">
                            <h5>{{$product->title}}</h5>
                        </a>
                        <div class="product-price">
                            <span class="text-dark">৳{{$product->price}}
                                @if($product->discount > 0)
                                <del class="text-secondary">${{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
                                @endif
                            </span>
                        </div>
                        <div class="product-ratting ">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <span class="text-secondary fs-6">(0)</span>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-button text-center">
                    <a href="{{route('pruductspage')}}"><button type="button" class="btn btn-secondary">See All Products</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product end -->

<!-- Ladies product start -->
<div class="product-area section-padding" style="background-color: #FCE6DF;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-heading text-center mb-5">
                    <h4>Ladies Corner</h4>
                    <span>Get Your Product</span>
                </div>
            </div>
        </div>
        <div class="row g-2">
            @foreach ($ladiesproduct as $product)
            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="single-product ">
                    <div class="product-photo position-relative">
                        <img data-src="{{$product->img_small}}" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';" data-placeholder-background="white" alt="product_img" class="product_img lozad" style="background-size:100%">
                        <div class="product-offers">
                            @if($product->discount > 0)
                            <span>{{$product->discount}}% off</span>
                            @endif
                            <span class="new_product">new</span>
                        </div>
                        <div class="product-icon">
                            <i class="fa fa-heart"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="product-btn">
                            <button class="quickviewbutton" data-productid="{{$product->id}}">quick view</button>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <a href="single_product.html" class="product_title">
                            <h5>{{$product->title}}</h5>
                        </a>
                        <div class="product-price">
                            <span class="text-dark">৳{{$product->price}}
                                @if($product->discount > 0)
                                <del class="text-secondary" style="font-size: .9rem">${{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
                                @endif
                            </span>
                        </div>
                        <div class="product-ratting ">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <span class="text-secondary fs-6">(0)</span>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-button text-center">
                    <a href="{{route('pruductspage')}}"><button type="button" class="btn btn-secondary">See All Products</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product end -->

<!-- category start -->
<div class="category-area section-padding" style="background-color: #d9bcb3;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-heading text-center mb-5">
                    <h4>Category</h4>
                    <span>Get Your Product from Shop</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="#" class="category_links  ">
                    <div class="single-category bg-white mb-4">
                        <div class="category-photo">
                            <img class="lozad" data-src="{{asset('/'.$category->image)}}" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';" data-placeholder-background="white" alt="{{$category->name}}">
                        </div>
                        <span>{{$category->name}}</span>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-button text-center">
                    <a href="{{route('categorylistpage')}}"><button type="button" class="btn btn-secondary">Show
                            All</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- category end -->

<!-- market start -->
<div class="market-area section-padding" style="background-color: #FCE6DF;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-heading text-center mb-5">
                    <h4>Market</h4>
                    <span>Get Your Product from Market</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($markets as $market)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
                <a href="#" class="market-links">
                    <div class="single-market  d-flex ">
                        <div class="market-photo">
                            <img class="lozad" data-src="{{asset('frontend')}}/images/slide1.jpg" onerror="this.onerror=null;this.src='{{asset('frontend/images/placeholder.jpg')}}';" data-placeholder-background="white" alt="{{$market->name}}">
                        </div>
                        <div class="market-content">
                            <h5>{{$market->name}}</h5>
                            <span> <i class="fa fa-map-marker"></i> Panthapath,Dhaka</span>
                            <span> <i class="fa-solid fa-location-arrow"></i> Panthapath,Dhaka</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-button text-center">
                    <a href="{{route('market.list')}}"><button type="button" class="btn btn-secondary">See All
                            Market</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- market end -->
@endsection
