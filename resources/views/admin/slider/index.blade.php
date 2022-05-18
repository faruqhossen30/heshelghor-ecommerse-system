@php
    $admin = Auth::guard('admin')->user();
@endphp
@extends('admin.layouts.app')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Category List</h4>
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

                <!-- sweetalert -->
                {{-- <h6 class="alert alert-success ">{{ session('status') }}</h6> --}}
                    {{-- @if (Session('status'))
                        <button type="button" class="btn btn-info btn-xs" id="sa-basic">{{ session('status') }}</button>
                    @endif --}}

                    <div class="card-body">
                        <div class="row mb-2">

                            <div class="col-sm-6">
                                <a href="{{route('slider.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add Slider</a>
                            </div>


                            <div class="col-sm-6">
                                <div class="float-sm-end">
                                    <button type="button" class="btn btn-success mb-2 mb-sm-0"><i class="mdi mdi-cog"></i></button>
                                </div>
                            </div><!-- end col-->

                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="basic-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all" style="width: 20px;">
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck">
                                                <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="all">SN</th>

                                        <th>Photo</th>
                                        <th>Link</th>

                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck1">
                                                <label class="form-check-label" for="productlistCheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            {{$serial++}}
                                        </td>

                                        <td>
                                            <img src="{{ asset('storage/slider/' . $slider->image) }}" width="50px" title="contact-img" class="rounded me-3"height="50px" alt="{{ $slider->image }}">
                                        </td>

                                        <td>
                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$slider->link}}</a></h5>
                                        </td>


                                        <td>
                                            <ul class="list-inline table-action m-0">


                                                <li class="list-inline-item">
                                                    <a href="{{route('slider.edit',$slider->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>


                                                <li class="list-inline-item">
                                                    {{-- <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a> --}}
                                                    <form action="{{route('slider.destroy',$slider->id)}}" method="post" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none; background:none; color:gray; font-size:17px" type="submit" onclick="return confirm('Sure ? Want to delete Sub-catetyro ?');" ><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->
@endsection

