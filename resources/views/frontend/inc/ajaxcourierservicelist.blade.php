<td colspan="2">
    <h4 class="summary-subtitle">Available Delivery System</h4>
    <ul>
        @foreach ($couriers as $courier)
            <li>
                <div class="custom-radio">
                    <input
                    type="radio"
                    id="deliverrat{{ $courier->id }}"
                    name="delivery_system"
                    class="custom-control-input"
                    data-dhaka_to_dhaka_price="{{$courier->dhaka_to_dhaka_price}}"
                    data-all_place_price="{{$courier->all_place_price}}"
                    data-dhaka_to_dhaka_per_kg="{{$courier->dhaka_to_dhaka_per_kg}}"
                    data-dhaka_to_outside_per_kg="{{$courier->dhaka_to_outside_per_kg}}"


                    >
                    <label class="custom-control-label" for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                        <small>
                            - Charge: ৳{{ $courier->all_place_price }}</small>
                            <br>
                        <small>Estimate delivery time 2 to 3 days.</small>
                        </label>

                </div>
            </li>
        @endforeach

    </ul>
</td>
