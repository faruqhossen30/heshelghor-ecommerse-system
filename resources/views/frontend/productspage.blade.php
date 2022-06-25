@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb start -->
<div class="bradcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
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
        <form action="" method="get">
        <div class="row">
            <div class="col-xl-3 d-none d-xl-block">
                <div class="card">
                    <aside>
                        <h5>Categories</h5>
                        <ul class="category-list">
                            @foreach ($categories as $category)
                            <li>
                                <a href="#">
                                    @if ($category->photo)
                                    <img src="{{asset('storage/category/'.$category->photo)}}" alt="">
                                    @else
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#eb5525" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                      </svg>
                                    </span>
                                    @endif
                                    <span style="margin-left: 5px">{{$category->name}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
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
                                    <option selected value="30">30</option>
                                    <option @if (isset($_GET['count']) && $_GET['count'] == '40') selected @endif value="40">40</option>
                                    <option @if (isset($_GET['count']) && $_GET['count'] == '50') selected @endif value="50">50</option>
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
                                    <img data-src="{{$product->img_small}}" alt="{{$product->title}}" class="product_img lozad">
                                    <div class="product-offers">
                                        @if($product->discount > 0)
                                        <span>{{$product->discount}}% off</span>
                                        @endif
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
                                        <h5>{{$product->title}}</h5>
                                    </a>
                                    <div class="product-price">
                                        <span class="text-dark">৳{{$product->price}}
                                            @if($product->discount > 0)
                                            <del class="text-secondary" style="font-size: .9rem">${{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="product-ratting ">
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <!-- <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div> -->
                                        <div class="modal-body">
                                            <div class="quick_view d-flex">
                                                <div class="quick_view_photo">
                                                    <img src="images/slide1.jpg" alt="">
                                                </div>
                                                <div class="quick_view_content">
                                                    <h3 class="quick_view_title">Converse Training Shoes</h3>
                                                    <div class="product-meta">
                                                        <span><strong>sku : </strong>5645452</span>
                                                        <span><strong>brand : </strong>shoes</span>
                                                    </div>
                                                    <h4 class="quick_view_price">$123.00</h4>
                                                    <div class="quick_view_ratting d-flex">
                                                        <div class="quick_view_icon">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                            <i class="fa-regular fa-star"></i>
                                                        </div>
                                                        <span class="quick_view_ratting_count">
                                                            ( 11 Reviews)
                                                        </span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Neque dicta
                                                        veritatis corporis cupiditate obcaecati ea in asperiores
                                                        amet culpa
                                                        voluptatem?</p>
                                                    <div class='color-options d-flex'>
                                                        <span> Color : </span>
                                                        <div class='color-picker'>
                                                            <div class='color overlay' id='color-overlay'>
                                                                <div class='check'></div>
                                                            </div>
                                                            <div class='color color-a' id='color-a'></div>
                                                            <div class='color color-b' id='color-b'></div>
                                                        </div>
                                                    </div>
                                                    <div class='size-picker'>
                                                        <span> Size : </span>
                                                        <div class='range-picker ' id='range-picker'>
                                                            <div>L</div>
                                                            <div>46</div>
                                                            <div>48</div>
                                                            <div>46</div>
                                                            <div>48</div>
                                                            <div class='active'>50</div>
                                                            <div>52</div>
                                                            <div>54</div>
                                                        </div>
                                                    </div>
                                                    <div class="quick_view_cart d-flex">
                                                        <div class="quantity product_quantity">
                                                            <a href="#" class="quantity__minus"><span><i class="fa-solid fa-minus"></i></span></a>
                                                            <input name="quantity" type="text" class="quantity__input" value="1">
                                                            <a href="#" class="quantity__plus"><span><i class="fa-solid fa-plus"></i></span></a>
                                                        </div>
                                                        <div class="quick_view_btn">
                                                            <button type="button">add to cart</button>
                                                            <a href="#"><button type="button">buy now</button></a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                    <div class="row mb-4">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

<!-- product end -->
@endsection
