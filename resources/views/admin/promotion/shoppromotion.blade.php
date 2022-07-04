@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Admin ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-header border-bottom bg-transparent">
                <h5 class="header-title mb-0">Shop promotion</h5>
            </div>
            <div class="card-body">
                <form action="{{route('shoppromotion')}}" method="POST">
                    @csrf
                    <h5 class="mb-1 mt-3 mt-md-0 font-14">Search for featured shop.</h5>
                    <select name="shop_id[]" class="multi-select" multiple="" id="my_multi_select3">
                        {{-- <option value="AF">Afghanistan just for test</option> --}}
                        @foreach ($shops as $shop)
                        <option value="{{$shop->id}}"
                            @if ($promotion_shops && in_array($shop->id, $promotion_shops)) selected @endif
                            >{{$shop->name}}</option>
                        @endforeach


                    </select>
                    <button type="submit"
                                            class="btn btn-primary waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save</button>
                </form>
            </div>
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div>
<!-- end row-->
@endsection

@push('css')
<!-- Plugins css -->
<link href="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
<style>
    #ms-my_multi_select3 {
        max-width: 100% !important;
    }

    .ms-list {
        height: 50vh !important;
    }

</style>
@endpush

@push('scripts')
<!-- Plugins Js -->
<script src="{{ asset('backend') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="{{ asset('backend') }}/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- init js -->
<script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>
@endpush
