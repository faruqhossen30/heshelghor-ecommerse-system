<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>HeshelGhor | Store of needs</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Riode - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:400,500,600,700,800,900' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '{{asset('frontend')}}/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>


    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/animate/animate.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/owl-carousel/owl.carousel.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/demo3.min.css">
</head>

<body class="home">

    <div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Riode store message or remove it!</p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown">
                            <a href="#currency">USD</a>
                            <ul class="dropdown-box">
                                <li><a href="#USD">USD</a></li>
                                <li><a href="#EUR">EUR</a></li>
                            </ul>
                        </div>
                        <!-- End DropDown Menu -->
                        <div class="dropdown ml-5">
                            <a href="#language">ENG</a>
                            <ul class="dropdown-box">
                                <li>
                                    <a href="#USD">ENG</a>
                                </li>
                                <li>
                                    <a href="#EUR">FRH</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End DropDown Menu -->
                        <span class="divider"></span>
                        <a href="contact-us.html" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
                        <a href="#" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>
                        <a class="login-link" href="ajax/login.html" data-toggle="login-modal"><i
                                class="d-icon-user"></i>Sign in</a>
                        <span class="delimiter">/</span>
                        <a class="register-link ml-0" href="ajax/login.html" data-toggle="login-modal">Register</a>
                        <!-- End of Login -->
                    </div>
                </div>
            </div>
            <!-- End HeaderTop -->
            <div class="header-middle sticky-header fix-top sticky-content">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="demo3.html" class="logo">
                            <img src="{{asset('frontend/img/logo.jpg')}}" alt="logo" width="153" height="44" />
                        </a>
                        <!-- End Logo -->

                        <div class="header-search hs-simple">
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Search..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End Header Search -->
                    </div>
                    <div class="header-right">
                        <a href="tel:#" class="icon-box icon-box-side">
                            <div class="icon-box-icon mr-0 mr-lg-2">
                                <i class="d-icon-phone"></i>
                            </div>
                            <div class="icon-box-content d-lg-show">
                                <h4 class="icon-box-title">Call Us Now:</h4>
                                <p>0(800) 123-456</p>
                            </div>
                        </a>
                        <span class="divider"></span>
                        <a href="wishlist.html" class="wishlist">
                            <i class="d-icon-heart"></i>
                        </a>
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                            <a href="#" class="cart-toggle label-block link">
                                <div class="cart-label d-lg-show">
                                    <span class="cart-name">Shopping Cart:</span>
                                    <span class="cart-price">$0.00</span>
                                </div>
                                <i class="d-icon-bag"><span class="cart-count">2</span></i>
                            </a>
                            <div class="cart-overlay"></div>
                            <!-- End Cart Toggle -->
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <h4 class="cart-title">Shopping Cart</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                            class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                                </div>
                                <div class="products scrollable">
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="images/cart/product-1.jpg" alt="product" width="80"
                                                    height="88" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Riode White Trends</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$21.00</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End of Cart Product -->
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="images/cart/product-2.jpg" alt="product" width="80"
                                                    height="88" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Dark Blue Women’s
                                                Leomora Hat</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$118.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Cart Product -->
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$139.00</span>
                                </div>
                                <!-- End of Cart Total -->
                                <div class="cart-action">
                                    <a href="cart.html" class="btn btn-dark btn-link">View Cart</a>
                                    <a href="checkout.html" class="btn btn-dark"><span>Go To Checkout</span></a>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End Dropdown Box -->
                        </div>
                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="header-bottom d-lg-show w-100">
                    <div class="header-left">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="demo3.html">Home</a>
                                </li>
                                <li>
                                    <a href="demo3-shop.html">Categories</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                <h4 class="menu-title">Variations 1</h4>
                                                <ul>
                                                    <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                                    <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                                    <li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a></li>
                                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter</a>
                                                    </li>
                                                    <li><a href="shop-navigation-filter.html">Navigation Filter<span
                                                                class="tip tip-hot">Hot</span></a></li>

                                                    <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                                                    <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                                                <h4 class="menu-title">Variations 2</h4>
                                                <ul>

                                                    <li><a href="shop-grid-3cols.html">3 Columns Mode<span
                                                                class="tip tip-new">New</span></a></li>
                                                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                                    <li><a href="shop-list.html">List Mode</a></li>
                                                </ul>
                                            </div>
                                            <div
                                                class="col-6 col-sm-4 col-md-3 col-lg-4 menu-banner menu-banner1 banner banner-fixed">
                                                <figure>
                                                    <img src="images/menu/banner-1.jpg" alt="Menu banner" width="221"
                                                        height="330" />
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
                        <a href="#">Limited Time Offer</a>
                        <a href="https://d-themes.com/buynow/riodehtml" target="_blank" class="ml-6">Buy Riode!</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->
        <main class="main mt-lg-4">
            <div class="page-content">
                <div class="container">
                    <div class="row">
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
                                            <a href="demo3-shop.html"><i class="d-icon-camera1"></i>Electronics</a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html"><i class="d-icon-officebag"></i>Backpacks &amp;
                                                Fashion bags</a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html"><i class="d-icon-gamepad1"></i>Gaming &amp;
                                                Accessories
                                            </a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html"><i class="d-icon-basketball1"></i>Sporting
                                                Goods</a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html">
                                                <i class="d-icon-t-shirt1" style="
                                                    font-size: 23px;
                                                    margin-left: -1px;
                                                    margin-right: .8rem;
                                                "></i>Travel &amp; Clothing</a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html"><i class="d-icon-desktop"></i>Computer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html"><i class="d-icon-cook"></i>Home &amp; Kitchen</a>
                                        </li>
                                        <li><a href="demo3-shop.html" class="menu-title mt-1">Today Coupon Deals</a>
                                        </li>
                                        <li>
                                            <a href="demo3-shop.html">
                                                <i class="d-icon-card"></i>Backpacks &amp; Fashion bags
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
                                            <img src="images/demos/demo3/banner2.jpg" width="280" height="312"
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
                                                                <img src="images/demos/demo3/products/10.jpg"
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
                                                                <img src="images/demos/demo3/products/11.jpg"
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
                                                                <img src="images/demos/demo3/products/12.jpg"
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
                                                                <img src="images/demos/demo3/products/10.jpg"
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
                                                                <img src="images/demos/demo3/products/11.jpg"
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
                                                                <img src="images/demos/demo3/products/12.jpg"
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
                                                            <img src="images/demos/demo3/blog/1.jpg" width="280"
                                                                height="195" alt="post"
                                                                style="background-color: #bcc3ca;" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            by <a href="#" class="post-author">John Doe</a>
                                                            on <a href="#" class="post-date">Nov 22, 2018</a>
                                                        </div>
                                                        <h3 class="post-title"><a href="post-single.html">Explore Fashion Trending For
                                                                Women</a></h3>
                                                        <a href="post-single.html"
                                                            class="btn btn-primary btn-link btn-underline btn-sm">Read
                                                            More<i class="d-icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="post overlay-dark overlay-zoom">
                                                    <figure class="post-media">
                                                        <a href="post-single.html">
                                                            <img src="images/demos/demo3/blog/2.jpg" width="280"
                                                                height="195" alt="post"
                                                                style="background-color: #a1a7b6;" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            by <a href="#" class="post-author">John Doe</a>
                                                            on <a href="#" class="post-date">Nov 22, 2018</a>
                                                        </div>
                                                        <h3 class="post-title"><a href="post-single.html">Just a cool blog post with Images</a></h3>
                                                        <a href="post-single.html"
                                                            class="btn btn-link btn-underline btn-primary btn-sm">Read
                                                            More<i class="d-icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="post overlay-dark overlay-zoom">
                                                    <figure class="post-media">
                                                        <a href="post-single.html">
                                                            <img src="images/demos/demo3/blog/3.jpg" width="280"
                                                                height="195" alt="post"
                                                                style="background-color: #acb9bf;" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            by <a href="#" class="post-author">John Doe</a>
                                                            on <a href="#" class="post-date">Nov 22, 2018</a>
                                                        </div>
                                                        <h3 class="post-title"><a href="post-single.html">Just a cool blog post with Images</a></h3>
                                                        <a href="post-single.html"
                                                            class="btn btn-link btn-underline btn-primary btn-sm">Read
                                                            More<i class="d-icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="post overlay-dark overlay-zoom">
                                                    <figure class="post-media">
                                                        <a href="post-single.html">
                                                            <img src="images/demos/demo3/blog/4.jpg" width="280"
                                                                height="195" alt="post"
                                                                style="background-color: #2d3635;" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details">
                                                        <div class="post-meta">
                                                            by <a href="#" class="post-author">John Doe</a>
                                                            on <a href="#" class="post-date">Nov 22, 2018</a>
                                                        </div>
                                                        <h3 class="post-title"><a href="post-single.html">Just a cool blog post with Images</a></h3>
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
                                                            <img src="images/demos/demo3/agent.png" alt="user"
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
                                                            <img src="images/demos/demo3/agent.png" alt="user"
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
                        <div class="col-xl-9 col-lg-8">
                            <section class="intro-section mb-6">
                                <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 mb-4"
                                    data-owl-options="{
                                    'items': 1,
                                    'dots': true,
                                    'nav': false,
                                    'loop': true,
                                    'autoplay': false
                                }">
                                    <div class="banner banner-fixed intro-slide1">
                                        <figure>
                                            <img src="images/demos/demo3/slides/1.jpg" alt="intro-banner" width="880"
                                                height="474" style="background-color: #ffc74e;" />
                                        </figure>
                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-white font-weight-semi-bold lh-1 ls-normal slide-animate"
                                                data-animation-options="{'name': 'fadeInDownShorter', 'duration': '1s', 'delay': '.8s'}">
                                                New Arrivals!</h4>
                                            <h2 class="banner-title mb-7 text-uppercase ls-l lh-1 slide-animate"
                                                data-animation-options="{'name': 'fadeInDownShorter', 'duration': '1s', 'delay': '.8s'}">
                                                T-shirt From <span class="text-white">$19.99</span></h2>
                                            <a href="demo3-shop.html" class="btn btn-white btn-rounded slide-animate" data-animation-options="{
                                                'name': 'fadeInDownShorter', 'duration': '1s', 'delay': '.8s'
                                            }">Shop Now</a>
                                            <div class="slide-animate"
                                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '.8s'}">
                                                <h2 class="banner-text text-white text-uppercase">men</h2>
                                            </div>
                                            <figure class="intro1-image slide-animate" data-animation-options="{
                                                'name': 'fadeInLeftShorter', 'duration': '.8s'
                                            }">
                                                <img src="images/demos/demo3/slides/single.png" alt="Men" width="511"
                                                    height="478">
                                            </figure>
                                        </div>

                                    </div>
                                    <div class="banner banner-fixed intro-slide2">
                                        <figure>
                                            <img src="images/demos/demo3/slides/2.jpg" alt="intro-banner" width="880"
                                                height="474" style="background-color: #fbfcfc;" />
                                        </figure>
                                        <div class="banner-content y-50 text-right">
                                            <h4 class="banner-subtitle text-body font-weight-semi-bold mb-3 slide-animate"
                                                data-animation-options="{
                                                'name': 'fadeInDownShorter',
                                                'duration': '1s'
                                            }">Up To <strong class="text-primary">25% Off</strong></h4>
                                            <h2 class="banner-title text-uppercase ls-l slide-animate"
                                                data-animation-options="{
                                                'name': 'fadeInDownShorter',
                                                'delay': '.3s',
                                                'duration': '1s'
                                            }">For Women’s</h2>
                                            <p class="font-weight-semi-bold ls-m text-body mb-6 slide-animate"
                                                data-animation-options="{
                                                'name': 'fadeInDownShorter',
                                                'delay': '.4s',
                                                'duration': '1s'
                                            }">Start at $12.00</p>
                                            <a href="demo3-shop.html" class="btn btn-dark btn-rounded slide-animate" data-animation-options="{
                                                'name': 'fadeInDownShorter',
                                                'delay': '.5s',
                                                'duration': '1s'
                                            }">Shop Now</a>
                                        </div>
                                    </div>
                                    <div class="banner banner-fixed intro-slide3">
                                        <figure>
                                            <img src="images/demos/demo3/slides/3.jpg" alt="intro-banner" width="880"
                                                height="474" style="background-color: #d3d4d5;" />
                                        </figure>
                                        <div class="banner-content y-50 pb-3">
                                            <div class="slide-animate" data-animation-options="{
                                                'name': 'fadeInUpShorter',
                                                'duration': '1s'
                                            }">
                                                <h4 class="banner-subtitle font-weight-normal ls-m mb-1">Deals and
                                                    Promotions</h4>
                                                <h2 class="banner-title text-uppercase mb-3 ls-l">Season Clothing</h2>
                                                <h4 class="banner-price-info text-uppercase ls-l">Start at <strong
                                                        class="text-primary">$29.00</strong></h4>
                                                <p class="text-dark lh-1 ls-m mb-4">* Get Plus Discount Buying Package
                                                </p>
                                                <a href="demo3-shop.html" class="btn btn-white btn-rounded">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="category category-absolute category-badge">
                                            <a href="#">
                                                <figure class="category-media">
                                                    <img src="images/demos/demo3/banners/1.jpg" alt="category"
                                                        width="430" height="189" style="background-color: #eceef2;" />
                                                </figure>
                                            </a>
                                            <div class="category-content">
                                                <h4 class="category-name font-weight-bold text-uppercase">Accessories
                                                </h4>
                                                <a href="demo3-shop.html" class="btn btn-primary">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="category category-absolute category-badge">
                                            <a href="#">
                                                <figure class="category-media">
                                                    <img src="images/demos/demo3/banners/2.jpg" alt="category"
                                                        width="430" height="189" style="background-color: #929ca3;" />
                                                </figure>
                                            </a>
                                            <div class="category-content">
                                                <h4 class="category-name font-weight-bold text-uppercase">watches</h4>
                                                <a href="demo3-shop.html" class="btn btn-primary">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="product-wrapper mb-8">
                                <h2 class="title title-line title-underline with-link appear-animate"
                                    data-animation-options="{
                                    'delay': '.3s'
                                }">Featured Product
                                    <a href="#" class="font-weight-semi-bold">View more<i
                                            class="d-icon-arrow-right"></i></a></h2>
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
        <!-- End of Main -->
        <footer class="footer appear-animate" data-animation-options="{'name': 'fadeIn', 'duration': '1s'}">
            <div class="container">
                <div class="footer-top">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="demo3.html" class="logo-footer">
                                <img src="{{asset('frontend/img/logo.jpg')}}" alt="logo-footer" width="154"
                                    height="43" />
                            </a>
                            <!-- End FooterLogo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                                <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                                    <h4 class="widget-title">Subscribe to our Newsletter</h4>
                                    <p>Get all the latest information, Sales and Offers.</p>
                                </div>
                                <form action="#" class="input-wrapper input-wrapper-inline">
                                    <input type="email" class="form-control" name="email" id="newsletter_email"
                                        placeholder="Email address here..." required />
                                    <button class="btn btn-primary btn-md btn-rounded ml-2" type="submit">subscribe<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End Newsletter -->
                        </div>
                    </div>
                </div>
                <!-- End FooterTop -->
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget-info">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                    <li>
                                        <label>Phone:</label>
                                        <a href="tel:#">Toll Free (123) 456-7890</a>
                                    </li>
                                    <li>
                                        <label>Email:</label>
                                        <a href="mailto:mail@riode.com">mail@riode.com</a>
                                    </li>
                                    <li>
                                        <label>Address:</label>
                                        <a href="#">123 Street Name, City, England</a>
                                    </li>
                                    <li>
                                        <label>WORKING DAYS / HOURS:</label>
                                    </li>
                                    <li>
                                        <a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Order History</a>
                                    </li>
                                    <li>
                                        <a href="#">Returns</a>
                                    </li>
                                    <li>
                                        <a href="#">Custom Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Condition</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">Sign in</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">View Cart</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#">Track My Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget widget-instagram">
                                <h4 class="widget-title">Instagram</h4>
                                <figure class="widget-body row">
                                    <div class="col-3">
                                        <img src="images/instagram/01.jpg" alt="instagram 1" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/02.jpg" alt="instagram 2" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/03.jpg" alt="instagram 3" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/04.jpg" alt="instagram 4" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/05.jpg" alt="instagram 5" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/06.jpg" alt="instagram 6" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/07.jpg" alt="instagram 7" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="images/instagram/08.jpg" alt="instagram 8" width="64" height="64" />
                                    </div>
                                </figure>
                            </div>
                            <!-- End Instagram -->
                        </div>
                    </div>
                </div>
                <!-- End FooterMiddle -->
                <div class="footer-bottom">
                    <div class="footer-left">
                        <figure class="payment">
                            <img src="images/payment.png" alt="payment" width="159" height="29" />
                        </figure>
                    </div>
                    <div class="footer-center">
                        <p class="copyright">Riode eCommerce &copy; 2021. All Rights Reserved</p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                        </div>
                    </div>
                </div>
                <!-- End FooterBottom -->
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <!-- Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="demo3.html" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a href="demo3-shop.html" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a>
        <a href="wishlist.html" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Wishlist</span>
        </a>
        <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="d-icon-search"></i>
                <span>Search</span>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End of Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End of CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <ul class="mobile-menu mmenu-anim">
                <li>
                    <a href="demo3.html">Home</a>
                </li>
                <li>
                    <a href="demo3-shop.html">Categories</a>
                    <ul>
                        <li>
                            <a href="#">
                                Variations 1
                            </a>
                            <ul>
                                <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                <li><a href="shop-infinite-scroll.html">Infinite Ajaxscroll</a></li>
                                <li><a href="shop-horizontal-filter.html">Horizontal Filter</a></li>
                                <li><a href="shop-navigation-filter.html">Navigation Filter<span
                                            class="tip tip-hot">Hot</span></a></li>

                                <li><a href="shop-off-canvas.html">Off-Canvas Filter</a></li>
                                <li><a href="shop-right-sidebar.html">Right Toggle Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                Variations 2
                            </a>
                            <ul>

                                <li><a href="shop-grid-3cols.html">3 Columns Mode<span
                                            class="tip tip-new">New</span></a></li>
                                <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                <li><a href="shop-list.html">List Mode</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="demo3-product.html">Categories</a>
                    <ul>
                        <li>
                            <a href="#">Product Pages</a>
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
                        </li>
                        <li>
                            <a href="#">Product Layouts</a>
                            <ul>
                                <li><a href="product-grid.html">Grid Images<span class="tip tip-new">New</span></a></li>
                                <li><a href="product-masonry.html">Masonry</a></li>
                                <li><a href="product-gallery.html">Gallery Type</a></li>
                                <li><a href="product-full.html">Full Width Layout</a></li>
                                <li><a href="product-sticky.html">Sticky Info</a></li>
                                <li><a href="product-sticky-both.html">Left &amp; Right Sticky</a></li>
                                <li><a href="product-horizontal.html">Horizontal Thumb</a></li>

                                <li><a href="#">Build Your Own</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li><a href="about-us.html">About</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="account.html">Login</a></li>
                        <li><a href="faq.html">FAQs</a></li>
                        <li><a href="error-404.html">Error 404</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
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
                <li><a href="riode.html">Buy Riode!</a></li>
            </ul>
            <!-- End of MobileMenu -->
        </div>
    </div>

    <div class="newsletter-popup mfp-hide" id="newsletter-popup" style="background-image: url(images/newsletter-popup.jpg)">
        <div class="newsletter-content">
            <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4>
            <h2 class="font-weight-semi-bold">Sign up to <span>RIODE</span></h2>
            <p class="text-grey">Subscribe to the Riode eCommerce newsletter to receive timely updates from your favorite
                products.</p>
            <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email" name="email" id="email2" placeholder="Email address here..."
                    required="">
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox justify-content-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                    required />
                <label for="hide-newsletter-popup">Don't show this popup again</label>
            </div>
        </div>
    </div>

    <!-- Plugins JS File -->
    <script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="{{asset('frontend')}}/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/sticky/sticky.min.js"></script>
    <!-- Main JS File -->
    <script src="{{asset('frontend')}}/js/main.min.js"></script>
</body>

</html>
