@php
$serial = 1;
$totalPrice = Cart::priceTotal();
$totalitem = Cart::count();
@endphp
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
                                        min="1" max="11">
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
