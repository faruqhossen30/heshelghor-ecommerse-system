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
                            <li class="breadcrumb-item active">Profile</li>
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
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form method="POST" action="{{route('merchant.profile.store')}}"
                                        enctype="multipart/form-data" class="form-horizontal" role="form">
                                        @csrf
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="profilePhoto">Profile
                                                Photo<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                {{-- <p class="sub-header ">Image size should be ( width: 800px height:
                                                    800px )</p> --}}
                                                <input name="profile_photo" type="file" id="profilePhoto"
                                                    class="form-control @error('profile_photo') is-invalid @enderror">
                                                <div class="text-danger">
                                                    @error('profile_photo')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">NID Number
                                                <span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <input name="nid_no" type="text" id="simpleinput"
                                                    class="form-control @error('nid_no') is-invalid @enderror "
                                                    placeholder="National ID Number" value="{{ old('nid_no') }}">
                                                <div class="text-danger">
                                                    @error('nid_no')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="TradeLicence">Trade Licence
                                                No</label>
                                            <div class="col-md-10">
                                                <input name="tradelicense_no" type="text" id="TradeLicence"
                                                    class="form-control @error('tradelicense_no') is-invalid @enderror "
                                                    placeholder="Trade Licence Number" value="{{ old('TradeLicence') }}">
                                                <div class="text-danger">
                                                    @error('TradeLicence')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="tinNumber">TIN No</label>
                                            <div class="col-md-10">
                                                <input name="tin_no" type="text" id="tinNumber"
                                                    class="form-control @error('tin_no') is-invalid @enderror "
                                                    placeholder="TIN Number" value="{{ old('tin_no') }}">
                                                <div class="text-danger">
                                                    @error('tin_no')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="">NID Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <input name="nid_photo" type="file" id="nidImage"
                                                    class="form-control @error('nid_photo') is-invalid @enderror"
                                                    ">
                                                <div class="text-danger">
                                                    @error('nid_photo')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
{{--
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="">Trade License Image
                                                </label>
                                            <div class="col-md-10">
                                                <input name="tradelicense_photo" type="file" id="nidImage"
                                                    class="form-control @error('tradelicense_photo') is-invalid @enderror">
                                                <div class="text-danger">
                                                    @error('tradelicense_photo')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="">TIN Image
                                                </label>
                                            <div class="col-md-10">
                                                <input name="tin_photo" type="file" id="nidImage"
                                                    class="form-control @error('tin_photo') is-invalid @enderror">
                                                <div class="text-danger">
                                                    @error('tin_photo')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}

                                        <button type="submit" class="btn btn-primary">Update Profile</button>

                                    </form>
                                </div>
                            </div>

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
<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
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
@endpush
