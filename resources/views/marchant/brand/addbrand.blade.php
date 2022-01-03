@extends('marchant.layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Create Brand</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Brand List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('brand.index') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-format-list-bulleted me-1"></i> All Brand</a>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- <h4 class="header-title">Create Brand </h4> --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="p-2">
                                                        <form method="POST" action="{{ route('brand.store') }}"
                                                            enctype="multipart/form-data" class="form-horizontal"
                                                            role="form">
                                                            @csrf
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Brand Name<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input name="name" type="text" id="simpleinput"
                                                                        class="form-control @error('name') is-invalid @enderror "
                                                                        placeholder="Name" value="{{ old('name') }}">
                                                                    <div class="text-danger">
                                                                        @error('name')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="example-textarea">Description<span
                                                                        class="text-danger">*</span> </label>
                                                                <div class="col-md-10">
                                                                    <textarea name="description"
                                                                        class="form-control @error('description') is-invalid @enderror"
                                                                        id="example-textarea" rows="5"
                                                                        placeholder="Brand description...">{{ old('description') }}</textarea>
                                                                    <div class="text-danger">
                                                                        @error('description')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Brand Image</label>
                                                                <div class="col-md-10">
                                                                    <input name="image" type="file" id="simpleinput"
                                                                        class="form-control @error('image') is-invalid @enderror"
                                                                        value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('image')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-success">Add Brand</button>

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

                <div class="col-sm-3"> {{-- Galary Image Start --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Featured Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div style="display: flex; justify-content:space-between" class="my-1">
                                    <label class="control-label text-center">Select Image For Upload</label>
                                    {{-- <button class="btn btn-danger btn-sm" id="collapseClose"
                                        type="button">Close</button> --}}
                                </div>
                                <div class="preview-zone hidden">
                                    <div class="selectmidiabox selectmidiabox-solid">
                                        <div class="selectmidiabox-body"></div>
                                    </div>
                                </div>
                                <div class="selectmediadropzone-wrapper">
                                    <div class="selectmediadropzone-desc">
                                        <i class="mdi mdi-image h1 text-secondary"></i>
                                        <p>Select Image</p>
                                    </div>
                                    <button type="file" name="thumbnail" id="thumbnail" class="selectmediadropzone thumbnail"> Welcome </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- Galary Image End --}}
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection

@push('css')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

{{-- Style for image checkbox --}}
<style>
    .image-checkbox{
        cursor: pointer;
        position: relative;
    }
    .image-checkbox input{
        /* display: none */
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js">
    </script>
    <!-- third party js ends -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>

@endpush
