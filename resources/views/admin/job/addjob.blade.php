@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Create job</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">job List</li>
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
                                <a href="{{route('job.index')}}" class="btn btn-success mb-2"><i
                                        class="mdi mdi-format-list-bulleted me-1"></i> All job</a>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h4 class="header-title">Create job </h4> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-2">
                                                    <form method="POST" action="{{route('job.store')}}" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        @csrf
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Heading <span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="title" value="{{ old('title') }}" type="text" id="simpleinput" class="form-control @error('title') is-invalid @enderror " placeholder="title">
                                                                <div class="text-danger">
                                                                    @error('title')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Job Title <span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="job_title" value="{{ old('job_title') }}" type="text" id="simpleinput" class="form-control @error('job_title') is-invalid @enderror " placeholder="job_title">
                                                                <div class="text-danger">
                                                                    @error('job_title')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="example-textarea">Description:<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <textarea name="description"  class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                                    rows="5" placeholder="job description..."> {{ old('description') }} </textarea>
                                                                <div class="text-danger">
                                                                    @error('description')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Vacancy <span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="vacancy" value="{{ old('vacancy') }}" type="number" id="simpleinput" class="form-control @error('vacancy') is-invalid @enderror " placeholder="vacancy">
                                                                <div class="text-danger">
                                                                    @error('vacancy')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Start Date <span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="start_date" value="{{ old('start_date') }}" type="date" id="simpleinput" class="form-control @error('start_date') is-invalid @enderror " placeholder="start_date">
                                                                <div class="text-danger">
                                                                    @error('start_date')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">End Date <span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="end_date" value="{{ old('end_date') }}" type="date" id="simpleinput" class="form-control @error('end_date') is-invalid @enderror " placeholder="end_date">
                                                                <div class="text-danger">
                                                                    @error('end_date')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                            for="simpleinput">job Image</label>

                                                            <div class="col-md-10">
                                                                <small class="form-text">Image size mus be (360 X 200)px or (180 X 100)px</small>
                                                                <input name="photo" type="file" id="simpleinput" class="form-control @error('photo') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('photo')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-success">Add job</button>

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
