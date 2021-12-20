@extends('marchant.layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Create Shop</h4>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('shop.index') }}" class="btn btn-primary mb-2"><i
                                            class="mdi mdi-format-list-bulleted me-1"></i> All Shop List</a>
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
                                                        <form method="POST" action="{{ route('shop.store') }}"
                                                            enctype="multipart/form-data" class="form-horizontal"
                                                            role="form">
                                                            @csrf
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Shop Name: </label>
                                                                <div class="col-md-10">
                                                                    <input name="name" type="text" id="simpleinput"
                                                                        class="form-control @error('name') is-invalid @enderror "
                                                                        placeholder="Name" value="{{ old('name') }}">
                                                                    <x-error name='name' />
                                                                </div>
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label" for="addressID">Shop
                                                                    Address: </label>
                                                                <div class="col-md-10">
                                                                    <input name="address" type="text" id="addressID"
                                                                        class="form-control @error('address') is-invalid @enderror "
                                                                        placeholder="Full Address"
                                                                        value="{{ old('address') }}">
                                                                    <x-error name='address' />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label" for="addressID">
                                                                    Mobile Number: </label>
                                                                <div class="col-md-10">
                                                                    <input name="mobile" type="text" id="addressID"
                                                                        class="form-control @error('mobile') is-invalid @enderror "
                                                                        placeholder="Contact Number"
                                                                        value="{{ old('mobile') ?? Auth::guard('marchant')->user()->phone_number  }}">
                                                                    <x-error name='mobile' />
                                                                </div>
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="example-textarea">Shop Description:</label>
                                                                <div class="col-md-10">
                                                                    <textarea name="description"
                                                                        class="form-control @error('description') is-invalid @enderror"
                                                                        id="example-textarea" rows="5"
                                                                        placeholder="Description">{{ old('description') }}</textarea>
                                                                    <x-error name='description' />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label" for="image">Shop
                                                                    Image: </label>
                                                                <div class="col-md-10">
                                                                    <input name="image" type="file" id="image"
                                                                        class="form-control dropify @error('image') is-invalid @enderror "
                                                                        data-show-errors="true"
                                                                        data-errors-position="outside"
                                                                        data-allowed-file-extensions="jpg jpeg png bmp"
                                                                        data-max-file-size-preview="1M" ">
                                                                    <x-error name='image' />
                                                            </div>
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <label class="form-label col-md-2 col-form-label"
                                                            for="select-code-language">Market/Mall</label>
                                                        <div class="col-md-10">

                                                            <select name="market_id" id="select-code-language"
                                                                class="selectize-drop-header"
                                                                placeholder="Select a Shoping Mall/Market">
                                                                @foreach ($markets as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="mb-2 row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Division:
                                                        </label>
                                                        <div class="col-md-10" style="position: relative">
                                                            <select id="division"
                                                                class="form-select @error('division_id') is-invalid @enderror"
                                                                name="division_id">
                                                                <option selected value="">Select</option>
                                                                @foreach ($divisions as $division)
                                                                    <option value="{{ $division->id }}">
                                                                        {{ $division->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            <x-error name='division_id' />
                                                        </div>
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Select
                                                            District : </label>
                                                        <div class="col-md-10" style="position: relative">
                                                            <select disabled id="district"
                                                                class="form-select @error('district_id') is-invalid @enderror"
                                                                name="district_id">
                                                                <option selected value="">Select</option>
                                                            </select>
                                                            <img id="district_loader" src="{{ asset('loading.gif') }}"
                                                                alt=""
                                                                style="width:20px; position:absolute; top:10px;left:30px">
                                                                <x-error name='district_id' />
                                                        </div>
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <label class="col-md-2 col-form-label" for="upazila">Select
                                                            Upazila : </label>
                                                        <div class="col-md-10" style="position: relative">
                                                            <select disabled id="upazila"
                                                                class="form-select @error('upazila_id') is-invalid @enderror"
                                                                name="upazila_id">
                                                                <option selected value=""></option>
                                                            </select>
                                                            <img id="upazila_loader" src="{{ asset('loading.gif') }}"
                                                                alt=""
                                                                style="width:20px; position:absolute; top:10px;left:30px">
                                                                <x-error name='upazila_id' />
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary"> <i
                                                            class="mdi mdi-content-save me-1"></i> Create
                                                        Shop</button>

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

    <link href="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" type="text/css" />
    {{-- Dropify CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <style>
        .dropify-message .file-icon p {
            font-size: 14px;
        }

        .dropify-wrapper {
            width: 150px;
            height: 150px;
        }

    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Validation init js-->
    <script src="{{ asset('backend') }}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>





    <script>
        $(function() {
            var division = $('select[name=division_id]');
            var district = $('select[name=district_id]');
            var upazila = $('select[name=upazila_id]');
            var district_loader = $('#district_loader');
            var upazila_loader = $('#upazila_loader');

            district_loader.hide();
            upazila_loader.hide();

            // For District
            division.change(function() {
                district.removeAttr('disabled');
                district_loader.show();
                var divisionID = $(this).val();
                if (divisionID) {
                    $.get(`{{ url('/getdistrict/${divisionID}') }}`, function(data, status) {
                        district.empty();
                        if (data) {
                            district_loader.hide();
                            data.forEach(function(row) {
                                district.append(
                                    `<option selected value="${row.id}">${row.name}</option>`
                                );
                            });
                        }
                    });
                }

            });

            // For Upazilla
            district.change(function() {
                upazila.removeAttr('disabled');
                var districtID = $(this).val();
                if (districtID) {
                    $.get(`{{ url('/getupazila/${districtID}') }}`, function(data, status) {
                        upazila.empty();
                        if (data) {
                            upazila_loader.hide();
                            data.forEach(function(row) {
                                upazila.append(
                                    `<option selected value="${row.id}">${row.name}</option>`
                                );
                            });
                        }
                    });
                }
            });

        });
    </script>
    {{-- Dropify --}}
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop profile new photo or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endpush
