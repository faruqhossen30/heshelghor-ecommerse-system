<div class="quick_view d-flex">
    <div class="quick_view_photo">
        <img src="{{$product->img_small}}" alt="">
    </div>
    <div class="quick_view_content">
        <h3 class="quick_view_title">{{$product->title}}</h3>
        <div class="product-meta">
            <span><strong>sku : </strong>5645452</span>
            <span><strong>brand : </strong>shoes</span>
        </div>
        <h4 class="quick_view_price">৳{{$product->price}}</h4>
        <div class="quick_view_ratting d-flex">
            <div class="quick_view_icon">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <span class="quick_view_ratting_count">
                ( 0 Reviews)
            </span>
        </div>
        <p>{{$product->short_description}}</p>
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
            {{-- @if (count($product->sizes) > 0)
            <div class="my-3">
                <span>Size : </span>
                @foreach ($product->sizes as $size)
                <input type="radio" class="btn-check" name="btnradio" id="size{{$size->id}}" autocomplete="off">
                <label class="btn btn-outline-secondary btn-sm" for="size{{$size->id}}">{{ $size->size->name }}</label>
                @endforeach
            </div>
            @endif --}}

            {{-- <div class="d-flex flex-row">
                <div class="input-group mb-3 " style="width: 35%">
                    <button type="button" class="input-group-text" id="qtyminusbtn">-</button>
                    <input name="quantity" type="text" value="1" class="form-control text-center" min="1" max="7">
                    <button type="button" class="input-group-text" id="qtyplusbtn">+</button>
                </div>
            </div> --}}
            <div class="">
                {{-- <button class="btn btn-primary btn-sm hg-iconbutton"><i class="fa-solid fa-heart"></i> Wishlist</button> --}}
                {{-- <button class="btn btn-primary btn-sm hg-iconbutton" id="add-to-cart" type="button" style="margin-left: 5px"><i class="fas fa-shopping-cart icon-c"></i> Add to Cart</button> --}}
                {{-- <a href="{{route('buynow', $product->id)}}" type="button" class="btn btn-primary btn-sm hg-iconbutton quick-view-buynow"><i class="fa-solid fa-bag-shopping"></i> Buy Now !</a> --}}

                <a href="#" type="button" class="btn btn-primary btn-sm hg-iconbutton  quick-view-buynow">View Details</a>
            </div>
        </form>
        {{-- <div class="quick_view_cart d-flex">
            <div class="quantity product_quantity">
                <a href="#" class="quantity__minus"><span><i class="fa-solid fa-minus"></i></span></a>
                <input name="quantity" type="text" class="quantity__input" value="1">
                <a href="#" class="quantity__plus"><span><i class="fa-solid fa-plus"></i></span></a>
            </div>
            <div class="quick_view_btn">
                <button type="button">add to cart</button>
                <a href="#"><button type="button">buy now</button></a>
            </div>
        </div> --}}
    </div>

</div>
