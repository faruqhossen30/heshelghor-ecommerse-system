<div class="sidebar-overlay"></div>
<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
<div class="sidebar-content">
    <div class="sticky-sidebar">
        <div class="widget widget-collapsible">
            <h3 class="widget-title">All Categories</h3>
            <ul class="widget-body filter-items search-ul">

                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('product.with.category', $category->id) }}">{{ $category->name }}</a>
                        <ul>
                            @foreach ($category->subcategorylist as $subcategory)
                                <li>
                                    <a href="{{ route('product.with.subcategory', $subcategory->id) }}">{{ $subcategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach



            </ul>
        </div>
        <div class="widget widget-collapsible">
            <h3 class="widget-title">Price</h3>
            <div class="widget-body mt-3">
                <form action="#">
                    <div class="filter-price-slider"></div>

                    <div class="filter-actions">
                        <div class="filter-price-text mb-4">Price:
                            <span class="filter-price-range"></span>
                        </div>
                        <button type="submit" class="btn btn-dark btn-rounded btn-filter">Filter</button>
                    </div>
                </form><!-- End Filter Price Form -->
            </div>
        </div>
        <div class="widget widget-collapsible">
            <h3 class="widget-title">Size</h3>
            <ul class="widget-body filter-items">
                <li><a href="#">Extra Large</a></li>
                <li><a href="#">Large</a></li>
                <li><a href="#">Medium</a></li>
                <li><a href="#">Small</a></li>
            </ul>
        </div>
        <div class="widget widget-collapsible">
            <h3 class="widget-title">Color</h3>
            <ul class="widget-body filter-items">
                <li><a href="#">Black</a></li>
                <li><a href="#">Blue</a></li>
                <li><a href="#">Green</a></li>
                <li><a href="#">White</a></li>
            </ul>
        </div>
        <div class="widget widget-collapsible">
            <h3 class="widget-title">Brands</h3>
            <ul class="widget-body filter-items">
                <li><a href="#">Cinderella</a></li>
                <li><a href="#">Comedy</a></li>
                <li><a href="#">Rightcheck</a></li>
                <li><a href="#">SkillStar</a></li>
                <li><a href="#">SLS</a></li>
            </ul>
        </div>
    </div>
</div>
