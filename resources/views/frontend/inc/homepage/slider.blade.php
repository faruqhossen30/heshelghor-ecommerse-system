<div class="slider-area">
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $data => $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$data}}" class="{{$data == 0 ? 'active' : '' }}" aria-current="{{$data == 0 ? 'true' : '' }}" aria-label="Slide {{$data}}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <a href="#"><img src="{{asset('storage/slider/'.$slider->image)}}" class="d-block w-100 img-fluid" alt="slide"></a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
