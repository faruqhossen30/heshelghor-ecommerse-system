<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-3">
            @if ($shop->image)
                <img src="{{ asset('uploads/shop/' . $shop->image) }}"
                    class="card-img-top img-thumbnail" style="width: 120px; height:120px"
                    alt="{{ $shop->name }}">
            @else
                <img src="{{ asset('frontend/images/shop.png') }}"
                    class="card-img-top img-thumbnail" style="width: 120px; height:120px"
                    alt="{{ $shop->name }}">
            @endif
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <a href="{{route('product.with.shop', $shop->id)}}">
                    <h5 class="card-title my-2">
                        <span><i class="fas fa-cart-plus"></i></span>
                        {{ $shop->name }}
                    </h5>
                </a>
                <p class="card-text mb-1">
                    <i class="fas fa-map-marker-alt"></i>
                    Address : <strong>{{ $shop->address }}</strong>

                </p>
                @if (optional($shop->market)->name)
                    <a href="{{route('market.wise.shoplist', $shop->market->id)}}">
                        <p class="card-text mb-1"><small class="text-muted">
                                <i class="far fa-building my-2"></i>
                                Market: <strong>{{ $shop->market->name ?? 'N/A' }} Gulshan Pinkcity Shopping Complex</strong>
                            </small></p>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
