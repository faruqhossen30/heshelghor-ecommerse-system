
<div class="sidebar-overlay"></div>
<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
<div class="sidebar-content">
    <div class="sticky-sidebar">

        <div class="widget widget-collapsible">
            <h3 class="widget-title">Category</h3>
            @php
                $filter_category = [];
                if (isset($_GET['category'])) {
                    $filter_category = $_GET['category'];
                }
            @endphp
            <ul class="widget-body filter-items">
                @foreach ($categories as $category)
                    <div class="form-checkbox my-4 pb-2" style="border-bottom: 1px solid #eee">
                        <input type="checkbox" name="category[]" value="{{ $category->id }}" class="custom-checkbox"
                            id="category_{{ $category->id }}" @if (!empty($filter_category) && in_array($category->id, $filter_category)) checked @endif
                            onchange="this.form.submit();">
                        <label class="form-control-label" for="category_{{ $category->id }}">
                            {{ $category->name }}</label>
                    </div>
                @endforeach

            </ul>
        </div>
        {{-- <div class="widget widget-collapsible">
            <h3 class="widget-title">Price</h3>
            <div class="widget-body mt-3">

                    <div class="filter-price-slider"></div>

                    <div class="filter-actions">
                        <div class="filter-price-text mb-4">Price:
                            <span class="filter-price-range"></span>
                        </div>
                        <button type="submit"
                            class="btn btn-dark btn-rounded btn-filter">Filter</button>
                    </div>

            </div>
        </div> --}}


        <div class="widget widget-collapsible">
            <h3 class="widget-title">Brand</h3>
            <ul class="widget-body filter-items">
                @php
                    $filter_brand = [];
                    if (isset($_GET['brand'])) {
                        $filter_brand = $_GET['brand'];
                    }
                @endphp
                @foreach ($brands as $brand)
                    <div class="form-checkbox my-4 pb-2" style="border-bottom: 1px solid #eee">
                        <input type="checkbox" name="brand[]" value="{{ $brand->id }}" class="custom-checkbox"
                            id="brand_{{ $brand->id }}" @if (!empty($filter_brand) && in_array($brand->id, $filter_brand)) checked @endif
                            onchange="this.form.submit();">
                        <label class="form-control-label" for="brand_{{ $brand->id }}">
                            {{ $brand->name }}</label>
                    </div>
                @endforeach

            </ul>
        </div>
        {{-- <button type="submit" class="btn btn-dark btn-rounded btn-filter">Filter</button> --}}


    </div>
</div>
