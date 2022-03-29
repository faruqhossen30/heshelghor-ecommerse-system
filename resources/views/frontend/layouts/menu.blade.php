<div class="container-fluid" style="background-color: #28475c">
    <div class="container">
        <div class="header-bottom d-lg-show w-100">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{ url('/') }}">Home</a>
                        </li>

                        <li>
                            <a href="#">Category</a>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{route('product.with.category', $category->slug)}}">{{$category->name}}</a>
                                        @if (count($category->subcategories) > 0)
                                            <ul>
                                                @foreach ($category->subcategories as $subcategory)

                                                <li><a href="{{route('product.with.subcategory', ['category'=>$category->slug, 'slug'=>$subcategory->slug])}}">{{$subcategory->name}}</a></li>
                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>
                                @endforeach


                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('pruductspage') }}">Products</a>

                        </li>



                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('shoplist') }}">Shops</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('privacypolicy') }}">Privacy Policy</a>
                {{-- <a href="#" target="_blank" class="ml-6">Business with Us</a> --}}
            </div>
        </div>
    </div>
</div>
