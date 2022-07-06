@php
$serial = 1;
$totalPrice = Cart::priceTotal();
$totalitem = Cart::count();
@endphp

@if (count($items)>0)
<div class="row">
    <div class="col-lg-8 col-md-12 pr-lg-4">
        <div class="cart-list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">PRODUCT</th>
                        <th scope="col">PHOTO</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QTY</th>
                        <th scope="col">SUBTOTAL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp
                    @foreach ($items as $key => $item)
                        <tr class="align-middle">
                            <th>{{ $serial++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="{{ $item->options->photo }}" style="width:auto;height:50px" alt="">
                            </td>
                            <td>৳{{ $item->price }}</td>
                            <td>
                                <div class="input-group mb-3 " style="max-width: 110px">
                                    <button type="button" class="input-group-text qtyminusbtn">-</button>
                                    <input name="quantity" type="text" value="{{ $item->qty }}"
                                        data-rowid="{{ $item->rowId }}" class="form-control text-center quantity"
                                        min="1" max="{{$item->options->max_qty}}">
                                    <button type="button" class="input-group-text qtyplusbtn" id="">+</button>
                                </div>
                            </td>
                            <td>৳{{ $item->subtotal }}</td>

                            <td style="text-align: center">
                                <span class="cartRemoveIcon" data-rowid="{{ $item->rowId }}"
                                    onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'">
                                    <i class="fa fa-close"></i>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="continue_shopping">
                <a href="{{ route('pruductspage') }}"><button><i class="fa-solid fa-arrow-left-long"></i> CONTINUE
                        SHOPPING</button></a>
            </div>

            {{-- <div class="coupon">
                <h5><strong>CONTINUE COUPON</strong></h5>
                <form action="" method="post">
                    <input type="text" placeholder="Enter Coupon Code Here">
                    <button type="submit">APPLY COUPON</button>
                </form>
            </div> --}}
        </div>
    </div>
    {{-- Checkout Section --}}
    <aside class="col-lg-4 sticky-sidebar-wrapper">
        <div class="card order-summery">
            <ul class="list-group list-group-flush">
                <h4>Order Summery</h4>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>Subtotal</h6>
                    <span>৳ {{ $totalPrice }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>total quantity</h6>
                    <span>{{ $totalitem }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h6>total</h6>
                    <span>৳ {{ $totalPrice }}</span>
                </li>
            </ul>
            <div class="card-footer">
                <a href="{{ route('checkoutpage') }}" class="btn btn-secondary">processed to checkout</a>
            </div>
        </div>
    </aside>
</div>

@else
<div class="not-found-product text-center d-flex justify-content-center align-items-center py-5" style="height: 60vh">
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
          </svg>
        <h3>No cart item</h3>
    </span>
</div>
@endif
