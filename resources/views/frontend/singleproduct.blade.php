@php
$relatedProduct = App\Models\Product\Product::with('category', 'subcategory')
    ->where('category_id', $product->category_id)
    // ->limit(10)
    ->get();
$user = Auth::user();
$wishlist = null;

if ($user) {
    $wishlist = App\Models\Wishlist::where('product_id', $product->id)
        ->where('user_id', $user->id)
        ->first();
}

@endphp

@extends('frontend.layouts.app')
@section('title')
    {{ $product->title }}
@endsection
@section('OG')
    <!-- Facebook & Linkedit Open Graph -->
    <meta property="og:url" content="{{ route('singleproduct', $product->slug) }}" />
    <meta property="og:type" content="product" />
    <meta property="og:title" content="{{ $product->title }}" />
    <meta property="og:description" content="{{ $product->short_description }}" />
    <meta property="og:image" content="{{ $product->img_large }}" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@heshelghor" />
    <meta property="og:title" content="{{ $product->title }}" />
    <meta property="og:description" content="{{ $product->short_description }}" />
    <meta property="og:image" content="{{ $product->img_large }}" />
@endsection

@section('content')
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index: 999999999">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add To Wish List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="{{ route('addwishlist.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                            <input type="hidden" name="mobile" value="">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div id="my_camera"></div>
                                    <br />
                                    <button type=button class="btn btn-dark btn-sm mb-4" onClick="take_snapshot()">
                                        <i class="d-icon-camera1 mr-2"></i> Taka Photo
                                    </button>
                                    <input type="hidden" name="image" class="image-tag">
                                    <div id="results">Your captured image will appear here...</div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <br />
                                    <button type=submit class="btn btn-dark btn-sm mb-4" onClick="take_snapshot()">
                                        <i class="d-icon-heart mr-2"></i> Add To Wishlistt
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- End Modal --}}


    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-9">
            <div class="container">
                <div class="product product-single row mb-8">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                <figure class="product-image">
                                    <img src="{{ $product->img_full }}" data-zoom-image="{{ $product->img_full }}"
                                        alt="Blue Pinafore Denim Dress" width="800" height="900"
                                        style="background-color: #f5f5f5;" />
                                </figure>
                                @foreach ($product->images as $image)
                                    <figure class="product-image">
                                        <img src="{{ $image->url }}" data-zoom-image="{{ $image->url }}"
                                            alt="Blue Pinafore Denim Dress" width="800" height="900"
                                            style="background-color: #f5f5f5;" />
                                    </figure>
                                @endforeach

                            </div>
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">
                                    <div class="product-thumb active">
                                        <img src="{{ $product->img_full }}" alt="product thumbnail" width="137"
                                            height="154" style="background-color: #f5f5f5;" />
                                    </div>
                                    @foreach ($product->images as $image)
                                        <div class="product-thumb ">
                                            <img src="{{ $image->url }}" alt="product thumbnail" width="137" height="154"
                                                style="background-color: #f5f5f5;" />
                                        </div>
                                    @endforeach

                                </div>
                                <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details  product-gallery-sticky">
                            <div class="product-navigation">
                                <ul class="breadcrumb breadcrumb-lg">
                                    <li><a href="{{ route('homepage') }}"><i class="d-icon-home"></i></a></li>
                                    <li><a href="{{ route('pruductspage') }}" class="active">Products</a></li>
                                    <li>Detail</li>
                                </ul>
                            </div>
                            {{-- For Ajax request --}}
                            <input type="hidden" name="shop_id" value="{{ $product->shop_id }}">
                            <h1 class="product-name">{{ $product->title }}</h1>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:0%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( No review )</a>
                            </div>
                            <div class="product-price">৳{{ $product->price }}</div>
                            <p class="product-short-desc">
                                {{ Str::substr($product->short_description, 0, 200) }}
                                <a href="#product-tab-description" class="link-to-tab rating-reviews"><b> ....View more</b></a>
                            </p>
                            <div class="product-meta">
                                {{-- SKU:<span class="product-sku">123456701</span> --}}
                                CATEGORIES: <a href="#"><span
                                        class="product-brand mr-0">{{ $product->category->name }}</span></a>
                                @if (optional($product->subcategory)->name)
                                    <a
                                        href="{{ route('product.with.subcategory', ['category' => $product->category->slug, 'slug' => $product->subcategory->slug]) }}"><span
                                            class="product-brand">| {{ $product->subcategory->name }}</span></a>
                                @endif
                            </div>
                            <div class="product-meta">
                                Brand:
                                @if ($product->brand)
                                    <a href="{{ route('product.with.brand', $product->brand->id) }}"><span
                                            class="product-brand mr-0">{{ $product->brand->name }}</span></a>
                                @else
                                    N/A
                                @endif
                                <p>Stock Quantity: {{ $product->quantity }}</p>
                            </div>
                            <div class="product-meta">
                                <h6>Additional Information:</h6>
                                @isset($product->youtube_link)
                                    <a href="{{ $product->youtube_link }}" class="popup btn btn-primary btn-sm">Video</a>
                                @endisset
                                @if ($product->category_id == 38)
                                    <p class="card-text mb-1">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        Cash on delivery available.
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Warranty not available
                                    </p>
                                    <p class="card-text mb-1  border-top">
                                        <i class="fas fa-address-card"></i>
                                        Please Contact,  for <b>Details</b> or <b>Buy</b>
                                    </p>

                                    <p class="card-text mb-1">
                                        <i class="fas fa-headset"></i>
                                        Heshelghor: +88 02477763843
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-phone"></i>
                                        Mobile: +88 01318-760087, +88 01859-348860 , +88 01715-127719
                                    </p>
                                    {{-- <p class="card-text mb-1">
                                        <i class="fas fa-headset"></i>
                                         +88 01859348860
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-headset"></i>
                                       +88 01789438144
                                    </p> --}}
                                @else
                                    <p class="card-text mb-1">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        Cash on delivery not available.
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Warranty not available
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-undo"></i>
                                        7 - 10 Working Days Return. <a href="{{ route('returnpolicy') }}"
                                            class="text-primary">Return Policy</a>
                                    </p>
                                @endif


                            </div>


                            {{-- For Add To Cart --}}
                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                                @csrf
                                @if (count($product->colors) > 0)
                                    <div class="mb-3 row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"
                                            style="font-size: 1.7rem">Color:</label>
                                        <div class="col-sm-4">
                                            <select name="color" class="form-select form-select-lg" id="staticEmail"
                                                aria-label="Default select example" style="font-size: 1.5rem">
                                                <option selected>Select Color </option>
                                                @foreach ($product->colors as $color)
                                                    <option value="{{ $color->color->name }}">
                                                        {{ $color->color->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                @if (count($product->sizes) > 0)
                                    <div class="mb-3 row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"
                                            style="font-size: 1.7rem">Size:</label>
                                        <div class="col-sm-4">
                                            <select name="size" class="form-select form-select-lg" id="staticEmail"
                                                aria-label="Default select example" style="font-size: 1.5rem">
                                                <option selected value="">Select Size </option>
                                                @foreach ($product->sizes as $size)
                                                    <option value="{{ $size->size->name }}">{{ $size->size->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="product-footer" id="productShopAndMarketInfoDiv">

                                </div>
                                @if ($product->category_id != 38)
                                <div class="product-form product-qty">
                                    <div class="product-form-group">
                                        <div class="input-group mr-2">
                                            <button type="button" class="quantity-minus d-icon-minus"></button>
                                            <input name="quantity" class="quantity form-control" type="number" min="1"
                                                max="1000000">
                                            <button type="button" class="quantity-plus d-icon-plus"></button>
                                        </div>
                                        <button type="submit" class="btn btn btn-dark btn-sm">
                                            <i class="d-icon-gift mr-2"></i>Add to Cart</button>
                                        <a href="{{ route('buynow', $product->id) }}" type="submit"
                                            class="btn btn-rounded btn-alert btn-sm">
                                            <i class="d-icon-bag mr-2"></i>Buy Now !</a>

                                        @if ($wishlist)
                                            <a href="{{ route('wishlist') }}" class="btn btn btn-dark btn-sm">
                                                <i class="d-icon-heart"></i>
                                                Go To Wishlist
                                            </a>
                                        @else
                                            <button type="button" class="btn btn btn-dark btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="d-icon-heart"></i>
                                                Add To Wishlist
                                            </button>
                                        @endif

                                    </div>
                                </div>
                                @endif

                            </form>

                            <hr class="product-divider">



                            <hr class="product-divider mb-3">

                            <div class="product-footer">
                                <div class="social-links mr-4">
                                    <span><i class="fas fa-share"></i> Share On: </span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('singleproduct', $product->slug) }}"
                                        class="social-link social-facebook fab fa-facebook-f ml-2"></a>
                                    <a href="whatsapp://send?text={{ route('singleproduct', $product->slug) }}"
                                        class="social-link social-whatsapp fab fa-whatsapp"></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ route('singleproduct', $product->slug) }}"
                                        class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="//pinterest.com/pin/create/link/?url={{ route('singleproduct', $product->slug) }}"
                                        class="social-link social-pinterest fab fa-pinterest-p"></a>
                                </div>
                                <hr class="divider d-lg-show">

                            </div>

                            {{-- <div class="product-footer" id="productShopAndMarketInfoDiv">

                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="tab tab-nav-simple product-tabs mb-5">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#product-tab-description">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-comment">Comment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-additional">Other information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-reviews">Reviews (0)</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        {{-- Description --}}
                        <div class="tab-pane active in mb-3" id="product-tab-description">
                            <div class="row mt-6">
                                <div class="col-md-6">
                                    <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
                                    {!! html_entity_decode($product->description) !!}
                                </div>
                            </div>
                        </div>
                        {{-- Comment --}}
                        <div class="tab-pane in mb-3" id="product-tab-comment">
                            <!-- Button trigger modal -->

                            @comments(['model' => $product])
                        </div>
                        <div class="tab-pane" id="product-tab-additional">
                            <ul class="list-none">
                                <li><label>Brands:</label>
                                    <p>{{ $product->brand->name ?? 'N/A' }}</p>
                                </li>
                                <li><label>Color:</label>
                                    <p>
                                        @foreach ($product->colors as $color)
                                            <span>-{{ $color->color->name }}</span>
                                        @endforeach
                                    </p>
                                </li>
                                <li><label>Size:</label>
                                    <p>
                                        @foreach ($product->sizes as $size)
                                            <span>-{{ $size->size->name }}</span>
                                        @endforeach
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane " id="product-tab-reviews">
                            {{-- <div class="comments pb-10 pt-2 border-no">
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="images/blog/comments/2.jpg" alt="avatar">
                                                </a>
                                            </figure>
                                            <div class="comment-body">
                                                <div class="comment-rating ratings-container mb-0">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <span class="tooltiptext tooltip-top">4.00</span>
                                                    </div>
                                                </div>
                                                <div class="comment-user">
                                                    <span class="comment-date text-body">September 24, 2020 at 2:15
                                                        am</span>
                                                    <h4><a href="#">John Doe</a></h4>
                                                </div>

                                                <div class="comment-content">
                                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper
                                                        est,
                                                        vitae luctus metus libero eu augue. Morbi purus liberpuro
                                                        ate vol faucibus adipiscing.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- End Comments -->
                            {{-- <div class="reply">
                                <div class="title-wrapper text-left">
                                    <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <div class="rating-form">
                                    <label for="rating" class="text-dark">Your rating * </label>
                                    <span class="rating-stars">
                                        <label for="radion1"><span><i class="d-icon-phone"></i></span></label>
                                        <input id="radion1" type="radio" name="rating" class="star-1" value="1">
                                        <input id="radion2" type="radio" name="rating" class="star-2" value="2">
                                        <input id="radion3" type="radio" name="rating" class="star-3" value="3">
                                        <input id="radion4" type="radio" name="rating" class="star-4 active" value="4">
                                        <input id="radion5" type="radio" name="rating" class="star-5" value="5">
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: block;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>
                                <form action="#">
                                    <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4" placeholder="Comment *" required></textarea>
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <input type="text" class="form-control" id="reply-name" name="reply-name"
                                                placeholder="Name *" required />
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <input type="email" class="form-control" id="reply-email" name="reply-email"
                                                placeholder="Email *" required />
                                        </div>
                                    </div>
                                    <div class="form-checkbox mb-4">
                                        <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                            name="signin-remember" />
                                        <label class="form-control-label" for="signin-remember">
                                            Save my name, email, and website in this browser for the next time I
                                            comment.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div> --}}
                            <!-- End Reply -->

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-center">No Review Found !</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="related-product mt-10">
                    <h2 class="title title-center mb-1 ls-normal">Related Products</h2>

                    <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                                                                'items': 5,
                                                                'nav': false,
                                                                'loop': false,
                                                                'dots': true,
                                                                'margin': 20,
                                                                'responsive': {
                                                                    '0': {
                                                                        'items': 2
                                                                    },
                                                                    '768': {
                                                                        'items': 3
                                                                    },
                                                                    '992': {
                                                                        'items': 5,
                                                                        'dots': false,
                                                                        'nav': true
                                                                    }
                                                                }
                                                            }">
                        @foreach ($relatedProduct as $product)
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('singleproduct', $product->slug) }}">
                                        <img loading="lazy" src="{{ $product->img_small }}" alt="product" width="280"
                                            height="315">
                                    </a>

                                    <div class="product-action">
                                        <a class="btn-product view-data" title="Quick View" data-id="{{ $product->id }}"
                                            type="button" class="btn btn-primary">Quick View
                                        </a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">new</label>
                                        <label class="product-label label-sale">15% off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a
                                            href="{{ route('product.with.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                        @if (optional($product->subcategory)->name)
                                            | <a
                                                href="{{ route('product.with.subcategory', ['category' => $product->category->slug, 'slug' => $product->subcategory->slug]) }}">{{ $product->subcategory->name }}</a>
                                        @endif
                                    </div>
                                    <h3 class="product-name">
                                        <a href="demo3-product.html"><a
                                                href="{{ route('singleproduct', $product->slug) }}">{{ $product->title }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">৳{{ $product->price }}</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:20%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection

@push('styles')
    <style>
        .product-single .social-link {
            border: 2px solid #ccc !important;
        }

        #my_camera {
            margin: 0 auto;
        }

        .mfp-close {
            display: none !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
@endpush

@push('scripts')
    <script>
        $(window).on('load', function() {
            let productShopAndMarketInfoDiv = $('#productShopAndMarketInfoDiv');
            let shop_id = $('input[name="shop_id"').val();
            console.log(shop_id);
            $.ajax({
                url: `/ajax/prodcut-shop-and-market`,
                method: 'GET',
                beforeSend: function() {
                    // console.log('before send text');
                },
                data: {
                    id: shop_id
                },
                success(data) {
                    productShopAndMarketInfoDiv.html(data);
                },
                error() {
                    console.log('request error');
                },
            });

        });

        $('.popup').magnificPopup({
            type: 'iframe',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    '</div>',

                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    }
                },
                srcAction: 'iframe_src',
            }
        });
    </script>

    <script language="JavaScript">
        $('#exampleModal').on('shown.bs.modal', function() {
            Webcam.attach('#my_camera');
        });
        $('#exampleModal').on('hidden.bs.modal', function() {
            Webcam.reset()
            $('#results').empty()

        });


        Webcam.set({
            width: 600,
            height: 450,
            image_format: 'jpeg',
            jpeg_quality: 100
        });

        // Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
@endpush
@push('og_tag')
@endpush
