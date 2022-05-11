@php
$admin = Auth::guard('admin')->user();
$allshop = App\Models\Merchant\Shop::orderBy('name', 'desc')->get();

$date_from = null;
$date_to = null;
$shop_id = null;

if (isset($_GET['date_from'])) {
    $date_from = $_GET['date_from'];
}
if (isset($_GET['date_to'])) {
    $date_to = $_GET['date_to'];
}
if (isset($_GET['shop_id'])) {
    $shop_id = $_GET['shop_id'];
}

$shops = App\Models\Merchant\Shop::
when($shop_id, function ($query, $shop_id) {
    return $query->where('id', $shop_id);
})
->orderBy('name', 'asc')
->paginate(50);

@endphp

@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Admin ')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="header-title fs-4">Shop name & Product Count</p>
                        </div>
                    </div>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-date">Shop</label>
                                    <div class="col-md-10">
                                        <select name="shop_id"
                                            class="form-control @error('shop_id') is-invalid @enderror selectize-drop-header"
                                            id="select-code-language">
                                            <option value="">Select Shop</option>
                                            @foreach ($allshop as $shop)
                                                <option value="{{ $shop->id }}"
                                                    @if (!empty($_GET['shop_id']) && $_GET['shop_id'] == $shop->id) selected @endif>{{ $shop->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="mb-2 row">
                                    <label class="col-md-3 col-form-label" for="example-date">From</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date" name="date_from" id="example-date"
                                            value="{{ $_GET['date_from'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-date">To</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" name="date_to" id="example-date"
                                            value="{{ $_GET['date_to'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Shop Name</th>
                                <th>Total Product</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($shops as $shop)
                                @php

                                    if ($date_from && $date_to) {
                                        $products = App\Models\Product\Product::
                                            where('shop_id', $shop->id)
                                            ->whereBetween('created_at', [$date_from, $date_to])
                                            ->get();
                                    }else {
                                        # code...
                                        $products = App\Models\Product\Product::where('shop_id', $shop->id)->get();
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $shops->firstItem() + $loop->index }}</td>
                                    <td>
                                        <a href="{{route('product.with.shop', $shop->id)}}" target="_blank">{{ $shop->name }}</a>
                                    </td>

                                    <td>
                                        {{ count($products) }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $shops->appends($_GET)->links() }}

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection

@push('css')
    <link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    {{-- Dropyfiy --}}
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
@endpush
@push('scripts')

    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
    <!-- third party js 2 -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>


    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- Plugins js -->
    {{-- <script src="{{ asset('backend')}}/assets/libs/quill/quill.min.js"></script> --}}

    <!-- Select2 js-->
    <script src="{{ asset('backend') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    {{-- <script src="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.js"></script> --}}
    {{-- <script src="{{ asset('backend') }}/assets/libs/multiselect/js/jquery.multi-select.js"></script> --}}
    {{-- <script src="{{ asset('backend') }}/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script> --}}
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    {{-- <script src="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script> --}}
    <script src="{{ asset('backend') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>

    <!-- Init js -->
    <script src="{{ asset('backend') }}/assets/js/pages/add-product.init.js"></script> {{-- Edit this line for js error --}}
    <script src="{{ asset('js/product.js') }}"></script>
    {{-- Cropm And Modal --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Added by minhaz -->
    <!-- sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('create'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'New Admin has been created Successfully!'
            })
        </script>
    @endif

    @if (Session::has('update'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Admin info has been updated Successfully!'
            })
        </script>
    @endif


    @if (Session::has('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Admin has been deleted Successfully!',
            })
        </script>
    @endif


@endpush
