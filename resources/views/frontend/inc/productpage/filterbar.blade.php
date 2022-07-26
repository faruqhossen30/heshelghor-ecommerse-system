@php
$view = null;
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}
@endphp
<div class="product-sort-sytem d-flex justify-content-between mb-3">
    <div class="product-sort-left">
        <label for="" style="font-size: 12px;">SORT BY : </label>
        <select name="price" onchange="this.form.submit()">
            <option value="">Latest</option>
            <option @if (isset($_GET['price']) && $_GET['price'] == 'desc') selected @endif value="desc">High To Low
            </option>
            <option @if (isset($_GET['price']) && $_GET['price'] == 'asc') selected @endif value="asc">Low To High
            </option>
        </select>
    </div>
    <div class="product-sort-right d-flex align-items-center">
        <div class="product-show-count">
            <label for="" style="font-size: 12px;">SHOW : </label>
            <select name="count" onchange="this.form.submit()">
                <option selected value="30">30</option>
                <option @if (isset($_GET['count']) && $_GET['count'] == '40') selected @endif value="40">40
                </option>
                <option @if (isset($_GET['count']) && $_GET['count'] == '50') selected @endif value="50">50
                </option>
            </select>
        </div>

        <div style="margin-left:6px">
            <input type="radio" class="btn-check" name="view" value="grid" @if ($view && $view =='grid') checked @endif onchange="this.form.submit()"
                id="size1613" autocomplete="off">
            <label class="border-0" for="size1613" style="margin-right:2px">
                <i class="fa-solid fa-border-none"
                    title="grid" style="font-size: 22px; cursor:pointer;color:#998b8b; margin-top:4px "></i>
            </label>
            <input type="radio" class="btn-check" name="view" value="list"  @if ($view && $view =='list') checked @endif onchange="this.form.submit()"
                id="size1614" autocomplete="off">
            <label class="border-0" for="size1614">
                <i class="fas fa-list-ul @if ($view && $view =='list') active-color @endif" title="list"
                    style="font-size: 22px; cursor:pointer;color:#998b8b; margin-top:4px "></i>
            </label>
        </div>
    </div>
</div>
