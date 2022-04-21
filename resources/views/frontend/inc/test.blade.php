@php
$dhaka = [207, 208, 209, 210, 211, 499, 500, 501, 502, 503, 504, 505, 506, 507, 508, 509, 510, 511, 512, 513, 514, 515, 516, 517, 518, 519, 520, 521, 522, 523, 524, 525, 526, 527, 528, 529, 530, 531, 532, 533, 534, 535, 536, 537, 538, 539, 540];
@endphp
@if(count($couriers) > 0)
    <td colspan="2">
        <h4 class="summary-subtitle">Available Delivery System</h4>
        <ul>
            @foreach ($couriers as $courier)
                {{-- Heshel Express Start --}}
                @if ($courier->code == 'HESHEL')
                    <li>
                        <div class="custom-radio">
                            <input type="radio" id="deliverrat{{ $courier->id }}" name="delivery_system" value="35">
                            <label class="custom-control-label"
                                for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                                <small>
                                    - Charge: ৳35</small>
                                <br>
                                <small>24 Hours Deliver Time.</small>
                            </label>

                        </div>
                    </li>
                @endif
                {{-- Heshel Express End --}}



                {{-- Paper Fly Express Start --}}
                @if ($courier->code == 'PAPERFLY')
                    @if (in_array($prdoduct_upazila_id, $dhaka) && in_array($product_delivery_upazila_id, $dhaka))
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="deliverrat{{ $courier->id }}" name="delivery_system"
                                    value="50">
                                <label class="custom-control-label"
                                    for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                                    <small>
                                        - Charge: ৳50</small>
                                    <br>
                                    <small>For Dhaka</small>
                                </label>

                            </div>
                        </li>
                    @else
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="deliverrat{{ $courier->id }}" name="delivery_system"
                                    value="120">
                                <label class="custom-control-label"
                                    for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                                    <small>
                                        - Charge: ৳120</small>
                                    <br>
                                    <small>For Dhaka</small>
                                </label>

                            </div>
                        </li>
                    @endif
                @endif
                {{-- Paper Fly Express End --}}
                {{-- REDX Start --}}
                @if ($courier->code == 'redx')
                    @if (in_array($prdoduct_upazila_id, $dhaka))
                        <li>
                            <div class="custom-radio">
                                <input type="radio" id="deliverrat{{ $courier->id }}" name="delivery_system"
                                    value="50">
                                <label class="custom-control-label"
                                    for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                                    <small>
                                        - Charge: ৳50</small>
                                    <br>
                                    <small>For Dhaka</small>
                                </label>

                            </div>
                        </li>
                    @endif

                    <li>
                        <div class="custom-radio">
                            <input type="radio" id="deliverrat{{ $courier->id }}" name="delivery_system" value="100">
                            <label class="custom-control-label"
                                for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                                <small>
                                    - Charge: ৳100</small>
                                <br>
                                <small>Estimate delivery time 2 to 3 days.</small>
                            </label>

                        </div>
                    </li>
                @endif
                {{-- REDX Start End --}}


                {{-- Faster Ligistic start --}}
                @if ($courier->code == 'faster')
                    <li>
                        <div class="custom-radio">
                            <input type="radio" id="deliverrat{{ $courier->id }}" name="delivery_system" value="45">
                            <label class="custom-control-label"
                                for="deliverrat{{ $courier->id }}"><strong>{{ $courier->name }}</strong>
                                <small>
                                    - Charge: ৳45</small>
                                <br>
                                <small>24 Hours Deliver Time.</small>
                            </label>

                        </div>
                    </li>
                @endif
                {{-- Faster Ligistic start --}}
            @endforeach

        </ul>
    </td>
@else
<td colspan="2">
    <h4 class="summary-subtitle">Ops ! There has no deliver system in your selected location.</h4>
    <span>Chang location and find more..</span>
</td>
@endif
