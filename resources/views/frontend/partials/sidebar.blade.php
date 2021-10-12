<aside class="col-xl-3 col-lg-4 sidebar sidebar-fixed sticky-sidebar-wrapper home-sidebar">
    <div class="sidebar-overlay">
        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
    </div>
    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
    <div class="sidebar-content">

        <div class="sticky-sidebar">
            <ul class="menu vertical-menu category-menu mb-4">
                <li><a href="demo3-shop.html" class="menu-title">Popular Categories</a></li>
                <li>
                    <a href="{{url('/product/category/5')}}"><i class="d-icon-camera1"></i>Electronics</a>
                </li>
                <li>
                    <a href="{{url('/product/category/7')}}"><i class="d-icon-officebag"></i>Man's Fashion</a>
                </li>
                <li>
                    <a href="{{url('/product/category/8')}}">
                        <i class="d-icon-t-shirt1" style="
                            font-size: 23px;
                            margin-left: -1px;
                            margin-right: .8rem;
                        "></i>Women's Fashion</a>
                </li>
                <li>
                    <a href="{{url('/product/category/6')}}"><i class="d-icon-cook"></i>Home And Kitchen </a>
                </li>

                <li>
                    <a href="{{url('/product/category/2')}}"><i class="d-icon-watch-round"></i>Health & Beauty
                    </a>
                </li>
                <li>
                    <a href="{{url('/product/category/4')}}"><i class="d-icon-basketball1"></i>Sports & Fitness</a>
                </li>
                <li>
                    <a href="{{url('/product/category/3')}}"><i class="d-icon-babycare"></i>Kids & Toys</a>
                </li>
                <li>
                    <a href="{{url('/product/category/1')}}">
                        <i class="d-icon-cook"></i>Heritage Foods
                    </a>
                </li>
                <li>
                    <a href="demo3-shop.html">
                        <i class="d-icon-card"></i>Daily Deals
                    </a>
                </li>
            </ul>
            <div class="banner banner-fixed overlay-zoom overlay-dark">
                <figure>
                    <img src="{{ asset('frontend') }}/images/demos/demo3/banner2.jpg" width="280" height="312"
                        alt="banner" style="background-color: #26303c;" />
                </figure>
                <div class="banner-price-info font-weight-bold text-white text-uppercase">
                    20-22<sup>th</sup> April</div>
                <div class="banner-content text-center w-100">
                    <h4
                        class="banner-subtitle d-inline-block bg-primary font-weight-semi-bold text-uppercase">
                        Ultimate Sale</h4>
                    <h3
                        class="banner-title ls-m lh-1 text-uppercase text-white font-weight-bold">
                        Up
                        to 70%</h3>
                    <p class="mb-4 font-primary text-white lh-1">Discount Selected Items</p>
                </div>
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
                                        <a href="demo3-product.html">Men's Fashion Hood</a>
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
                                        <a href="demo3-product.html">Women's Fashion Jeans
                                            Clothing</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">$199.00</ins><del
                                            class="old-price">$210.00</del>
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
                        <div class="products-col">
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
                                        <a href="demo3-product.html">Fashion Hiking Hat</a>
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
                                        <a href="demo3-product.html">Men's Fashion Hood</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">$19.00</span>
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
                                        <img src="{{ asset('frontend') }}/images/demos/demo3/products/12.jpg"
                                            alt="product" width="100" height="100"
                                            style="background-color: #f5f5f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="demo3-product.html">Women's Fashion Jeans
                                            Clothing</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">$199.00</ins><del
                                            class="old-price">$210.00</del>
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
                </div>
            </div>
            <div class="widget widget-blog border-no" data-animation-options="{
                'delay': '.3s'
            }">
                <h4 class="widget-title text-capitalize font-weight-bold">Latest Blog</h4>
                <div class="widget-body">
                    <div class="owl-carousel owl-nav-top" data-owl-options="{
                        'items': 1,
                        'loop': false,
                        'nav': true,
                        'dots': false,
                        'margin': 20
                    }">
                        <div class="post overlay-dark overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="{{ asset('frontend') }}/images/demos/demo3/blog/1.jpg" width="280"
                                        height="195" alt="post"
                                        style="background-color: #bcc3ca;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    on <a href="#" class="post-date">Nov 22, 2018</a>
                                </div>
                                <h3 class="post-title"><a href="post-single.html">Explore
                                        Fashion Trending For
                                        Women</a></h3>
                                <a href="post-single.html"
                                    class="btn btn-primary btn-link btn-underline btn-sm">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="post overlay-dark overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="{{ asset('frontend') }}/images/demos/demo3/blog/2.jpg" width="280"
                                        height="195" alt="post"
                                        style="background-color: #a1a7b6;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    on <a href="#" class="post-date">Nov 22, 2018</a>
                                </div>
                                <h3 class="post-title"><a href="post-single.html">Just a cool
                                        blog post with Images</a></h3>
                                <a href="post-single.html"
                                    class="btn btn-link btn-underline btn-primary btn-sm">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="post overlay-dark overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="{{ asset('frontend') }}/images/demos/demo3/blog/3.jpg" width="280"
                                        height="195" alt="post"
                                        style="background-color: #acb9bf;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    on <a href="#" class="post-date">Nov 22, 2018</a>
                                </div>
                                <h3 class="post-title"><a href="post-single.html">Just a cool
                                        blog post with Images</a></h3>
                                <a href="post-single.html"
                                    class="btn btn-link btn-underline btn-primary btn-sm">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="post overlay-dark overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="{{ asset('frontend') }}/images/demos/demo3/blog/4.jpg" width="280"
                                        height="195" alt="post"
                                        style="background-color: #2d3635;" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    on <a href="#" class="post-date">Nov 22, 2018</a>
                                </div>
                                <h3 class="post-title"><a href="post-single.html">Just a cool
                                        blog post with Images</a></h3>
                                <a href="post-single.html"
                                    class="btn btn-link btn-underline btn-primary btn-sm">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget widget-testimonial border-no" data-animation-options="{
                'delay': '.3s'
            }">
                <h4 class="widget-title text-capitalize font-weight-bold">Testimonials</h4>
                <div class="widget-body">
                    <div class="owl-carousel owl-nav-top" data-owl-options="{
                        'items': 1,
                        'loop': false,
                        'nav': true,
                        'dots': false,
                        'margin': 20
                    }">
                        <div class="testimonial">
                            <blockquote class="comment">I am keeping my fingers on the pulse by
                                Riode every year! It gives me good sense of trend. My family
                                likes it, too.</blockquote>
                            <div class="testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('frontend') }}/images/demos/demo3/agent.png" alt="user"
                                        width="40" height="40" />
                                </figure>
                                <cite class="font-weight-semi-bold text-capitalize">
                                    Casper Dalin
                                    <span>Investor</span>
                                </cite>
                            </div>
                        </div>
                        <div class="testimonial">
                            <blockquote class="comment">I am keeping my fingers on the pulse by
                                Riode every year! It gives me good sense of trend. My family
                                likes it, too.</blockquote>
                            <div class="testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('frontend') }}/images/demos/demo3/agent.png" alt="user"
                                        width="40" height="40" />
                                </figure>
                                <cite>
                                    Casper Dalin
                                    <span>Investor</span>
                                </cite>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
