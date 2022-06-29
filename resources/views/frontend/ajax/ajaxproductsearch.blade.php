@if (count($products)>0)
<div class="search-item-show-product">
    @foreach ($products as $product)
    <a href="{{route('singleproduct', $product->slug)}}" class="d-flex align-items-center">
        <div class="search-item-show-product-photo">
            <img src="{{$product->img_small}}" class="img-thumbnail" alt="">
        </div>
        <div class="search-item-show-product-content">
            <h6> {{$product->title}}</h6>
            <span class="text-secondary">৳ {{$product->price}}</span>
        </div>
    </a>
    @endforeach

</div>
@else
<div class="noting-found text-center">
    <span>sorry,nothing found "{{$keyword}}"</span>
</div>
@endif



{{-- <div class="search-item-product-loader">
    <img class="lozad" data-src="{{asset('frontend')}}/images/loader.gif" alt="loader" style="width: 80px;">
</div> --}}
