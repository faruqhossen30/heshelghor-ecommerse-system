@php

$divissions = App\Models\Admin\Location\Division::with('districts')
    ->orderBy('name', 'asc')
    ->get();
@endphp
<!-- Modal -->
<div class="modal" id="searchShopModal" tabindex="-1" aria-labelledby="searchShopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="searchShopModalLabel">Search Shop/Market</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="tab tab-nav-start">
                    <ul class="nav nav-tabs">
                        <li class="nav-item" id="shopSearchTab">
                            <a class="nav-link active px-2" href="#search-shop">
                                <i class="fas fa-store"></i>
                                Shop Search</a>
                        </li>
                        <li class="nav-item" id="marketSearchTab">
                            <a class="nav-link px-2" href="#search-market">
                                <i class="far fa-building mr-2"></i>
                                Market Search</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="search-shop">
                            <div class="header-search hs-simple d-flex justify-content-center" style="max-width: 100%;">
                                <form class="input-wrapper w-100 my-2" style="position: relative" id="searchFrom">
                                    {{-- @csrf --}}
                                    {{-- <label class="form-label" for="shopSearchInpur" style="padding: 5px 5px; font-weight:bold; margin-top:5px">Search e: </label> --}}

                                    <button class="border" type="button">
                                        <i class="d-icon-map"></i>
                                    </button>
                                    <div class="select-box">
                                        <select id="category" name="location">
                                            <option value="">All Location</option>
                                            @foreach ($divissions as $divission)
                                                <option value="" disabled style="font-weight: bolder">
                                                    <strong>{{ $divission->name }}</strong>
                                                </option>
                                                @foreach ($divission->districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        @if (request()->query('location') == $district->slug) selected @endif>- {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="text" class="form-control" name="shopSearchKeyword" autocomplete="off"
                                        placeholder="Search your shop ..." id="shopSearchInpur" />
                                    <button class="btn btn-search" type="submit">
                                        <i class="d-icon-search"></i>
                                    </button>
                                </form>
                            </div>

                            <div id="modalShopSearchResultDiv">
                                <div class="d-flex justify-content-center my-4" style="display:none !important"
                                    id="searchShopPreloader">
                                    <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="search-market">
                            <div class="header-search hs-simple d-flex justify-content-center" style="max-width: 100%;">
                                <form class="input-wrapper w-100 my-2" style="position: relative" id="modalMarketSearchForm">

                                    <button class="border" type="button">
                                        <i class="d-icon-map"></i>
                                    </button>
                                    <div class="select-box">
                                        <select id="category" name="modalMarketLocation">
                                            <option value="">All Location</option>
                                            @foreach ($divissions as $divission)
                                                <option value="" disabled style="font-weight: bolder">
                                                    <strong>{{ $divission->name }}</strong>
                                                </option>
                                                @foreach ($divission->districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        @if (request()->query('location') == $district->slug) selected @endif>- {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="text" class="form-control" name="modalMarketSearchKeyword" autocomplete="off"
                                        placeholder="Search your market ..." id="modalMarketSearchInpur" />
                                    <button class="btn btn-search" type="submit">
                                        <i class="d-icon-search"></i>
                                    </button>
                                </form>
                            </div>

                            <div id="modalMarketSearchResultDiv">
                                <div class="d-flex justify-content-center my-4" style="display:none !important"
                                    id="searchMarketPreloader">
                                    <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
