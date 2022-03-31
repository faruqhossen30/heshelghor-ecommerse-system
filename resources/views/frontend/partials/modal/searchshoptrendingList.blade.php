{{-- This is for append in modal search page --}}
{{-- @php
    $shops = App\Models\Merchant\Shop::get()->take(8);
    // dd(markets);
@endphp --}}
<div class="container-fluid p-0 my-2">
    <div class="row">
        @foreach ($shops as $shop)
            <div class="col-6">
                <a href="{{ route('product.with.shop', $shop->id) }}">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-4">
                                @if (isset($shop->image))
                                    <img src="{{ asset('/uploads/shop/'.$shop->image) }}"
                                        style="width: 75px; height:75px" class="img-fluid rounded-start mt-1" alt="...">
                                @else
                                    <img src="{{ asset('frontend/images/shop2.png') }}"
                                        style="width: 75px; height:75px" class="img-fluid rounded-start mt-1" alt="...">
                                @endif

                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $shop->name }}</h6>
                                    <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                        <i class="d-icon-map mr-2"></i>skdjfk
                                    </p>
                                    <p class="text-muted mb-0" style="font-size: 1.3rem">
                                        <i class="far fa-building mr-2"></i>{{ $shop->address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
