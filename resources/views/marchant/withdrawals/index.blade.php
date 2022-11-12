@extends('marchant.layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Withdrawrals List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Withdrawrals List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                       
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <strong>Success !</strong> {{ session('success') }}
                                </div>
                            @endif

                        {{-- <div class="card-header">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <strong>Success !</strong> {{ session('success') }}
                                </div>
                            @endif
                        </div> --}}
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('Withdrawal.create') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-plus-circle me-1"></i> Add Withdrawrals</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-sm-end">
                                        <button type="button" class="btn btn-success mb-2 mb-sm-0"><i
                                                class="mdi mdi-cog"></i></button>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            <!-- end row -->
                            <div class="row">

                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">
                                                        Total Balance</h5>
                                                    <h3 class="my-2 py-1">৳<span data-plugin="counterup">
                                                            {{ $totalwidrawals }}</span></h3>
                                                    <p class="mb-0 text-muted">
                                                        <span class="text-success me-2"><span
                                                                class="mdi mdi-arrow-up-bold"></span> 8.58%</span>
                                                        <span class="text-nowrap">Since last month</span>
                                                    </p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="ri-hand-heart-line font-20 text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">
                                                        Available
                                                        Balance</h5>
                                                    <h3 class="my-2 py-1">৳<span
                                                            data-plugin="counterup">{{ $accountbalance }}</span></h3>
                                                    <p class="mb-0 text-muted">
                                                        <span class="text-success me-2"><span
                                                                class="mdi mdi-arrow-up-bold"></span> 8.58%</span>
                                                        <span class="text-nowrap">Since last month</span>
                                                    </p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="ri-hand-heart-line font-20 text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">
                                                        Pending
                                                        Withdrawrals</h5>
                                                    <h3 class="my-2 py-1"><span
                                                            data-plugin="counterup">{{ $prendingcount }}</span></h3>
                                                    <p class="mb-0 text-muted">
                                                        <span class="text-success me-2"><span
                                                                class="mdi mdi-arrow-up-bold"></span> 8.58%</span>
                                                        <span class="text-nowrap">Since last month</span>
                                                    </p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="ri-hand-heart-line font-20 text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">
                                                        Complete
                                                        Withdrawrals</h5>
                                                    <h3 class="my-2 py-1"><span
                                                            data-plugin="counterup">{{ $countcompletewithdrawal }}</span>
                                                    </h3>
                                                    <p class="mb-0 text-muted">
                                                        <span class="text-success me-2"><span
                                                                class="mdi mdi-arrow-up-bold"></span> 8.58%</span>
                                                        <span class="text-nowrap">Since last month</span>
                                                    </p>
                                                </div>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="ri-hand-heart-line font-20 text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check mb-0 font-16">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="productlistCheck">
                                                    <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>sl</th>
                                            <th class="all">Amount ($)</th>

                                            <th>Date</th>
                                            <th>Descriptions</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($withdrawls as $withdrawal)
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-0 font-16">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="productlistCheck1">
                                                        <label class="form-check-label"
                                                            for="productlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <th>{{ $serial++ }}</th>

                                                <td>{{ $withdrawal->amount }}</td>
                                                <td>
                                                    <h5 class="mt-0">
                                                        {{ Carbon\Carbon::parse($withdrawal->created_at)->format('d M') }}
                                                        <small class="text-muted">
                                                            {{ Carbon\Carbon::parse($withdrawal->created_at)->format('h:m A') }}
                                                        </small>
                                                    </h5>
                                                </td>
                                                <td>{{ $withdrawal->description }}</td>
                                                <td>{{ $withdrawal->payment_id }}</td>
                                                <td>

                                                    @if ($withdrawal->status == 1)
                                                        <span class="badge badge-soft-success">Complete </span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Pending </span>
                                                    @endif

                                                </td>

                                                <td>
                                                    <a href="#" class="btn btn-danger btn-sm">View</a>

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

@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
    <!-- third party js ends -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>

    <!-- sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('create'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'SubCategory has been created Successfully!'
            })
        </script>
    @endif

    @if (Session::has('update'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'SubCategory has been updated Successfully!'
            })
        </script>
    @endif

    @if (Session::has('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'SubCategory has been deleted Successfully!',
            })
        </script>
    @endif

@endpush
