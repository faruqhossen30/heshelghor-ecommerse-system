@extends('admin.layouts.app')
@section('title')
HeshelGhor | Courier System
@endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Create Courier System</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Delivery System List</li>
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
                                <a href="{{route('courier.index')}}" class="btn btn-success mb-2"><i
                                        class="mdi mdi-format-list-bulleted me-1"></i>Courier Service List</a>
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
                                                    <form method="POST" action="{{route('courier.store')}}" class="form-horizontal" role="form" >
                                                        @csrf
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Name <span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="name" value="{{ old('name') }}" type="text" id="simpleinput" class="form-control @error('name') is-invalid @enderror " placeholder="Name">
                                                                <div class="text-danger">
                                                                    @error('name')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="example-textarea">Description:</label>
                                                            <div class="col-md-10">
                                                                <textarea name="description"  class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                                    rows="5" placeholder="Brand description..."> {{ old('description') }} </textarea>
                                                                <div class="text-danger">
                                                                    @error('description')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                            for="simpleinput">Rate<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="price" type="number" id="simpleinput" class="form-control @error('price') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('price')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                            for="simpleinput">Dhaka To Dhaka Price<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="dhaka_to_dhaka_price" type="number" id="simpleinput" class="form-control @error('dhaka_to_dhaka_price') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('dhaka_to_dhaka_price')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                            for="simpleinput">Any Place<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="all_place_price" type="number" id="simpleinput" class="form-control @error('all_place_price') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('all_place_price')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                            for="simpleinput">Inside Dhaka 1 KG Price:<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="dhaka_to_dhaka_per_kg" type="number" id="simpleinput" class="form-control @error('dhaka_to_dhaka_per_kg') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('dhaka_to_dhaka_per_kg')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                            for="simpleinput">Outside Dhaka Per KG ( After 1 KG):<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="dhaka_to_outside_per_kg" type="number" id="simpleinput" class="form-control @error('dhaka_to_outside_per_kg') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('dhaka_to_outside_per_kg')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>


                                                        <button type="submit" class="btn btn-success">Add Courier Serveice</button>

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
