@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Division List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Product List</li>
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
                                <a href="{{route('divission.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add Division</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-end">
                                    <button type="button" class="btn btn-success mb-2 mb-sm-0"><i class="mdi mdi-cog"></i></button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Division Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $serial = 1;
                                    @endphp
                                    @foreach ($divissions as $divission)
                                    <tr>
                                        <th scope="row"> {{$serial++}}</th>
                                        <td><h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$divission->name}}</a></h5></td>
                                    </tr>
                                    {{-- <tr>
                                        <th scope="row">2</th>
                                        <td>Khulna</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Barishal</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Chittagong</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Rajshahi</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Sylhet</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Rangpur</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Mymensing</td>
                                    </tr> --}}
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
@endpush

@push('scripts')
<!-- third party js -->
<script src="{{ asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->
<script src="{{ asset('backend')}}/assets/js/pages/product-list.init.js"></script>
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
                title: 'Category has been created Successfully!'
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
                title: 'Category has been updated Successfully!'
            })
        </script>
    @endif


    @if (Session::has('delete'))
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Category has been deleted Successfully!',
            })
        </script>
    @endif
@endpush
