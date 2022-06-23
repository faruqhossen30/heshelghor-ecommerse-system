<nav>
    <div class="main-menu">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="navigation">
                        <div class="allCategories">
                            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                                aria-controls="offcanvasExample">
                                <i class="fa fa-bars"></i> All Categories
                            </span>
                        </div>
                        <ul id="menuMoreItems">
                            <div id="navClose">
                                <i class="fa fa-close"></i>
                            </div>
                            {{-- <li><a href="#">Flash Sell</a></li> --}}
                            <li><a href="{{route('pruductspage')}}">Product</a></li>
                            <li><a href="{{route('shoplist')}}"> Shops </a></li>
                            <li><a href="{{route('market.list')}}">Markets</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="allItem  d-md-none" id="subMenuItemShow"><a href="#">More</a></div>
        </div>
    </div>
</nav>

{{-- <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <div class="logo">
                <a href="index.html"><img src="{{asset('frontend')}}/images/logo.jpg" alt="logo" style="width: 200px; height: 50px;"></a>
            </div>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="categoriyOffcanvas">

    </div>
</div> --}}

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <div class="logo">
                <a href="{{route('homepage')}}"><img src="{{asset('frontend')}}/images/logo.jpg" alt="logo" style="width: auto; height: 50px;"></a>
            </div>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="categoriyOffcanvas">

    </div>
</div>
