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
                                <label>Mobile:</label>
                                <a href="tel:#">{{$contact->mobile ?? '01xxxxxxxxx'}}</a>
                            </li>
                            <li>
                                <label>Email:</label>
                                <a href="mailto:mail@riode.com">{{$contact->email ?? 'example@domain.com'}}</a>
                            </li>
                            <li>
                                <label>Address:( Head Office)</label> <br>
                                <span>58, Borhan Shah Road, Karbala, Jashore-7400</span>
                            </li>
                            <li>
                                <label>Address:( Corporate Office)</label> <br>
                                <span>House:43 (2nd Flore), Road:4/A, Dhanmodi, Dhaka-1205</span>
                            </li>
                            <li>
                                <label>Address:(Trade Licence)</label> <br>
                                <span>59, Kajipara, Puraton Koshba, Jashore sadar, Jashore</span>
                            </li>
                            <li>
                                <label>WORKING DAYS: 7 Days in a week.</label>
                            </li>
                            <li>
                                <a href="#">Sun - Sat/ 9:00 AM - 7:00 PM</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Quick Link</h4>
                        <ul class="widget-body">
                            <li>
                                <a href="{{route('aboutus')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{route('termsandcondition')}}">Terms and condition</a>
                            </li>
                            <li>
                                <a href="{{route('privacypolicy')}}">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="{{route('returnpolicy')}}">Return & Refund Policy</a>
                            </li>
                            <li>
                                <a href="{{route('marchant.login')}}">Marchant Login</a>
                            </li>
                            <li>
                                <a href="{{route('cart.page')}}">View Cart</a>
                            </li>
                            <li>
                                <a href="{{route('jobs')}}">Jobs</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Widget -->
                </div>
                {{-- <div class="col-lg-3 col-md-6">
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
                </div> --}}
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget-instagram">
                        <h4 class="widget-title">HeshelGhor</h4>
                        <p>Heshelghor.com is an E-commerce business  platform. Our main objective is to provide an opportunity for all Bangladeshi businessmen to work on an online-based E-commerce platform</p>
                    </div>
                    <!-- End Instagram -->
                </div>
            </div>
        </div>
        <!-- End FooterMiddle -->
        <div class="footer-bottom">
            <div class="footer-left">
                <figure class="payment">
                    <img src="{{ asset('frontend') }}/images/ssl.png" alt="SSL Commerce"  />
                </figure>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">

            </div>
            <div class="footer-center">
                <p class="copyright">HeshelGhor eCommerce &copy; 2021. All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    @isset($socialmedia->facebook)
                        <a href="{{$socialmedia->facebook ?? '#'}}" target="_blank" class="social-link social-facebook fab fa-facebook-f"></a>
                    @endisset
                    @isset($socialmedia->twitter)
                        <a href="{{$socialmedia->twitter ?? '#'}}" class="social-link social-twitter fab fa-twitter"></a>
                    @endisset
                    @isset($socialmedia->linkedin)
                        <a href="{{$socialmedia->linkedin ?? '#'}}" class="social-link social-linkedin fab fa-linkedin-in"></a>
                    @endisset
                    @isset($socialmedia->youtube)
                    <a href="{{$socialmedia->youtube ?? '#'}}" class="social-link social-youtube fab fa-youtube"></a>
                    @endisset
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
        <li>
            <a href="{{ route('returnpolicy') }}">Return Policy</a>
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
        <li><a href="{{route('jobs')}}">Jobs</a></li>
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


