@extends('admin.layouts.app')
@section('title')
    HeshelGhor | Delivery System
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Create Delivery System</h4>
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
                                    <a href="{{ route('courier.index') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-format-list-bulleted me-1"></i>Delivery System List</a>
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
                                                        <form method="POST"
                                                            action="{{ route('courier.update', $courier->id) }}"
                                                            class="form-horizontal" role="form">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Name <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input name="name" value="{{ $courier->name }}"
                                                                        type="text" id="simpleinput"
                                                                        class="form-control @error('name') is-invalid @enderror "
                                                                        placeholder="Name">
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
                                                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                                        rows="5"
                                                                        placeholder="Brand description..."> {{ $courier->description }} </textarea>
                                                                    <div class="text-danger">
                                                                        @error('description')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Rate<span
                                                                        class="text-danger">*</span></label>

                                                                <div class="col-md-10">

                                                                    <input name="price" type="number" id="simpleinput"
                                                                        class="form-control @error('price') is-invalid @enderror"
                                                                        value="{{ $courier->price }}">
                                                                    <div class="text-danger">
                                                                        @error('price')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-success">Update
                                                                System</button>

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
@endpush

@push('scripts')
@endpush
