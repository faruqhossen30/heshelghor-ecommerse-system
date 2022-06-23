<div class="quick_view d-flex">
    <div class="quick_view_photo">
        <img src="{{$product->img_small}}" alt="">
    </div>
    <div class="quick_view_content">
        <h3 class="quick_view_title">{{$product->title}}</h3>
        <div class="product-meta">
            <span><strong>sku : </strong>5645452</span>
            <span><strong>brand : </strong>shoes</span>
        </div>
        <h4 class="quick_view_price">৳{{$product->price}}</h4>
        <div class="quick_view_ratting d-flex">
            <div class="quick_view_icon">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <span class="quick_view_ratting_count">
                ( 0 Reviews)
            </span>
        </div>
        <p>{{$product->short_description}}</p>
        <div class='color-options d-flex'>
            <span> Color : </span>
            <div class='color-picker'>
                <div class='color overlay' id='color-overlay'>
                    <div class='check'></div>
                </div>
                <div class='color color-a' id='color-a'></div>
                <div class='color color-b' id='color-b'></div>
            </div>
        </div>
        <div class='size-picker'>
            <span> Size : </span>
            <div class='range-picker ' id='range-picker'>
                <div>L</div>
                <div>46</div>
                <div>48</div>
            </div>
        </div>
        <div class="quick_view_cart d-flex">
            <div class="quantity product_quantity">
                <a href="#" class="quantity__minus"><span><i class="fa-solid fa-minus"></i></span></a>
                <input name="quantity" type="text" class="quantity__input" value="1">
                <a href="#" class="quantity__plus"><span><i class="fa-solid fa-plus"></i></span></a>
            </div>
            <div class="quick_view_btn">
                <button type="button">add to cart</button>
                <a href="#"><button type="button">buy now</button></a>
            </div>
        </div>
    </div>

</div>
