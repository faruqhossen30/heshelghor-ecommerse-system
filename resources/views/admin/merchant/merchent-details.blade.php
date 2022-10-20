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
                        <h4 class="page-title">Merchant Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Merchant List</li>
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
                            <div class="d-flex align-items-start">
                                <div class="me-3">

                                    @if ($merchantdetails->photo = 0)
                                        <img src="{{ asset($merchantdetails->photo) }}" alt="user-image"
                                            class="rounded avatar-md">
                                    @else
                                        <img src="{{ asset('frontend/images/man.png') }}" alt="user-image"
                                            class="rounded avatar-md">
                                    @endif

                                </div>
                                <div class="flex-1">
                                    <h5 class="my-1"><a href="javascript:void(0);"
                                            class="text-dark">{{ $merchantdetails[0]->merchant->name ?? '' }}</a></h5>
                                    <p class="text-muted mb-0">
                                        <i class="mdi mdi-account me-1"></i>
                                        {{ $merchantdetails[0]->merchant->email ?? '' }}
                                    </p>

                                </div>
                                <div class="dropdown">
                                    <a class="text-body dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical font-20"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-muted">
                                <div class="row">
                                    <div class="col-sm-4 col-6">
                                        <div>
                                            <p class="mb-0">Name</p>
                                            <h5 class="mb-sm-0">{{ $merchantdetails[0]->merchant->name ?? '' }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div>
                                            <p class="mb-0">Email</p>
                                            <h5 class="mb-sm-0">{{ $merchantdetails[0]->merchant->email ?? '' }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="mt-3 mt-sm-0">
                                            <p class="mb-0">Phone</p>
                                            <h5 class="mb-0">{{ $merchantdetails[0]->merchant->phone_number ?? '' }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6 mt-3">
                                        <div>
                                            <p class="mb-0">Nid</p>
                                            <h5 class="mb-sm-0">{{ $merchantdetails[0]->merchant->nid_no ?? 'No id' }}</h5>

                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6 mt-3">
                                        <div>
                                            <p class="mb-0">Address</p>
                                            <h5 class="mb-sm-0">{{ $merchantdetails[0]->merchant->address ?? 'No id' }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6 mt-3">
                                        <div class="mt-3 mt-sm-0">
                                            <p class="mb-0">tin_no</p>
                                           <h5 class="mb-sm-0">{{ $merchantdetails[0]->merchant->tin_no ?? 'No id' }}</h5>
                                        </div>
                                    </div>

                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Shop Name</th>
                                                <th style="width: 70%;">Description</th>
                                                <th style="width: 5%;">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $serial = 1;
                                            @endphp

                                            @foreach ($merchantdetails as $shop)
                                                <tr>
                                                    <th scope="row">{{ $serial++ }}</th>
                                                    <td>{{ $shop->name }}</td>
                                                    <td>{{ $shop->description }}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm text-white" href="{{ route('merchant.shop.details' ,$shop->id) }}"
                                                            title="Edit"><span class="mdi mdi mdi-eye"></span></a>
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

            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection
