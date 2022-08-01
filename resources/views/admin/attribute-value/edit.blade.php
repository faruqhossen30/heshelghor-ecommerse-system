@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Atrribute Page</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Atrribute Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom bg-transparent">
                        <p>Update Attribute Value</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('attributevalue.update', $value->id)}}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="exampleName" class="form-label">Attribute Value</label>
                                <input type="text" name="value" value="{{$value->value}}" class="form-control" id="exampleName" aria-describedby="emailHelp" placeholder="Atrribute name">
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-floppy me-1"></i> Update</button>
                        </form>

                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
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
