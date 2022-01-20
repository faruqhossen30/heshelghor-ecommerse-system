<footer class="footer appear-animate" data-animation-options="{'name': 'fadeIn', 'duration': '1s'}">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="{{route('homepage')}}" class="logo-footer">
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
                                <a href="tel:#">{{$contact->phone ?? '01xxxxxxxxx'}}</a>
                            </li>
                            <li>
                                <label>Email:</label>
                                <a href="mailto:mail@riode.com">{{$contact->email ?? 'example@domain.com'}}</a>
                            </li>
                            <li>
                                <label>Address:</label>
                                <a href="#">{{$contact->address ?? '58, Karabala Jeshore'}}</a>
                            </li>
                            <li>
                                {{-- <label>WORKING DAYS 7 / HOURS:8</label> --}}
                                <label>{{$contact->working_day ?? ''}}</label>
                            </li>
                            <li>
                                {{-- <a href="#">Sar - T/ 9:00 AM - 6:00 PM</a> --}}
                                <a href="#">{{$contact->working_time ?? ''}}</a>
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
                                <img src="{{ asset('frontend') }}/images/instagram/01.jpg" alt="instagram 1" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/02.jpg" alt="instagram 2" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/03.jpg" alt="instagram 3" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/04.jpg" alt="instagram 4" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/05.jpg" alt="instagram 5" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/06.jpg" alt="instagram 6" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/07.jpg" alt="instagram 7" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend') }}/images/instagram/08.jpg" alt="instagram 8" width="64" height="64" />
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
                    <img src="{{ asset('frontend') }}/images/payment.png" alt="payment" width="159" height="29" />
                </figure>
            </div>
            <div class="footer-center">
                <p class="copyright">HeshelGhor eCommerce &copy; 2021. All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    <a href="{{$socialmedia->facebook ?? '#'}}" target="_blank" class="social-link social-facebook fab fa-facebook-f"></a>
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
            <a href="{{route('homepage')}}">Home</a>
        </li>
        <li>
            <a href="{{route('pruductspage')}}">Products</a>
        </li>
        <li>
            <a href="#">Categories</a>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{route('product.with.category', $category->slug)}}">{{$category->name}}</a>
                        @if (count($category->subcategories) > 0)
                            <ul>
                                @foreach ($category->subcategories as $subcategory)

                                <li><a href="{{route('product.with.subcategory', ['category'=>$category->slug, 'slug'=>$subcategory->slug])}}">{{$subcategory->name}}</a></li>
                                @endforeach

                            </ul>
                        @endif
                    </li>
                @endforeach


            </ul>
        </li>
        <li>
            <a href="{{ route('privacypolicy') }}">Privacy Policy</a>
        </li>
        @guest
            <li>
                <a href="{{ route('login') }}"> Sign in</a>
            </li>
        @endguest
        @auth
        <li>
            <a href="{{route('user.dashboard')}}">Dashboard</a>
        </li>
        @endauth
        <li><a href="{{route('marchant.login')}}">Merchant</a></li>
    </ul>
    <!-- End of MobileMenu -->
</div>
</div>

{{-- <div class="newsletter-popup mfp-hide" id="newsletter-popup"
style="background-image: url(images/newsletter-popup.jpg)">
<div class="newsletter-content">
    <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4>
    <h2 class="font-weight-semi-bold">Sign up to <span>RIODE</span></h2>
    <p class="text-grey">Subscribe to the Riode eCommerce newsletter to receive timely updates from your
        favorite
        products.</p>
    <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
        <input type="email" class="form-control email" name="email" id="email2"
            placeholder="Email address here..." required="">
        <button class="btn btn-dark" type="submit">SUBMIT</button>
    </form>
    <div class="form-checkbox justify-content-center">
        <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
            required />
        <label for="hide-newsletter-popup">Don't show this popup again</label>
    </div>
</div>
</div> --}}


