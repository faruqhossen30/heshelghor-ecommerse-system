{{-- This is for web page --}}
@if (count($markets) > 0)
    @foreach ($markets as $market)
        <div class="col-md-4 col-sm-6">
            <a href="{{ route('market.wise.shoplist', $market->id) }}">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-4">
                            @if (isset($market->photo))
                                <img src="{{ asset('storage/market/' . $market->photo) }}"
                                    style="width: 75px; height:75px" class="img-fluid rounded-start mt-1" alt="...">
                            @elseif (isset($market->image))
                                <img src="{{ asset('/uploads/market/' . $market->image) }}"
                                    style="width: 75px; height:75px" class="img-fluid rounded-start mt-1" alt="...">
                            @else
                                <img src="{{ asset('frontend/images/skyscraper.png') }}" style="width: 75px"
                                    class="img-fluid rounded-start mt-1" alt="...">
                            @endif
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="card-title">{{ $market->name }} </h6>
                                <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                    <i class="d-icon-map mr-2"></i>{{ $market->address }}
                                </p>
                                {{-- <p class="text-muted mb-0" style="font-size: 1.3rem">
                            <i class="far fa-building mr-2"></i>58 Karbala Road , Jessore
                        </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    <div class="card">
        <div class="card-body">
            <h1 class="display-4 text-center my-2">Not found. Please search again.</h1>
        </div>
    </div>
@endif
