@php
// cart count
$totalitem = Cart::count();
$totalprice = Cart::priceTotal();
@endphp
<div class="header-middle sticky-header fix-top sticky-content">
    <div class="container">
        <div class="header-left">
            <a href="#" class="mobile-menu-toggle">
                <i class="d-icon-bars2"></i>
            </a>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('frontend/img/logo.jpg') }}" alt="logo" width="153" height="44" />
            </a>
            <!-- End Logo -->

            <div class="header-search hs-simple">
                <form action="{{route('searchtest')}}" method="get" class="input-wrapper border" style="position: relative"
                    id="searchFrom">
                    {{-- @csrf --}}
                    <div class="select-box">
                        <select id="category" name="location">
                            <option value="all">All Location</option>
                            @foreach ($divissions as $divission)
                                <option value="" style="font-weight: bolder">
                                    <strong>{{ $divission->name }}</strong></option>
                                @foreach ($divission->districts as $district)
                                    <option value="{{ $district->slug }}" @if(request()->query('location') == $district->slug) selected @endif >- {{ $district->name }}</option>
                                @endforeach

                            @endforeach
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" autocomplete="off"
                        placeholder="Search..." id="searchInpur" />
                    <button class="btn btn-search" type="submit">
                        <i class="d-icon-search"></i>
                    </button>
                </form>
                <div class=""
                    style="z-index: 999999999;position: absolute; width:100%; display:none"
                    id="searchResultDiv">
                    <ul class="list-group" id="searchProductList">
                        <a href=""
                            class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <img src="https://picsum.photos/id/1005/367/267" alt=""
                                    class="img-thumbnail" style="width: 40px; height:40px">
                                <span>Just for test</span>
                            </div>
                            <div>
                                <span>$500</span>
                            </div>
                        </a>
                    </ul>
                </div>
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
                    <p>{{ $header->mobile ?? '' }}</p>
                </div>
            </a>
            <span class="divider"></span>
            <a href="wishlist.html" class="wishlist">
                <i class="d-icon-heart"></i>
            </a>
            <span class="divider"></span>
            <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                {{-- <a href="#" class="cart-toggle label-block link"> --}}
                <a href="{{ route('cart.page') }}" class="label-block link">
                    <div class="cart-label d-lg-show">
                        <span class="cart-name">Shopping Cart</span>
                        <span class="cart-price">৳{{ $totalprice }}</span>
                    </div>
                    <i class="d-icon-bag"><span class="cart-count">{{ $totalitem }}</span></i>
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
                                    <img src="{{ asset('frontend') }}/images/cart/product-1.jpg"
                                        alt="product" width="80" height="88" />
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
                                    <img src="{{ asset('frontend') }}/images/cart/product-2.jpg"
                                        alt="product" width="80" height="88" />
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
                        <span class="price">{{ $totalprice }}</span>
                    </div>
                    <!-- End of Cart Total -->
                    <div class="cart-action">
                        <a href="{{ route('cart.page') }}" class="btn btn-dark btn-link">View Cart</a>
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



{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
{{-- <script>
    let search = document.getElementById('searchInpur');
    let searchResultDiv = document.getElementById('searchResultDiv');
    let searchProductList = document.getElementById('searchProductList');

    // console.log(search)

    search.addEventListener('keyup', function(event) {
        let keyword = event.target.value.trim();
        let url = `search/${keyword}`;
        if(keyword.length == 0){
            searchResultDiv.style.display = 'none'
        };

        if (keyword) {
            axios.get(url)
                .then(function(res) {
                    if (res.data.length > 0) {
                        searchResultDiv.style.display = 'block'
                        console.log(res.data);
                        li = res.data.map(function(post){
                            return `<a href="product/${post.id}" class="list-group-item">${post.title}</a>`;
                        });
                        li = li.join(' ');
                        searchProductList.innerHTML = li;


                    };

                })
                .catch(function(err) {
                    console.log(err);
                })
        };
        console.log(event.target.value);
    });
</script> --}}



