@extends('frontend.layouts.app')

@section('content')
    <!-- breadcrumb start -->
    <div class="bradcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- product start -->
    <div class="product-area">
        <div class="container">
            <form action="" method="GET">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="search-sidebar">
                        <div class="card mb-2">
                            <div class="card-header">
                                <span class="text-secondary fs-6">Categories</span>
                            </div>
                            <ul class="expandible">
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Bike">
                                    <label for="vehicle2"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Bike">
                                    <label for="vehicle3"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle4" name="vehicle4" value="Bike">
                                    <label for="vehicle4"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle5" name="vehicle5" value="Bike">
                                    <label for="vehicle5"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle6" name="vehicle6" value="Bike">
                                    <label for="vehicle6"> I have a bike</label><br>
                                </li>
                            </ul>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                <span class="text-secondary fs-6">Brand</span>
                            </div>
                            <ul class="expandible">
                                <li>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Bike">
                                    <label for="vehicle2"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Bike">
                                    <label for="vehicle3"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle4" name="vehicle4" value="Bike">
                                    <label for="vehicle4"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle5" name="vehicle5" value="Bike">
                                    <label for="vehicle5"> I have a bike</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="vehicle6" name="vehicle6" value="Bike">
                                    <label for="vehicle6"> I have a bike</label><br>
                                </li>
                            </ul>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header mb-3">
                                <span class="text-secondary fs-6">Price</span>
                            </div>
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                            <div class="price-range">
                                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');"
                                    id="min_price" class="price-range-field" />
                                <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');"
                                    id="max_price" class="price-range-field" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <div class="product-page">
                        <div class="product-sort-sytem d-flex justify-content-between mb-3">
                            <div class="product-sort-left">
                                <label for="" style="font-size: 12px;">SORT BY : </label>
                                <select name="price" onchange="this.form.submit()">
                                    <option value="">Latest</option>
                                    <option  @if (isset($_GET['price']) && $_GET['price'] == 'desc') selected @endif value="desc">High To Low</option>
                                    <option  @if (isset($_GET['price']) && $_GET['price'] == 'asc') selected @endif value="asc">Low To High</option>
                                </select>
                            </div>
                            <div class="product-sort-right d-flex align-items-center">
                                <div class="product-show-count">
                                    <label for="" style="font-size: 12px;">SHOW : </label>
                                    <select name="count" onchange="this.form.submit()">
                                        <option selected value="10">30</option>
                                        <option @if (isset($_GET['count']) && $_GET['count'] == '40') selected @endif value="40">40</option>
                                        <option @if (isset($_GET['count']) && $_GET['count'] == '50') selected @endif value="40">50</option>
                                    </select>
                                </div>
                                <div class="product-filter-grid">
                                    <a href="product.html"><span class="grid"> <i
                                                class="fa-solid fa-border-none"></i></span></a>
                                    <a href="product-grid.html"><span class="list"><i
                                                class="fas fa-list-ul"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            @foreach ($products as $product)
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="single-product ">
                                        <div class="product-photo position-relative">
                                            <img src="{{ $product->img_small }}" alt="product_img" class="product_img">
                                            <div class="product-offers">
                                                <span>20% off</span>
                                                <span class="new_product">new</span>
                                            </div>
                                            <div class="product-icon">
                                                <i class="fa fa-heart"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="product-btn">
                                                <button type="button" class="quickviewbutton" data-productid="{{$product->id}}">quick view</button>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <a href="single_product.html" class="product_title">
                                                <h5 data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $product->title }}">{{ $product->title }}</h5>
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
                            <div class="row my-3">
                                {{ $products->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>

    <!-- product end -->
@endsection
