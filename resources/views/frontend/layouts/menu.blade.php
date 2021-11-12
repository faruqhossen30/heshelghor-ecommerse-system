@php
    $categories = App\Models\Product\Category::get();
@endphp
<div class="container">
    <div class="header-bottom d-lg-show w-100">
        <div class="header-left">
            <nav class="main-nav">
                <ul class="menu">
                    <li class="active">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">Categories</a>
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
                        <a href="{{route('pruductspage')}}">Products</a>

                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Error 404</a></li>
                            <li><a href="#">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li class="d-xl-show">
                        <a href="#">Elements</a>
                        <ul>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Typography</a></li>
                            <li><a href="#">Titles</a></li>
                            <li><a href="#">Product Category</a></li>
                            <li><a href="#">Buttons</a></li>
                            <li><a href="#">Accordions</a></li>
                            <li><a href="#">Alert &amp; Notification</a></li>
                            <li><a href="#">Tabs</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Blog Posts</a></li>
                            <li><a href="#">Instagrams</a></li>
                            <li><a href="#">Call to Action</a></li>
                            <li><a href="#">Icon Boxes</a></li>
                            <li><a href="#">Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                        <ul>
                            <li><a href="#">Classic</a></li>
                            <li><a href="#">Listing</a></li>
                            <li>
                                <a href="#">Grid</a>
                                <ul>
                                    <li><a href="#">Grid 2 columns</a></li>
                                    <li><a href="#">Grid 3 columns</a></li>
                                    <li><a href="#">Grid 4 columns</a></li>
                                    <li><a href="#">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="#">Masonry 2 columns</a></li>
                                    <li><a href="#">Masonry 3 columns</a></li>
                                    <li><a href="#">Masonry 4 columns</a></li>
                                    <li><a href="#">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="#">Blog mask grid</a></li>
                                    <li><a href="#">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                    <li>
                        <a href="{{route('shoplist')}}">Shops</a>
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
