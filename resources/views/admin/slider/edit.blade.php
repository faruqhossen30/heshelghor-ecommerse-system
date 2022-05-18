@extends('admin.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Edit Slider</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Slider List</li>
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
                                        class="mdi mdi-format-list-bulleted me-1"></i> All Slider</a>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h4 class="header-title">Create Category </h4> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-2">
                                                    <form method="POST" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        @csrf

                                                        @method('PUT')
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">link<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input name="link" value="{{$slider->link}}" type="text" id="simpleinput" class="form-control @error('link') is-invalid @enderror " placeholder="link">
                                                                <div class="text-danger">
                                                                    @error('link')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput"> Image</label>
                                                            <div class="col-md-10">
                                                                <small class="form-text">Image size mus be (280 X 280)px or (560 X 560)px</small>
                                                                <input name="image" type="file" id="simpleinput" class="form-control @error('image') is-invalid @enderror"
                                                                    value="{{$slider->image}}">
                                                                    <img src="{{ asset('storage/slider/' . $slider->image) }}" width="50px" title="contact-img" class="rounded me-3"height="50px" alt="{{ $slider->image }}">
                                                                    <div class="text-danger">
                                                                        @error('image')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-success">Update Slider</button>

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

