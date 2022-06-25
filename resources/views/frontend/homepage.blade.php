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
                            @if ($shop->image)
                            <img class="lozad" data-src="{{asset('uploads/shop/'.$shop->image)}}" alt="shop" style="height: 75px; width:auto">
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                              </svg>
                            @endif
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
                        <img data-src="{{$product->img_small}}" data-placeholder-background="white" alt="product_img" class="product_img lozad">
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
                        <img data-src="{{$product->img_small}}" data-placeholder-background="white" alt="product_img" class="product_img lozad">
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
                            @if ($category->image)
                            <img class="lozad" data-src="{{asset('/'.$category->image)}}" alt="category">

                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                                <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                              </svg>
                            @endif
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
                            <img class="lozad" data-src="{{asset('frontend')}}/images/slide1.jpg" alt="market">
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
