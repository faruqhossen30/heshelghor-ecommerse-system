@php
$divissions = App\Models\Admin\Location\Division::with('districts')
    ->orderBy('name', 'asc')
    ->get();
@endphp
@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Market List Page
@endsection

@section('content')
    <main class="main">
        <div class="page-content mb-2">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="page-header" style="max-height:50px; background-color:transparent">
                            <div class="header-search hs-simple" style="flex: none; width:100%;">
                                <form action="#" method="GET" class="input-wrapper" style="position: relative">
                                    <div class="select-box">

                                        <select name="marketLocation">
                                            <option value="">All Location</option>
                                            @foreach ($divissions as $divission)
                                                <option style="font-weight: bolder" disabled>
                                                    <strong>{{ $divission->name }}</strong>
                                                </option>
                                                @foreach ($divission->districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        @if (!empty($_GET['marketLocation']) && $_GET['marketLocation'] == $district->id) selected @endif> -
                                                        {{ $district->name }} </option>
                                                @endforeach
                                            @endforeach

                                        </select>
                                    </div>
                                    <input type="text" class="form-control" name="marketSearchKeyword" autocomplete="off"
                                        placeholder="Enter Shop Name..." style="border-radius: 0">
                                    <button class="btn btn-search" type="button">
                                        <i class="d-icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Seawrch bar end --}}

            <div class="container my-3">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="d-icon-home"></i></a></li>
                    <li><a href="#">Market</a></li>
                    {{-- <li><a href="#" id="marketLocationNameBreadcum">All Location</a></li> --}}
                </ul>
                <div class="row" id="merketListDiv">
                    @foreach ($markets as $market)
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('market.wise.shoplist', $market->id) }}">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            @if (isset($market->photo))
                                                <img src="{{ asset('storage/market/'.$market->photo) }}"
                                                    style="width: 75px; height:75px" class="img-fluid rounded-start mt-1"
                                                    alt="...">
                                            @elseif (isset($market->image))
                                                <img src="{{ asset('/uploads/market/' . $market->image) }}"
                                                    style="width: 75px; height:75px" class="img-fluid rounded-start mt-1"
                                                    alt="...">
                                            @else
                                                <img src="{{ asset('frontend/images/skyscraper.png') }}" style="width: 75px"
                                            class="img-fluid rounded-start mt-1" alt="...">
                                            @endif

                                        </div>

                                        {{-- <img src="{{ asset('frontend/images/skyscraper.png') }}" style="width: 75px"
                                            class="img-fluid rounded-start mt-1" alt="..."> --}}
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $market->name }} </h6>
                                                <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                                    <i class="d-icon-map mr-2"></i>{{ $market->address }}
                                                </p>
                                                {{-- <p class="text-muted mb-0" style="font-size: 1.3rem">
                                <i class="far fa-building mr-2"></i>58 Karbala Road , Jessore
                            </p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var marketLocationNameBreadcum = $('#marketLocationNameBreadcum');

            var marketSearchKeyword = $('input[name="marketSearchKeyword"]');
            var marketLocation = $('select[name="marketLocation"]');
            var merketListDiv = $('#merketListDiv');

            $(document).on('change keyup', 'select[name="marketLocation"], input[name="marketSearchKeyword"]',
                function() {
                    let location = marketLocation.val();
                    let keyword = marketSearchKeyword.val().trim();
                    // console.log(keyword);
                    $.ajax({
                        url: '{{ route('ajaxmarketlist') }}',
                        type: 'GET',
                        data: {
                            location,
                            keyword,
                        },
                        // dataType: 'JSON',
                        success: function(data) {
                            console.log(data);
                            merketListDiv.empty()
                            merketListDiv.append(data)
                        }
                    });
                });
        });
    </script>
@endpush
