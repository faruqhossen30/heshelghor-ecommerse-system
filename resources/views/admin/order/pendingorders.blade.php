@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Pending Order List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Order List</li>
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
                        <div class="table-responsive">
                            <table class="table table-bordered mb-2" id="example">
                                <thead class="table-light">
                                    <tr>
                                        <th>S</th>
                                        <th>Order No</th>
                                        <th>Product</th>
                                        <th>Shop Name</th>
                                        <th>Address</th>
                                        <th>Q.T</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <th scope="row">{{ $serial++ }}</th>
                                            <td>#{{ $item->order_number }}
                                                @if ($item->accept_status == 0 && $item->cancel_status == 0)
                                                    <i class="mdi mdi-alert text-warning"></i>
                                                @endif
                                                @if($item->accept_status == 1 && $item->cancel_status == 0)
                                                    <i class="mdi mdi-check-circle text-success"></i>
                                                @endif
                                                @if($item->accept_status == 0 && $item->cancel_status == 1)
                                                    <i class="mdi mdi-close-circle text-danger"></i>
                                                @endif
                                            </td>
                                            <td>{{ $item->product->title }}</td>
                                            <td>{{ $item->shop->name }}</td>
                                            <td>{{ $item->shop->address }}</td>
                                            {{-- <td>58, Borhansha road , Karbal Jessore sadar, Jessore</td> --}}
                                            <td>{{ $item->quantity }}</td>
                                            <td>৳{{ $item->price * $item->quantity }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm text-white"
                                                    href="{{ route('admin.order.single', $item->id) }}" title="View"><span
                                                        class="mdi mdi mdi-eye"> View</span></a>
                                                {{-- <a class="btn btn-primary btn-sm text-white" href="" title="Edit"><span
                                                        class="mdi mdi-square-edit-outline"></span></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- {{ $orderItems->links() }} --}}
                        </div> <!-- end .table-responsive-->
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->

        </div>
        <!-- end row -->
    </div> <!-- content -->
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pageLength": 25,
                "select": true
            });
        });
    </script>
@endpush
