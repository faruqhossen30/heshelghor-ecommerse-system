@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Roles ')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box page-title-box-alt">
                <h4 class="page-title">All Orders</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Heshel Ghor</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">All Orders</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-responsive dt-responsive w-100 table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Code:</th>
                                    <th>Num. of Products</th>
                                    <th>Customer</th>
                                    <th>Seller</th>
                                    <th>Amount</th>
                                    <th>Delivery Status</th>
                                    <th>Payment method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->merchant->name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->product->status }}</td>
                                        <td>{{ $order->order->payment_type }}</td>
                                        <td>
                                            <a href="{{ route('sales.product.show', $order->id) }}" title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('invoice.pdf',['type'=>'stream']) }}" target="_blank"><i class="fa fa-download" title="Invoice"></i></a>
                                            <a href="{{ route('sales.product.destroy', $order->id) }}"
                                                onclick="return confirm('Are You Sure To Delete?')" title="Remove"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>

    <!-- third party js 2 -->
    <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>


    <!-- Added by minhaz -->
    <!-- sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (Session::has('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sales Product has been deleted Successfully!',
            })
        </script>
    @endif

@endpush
