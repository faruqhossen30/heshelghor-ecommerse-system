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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
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
                            <table class="table table-centered w-100 dt-responsive nowrap" id="basic-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all" style="width: 20px;">
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck">
                                                <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="all">SN</th>
                                        <th class="all">Order No</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        {{-- <th style="width: 85px;">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp

                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck1">
                                                <label class="form-check-label" for="productlistCheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            11
                                        </td>
                                        <td>
                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">shop name</a></h5>
                                        </td>
                                        <td>
                                            sdfsdf
                                        </td>
                                        <td>
                                            sdfsdf
                                        </td>
                                        <td>
                                            {{-- {{ Carbon\Carbon::parse($shop->created_at)->diffForHumans() }} --}}
                                        </td>

                                        {{-- <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{route('category.show', $category->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{route('category.edit', $category->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">

                                                    <form action="{{route('category.destroy', $category->id)}}" method="post" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none; background:none; color:gray; font-size:17px" type="submit" onclick="confirm('Sure ? Want to delete Tender ?')"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td> --}}
                                    </tr>


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
<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<!-- third party js -->
<script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
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
<script src="{{ asset('backend')}}/assets/js/pages/product-list.init.js"></script>
<script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>
<!-- sweetalert js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
