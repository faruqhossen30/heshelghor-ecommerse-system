@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Edit Sub Category</h4>
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
                                <a href="{{route('subcategory.index')}}" class="btn btn-success mb-2"><i
                                        class="mdi mdi-format-list-bulleted me-1"></i> All SubCategory</a>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-2">
                                                    <form method="POST" action="{{route('subcategory.update', $subcatagory->id)}}" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="old_image" value="{{$subcatagory->image}}">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Select Category</label>
                                                            <div class="col-md-10">

                                                                <label for="subcatagory-name" class="form-label">Select Category <span class="text-danger">*</span></label>

                                                                <select name="category_id" class="form-control" id="subcatagory-category">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('category_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Sub Category Name</label>
                                                            <div class="col-md-10">
                                                                <input name="name" value="{{$subcatagory->name}}" type="text" id="simpleinput" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                                                <div class="text-danger">
                                                                    @error('name')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="example-textarea">Text area</label>
                                                            <div class="col-md-10">
                                                                <textarea name="description"  class="form-control @error('description') is-invalid @enderror" id="example-textarea" rows="5" placeholder="Category description...">
                                                                    {{$subcatagory->description}}
                                                                </textarea>
                                                                <div class="text-danger">
                                                                    @error('description')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Commission: %</label>
                                                            <div class="col-md-10">
                                                                <input name="commission" value="{{$subcatagory->commission}}" type="text" id="simpleinput" class="form-control @error('commission') is-invalid @enderror" placeholder="Name">
                                                                <div class="text-danger">
                                                                    @error('commission')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">SubCatagory Image</label>
                                                            <div class="col-md-10">
                                                                <input name="image" type="file" id="simpleinput" class="mb-2 form-control @error('image') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('image')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <img src="{{asset($subcatagory->image)}}" style="width: 100px; height:100px" alt="">
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-success">Update SubCatagory</button>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

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
