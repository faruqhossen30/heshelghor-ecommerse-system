<section class="mb-10 pb-6">
    <h2 class="title title-line title-underline">Featured Brands</h2>
    <div class="container">
        <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
            data-owl-options="{
            'nav': false,
            'dots': false,
            'autoplay': true,
            'margin': 20,
            'loop': true,
            'responsive': {
                '0': {
                    'items': 2
                },
                '576': {
                    'items': 3
                },
                '768': {
                    'items': 4
                },
                '992': {
                    'items': 5
                }
            }
        }">
            @foreach ($brands as $brand)
                <figure>
                    <img src="{{$brand->image}}" alt="brand" width="180" height="100" />
                </figure>
            @endforeach


        </div>
    </div>
</section>
