@php
$relatedProduct = App\Models\Product\Product::with('category', 'subcategory', 'brand')
    ->where('category_id', $product->category_id)
    ->get();
@endphp

@extends('frontend.layouts.app')
@section('title')
    {{$product->title}}
@endsection

@section('content')
    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-9">
            <div class="container">
                <div class="product product-single row mb-8">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                <figure class="product-image">
                                    <img src="{{ $product->img_full }}"
                                        data-zoom-image="{{ $product->img_full }}"
                                        alt="Blue Pinafore Denim Dress" width="800" height="900"
                                        style="background-color: #f5f5f5;" />
                                </figure>
                                @foreach ($product->images as $image)
                                    <figure class="product-image">
                                        <img src="{{$image->url }}"
                                            data-zoom-image="{{ $image->url }}"
                                            alt="Blue Pinafore Denim Dress" width="800" height="900"
                                            style="background-color: #f5f5f5;" />
                                    </figure>
                                @endforeach

                            </div>
                            <div class="product-thumbs-wrap">
                                <div class="product-thumbs">
                                    <div class="product-thumb active">
                                        <img src="{{ $product->img_full }}"
                                            alt="product thumbnail" width="137" height="154"
                                            style="background-color: #f5f5f5;" />
                                    </div>
                                    @foreach ($product->images as $image)
                                        <div class="product-thumb ">
                                            <img src="{{$image->url }}"
                                                alt="product thumbnail" width="137" height="154"
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

                                {{-- <ul class="product-nav">
                                <li class="product-nav-prev">
                                    <a href="#">
                                        <i class="d-icon-arrow-left"></i> Prev
                                        <span class="product-nav-popup">
                                            <img src="{{asset('frontend')}}/images/product/product-thumb-prev.jpg"
                                                alt="product thumbnail" width="110" height="123">
                                            <span class="product-name">Sed egtas Dnte Comfort</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="product-nav-next">
                                    <a href="#">
                                        Next <i class="d-icon-arrow-right"></i>
                                        <span class="product-nav-popup">
                                            <img src="{{asset('frontend')}}/images/product/product-thumb-next.jpg"
                                                alt="product thumbnail" width="110" height="123">
                                            <span class="product-name">Sed egtas Dnte Comfort</span>
                                        </span>
                                    </a>
                                </li>
                            </ul> --}}
                            </div>

                            <h1 class="product-name">{{ $product->title }}</h1>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 6 reviews )</a>
                            </div>
                            <div class="product-price">৳{{ $product->price }}</div>
                            <p class="product-short-desc">
                                {{ Str::substr($product->short_description, 0, 200) }}
                                <a href="#product-tab-description" class="link-to-tab rating-reviews">View more</a>
                            </p>
                            <div class="product-meta">
                                {{-- SKU:<span class="product-sku">123456701</span> --}}
                                CATEGORIES: <a href="{{ route('product.with.category', $product->category->id) }}"><span
                                        class="product-brand mr-0">{{ $product->category->name }}</span></a>
                                        @if (optional($product->subcategory)->name)
                                        <a href="{{ route('product.with.subcategory', ['category'=>$product->category->slug, 'slug'=>$product->subcategory->slug]) }}"><span
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
                            </div>

                            {{-- For Add To Cart --}}
                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label"
                                        style="font-size: 1.7rem">Color:</label>
                                    <div class="col-sm-4">
                                        <select name="color" class="form-select form-select-lg" id="staticEmail"
                                            aria-label="Default select example" style="font-size: 1.5rem">
                                            <option selected>Select Color </option>
                                            @foreach ($product->colors as $color)
                                                <option value="{{ $color->color->name }}">{{ $color->color->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label"
                                        style="font-size: 1.7rem">Color:</label>
                                    <div class="col-sm-4">
                                        <select name="size" class="form-select form-select-lg" id="staticEmail"
                                            aria-label="Default select example" style="font-size: 1.5rem">
                                            <option selected>Select Size </option>
                                            @foreach ($product->sizes as $size)
                                                <option value="{{ $size->size->name }}">{{ $size->size->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="product-form product-qty">
                                    <div class="product-form-group">
                                        <div class="input-group mr-2">
                                            <button type="button" class="quantity-minus d-icon-minus"></button>
                                            <input name="quantity" class="quantity form-control" type="number" min="1"
                                                max="1000000">
                                            <button type="button" class="quantity-plus d-icon-plus"></button>
                                        </div>
                                        <button type="submit" class="btn btn btn-dark btn-sm">
                                            <i class="d-icon-bag mr-2"></i>Add to Cart</button>
                                    </div>
                                </div>

                            </form>

                            <hr class="product-divider">



                            <hr class="product-divider mb-3">

                            <div class="product-footer">
                                <div class="social-links mr-4">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                                </div>
                                <hr class="divider d-lg-show">
                                {{-- <div class="product-action">
                                <a href="#" class="btn-product btn-wishlist mr-6"><i
                                        class="d-icon-heart"></i>Add to wishlist</a>

                                <a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add
                                    to compare</a>
                            </div> --}}
                            </div>
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
                            <a class="nav-link" href="#product-tab-additional">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-shipping-returns">Shipping &amp; Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-tab-reviews">Reviews (1)</a>
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
                                <div class="col-md-6 pl-md-6 pt-4 pt-md-0">
                                    <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description
                                    </h5>
                                    <figure class="p-relative d-inline-block mb-2">
                                        <img src="{{ asset('frontend') }}/images/product/product.jpg" width="559"
                                            height="370" alt="Product" class="w-100"
                                            style="background-color: #f5f5f5;" />
                                        <a class="btn-play btn-iframe" href="video/memory-of-a-woman.mp4">
                                            <i class="d-icon-play-solid"></i>
                                        </a>
                                    </figure>
                                    {{-- <div class="icon-box-wrap d-flex flex-wrap">
                                    <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
                                        <div class="icon-box-icon">
                                            <i class="d-icon-lock"></i>
                                        </div>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">2 year
                                                warranty</h4>
                                            <p>Guarantee with no doubt</p>
                                        </div>
                                    </div>
                                    <div class="divider d-xl-show mr-10"></div>
                                    <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
                                        <div class="icon-box-icon">
                                            <i class="d-icon-truck"></i>
                                        </div>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Free shipping
                                            </h4>
                                            <p>On orders over $50.00</p>
                                        </div>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Comment --}}
                        <div class="tab-pane in mb-3" id="product-tab-comment">
                            <div class="row mt-6">

                                <div class="col-md-6">


                                </div>
                            </div>
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
                        <div class="tab-pane " id="product-tab-shipping-returns">
                            <h6 class="mb-2">Free Shipping</h6>
                            <p class="mb-0">We deliver to over 100 countries around the world. For full details
                                of
                                the delivery options we offer, please view our <a href="#" class="text-primary">Delivery
                                    information</a> We hope you’ll love every
                                purchase, but if you ever need to return an item you can do so within a month of
                                receipt. For full details of how to make a return, please view our <a href="#"
                                    class="text-primary">Returns information</a></p>
                        </div>
                        <div class="tab-pane " id="product-tab-reviews">
                            <div class="comments pb-10 pt-2 border-no">
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
                            </div>
                            <!-- End Comments -->
                            <div class="reply">
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
                                    <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                        placeholder="Comment *" required></textarea>
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
                            </div>
                            <!-- End Reply -->
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
                                        <img src="{{ $product->img_small }}" alt="product"
                                            width="280" height="315">
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
                                        <a href="{{route('product.with.category', $product->category->slug)}}">{{ $product->category->name }}</a>
                                        @if (optional($product->subcategory)->name)
                                        | <a href="{{route('product.with.subcategory', ['category'=>$product->category->slug, 'slug'=>$product->subcategory->slug])}}">{{ $product->subcategory->name }}</a>

                                        @endif
                                    </div>
                                    <h3 class="product-name">
                                        <a href="demo3-product.html"><a
                                                href="{{route('singleproduct', $product->slug)}}">{{ $product->title }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">৳{{$product->price}}</span>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endpush

@push('scripts')

@endpush
