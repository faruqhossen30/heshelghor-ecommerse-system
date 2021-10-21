@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Roles ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <p class="header-title fs-4 text-uppercase" >All Admins List</p>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('admin.create')}}" class="btn btn-success float-end" title="Create new">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                             <td>{{ $loop->index+1 }}</td>
                             <td>{{ $admin->name }}</td>
                             <td>{{ $admin->email }}</td>
                             <td>
                                 @foreach ($admin->roles as $role)
                                         {{ $role->name }}
                                 @endforeach
                             </td>
                             <td>
                                 <a class="btn btn-success text-white" href="{{route('admin.edit', $admin->id)}}" title="Edit"><span class="mdi mdi-pencil"></span></a>
                                 <form action="{{route('admin.destroy', $admin->id)}}" method="post" style="display: inline" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="confirm('yes')" type="submit" onclick="confirm('Sure ? Want to delete Tender ?')"><i class="mdi mdi-delete"></i></button>
                                </form>
                             </td>
                         </tr>
                        @endforeach
                     </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
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
