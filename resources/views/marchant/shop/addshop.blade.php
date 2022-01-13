@extends('marchant.layouts.app')

@section('content')
    <div class="content">
        <x-mediamodal />
        <div class="container-fluid">
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

            <form method="POST" action="{{ route('shop.store') }}" enctype="multipart/form-data" class="form-horizontal"
                role="form">
                <div class="row">
                    @csrf
                    <div class="col-sm-9">
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

                                                            <div class="mb-2 row">
                                                                <label class="col-md-3 col-form-label"
                                                                    for="simpleinput">Shop Name:<span class="text-danger">*</span> </label>
                                                                <div class="col-md-9">
                                                                    <input name="name" type="text" id="simpleinput"
                                                                        class="form-control @error('name') is-invalid @enderror "
                                                                        placeholder="Name" value="{{ old('name') }}">
                                                                    <x-error name='name' />
                                                                </div>
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <label class="col-md-3 col-form-label" for="addressID">Shop
                                                                    Address:<span class="text-danger">*</span> </label>
                                                                <div class="col-md-9">
                                                                    <input name="address" type="text" id="addressID"
                                                                        class="form-control @error('address') is-invalid @enderror "
                                                                        placeholder="Full Address"
                                                                        value="{{ old('address') }}">
                                                                    <x-error name='address' />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-md-3 col-form-label" for="addressID">
                                                                    Mobile Number:<span class="text-danger">*</span> </label>
                                                                <div class="col-md-9">
                                                                    <input name="mobile" type="text" id="addressID"
                                                                        class="form-control @error('mobile') is-invalid @enderror "
                                                                        placeholder="Contact Number"
                                                                        value="{{ old('mobile') ?? Auth::guard('marchant')->user()->phone_number }}">
                                                                    <x-error name='mobile' />
                                                                </div>
                                                            </div>

                                                            <div class="mb-2 row">
                                                                <label class="col-md-3 col-form-label"
                                                                    for="example-textarea">Shop Description:</label>
                                                                <div class="col-md-9">
                                                                    <textarea name="description"
                                                                        class="form-control @error('description') is-invalid @enderror"
                                                                        id="example-textarea" rows="5"
                                                                        placeholder="Description">{{ old('description') }}</textarea>
                                                                    <x-error name='description' />
                                                                </div>
                                                            </div>


                                                                                <div class="       mb-2 row">
                                                                    <label class="form-label col-md-3 col-form-label"
                                                                        for="select-code-language">Market/Mall</label>
                                                                    <div class="col-md-9">

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
                                                                    <label class="col-md-3 col-form-label"
                                                                        for="simpleinput">Division:<span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-md-9" style="position: relative">
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
                                                                    <label class="col-md-3 col-form-label"
                                                                        for="simpleinput">Select
                                                                        District :<span class="text-danger">*</span> </label>
                                                                    <div class="col-md-9" style="position: relative">
                                                                        <select disabled id="district"
                                                                            class="form-select @error('district_id') is-invalid @enderror"
                                                                            name="district_id">
                                                                            <option selected value="">Select</option>
                                                                        </select>
                                                                        <img id="district_loader"
                                                                            src="{{ asset('loading.gif') }}" alt=""
                                                                            style="width:20px; position:absolute; top:10px;left:30px">
                                                                        <x-error name='district_id' />
                                                                    </div>
                                                                </div>

                                                                <div class="mb-2 row">
                                                                    <label class="col-md-3 col-form-label"
                                                                        for="upazila">Select
                                                                        Upazila :<span class="text-danger">*</span> </label>
                                                                    <div class="col-md-9" style="position: relative">
                                                                        <select disabled id="upazila"
                                                                            class="form-select @error('upazila_id') is-invalid @enderror"
                                                                            name="upazila_id">
                                                                            <option selected value=""></option>
                                                                        </select>
                                                                        <img id="upazila_loader"
                                                                            src="{{ asset('loading.gif') }}" alt=""
                                                                            style="width:20px; position:absolute; top:10px;left:30px">
                                                                        <x-error name='upazila_id' />
                                                                    </div>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary"> <i
                                                                        class="mdi mdi-content-save me-1"></i> Create
                                                                    Shop</button>


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
                                    <h5 class="text-center m-0">Featured Image</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group" id="shopMediaSelectArea">
                                        <div style="display: flex; justify-content:space-between" class="my-1">
                                            <label class="control-label text-center">Select Image For Upload <span class="text-danger">*</span></label>
                                            {{-- <button class="btn btn-danger btn-sm" id="collapseClose"
                                type="button">Close</button> --}}
                                        </div>
                                        <div class="selectmediadropzone-wrapper">
                                            <div class="selectmediadropzone-desc">
                                                <i class="mdi mdi-image h1 text-secondary"></i>
                                                <p>Select Image</p>
                                            </div>
                                            <button name="thumbnail" id="thumbnail" type="button"
                                                class="selectmediadropzone thumbnail"> Welcome </button>
                                        </div>
                                    </div>
                                    <div id="shopMediaArea">

                                    </div>
                                </div>
                            </div>
                        </div> {{-- Galary Image End --}}
                    </div>

            </form>
        </div> <!-- container-fluid -->



    </div> <!-- content -->

@endsection

@push('css')
    <!-- third party css -->
    {{-- <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" /> --}}

    <link href="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" type="text/css" />
    {{-- Dropify CSS --}}


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
    {{-- <script src="{{ asset('backend') }}/assets/js/pages/form-validation.init.js"></script> --}}
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


    <script>
        function getGallery(mediaGallery) {
            mediaGallery.empty();
            $.ajax({
                url: '{{ route('merchant.modal.gallery') }}',
                method: 'GET',
                // dataType: "json",
                success(data) {
                    if (data) {
                        mediaGallery.append(data);
                    }
                },
                error() {
                    console.log('Upload error');
                }
            });
        };

        $(document).ready(function() {
            var mediaGallery = $('#mediaGallery');
            $mediaModal = $('#mediaModal');
            $('#thumbnail').on('click', function() {
                $mediaModal.modal('show');
                getGallery(mediaGallery);
            });

            $('#mediaForm').on('submit', function(event) {
                event.preventDefault();
                var selectimage = $('input[name="selectimage"]:checked');

                var shopMediaSelectArea = $('#shopMediaSelectArea');
                var shopMediaArea = $('#shopMediaArea');

                var fullUrl = selectimage.data('urlfull');
                var smallUrl = selectimage.data('rulsmall');
                var mediumUrl = selectimage.data('urlmedium');
                var largeUrl = selectimage.data('urllarge');

                var shopMediaArea = $('#shopMediaArea');

                $('#shopMediaSelectArea').hide();
                shopMediaArea.append(`<div id="selectedBrandMedia" class="text-center">
                                    <h5>Brand Image</h5>
                                    <img src="${smallUrl}" alt="" class="img-responsive p-2" style="max-width:100%">
                                    <button  id="selectedBrandMediaButton" type="button" class="btn btn-danger" > Close</button>
                                </div>`);


                $('#shopMediaArea').append(
                    `<div>
                    <input type="hidden" name="img_full" value="${fullUrl}">
                    <input type="hidden" name="img_small" value="${smallUrl}">
                    <input type="hidden" name="img_medium" value="${mediumUrl}">
                    <input type="hidden" name="img_large" value="${largeUrl}">
                </div>`
                );
                $mediaModal.modal('hide');
                $('#selectedBrandMediaButton').on('click', function() {
                    $('#shopMediaArea').empty();
                    $('#shopMediaSelectArea').show();
                    $(this).parent().remove();
                });


            });


        });
    </script>

@endpush
