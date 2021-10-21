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
                                <a href="{{route('shop.index')}}" class="btn btn-primary mb-2"><i
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
                                                    <form method="POST" action="{{route('shop.store')}}" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        @csrf
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Shop Name: </label>
                                                            <div class="col-md-10">
                                                                <input name="name" type="text" id="simpleinput" class="form-control @error('name') is-invalid @enderror " placeholder="Name">
                                                                <div class="text-danger">
                                                                    @error('name')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="addressID">Shop Address: </label>
                                                            <div class="col-md-10">
                                                                <input name="address" type="text" id="addressID" class="form-control @error('address') is-invalid @enderror " placeholder="address">
                                                                <div class="text-danger">
                                                                    @error('address')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="example-textarea">Shop Description:</label>
                                                            <div class="col-md-10">
                                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                                    rows="5" placeholder="Optional"></textarea>
                                                                <div class="text-danger">
                                                                    @error('description')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Division: </label>
                                                            <div class="col-md-10" style="position: relative">
                                                                <select id="division" class="form-select @error('division_id') is-invalid @enderror" name="division_id">
                                                                    <option selected value="">Select</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{$division->id}}"> {{$division->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('division_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Select District : </label>
                                                            <div class="col-md-10" style="position: relative">
                                                                <select disabled id="district" class="form-select @error('district_id') is-invalid @enderror" name="district_id">
                                                                    <option selected value="">Select</option>
                                                                </select>
                                                                <img id="district_loader" src="{{asset('loading.gif')}}" alt="" style="width:20px; position:absolute; top:10px;left:30px">
                                                                <div class="text-danger">
                                                                    @error('district_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="upazila">Select Upazila : </label>
                                                            <div class="col-md-10" style="position: relative">
                                                                <select disabled id="upazila" class="form-select @error('upazila_id') is-invalid @enderror" name="upazila_id">
                                                                    <option selected value=""></option>
                                                                </select>
                                                                <img id="upazila_loader" src="{{asset('loading.gif')}}" alt="" style="width:20px; position:absolute; top:10px;left:30px">
                                                                <div class="text-danger">
                                                                    @error('upazila_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                        {{-- <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="tradeLicence">Trade Licence No: </label>
                                                            <div class="col-md-10">
                                                                <input name="trade_license" type="text" id="tradeLicence" class="form-control @error('trade_license') is-invalid @enderror " placeholder="Optional">
                                                                <div class="text-danger">
                                                                    @error('trade_license')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> --}}




                                                        {{-- <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Shop Image:</label>
                                                            <div class="col-md-10">
                                                                <input name="image" type="file" id="simpleinput" class="form-control @error('image') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('image')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div> --}}

                                                        <button type="submit" class="btn btn-primary"> <i class="mdi mdi-content-save me-1"></i> Create Shop</button>

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
    <script>
        $(function(){
            var division = $('select[name=division_id]');
            var district = $('select[name=district_id]');
            var upazila = $('select[name=upazila_id]');
            var district_loader = $('#district_loader');
            var upazila_loader = $('#upazila_loader');

            district_loader.hide();
            upazila_loader.hide();

            // For District
            division.change(function(){
                district.removeAttr('disabled');
                district_loader.show();
                var divisionID = $(this).val();
                if(divisionID){
                    $.get(`{{url('/getdistrict/${divisionID}')}}`, function(data, status){
                        district.empty();
                        if(data){
                            district_loader.hide();
                            data.forEach(function(row){
                                district.append(`<option selected value="${row.id}">${row.name}</option>`);
                            });
                        }
                    });
                }

            });

            // For Upazilla
            district.change(function(){
                upazila.removeAttr('disabled');
                var districtID = $(this).val();
                if(districtID){
                    $.get(`{{url('/getupazila/${districtID}')}}`, function(data, status){
                        upazila.empty();
                        if(data){
                            upazila_loader.hide();
                            data.forEach(function(row){
                                upazila.append(`<option selected value="${row.id}">${row.name}</option>`);
                            });
                        }
                    });
                }
            });

        });
    </script>
@endpush
