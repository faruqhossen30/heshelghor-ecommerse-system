@extends('marchant.layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Create Withdrawals</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Withdrawals</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                             @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <strong>Success !</strong> {{ session('error') }}
                                </div>
                            @endif
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('Withdrawal.index') }}" class="btn btn-success mb-2"><i
                                            class="mdi mdi-format-list-bulleted me-1"></i> All Withdrawals</a>
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
                                                        <form method="POST" action="{{ route('Withdrawal.store') }}"
                                                            enctype="multipart/form-data" class="form-horizontal"
                                                            role="form">
                                                            @csrf

                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Amount ($)*</label>
                                                                <div class="col-md-10">
                                                                    <input name="amount" type="number" id="simpleinput"
                                                                        class="form-control @error('amount') is-invalid @enderror "
                                                                        placeholder="Amount you want withdrawals">
                                                                    <div class="text-danger">
                                                                        @error('amount')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">

                                                                      <label class="col-md-2 col-form-label"  for="simpleinput">Payment Method</label>
                                                                    <div class=" col-md-10">
                                                                        <select
                                                                            class="form-control @error('payment_id') is-invalid @enderror"
                                                                            id="exampleSelectRounded0" name="payment_id">
                                                                            <option selected value="">Select Category
                                                                            </option>
                                                                            <option value="Bkash">Bkash</option>
                                                                            <option value="Rocket">Rocket</option>
                                                                            <option value="M-cash">M-cash</option>
                                                                            <option value="U-cash">U-cash</option>
                                                                            <option value="Nogad">Nogad</option>
                                                                            <option value="bank">bank</option>

                                                                        </select>
                                                                        <div class="text-danger">
                                                                            @error('payment_id')
                                                                                <span>{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                            </div>



                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="example-textarea">Description:<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-md-10">
                                                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                                        rows="5" placeholder="withdrawls description..."> {{ old('description') }} </textarea>
                                                                    <div class="text-danger">
                                                                        @error('description')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Save</button>

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
    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
    <!-- third party js ends -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>
@endpush
