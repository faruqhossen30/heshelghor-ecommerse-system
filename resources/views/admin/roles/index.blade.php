@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Roles ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title">Role List</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Heshel Ghor</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Role List</a></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('roles.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i>Create Role</a>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-end">
                            <button type="button" class="btn btn-success mb-2 mb-sm-0"><i class="mdi mdi-cog"></i></button>
                        </div>
                    </div><!-- end col-->
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="basic-datatable" class="table table-responsive dt-responsive w-100 table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%">SL</th>
                                <th style="width: 10%">Role</th>
                                <th style="width: 65%">Permissions</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach ($role->permissions as $permissions)
                                    <span class="badge bg-success">
                                        {{ $permissions->name }}
                                    </span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('roles.show', $role->id)}}" class="btn btn-success" title="View"><span class="mdi mdi-eye"></span></a>
                                    <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary" title="Edit"><span class="mdi mdi-pencil"></span></a>

                                    <form action="{{route('roles.destroy', $role->id)}}" method="post" style="display: inline" id="delete-form-{{$role->id}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="confirm('yes')" type="submit" onclick="confirm('Sure ? Want to delete Tender ?')"><i class="mdi mdi-delete"></i></button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
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
<!-- Datatables init -->
<script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>

    <!-- third party js 2 -->
    <script src="{{ asset('backend')}}/assets/js/pages/product-list.init.js"></script>


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
            title: 'New Role has been created Successfully!'
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
            title: 'Role has been updated Successfully!'
        })
    </script>
@endif


@if (Session::has('delete'))
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Role has been deleted Successfully!',
        })
    </script>
@endif

@endpush
