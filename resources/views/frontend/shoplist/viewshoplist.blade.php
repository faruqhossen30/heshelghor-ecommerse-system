@php
$divissions = App\Models\Admin\Location\Division::with('districts')
    ->orderBy('name', 'asc')
    ->get();
@endphp
@extends('frontend.layouts.app')
@section('title')
    HeshelGhor | Shop List Page
@endsection

@section('content')
    <main class="main" style="margin-top: -22px">
        <div class="page-content mb-10 pb-2">
            <div class="container-fluid" style="background: url({{ asset('frontend/images/banner.jpg') }}); background-position:center; background-color:red">
                <div class="page-header"
                    style="height:200px; background-color:transparent">
                    <div class="header-search hs-simple" style="flex: none; width:100%;">
                        <form action="#" method="GET" class="input-wrapper" style="position: relative">
                            <div class="select-box">

                                <select name="shoploaction">
                                    <option value="all">All Location</option>
                                    @foreach ($divissions as $divission)
                                        <option style="font-weight: bolder">
                                            <strong>{{ $divission->name }}</strong>
                                        </option>
                                        @foreach ($divission->districts as $district)
                                            <option value="{{ $district->slug }}" @if (!empty($_GET['shoploaction']) && $_GET['shoploaction'] == $district->slug) selected @endif> -
                                                {{ $district->name }} </option>
                                        @endforeach

                                    @endforeach

                                </select>
                            </div>
                            <input type="text" class="form-control" name="shopsearchkeyword" autocomplete="off"
                                placeholder="Enter Shop Name..." style="border-radius: 0">
                            <button class="btn btn-search" type="button">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                        <div class="" style="z-index: 999999999;position: absolute; width:100%; display:none"
                            id="searchResultDiv">
                            <ul class="list-group" id="searchProductList">
                                <a href="" class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="https://picsum.photos/id/1005/367/267" alt="" class="img-thumbnail"
                                            style="width: 40px; height:40px">
                                        <span>Just for test</span>
                                    </div>
                                    <div>
                                        <span>$500</span>
                                    </div>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">
                <!-- End Breadcrumb -->
                <div class="row main-content-wrap gutter-lg">

                    <div class="col-lg-12 main-content">
                        <div class="row" id="shoplistdiv">
                            <ul class="breadcrumb mt-3">
                                <li><a href="#"><i class="d-icon-home"></i></a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">All Location</a></li>
                            </ul>
                            @foreach ($shops as $shop)
                                <div class="col-xl-2 col-sm-3 col-xs-6 my-4">
                                    <div class="card">
                                        @if ($shop->image)
                                            <img src="{{ asset('/uploads/shop/' . $shop->image) }}"
                                                class="card-img-top img-thumbnail" style="max-height: 200px" alt="...">
                                        @else
                                            <img src="{{ asset('frontend/images/shop.png') }}"
                                                class="card-img-top img-thumbnail" style="max-height: 200px" alt="...">
                                        @endif

                                        <div class="card-body">
                                            <a href="{{ route('product.with.shop', $shop->id) }}">
                                                <h6 class="card-title">{{ $shop->name }}</h6>
                                            </a>
                                            <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                                <i class="d-icon-map mr-2"></i>{{ $shop->address }}
                                            </p>
                                            @if ($shop->market)
                                                <a href="#">
                                                    <p class="text-muted mb-0" style="font-size: 1.3rem">
                                                        <i class="far fa-building mr-2"></i>{{$shop->market->name ?? 'N/A'}}
                                                    </p>
                                                </a>
                                            @endif
                                            <hr style="margin-bottom: 1rem">


                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var shoploaction = $('select[name="shoploaction"]');
            var shopsearchkeyword = $('input[name="shopsearchkeyword"]');
            var shoplistdiv = $('#shoplistdiv');

            $(document).on('change keyup', 'select[name="shoploaction"], input[name="shopsearchkeyword"]',
            function() {
                let location = shoploaction.val();
                let keyword = shopsearchkeyword.val().trim();
                // console.log(keyword);
                $.ajax({
                    url: '{{ route('ajaxshoplist') }}',
                    type: 'GET',
                    data: {
                        location,
                        keyword,
                    },
                    // dataType: 'JSON',
                    success: function(data) {
                        shoplistdiv.empty()
                        shoplistdiv.append(data)
                        // console.log(data);
                    }
                });
            });
        });
    </script>
@endpush
