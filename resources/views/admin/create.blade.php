@extends('admin.layouts.app')
@section('title', 'HeshelGhor | admin ')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <p class="header-title fs-4 text-uppercase" >Add New Admin</p>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('admin.index')}}" class="btn btn-success float-end" title="All Admin List">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
            <hr>
                <form  action="{{ route('admin.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                    <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="TYPE FULL NAME" required>
                        @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="TYPE EMAIL" required>
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control select2-multiple" name="roles[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">

                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="TYPE PASSWORD" required>
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="RETYPE PASSWORD" required>
                    </div>
                    <div class="col-md-12">
                        <button  class="btn btn-success" type="submit"><i class="fa fa-save"></i> SAVE</button>
                    </div>
                </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
@endsection

@push('css')
<link href="{{asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('backend') }}/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="{{asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<link href="{{asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{asset('backend') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="{{asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{asset('backend') }}/assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{asset('backend') }}/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script>
    <script src="{{asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{asset('backend') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Validation init js-->
    <script src="{{asset('backend') }}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>
@endpush
