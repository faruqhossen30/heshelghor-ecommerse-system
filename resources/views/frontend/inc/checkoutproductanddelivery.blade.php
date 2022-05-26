<div class="col-md-12 mb-6 mb-lg-0 pr-lg-4">
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <table class="shop-table cart-table">
                <thead>
                    <tr>
                        <th><span>S.N</span></th>
                        <th><span>Photo</span></th>
                        <th>Product</th>
                        <th><span>Price</span></th>
                        <th>Product Price</th>
                        <th>Delivery</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                    <input type="hidden" name="courier_id[{{$item->id}}]" value="">
                    <input type="hidden" name="courier_packege_desc[{{$item->id}}]" value="">
                    <input type="hidden" name="delivery_cost[{{$item->id}}]" value="">
                        <tr>
                            <td>
                                <strong>1</strong>
                            </td>
                            <td class="product-thumbnail">
                                <figure>
                                    <a href="product-simple.html">

                                        <img src="{{ $item->options->photo }}" width="50" height="50" alt="product">
                                    </a>
                                </figure>
                            </td>
                            <td class="product-name">
                                <div class="product-name-section">
                                    <a href="product-simple.html">{{ $item->name }}</a>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">{{$item->qty}} x ৳{{$item->price}}</span>
                            </td>
                            <td class="product-price">
                                <span class="amount">৳{{$item->subtotal}}</span>
                            </td>
                            <td>
                                <select class="form-select " name="deliver_system[]" id="delivery{{$item->id}}" data-id={{$item->id}} data-qty={{$item->qty}}>
                                    <option selected>Select </option>
                                </select>
                            </td>
                            <td class="text-center" id="dcost{{$item->id}}">
                                ৳0
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                <div class="summary mb-4">
                    <h3 class="summary-title text-left">Summery</h3>
                    <table class="shipping">
                        <tbody>
                            <tr class="summary-subtotal">
                                <td>
                                    <h4 class="summary-subtitle">Total Product Price: </h4>
                                </td>
                                <td>
                                    <p class="summary-subtotal-price">৳{{Cart::subtotal()}}</p>
                                </td>
                            </tr>
                            <tr class="summary-subtotal">
                                <td>
                                    <h4 class="summary-subtitle">Total Delivery Cost: </h4>
                                </td>
                                <td>
                                    <p class="summary-subtotal-price" id="totaldelivercost">৳0</p>
                                </td>
                            </tr>
                            <tr class="summary-subtotal">
                                <td>
                                    <h4 class="summary-subtitle">Total </h4>
                                </td>
                                <td>
                                    <p class="summary-subtotal-price" id="totalAmount">৳{{Cart::subtotal()}}</p>
                                </td>
                            </tr>
                            <tr class="sumnary-shipping shipping-row-last">
                                <td colspan="2">
                                    <h4 class="summary-subtitle">Calculate Shipping</h4>
                                    <ul>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="flat_rate" name="payment_type" value="cash"
                                                    class="custom-control-input" checked="">
                                                <label class="custom-control-label" for="flat_rate">Cash On Delivery</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="free-shipping" name="payment_type" value="online"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Payment Now</label>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-checkbox" style="margin-bottom:0 !important">
                        <input type="checkbox" class="custom-checkbox" id="terms-condition"
                            name="terms-condition" value="1" required />
                        <label class="form-control-label" for="terms-condition">
                            I have read and agree to <a href="{{ route('termsandcondition') }}"
                                class="text-primary" target="_blank">terms and conditions </a> and
                            <a href="{{ route('privacypolicy') }}" class="text-primary"
                                target="_blank">privacy policy</a>
                        </label>
                    </div>
                    <div class="form-checkbox">
                        <input type="checkbox" class="custom-checkbox" id="terms-condition2"
                            name="terms-condition2" value="1" required />
                        <label class="form-control-label" for="terms-condition2">
                            I have read and agree to <a href="{{ route('returnpolicy') }}"
                                class="text-primary" target="_blank">Return & Refund Policy</a>
                        </label>
                    </div>
                    <button class="btn btn-dark btn-rounded btn-checkout" type="submit">Proceed to checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>

