@extends('admin.layouts.app')

@section('title')
    HeshelGhor | Frequently Asked Question
@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">FAQ List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">FAQ List</li>
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
                                    <a href="{{ route('faq.create') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-plus-circle me-1"></i> Add FAQ</a>
                                </div>

                                <div class="col-sm-6">
                                    <div class="float-sm-end">
                                        <button type="button" class="btn btn-success mb-2 mb-sm-0"><i
                                                class="mdi mdi-cog"></i></button>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            <!-- end row -->

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
                                            <th class="all">SN</th>
                                            <th class="all">Title</th>
                                            <th>Desctiption</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-0 font-16">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="productlistCheck1">
                                                        <label class="form-check-label"
                                                            for="productlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td> {{ $serial++ }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('faq.edit', $row->id) }}" class="btn btn-success"><i
                                                            class="mdi mdi-square-edit-outline"></i></a>

                                                    <form action="{{ route('faq.destroy', $row->id) }}" method="post"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You Sure To Delete?')">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
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
@push('scripts')
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
                title: 'FAQ has been created Successfully!'
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
                title: 'FAQ has been updated Successfully!'
            })
        </script>
    @endif

    @if (Session::has('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'FAQ has been deleted Successfully!',
            })
        </script>
    @endif
@endpush
