@php
    $divisions = App\Models\Admin\Location\Division::with('districts')->orderBy('name','asc')->get();

    $districtid = null;
    if (isset($_GET['districtid'])) {
        $districtid = $_GET['districtid'];
    }
    $district = null;
    if ($districtid) {
        $district = App\Models\Admin\Location\District::firstWhere('id', $districtid);
    }
@endphp

<div class="card-header">
    <span class="text-secondary fs-6 location" style="color: #eb5525 !important" data-bs-toggle="modal" data-bs-target="#location">
        <i class="fa-solid fa-location-dot"></i>
        {{$district ? $district->name : 'Select Location'}}
    </span>
</div>
<!-- Modal -->
<div class="modal fade" id="location" tabindex="-1" aria-labelledby="location" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="location">All Bangladesh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="search-location-left">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">
                                        <span>All Location</span>
                                        <span><i class="fa-solid fa-angle-right"></i></span>
                                    </button>
                                    @foreach ($divisions as $division)
                                    <button class="nav-link" id="v-pills-{{$division->id}}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$division->id}}" type="button" role="tab" aria-controls="v-pills-{{$division->id}}" aria-selected="true">
                                        <span>{{ $division->name }}</span>
                                        <span><i class="fa-solid fa-angle-right"></i></span>
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="districtid" value="" id="district" onchange="this.form.submit()"
                                        @if (isset($_GET['districtid'])&& $_GET['districtid'] == '') checked @endif
                                        >
                                        <label class="form-check-label" for="district">
                                            All Location
                                        </label>
                                    </div>
                                </div>

                                @foreach ($divisions as $division)
                                {{-- <h5>Select Your Area</h5> --}}
                                <div class="tab-pane" id="v-pills-{{$division->id}}" role="tabpanel" aria-labelledby="v-pills-{{$division->id}}-tab">
                                    @foreach ($division->districts as $district)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="districtid" value="{{$district->id}}" id="district-{{$district->id}}" onchange="this.form.submit()"
                                        @if (isset($_GET['districtid'])&& $_GET['districtid'] == $district->id) checked @endif
                                        >
                                        <label class="form-check-label" for="district-{{$district->id}}">
                                            {{ $district->name }}
                                        </label>
                                    </div>

                                    @endforeach




                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
