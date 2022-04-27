<aside class="col-xl-3 col-lg-4 sidebar sidebar-fixed sticky-sidebar-wrapper home-sidebar">
    <div class="sidebar-overlay">
        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
    </div>
    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
    <div class="sidebar-content">

        <div class="sticky-sidebar">
            <ul class="menu vertical-menu category-menu mb-4">
                <li><a href="demo3-shop.html" class="menu-title">Popular Categories</a></li>

                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('product.with.category', $category->slug) }}"><i class="d-icon-th-list"></i>{{$category->name}}</a>
                    </li>
                @endforeach

            </ul>
            <div class="banner banner-fixed overlay-zoom overlay-dark">
                <figure>
                    <img src="{{ asset('frontend') }}/images/appqrcode.png" width="280" height="312"
                        alt="banner" style="background-color: #26303c;" />
                </figure>
                {{-- <div class="banner-price-info font-weight-bold text-white text-uppercase">
                    20-22<sup>th</sup> April</div>
                <div class="banner-content text-center w-100">
                    <h4 class="banner-subtitle d-inline-block bg-primary font-weight-semi-bold text-uppercase">
                        Ultimate Sale</h4>
                    <h3 class="banner-title ls-m lh-1 text-uppercase text-white font-weight-bold">
                        Up
                        to 70%</h3>
                    <p class="mb-4 font-primary text-white lh-1">Discount Selected Items</p>
                </div> --}}
            </div>
            <div class="widget widget-products border-no" data-animation-options="{
                'delay': '.3s'
            }">
                <h4 class="widget-title font-weight-bold">Popular Products</h4>
                <div class="widget-body">
                    <div class="owl-carousel owl-nav-top" data-owl-options="{
                        'items': 1,
                        'loop': false,
                        'nav': true,
                        'dots': false,
                        'margin': 20
                    }">
                        <div class="products-col">
                            @foreach ($products as $product)
                            <div class="product product-list-sm">
                                <figure class="product-media">
                                    <a href="{{route('singleproduct', $product->slug)}}">
                                        <img src="{{$product->img_small}}"
                                            alt="product" width="100" height="100" style="background-color: #f5f5f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{route('singleproduct', $product->slug)}}">{{$product->title}}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">৳{{$product->price}}</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="products-col">
                            @foreach ($products as $product)
                            <div class="product product-list-sm">
                                <figure class="product-media">
                                    <a href="{{route('singleproduct', $product->slug)}}">
                                        <img src="{{$product->img_small}}"
                                            alt="product" width="100" height="100" style="background-color: #f5f5f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{route('singleproduct', $product->slug)}}">Fashion Hiking Hat</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">$39.00</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
