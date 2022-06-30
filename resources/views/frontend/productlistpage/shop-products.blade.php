@extends('frontend.layouts.app')



@section('content')

    <input type="hidden" name="minprice" value="{{ $minPrice }}">
    <input type="hidden" name="maxprice" value={{ $maxPrice }}>
    <!-- breadcrumb start -->
    <div class="bradcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">
                                <a href="{{ route('categorylistpage') }}">Shop</a>
                            </li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li> --}}
                        </ol>
                    </nav>
                </div>
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
                                    <span class="text-secondary fs-6">Category</span>
                                </div>
                                <ul class="expandible">
                                    @foreach ($categories as $category)
                                        <li>
                                            <input type="checkbox" id="vehicle1" name="category[]"
                                                value="{{ $category->id }}" onchange="this.form.submit()"
                                                @if (isset($_GET['category']) && in_array($category->id, $_GET['category'])) checked @endif>
                                            <label for="vehicle1"> {{ $category->name }}</label><br>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header">
                                    <span class="text-secondary fs-6">Brand</span>
                                </div>
                                <ul class="expandible">
                                    @foreach ($brands as $brand)
                                        <li>
                                            <input type="checkbox" name="brand[]" value="{{ $brand->id }}"
                                                onchange="this.form.submit()"
                                                @if (isset($_GET['brand']) && in_array($brand->id, $_GET['brand'])) checked @endif />
                                            <label> {{ $brand->name }}</label><br>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="card mb-2">
                            <div class="card-header mb-3">
                                <span class="text-secondary fs-6">Price</span>
                            </div>
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                            <div class="price-range"><strong>৳</strong>
                                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');"
                                    id="min_price" class="price-range-field" /><strong>৳</strong>
                                <input type="number" name="maxprice" value="0" min=0 max="10000" oninput="validity.valid||(value='10000');"
                                    id="max_price" class="price-range-field" onchange="this.form.submit()" />

                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-12 col-md-12">
                        <div class="product-page">
                            <a href="#" class="single-shop shop_links market-links ">
                                <div class="single-market hover-none bg-white d-flex ">
                                    <div class="shop-photo market-photo">
                                        <img class="lozad" data-src="{{ asset('uploads/shop/' . $shop->image) }}"
                                            data-placeholder-background="white"
                                            onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';"
                                            alt="{{ $shop->name }}" style="height: 100px; width:auto">
                                    </div>
                                    <div class="shop-content market-content">
                                        <h5>{{ $shop->name }}</h5>
                                        {{-- <span> <i class="fa fa-map-marker" aria-hidden="true"></i> Panthapath,Dhaka</span> --}}
                                        <span> <i class="fa-solid fa-location-arrow"></i>{{ $shop->address }}</span>
                                    </div>
                                </div>
                            </a>
                            @if (count($products) > 0)
                                <div class="product-sort-sytem d-flex justify-content-between mb-3">
                                    <div class="product-sort-left">
                                        <label for="" style="font-size: 12px;">SORT BY : </label>
                                        <select name="price" onchange="this.form.submit()">
                                            <option value="">Latest</option>
                                            <option @if (isset($_GET['price']) && $_GET['price'] == 'desc') selected @endif value="desc">High To
                                                Low</option>
                                            <option @if (isset($_GET['price']) && $_GET['price'] == 'asc') selected @endif value="asc">Low To
                                                High</option>
                                        </select>
                                    </div>
                                    <div class="product-sort-right d-flex align-items-center">
                                        <div class="product-show-count">
                                            <label for="" style="font-size: 12px;">SHOW : </label>
                                            <select name="count" onchange="this.form.submit()">
                                                <option selected value="30">30</option>
                                                <option @if (isset($_GET['count']) && $_GET['count'] == '40') selected @endif value="40">40
                                                </option>
                                                <option @if (isset($_GET['count']) && $_GET['count'] == '50') selected @endif value="40">50
                                                </option>
                                            </select>
                                        </div>
                                        <div class="product-filter-grid">
                                            <a href="#"><span class="grid"> <i
                                                        class="fa-solid fa-border-none"></i></span></a>
                                            <a href="#"><span class="list"><i class="fas fa-list-ul"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                                            <div class="single-product ">
                                                <div class="product-photo position-relative">
                                                    <img data-src="{{ $product->img_small }}"
                                                        onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';"
                                                        data-placeholder-background="white" alt="product_img"
                                                        class="product_img lozad">
                                                    <div class="product-offers">
                                                        @if ($product->discount > 0)
                                                            <span>{{ $product->discount }}% off</span>
                                                        @endif
                                                        <span class="new_product">new</span>
                                                    </div>
                                                    <div class="product-btn">
                                                        <button type="button" class="quickviewbutton"
                                                            data-productid="{{ $product->id }}">quick view</button>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <a href="{{ route('singleproduct', $product->slug) }}"
                                                        class="product_title">
                                                        <h5 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="{{ $product->title }}">{{ $product->title }}</h5>
                                                    </a>
                                                    <div class="product-price">
                                                        <span class="text-dark">৳{{ $product->price }}
                                                            @if ($product->discount > 0)
                                                                <del
                                                                    class="text-secondary">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
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
                            @else
                                <div class="not-found-product text-center d-flex justify-content-center align-items-center pt-5"
                                    style="height: 100%">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            fill="#6c757d" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                        <h3 class="text-secondary">No item found</h3>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- product end -->

@endsection

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css"
        media="all" />
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

    @include('frontend.script.pricerangescript')

    <script>
        $('ul.expandible').each(function() {
            var $ul = $(this),
                $lis = $ul.find('li:gt(9)'),
                isExpanded = $ul.hasClass('expanded');
            $lis[isExpanded ? 'show' : 'hide']();

            if ($lis.length > 0) {
                $ul
                    .append($('<span class="showmore"><li class="expand">' + (isExpanded ? 'Show Less' :
                            'Show More') + '</li></span>')
                        .click(function(event) {
                            var isExpanded = $ul.hasClass('expanded');
                            event.preventDefault();
                            $(this).html(isExpanded ? 'Show More' : 'Show Less');
                            $ul.toggleClass('expanded');
                            $lis.toggle();
                        }));
            }
        });
    </script>

    @include('frontend.script.pricerangescript')
@endpush
