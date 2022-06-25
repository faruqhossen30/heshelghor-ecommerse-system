@extends('frontend.layouts.app')

@section('content')
{{-- breadcrumb start --}}
<div class="bradcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- breadcrumb end --}}

<!-- single-product start -->
<div class="single-product-area  pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="single-product-photo">
                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                <li><img src="{{ $product->img_large }}" /></li>
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <!-- Nav Buttons -->
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a> <a href="javascript:void(0);" class="exzoom_next_btn"> >
                                    </a>
                        </p>
                    </div>


                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="single-product_content">
                    <h3 class="quick_view_title">{{ $product->title }}</h3>
                    <div class="product-meta">
                        <span><strong>sku : </strong>{{$product->id}}</span>
                        <span><strong>brand : </strong>{{ $product->brand->name }}</span>
                    </div>
                    <h4 class="quick_view_price">${{ $product->regular_price }}</h4>
                    <div class="quick_view_ratting d-flex">
                        <div class="quick_view_icon">
                            {{-- <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> --}}
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <span class="quick_view_ratting_count">
                            ( 0 Review)
                        </span>
                    </div>


                    {!! $product->short_description !!} <br>

                    <a href="#viewmore">
                        <strong>View More</strong>
                    </a>
                    <br>

                    @isset($product->youtube_link)
                    <a href="{{ $product->youtube_link }}" type="button" class="popup btn video-popup btn-sm hg-iconbutton text-white" style="margin-left: 5px"><i class="fa-solid fa-video"></i> Video</a>

                    {{-- <button class="btn btn-primary btn-sm hg-iconbutton" id="add-to-cart" type="button" style="margin-left: 5px"><i class="fas fa-shopping-cart icon-c"></i> Add to Cart</button> --}}

                    @endisset



                    <form action="{{ route('cart.add', $product->id) }}" id="ajaxform" method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @if (count($product->colors) > 0)
                        <div class="my-3">
                            <span>Color : </span>
                            @foreach ($product->colors as $color)
                            <input type="radio" class="btn-check" name="btnradio" id="color{{$color->id}}" autocomplete="off">
                            <label class="btn btn-outline-secondary btn-sm" for="color{{$color->id}}">{{ $color->color->name }}</label>
                            @endforeach

                        </div>
                        @endif
                        @if (count($product->sizes) > 0)
                        <div class="my-3">
                            <span>Size : </span>
                            @foreach ($product->sizes as $size)
                            <input type="radio" class="btn-check" name="btnradio" id="size{{$size->id}}" autocomplete="off">
                            <label class="btn btn-outline-secondary btn-sm" for="size{{$size->id}}">{{ $size->size->name }}</label>
                            @endforeach
                        </div>
                        @endif

                        <div class="d-flex flex-row">
                            <div class="input-group mb-3 " style="width: 35%">
                                <button type="button" class="input-group-text" id="qtyminusbtn">-</button>
                                <input name="quantity" type="text" value="1" class="form-control text-center" min="1" max="7">
                                <button type="button" class="input-group-text" id="qtyplusbtn">+</button>
                            </div>
                            <button class="btn btn-primary btn-sm hg-iconbutton" id="add-to-cart" type="button" style="margin-left: 5px"><i class="fas fa-shopping-cart icon-c"></i> Add to Cart</button>
                        </div>
                        <div class="">
                            <button class="btn btn-primary btn-sm hg-iconbutton"><i class="fa-solid fa-heart"></i> Wishlist</button>
                            <a href="{{route('buynow', $product->id)}}" class="btn btn-primary btn-sm hg-iconbutton quick-view-buynow "><i class="fa-solid fa-bag-shopping"></i> Buy Now !</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12" style="background-color: #fafafa; ">
                <div class="product-delivery-location">
                    <span><strong>Additional Information</strong></span>
                    <ul>
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="delivery-location-left d-flex align-items-center">
                                <span class="delivery-icon"><i class="fa-solid fa-home"></i></span>
                                <span class="delivery-location ">Home Delivery <br> <small>2 - 4 day(s)</small></span>
                            </div>

                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="delivery-location-left d-flex align-items-center">
                                <span class="delivery-icon"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                                <span class="delivery-location">Cash on Delivery Available</span>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="delivery-location-left d-flex align-items-center">
                                <span class="delivery-icon"><i class="fa-solid fa-person-walking-arrow-loop-left"></i></span>
                                <span class="delivery-location ">7 Days Returns <br> <small>Change of mind is not
                                        applicable</small></span>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="delivery-location-left d-flex align-items-center">
                                <span class="delivery-icon"><i class="fa-solid fa-square-root-variable"></i></span>
                                <span class="delivery-location">Warranty not available</span>
                            </div>
                        </li>
                    </ul>
                    <a href="single-shop.html" class="shop_links market-links ">
                        <div class="single-shop single-market d-flex ">
                            <div class="shop-photo market-photo">
                                <img src="http://127.0.0.1:8000/frontend/images/slide3.jpg" alt="shop">
                            </div>
                            <div class="shop-content market-content single-product-shop-show">
                                <h5>bashundhara shopping</h5>
                                <span> <i class="fa fa-map-marker"></i> Panthapath,Dhaka</span>
                                <span> <i class="fa-solid fa-location-arrow"></i> Panthapath,Dhaka</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single-product end -->





