@extends('admin.layouts.app')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Market List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Shop List</li>
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
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <a href="{{route('market.create')}}" class="btn btn-primary mb-2"><i class="mdi mdi-plus-circle me-1"></i> Create Market</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-end">
                                    <button type="button" class="btn btn-primary mb-2 mb-sm-0"><i class="mdi mdi-cog"></i></button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->

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
                                        <th class="all">Shop Name</th>
                                        <th>Photo</th>
                                        <th>Address</th>
                                        <th>Author</th>
                                        <th>Created at</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($markets as $market)
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck1">
                                                <label class="form-check-label" for="productlistCheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            {{$serial++}}
                                        </td>
                                        <td>
                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$market->name}}</a></h5>
                                        </td>
                                        <td>
                                            <img src="{{asset('uploads/market/'.$market->image)}}"  style="width:50px" alt="Photo">
                                        </td>
                                        <td>
                                            {{$market->address ?? 'No description found'}}
                                        </td>
                                        <td>
                                            Super Admin
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($market->created_at)->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a href="{{route('market.edit',$market->id)}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('market.destroy',$market->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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
                title: 'Shop has been created Successfully!'
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
                title: 'Shop has been updated Successfully!'
            })
        </script>
    @endif

    @if (Session::has('delete'))
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Shop has been deleted Successfully!',
            })
        </script>
    @endif
@endpush
