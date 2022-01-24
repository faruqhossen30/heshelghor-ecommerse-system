@foreach ($shops as $shop)
    <div class="col-xl-2 col-sm-3 col-xs-6 my-4">
        <div class="card">
            @if ($shop->image)
                <img src="{{ asset('/uploads/shop/' . $shop->image) }}" class="card-img-top img-thumbnail"
                    style="max-height: 200px" alt="...">
            @else
                <img src="https://picsum.photos/seed/picsum/200/300" class="card-img-top img-thumbnail"
                    style="max-height: 200px" alt="...">
            @endif

            <div class="card-body">
                <a href="{{ route('product.with.shop', $shop->id) }}">
                    <h6 class="card-title">{{ $shop->name }}</h6>
                </a>
                <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                    <i class="d-icon-map mr-2"></i>{{ $shop->address }}
                </p>
                @if ($shop->market)
                    <a href="#">
                        <p class="text-muted mb-0" style="font-size: 1.3rem">
                            <i class="far fa-building mr-2"></i>Basun Dara shopin complex
                        </p>
                    </a>
                @endif
                <hr style="margin-bottom: 1rem">


            </div>
        </div>
    </div>
@endforeach