<!-- single-product-content start -->
<div class="single-product-content-area" id="viewmore">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab1" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab2" data-bs-toggle="tab" data-bs-target="#comment" type="button" role="tab" aria-controls="comment" aria-selected="false">Comments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab3" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false">FAQ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab4" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="tab1">
                        <div class="product-details">
                            {{ $product->description }}

                        </div>
                    </div>
                    <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="tab2">
                        @if ($product->faq)
                        @else
                        <h6>There have been no reviews for this product yet. </h6>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="tab3">
                        @if ($product->faq)
                        @else
                        There have been no faq for this product yet.
                        @endif
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="tab4">
                        @if ($product->review)
                        @else
                        There have been no policy for this product yet.
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single-product-content end -->


<!-- related product start -->
<div class="related-proecut-area pt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-heading text-center mb-5">
                    <h4>Related Products</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="related-product-active owl-carousel">
                <div class="single-related-producted">
                    <div class="single-product ">
                        <div class="product-photo position-relative">
                            <img src="{{ asset('frontend') }}/images/shop/shop.png" alt="product_img" class="product_img">
                            <div class="product-offers">
                                <span>20% off</span>
                                <span class="new_product">new</span>
                            </div>
                            <div class="product-icon">
                                <i class="fa fa-heart"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="product-btn">
                                <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">quick view</button>
                            </div>
                        </div>
                        <div class="product-content text-center">
                            <a href="single_product.html" class="product_title">
                                <h5>Comfortable Brown Scarf</h5>
                            </a>
                            <div class="product-price">
                                <span>$200 <del>$150</del></span>
                            </div>
                            <div class="product-ratting ">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- related product end -->
</div>
@endsection

@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#add-to-cart', function(e) {
            e.preventDefault();



            let name = $('#color1').val();
            let size = $('#size').val();
            let quantity = $('input[name="quantity"]').val();
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('cart.add', $product->id) }}"
                , type: "post"
                , data: {
                    name: name
                    , size: size
                    , quantity: quantity
                    , _token: _token
                , }
                , success: function(response) {
                    if (response) {
                        // $('.itemReload').empty();
                        $('.itemReload').html(response.data);
                        // console.log(response);
                    }
                }
                , error: function(error) {
                    console.log('code wrong');
                }
            });
        });



        // Quantity Plus
        $(document).on('click', '#qtyplusbtn', function() {
            let maxval = $('input[name="quantity"]').prop('max')
            let cval = $('input[name="quantity"]').val()
            if (parseInt(maxval) > parseInt(cval)) {
                $('input[name="quantity"]').val(function(i, oldval) {
                    return ++oldval;
                });
            }
        })

        // Quantity Minus
        $(document).on('click', '#qtyminusbtn', function() {
            let minval = $('input[name="quantity"]').prop('min')
            let cval = $('input[name="quantity"]').val()
            if (parseInt(minval) < parseInt(cval)) {
                $('input[name="quantity"]').val(function(i, oldval) {
                    return --oldval;
                });
            }
        })




    })

</script>
@endpush
