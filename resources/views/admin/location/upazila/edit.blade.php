@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Edit Upazila</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Upazila List</li>
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
                                <a href="{{route('upazila.index')}}" class="btn btn-success mb-2"><i
                                        class="mdi mdi-format-list-bulleted me-1"></i> All Upazila</a>
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
                                                    <form method="POST" action="{{route('upazila.update', $upazila->id)}}" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Select Division : </label>
                                                            <div class="col-md-10">
                                                                <select class="form-select @error('division_id') is-invalid @enderror" name="division_id">
                                                                    <option selected id="divission">Select Divission</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{$division->id}}">{{$division->name}}</option>
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
                                                                <select id="district" class="form-select @error('district_id') is-invalid @enderror" name="district_id">
                                                                    <option selected value=""></option>
                                                                </select>
                                                                <img id="loader" src="{{asset('loading.gif')}}" alt="" style="width:20px; position:absolute; top:10px;left:30px">
                                                                <div class="text-danger">
                                                                    @error('district_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Upazila Name</label>
                                                            <div class="col-md-10">
                                                                <input name="name" value="{{$upazila->name}}" type="text" id="simpleinput" class="form-control @error('name') is-invalid @enderror " placeholder="Name">
                                                                <div class="text-danger">
                                                                    @error('name')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-success">Update Upazila</button>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div> <!-- end card -->



                                <div class="card-body" id="myroot">
                                    <h3 id="heading"></h3>
                                </div>





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
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
        <script>
            $(function(){

                var division = $('select[name="division_id"]');
                var district = $('select[name="district_id"]');
                var loader = $('#loader');
                loader.hide();

                district.attr('disabled', 'disabled');

                division.change(function(){
                    district.removeAttr('disabled');

                    var id = $(this).val();
                    if(id){
                        loader.show();
                        $.get(`{{ url('admin/districts?division_id=') }}${id}`, function(data, status){
                            if(data){
                                loader.hide();
                                district.empty();
                                data.forEach(function(row){
                                    district.append(`<option value="${row.id}">${row.name}</option>`);
                                });
                            }
                        });
                    }
                });


            });


        </script>
@endpush
