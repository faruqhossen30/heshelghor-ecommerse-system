<div class="allCategoriesTitle">
    <hr>
    <h5>Categories <span><a href="{{route('categorylistpage')}}">see all</a></span></h5>
    <hr>
    <div class="offcanvas-menu">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach ($categories as $category)
            <div class="accordion-item">
                <div class="navmenu-sidebar">
                    <span><a href="{{route('categorypage', $category->slug)}}">{{$category->name}}</a></span>
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne{{$category->id}}" aria-expanded="false"
                            aria-controls="flush-collapseOne{{$category->id}}">
                            <!-- <a href="#">Electronic</a> -->
                        </button>
                    </h2>
                </div>
                <div id="flush-collapseOne{{$category->id}}" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="sub-menu">
                        <ul>
                            @foreach ($category->subcategories as $subcategory)
                            <li><a href="{{route('subcategorypage', $subcategory->slug)}}">{{$subcategory->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
