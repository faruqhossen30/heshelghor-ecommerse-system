@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Category Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Category List</li>
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
                                <a href="{{route('category.index')}}" class="btn btn-success mb-2"><i
                                        class="mdi mdi-format-list-bulleted me-1"></i> All Category</a>
                            </div>
                        </div>
                        <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Title</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Name: </td>
                                                <td><strong>{{$category->name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Description: </td>
                                                <td>{{$category->description}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Create at: </td>
                                                <td>{{$category->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Status</td>
                                                <td>
                                                    <span class="badge badge-soft-success">
                                                        {{$category->status ? 'Active' : ''}}</td>
                                                    </span>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Photo</td>
                                                <td>
                                                    <img src="{{asset($category->image)}}" alt="" style="width: 100px; height:100px">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-success">Edit Category</a>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->


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
@endpush
