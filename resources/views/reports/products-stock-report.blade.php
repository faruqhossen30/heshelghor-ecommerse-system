@extends('marchant.layouts.app')
@section('content')

    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Product List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">HeshelGhor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Order List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">



                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="basic-datatable"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check mb-0 font-16">
                                                    <input class="form-check-input" type="checkbox" id="productlistCheck">
                                                    <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all"> SL</th>
                                            <th class="all">Product</th>
                                            <th>Qty</th>
                                            <th>Stock Availability</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-0 font-16">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="productlistCheck1">
                                                        <label class="form-check-label"
                                                            for="productlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $serial++ }}</td>

                                                <td>
                                                    {{ $item->title }}
                                                </td>
                                                <td>
                                                    {{ $item->quantity }}
                                                </td>

                                                <td>
                                                    @if ($item->quantity > 0)
                                                        <i class="fa-solid fa-check"></i>
                                                        <strong style="color:green"> In Stock -
                                                            {{ $item->quantity }}</strong>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-md mt-3"><i
                                                                class="fa-solid fa-ban"></i> Out Of
                                                            Stock</button>
                                                    @endif

                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- third party js -->
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
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
    <!-- sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
