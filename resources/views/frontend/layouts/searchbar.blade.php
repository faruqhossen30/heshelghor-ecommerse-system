@php
    $totalitem = Cart::count();
    $total = Cart::total();

@endphp

<div class="header-middle sticky-header fix-top sticky-content">
    <div class="container">
        <div class="header-left">
            <a href="#" class="mobile-menu-toggle">
                <i class="d-icon-bars2"></i>
            </a>
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('frontend/img/logo.jpg')}}" alt="logo" width="153" height="44" />
            </a>
            <!-- End Logo -->

            <div class="header-search hs-simple">
                <form action="#" class="input-wrapper">
                    <input type="text" class="form-control" id="mySearch" name="search" autocomplete="off"
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
                    <p>+88 0421-61720</p>
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
                        <span class="cart-price">৳ {{$total}}</span>
                    </div>
                    <i class="d-icon-bag"><span class="cart-count">{{$totalitem}}</span></i>
                </a>
                <div class="cart-overlay"></div>
                <!-- End Cart Toggle -->
                <div class="dropdown-box">
                    <div class="cart-header">
                        <h4 class="cart-title">test Cart</h4>
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
                        <a href="{{route('cart.page')}}" class="btn btn-dark btn-link">View Cart</a>
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
