<div class="product product-single row product-popup">
    <div class="col-md-6">
        <div class="product-gallery">
            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                <figure class="product-image">
                    <img src="{{$product->img_full }}" class="img-thumbnail" data-zoom-image="{{$product->img_full }}" alt="Blue Pinafore Denim Dress" width="580" height="580">
                </figure>
                {{-- <figure class="product-image">
					<img src="{{ asset('frontend') }}/images/product/product-1-2-580x652.jpg"
                data-zoom-image="images/product/product-1-2-800x900.jpg" alt="Blue Pinafore Denim Dress"
                width="580" height="580">
                </figure>
                <figure class="product-image">
                    <img src="{{ asset('frontend') }}/images/product/product-1-3-580x652.jpg" data-zoom-image="images/product/product-1-3-800x900.jpg" alt="Blue Pinafore Denim Dress" width="580" height="580">
                </figure>
                <figure class="product-image">
                    <img src="{{ asset('frontend') }}/images/product/product-1-4-580x652.jpg" data-zoom-image="images/product/product-1-4-800x900.jpg" alt="Blue Pinafore Denim Dress" width="580" height="580">
                </figure> --}}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="product-details scrollable pr-0 pr-md-3">
            <div style="display: flex; justify-content:space-between">
                <h1 class="product-name mt-0">{{$product->title}}</h1>
                <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal" aria-label="Close" style="background: none; color:red;border:1px solid red">X</button>
            </div>
            <div class="product-meta">
                SKU: <span class="product-sku">12345670</span>
                BRAND: <span class="product-brand">The Northland</span>
            </div>
            <div class="product-price">৳{{$product->price}}</div>
            @if($product->category_id == 38)
            <span class="" title="আলোচনা সাপেক্ষে" style="font-size: 1.3rem;color: #777676;font-weight: normal;">(আলোচনা সাপেক্ষে)</span>
            @endif
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:80%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 11 reviews )</a>
            </div>
            <p class="product-short-desc">{{$product->short_description}}</p>
            <a href="{{route('singleproduct', $product->slug)}}" type="submit" class="btn btn btn-dark btn-sm">
                <i class="d-icon-bag mr-2"></i>View Details</a>

            {{-- <form action="{{ route('cart.add', $product->id) }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 1.7rem">Color:</label>
                <div class="col-sm-4">
                    <select name="color" class="form-select form-select-lg" id="staticEmail" aria-label="Default select example" style="font-size: 1.5rem">
                        <option selected>Select Color </option>
                        @foreach ($colors as $color)
                        <option value="{{ $color->color->name }}">{{ $color->color->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 1.7rem">Color:</label>
                <div class="col-sm-4">
                    <select name="size" class="form-select form-select-lg" id="staticEmail" aria-label="Default select example" style="font-size: 1.5rem">
                        <option selected>Select Size </option>
                        @foreach ($sizes as $size)
                        <option value="{{ $size->size->name }}">{{ $size->size->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="product-form product-qty">
                <div class="product-form-group">
                    <div class="input-group mr-2">
                        <button type="button" class="quantity-minus d-icon-minus"></button>
                        <input name="quantity" class="quantity form-control" type="number" min="1" max="1000000">
                        <button type="button" class="quantity-plus d-icon-plus"></button>
                    </div>
                    <button type="submit" class="btn btn btn-dark btn-sm">
                        <i class="d-icon-bag mr-2"></i>Add to Cart</button>
                </div>
            </div>

            </form> --}}

            <hr class="product-divider mb-3">

        </div>
    </div>
</div>
