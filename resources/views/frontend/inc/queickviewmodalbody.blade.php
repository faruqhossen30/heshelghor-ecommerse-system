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

            <div class="">
                <a href="{{route('singleproduct', $product->slug)}}" type="button" class="btn btn-primary btn-sm hg-iconbutton  quick-view-buynow">View Details</a>
            </div>
        </form>
    </div>

</div>
