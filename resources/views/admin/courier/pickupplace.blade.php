@extends('admin.layouts.app')
@section('title')
    HeshelGhor | Courier Service
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Update Courier Service</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Courier Service List</li>
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
                                            class="mdi mdi-format-list-bulleted me-1"></i>Courier Service List</a>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S.N</th>
                                                        <th>Title</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Name: </td>
                                                        <td><strong>{{$courier->name}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Description: </td>
                                                        <td>{{$courier->description}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Create at: </td>
                                                        <td>{{$courier->created_at}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Status</td>
                                                        <td>
                                                            <span class="badge badge-soft-success">
                                                                {{$courier->status ? 'Active' : ''}}</td>
                                                            </span>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('courier.updatepickplace', $courier->id) }}" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- end row -->
                                <button type="submit" class="btn btn-success my-2">Update Courier Service Pick Up Place/Location List</button>
                                <table id="basic-datatable"
                                    class="table table-responsive dt-responsive w-100 table-bordered border-dark">
                                    @foreach ($divisions as $division)
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">
                                                    <strong>{{ $division->name }}</strong>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($division->districts) > 0)
                                            @php
                                                $serial = 1;
                                            @endphp
                                                @foreach ($division->districts as $district)
                                                    <tr>
                                                        <td style="width: 10%">{{$serial++}}</td>
                                                        <td style="width: 20%" class="text-dark">
                                                            {{-- <div class="form-check form-switch">
                                                                <input value="1" class="form-check-input" type="checkbox"
                                                                    id="checkPermissionAll">
                                                                <label class="form-check-label text-dark"
                                                                    for="checkPermissionAll">{{ $district->name }}</label>
                                                            </div> --}}
                                                            <strong>{{ $district->name }}</strong>
                                                        </td>
                                                        <td style="width: 70%">
                                                            @php
                                                                $upazilas = App\Models\Admin\Location\Upazila::where('district_id', $district->id)->get();
                                                            @endphp
                                                            <div class="row">
                                                                @foreach ($upazilas as $upazila)
                                                                    <div class="col-sm-6 col-md-4">
                                                                        <div class="form-check form-switch">
                                                                            <input value="{{ $upazila->id }}"
                                                                                name="upazilas[]" class="form-check-input"
                                                                                type="checkbox"
                                                                                id="checkUpazila{{ $upazila->id }}"
                                                                                data-info="{{ $upazila->name }}"
                                                                                @if (in_array($upazila->id, $deliveryplace)) checked @endif
                                                                                >
                                                                            <label class="form-check-label text-dark"
                                                                                for="checkUpazila{{ $upazila->id }}">{{ $upazila->name }}</label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    @endforeach
                                </table>
                                <!-- end row -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('css')
@endpush

@push('scripts')

@endpush
