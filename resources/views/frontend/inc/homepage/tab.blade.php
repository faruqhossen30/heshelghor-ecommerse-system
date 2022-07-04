@php
use App\Models\Product\Product;
use App\Models\Product\SubCategory;
$topselling = Product::select('id', 'title', 'slug', 'price', 'regular_price', 'discount', 'img_small')->inRandomOrder()->take(12)->get();

$promotion_subcategoryies = option('promotion_subcategoryies');
$subcategories = null;
if ($promotion_subcategoryies) {
$subcategories = SubCategory::whereIn('id', $promotion_subcategoryies)->get();
}

@endphp

<div class="product-area section-padding" style="background-color: #FCE6DF;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <nav class="mb-3">
                        <div class="nav nav-tabs border-bottom border-danger" id="nav-tab" role="tablist">
                            <button class="nav-link text-dark  border border-bottom-0 active" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Top Selling Products</button>
                            @if($subcategories)
                            @foreach ($subcategories as $subcategory)
                            <button class="nav-link text-dark  border border-bottom-0 " id="nav-{{$subcategory->slug}}" data-bs-toggle="tab" data-bs-target="#tab{{$subcategory->slug}}" type="button" role="tab" aria-controls="tab{{$subcategory->slug}}" aria-selected="true">{{$subcategory->name}}</button>
                            @endforeach
                            @endif

                            {{-- <button class="nav-link text-dark border-bottom-0" id="nab-tab2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Ladi's Corner</button>
                            <button class="nav-link text-dark border-bottom-0" id="nav-tab3" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Kid's Zone</button>
                            <button class="nav-link text-dark border-bottom-0" id="nav-tab4" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">Health And Beauty</button> --}}
                        </div>
                        <a href="{{route('categorylistpage')}}" style="margin-top: -30px" class="float-end">See All</a>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-tab1">
                            <div class="row g-2">
                                @foreach ($topselling as $product)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="single-product ">
                                        <div class="product-photo position-relative">
                                            <img data-src="{{ $product->img_small }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';" data-placeholder-background="white" alt="product_img" class="product_img lozad" style="background-size:100%">
                                            <div class="product-offers">
                                                @if ($product->discount > 0)
                                                <span>{{ $product->discount }}% off</span>
                                                @endif
                                                <span class="new_product">new</span>
                                            </div>
                                            <div class="product-btn">
                                                <button class="quickviewbutton" data-productid="{{ $product->id }}">quick
                                                    view</button>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <a href="{{ route('singleproduct', $product->slug) }}" class="product_title">
                                                <h5>{{ $product->title }}</h5>
                                            </a>
                                            <div class="product-price">
                                                <span class="text-dark">৳{{ $product->price }}
                                                    @if ($product->discount > 0)
                                                    <del class="text-secondary" style="font-size: .9rem">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
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

                            </div>
                            <div class="section-button text-center">
                                <a href="{{ route('pruductspage') }}"><button type="button" class="btn btn-secondary">See All</button></a>
                            </div>
                        </div>
                        @if($subcategories)
                        @foreach ($subcategories as $subcategory)
                        @php
                        $products = Product::where('subcategory_id', $subcategory->id)->select('id', 'title', 'slug', 'price', 'regular_price', 'discount', 'img_small')->inRandomOrder()->take(12)->get();
                        @endphp
                        <div class="tab-pane fade" id="tab{{$subcategory->slug}}" role="tabpanel" aria-labelledby="nav-{{$subcategory->slug}}">
                            <div class="row g-2">
                                {{-- {{$subcategory}} --}}
                                @foreach ($products as $product)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="single-product ">
                                        <div class="product-photo position-relative">
                                            <img data-src="{{ $product->img_small }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';" data-placeholder-background="white" alt="product_img" class="product_img lozad" style="background-size:100%">
                                            <div class="product-offers">
                                                @if ($product->discount > 0)
                                                <span>{{ $product->discount }}% off</span>
                                                @endif
                                                <span class="new_product">new</span>
                                            </div>
                                            <div class="product-btn">
                                                <button class="quickviewbutton" data-productid="{{ $product->id }}">quick
                                                    view</button>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <a href="{{ route('singleproduct', $product->slug) }}" class="product_title">
                                                <h5>{{ $product->title }}</h5>
                                            </a>
                                            <div class="product-price">
                                                <span class="text-dark">৳{{ $product->price }}
                                                    @if ($product->discount > 0)
                                                    <del class="text-secondary" style="font-size: .9rem">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
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
                            </div>
                            <div class="section-button text-center">
                                <a href="{{ route('subcategorypage', $subcategory->slug) }}"><button type="button" class="btn btn-secondary">See All</button></a>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        {{-- <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nab-tab2">
                            <div class="row g-2">
                                @foreach ($ladiesproduct as $product)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="single-product ">
                                        <div class="product-photo position-relative">
                                            <img data-src="{{ $product->img_small }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';" data-placeholder-background="white" alt="product_img" class="product_img lozad" style="background-size:100%">
                        <div class="product-offers">
                            @if ($product->discount > 0)
                            <span>{{ $product->discount }}% off</span>
                            @endif
                            <span class="new_product">new</span>
                        </div>
                        <div class="product-btn">
                            <button class="quickviewbutton" data-productid="{{ $product->id }}">quick
                                view</button>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <a href="{{ route('singleproduct', $product->slug) }}" class="product_title">
                            <h5>{{ $product->title }}</h5>
                        </a>
                        <div class="product-price">
                            <span class="text-dark">৳{{ $product->price }}
                                @if ($product->discount > 0)
                                <del class="text-secondary" style="font-size: .9rem">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
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
        </div>
        <div class="section-button text-center">
            <a href="{{ route('categorypage', 'womens-fashion') }}"><button type="button" class="btn btn-secondary">See All</button></a>
        </div>
    </div>
    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-tab3">
        <div class="row g-2">
            @foreach ($kids as $product)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="single-product ">
                    <div class="product-photo position-relative">
                        <img data-src="{{ $product->img_small }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';" data-placeholder-background="white" alt="product_img" class="product_img lozad" style="background-size:100%">
                        <div class="product-offers">
                            @if ($product->discount > 0)
                            <span>{{ $product->discount }}% off</span>
                            @endif
                            <span class="new_product">new</span>
                        </div>
                        <div class="product-btn">
                            <button class="quickviewbutton" data-productid="{{ $product->id }}">quick
                                view</button>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <a href="{{ route('singleproduct', $product->slug) }}" class="product_title">
                            <h5>{{ $product->title }}</h5>
                        </a>
                        <div class="product-price">
                            <span class="text-dark">৳{{ $product->price }}
                                @if ($product->discount > 0)
                                <del class="text-secondary" style="font-size: .9rem">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
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
        </div>
        <div class="section-button text-center">
            <a href="{{ route('categorypage', 'kids-and-toys') }}"><button type="button" class="btn btn-secondary">See All</button></a>
        </div>
    </div>
    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="nav-tab4">
        <div class="row g-2">
            @foreach ($health as $product)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="single-product ">
                    <div class="product-photo position-relative">
                        <img data-src="{{ $product->img_small }}" onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';" data-placeholder-background="white" alt="product_img" class="product_img lozad" style="background-size:100%">
                        <div class="product-offers">
                            @if ($product->discount > 0)
                            <span>{{ $product->discount }}% off</span>
                            @endif
                            <span class="new_product">new</span>
                        </div>
                        <div class="product-btn">
                            <button class="quickviewbutton" data-productid="{{ $product->id }}">quick
                                view</button>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <a href="{{ route('singleproduct', $product->slug) }}" class="product_title">
                            <h5>{{ $product->title }}</h5>
                        </a>
                        <div class="product-price">
                            <span class="text-dark">৳{{ $product->price }}
                                @if ($product->discount > 0)
                                <del class="text-secondary" style="font-size: .9rem">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
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
        </div>
        <div class="section-button text-center">
            <a href="{{ route('categorypage', 'health-and-beauty') }}"><button type="button" class="btn btn-secondary">See All</button></a>
        </div>
    </div> --}}
</div>
</div>
</div>
</div>

</div>
</div>
