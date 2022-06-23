@php
$dhaka = [207, 208, 209, 210, 211, 499, 500, 501, 502, 503, 504, 505, 506, 507, 508, 509, 510, 511, 512, 513, 514, 515, 516, 517, 518, 519, 520, 521, 522, 523, 524, 525, 526, 527, 528, 529, 530, 531, 532, 533, 534, 535, 536, 537, 538, 539, 540];
@endphp
@if(count($couriers) > 0)
    @foreach ($couriers as $courier)
        {{-- Heshel Express Start --}}
        @if ($courier->code == 'HESHEL')
        <label class="list-group-item d-flex gap-2">
            <input class="form-check-input flex-shrink-0" type="radio" name="delivery_system" id="listGroupRadios1" id="deliverrat{{ $courier->id }}" value="35" >
            <span>
                {{ $courier->name }} - Charge: ৳35
              <small class="d-block text-muted">24 Hours Deliver Time.</small>
            </span>
        </label>
        @endif
        {{-- Heshel Express End --}}



        {{-- Paper Fly Express Start --}}
        @if ($courier->code == 'PAPERFLY')
            @if (in_array($prdoduct_upazila_id, $dhaka) && in_array($product_delivery_upazila_id, $dhaka))
            <label class="list-group-item d-flex gap-2">
                <input class="form-check-input flex-shrink-0" type="radio" name="delivery_system" id="listGroupRadios1" id="deliverrat{{ $courier->id }}" value="50" >
                <span>
                    {{ $courier->name }} - Charge: ৳50
                  <small class="d-block text-muted">Estimate delivery time 48 hours.</small>
                </span>
            </label>
            @else
            <label class="list-group-item d-flex gap-2">
                <input class="form-check-input flex-shrink-0" type="radio" name="delivery_system" id="listGroupRadios1" id="deliverrat{{ $courier->id }}" value="110" >
                <span>
                    {{ $courier->name }} - Charge: ৳110
                  <small class="d-block text-muted">Estimate delivery time 3 days to 7 days.</small>
                </span>
            </label>
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
@else
<td colspan="2">
    <h4 class="summary-subtitle">Ops ! There has no deliver system in your selected location.</h4>
    <span>Chang location and find more..</span>
</td>
@endif
