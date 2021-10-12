<div class="container">
    <div class="header-bottom d-lg-show w-100">
        <div class="header-left">
            <nav class="main-nav">
                <ul class="menu">
                    <li class="active">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="demo3-shop.html">Categories</a>
                        <div class="megamenu">
                            <div class="row">
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                                    <h4 class="menu-title">All Popular Categories</h4>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><a href="#">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div
                                    class="col-6 col-sm-8 col-md-8 col-lg-8 menu-banner menu-banner1 banner banner-fixed">
                                    <figure>
                                        <img src="{{asset('frontend')}}/images/menu/banner-1.jpg" alt="Menu banner" width="150"
                                            height="250" />
                                    </figure>
                                    <div class="banner-content y-50">
                                        <h4 class="banner-subtitle font-weight-bold text-primary ls-m">Sale.
                                        </h4>
                                        <h3 class="banner-title font-weight-bold"><span
                                                class="text-uppercase">Up to</span>70% Off</h3>
                                        <a href="#" class="btn btn-link btn-underline">shop now<i
                                                class="d-icon-arrow-right"></i></a>
                                    </div>
                                </div>
                                <!-- End Megamenu -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="demo3-product.html">Products</a>
                        <div class="megamenu">
                            <div class="row">
                                <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                    <h4 class="menu-title">Product Pages</h4>
                                    <ul>
                                        <li><a href="product-simple.html">Simple Product</a></li>
                                        <li><a href="product.html">Variable Product</a></li>
                                        <li><a href="product-sale.html">Sale Product</a></li>
                                        <li><a href="product-featured.html">Featured &amp; On Sale</a></li>

                                        <li><a href="product-left-sidebar.html">With Left Sidebar</a></li>
                                        <li><a href="product-right-sidebar.html">With Right Sidebar</a></li>
                                        <li><a href="product-sticky-cart.html">Add Cart Sticky<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="product-tabinside.html">Tab Inside</a></li>
                                    </ul>
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                    <h4 class="menu-title">Product Layouts</h4>
                                    <ul>
                                        <li><a href="product-grid.html">Grid Images<span
                                                    class="tip tip-new">New</span></a></li>
                                        <li><a href="product-masonry.html">Masonry</a></li>
                                        <li><a href="product-gallery.html">Gallery Type</a></li>
                                        <li><a href="product-full.html">Full Width Layout</a></li>
                                        <li><a href="product-sticky.html">Sticky Info</a></li>
                                        <li><a href="product-sticky-both.html">Left &amp; Right Sticky</a>
                                        </li>
                                        <li><a href="product-horizontal.html">Horizontal Thumb</a></li>

                                        <li><a href="#">Build Your Own</a></li>
                                    </ul>
                                </div>
                                <div
                                    class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner2 banner banner-fixed">
                                    <figure>
                                        <img src="images/menu/banner-2.jpg" alt="Menu banner" width="221"
                                            height="330" />
                                    </figure>
                                    <div class="banner-content x-50 text-center">
                                        <h3 class="banner-title text-white text-uppercase">Sunglasses</h3>
                                        <h4 class="banner-subtitle font-weight-bold text-white mb-0">$23.00
                                            -
                                            $120.00</h4>
                                    </div>
                                </div>
                                <!-- End MegaMenu -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="account.html">My Account</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="error-404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li class="d-xl-show">
                        <a href="#">Elements</a>
                        <ul>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-typography.html">Typography</a></li>
                            <li><a href="element-titles.html">Titles</a></li>
                            <li><a href="element-categories.html">Product Category</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-accordions.html">Accordions</a></li>
                            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonials.html">Testimonials</a></li>
                            <li><a href="element-blog-posts.html">Blog Posts</a></li>
                            <li><a href="element-instagrams.html">Instagrams</a></li>
                            <li><a href="element-cta.html">Call to Action</a></li>
                            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog-classic.html">Blog</a>
                        <ul>
                            <li><a href="blog-classic.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="#">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2col.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3col.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4col.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2col.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3col.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4col.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="post-single.html">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about-us.html">About Us</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <a href="#">Exclusive Offer</a>
            <a href="" target="_blank" class="ml-6">Business with Us</a>
        </div>
    </div>
</div>
