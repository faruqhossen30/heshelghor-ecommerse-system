@if (count($markets) > 0)
    @foreach ($markets as $market)
        <div class="col-md-4 col-sm-6">
            <a href="#">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="{{ asset('frontend/images/skyscraper.png') }}" style="width: 75px"
                                class="img-fluid rounded-start mt-1" alt="...">
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
            <h1 class="display-4 text-center my-2">No ound.   Please search again.</h1>
           </div>
       </div>
@endif
