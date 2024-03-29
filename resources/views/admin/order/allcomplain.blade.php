@extends('admin.layouts.app')
@section('content')
<div class="content">
    <!-- Start Content-->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box page-title-box-alt">
                <h4 class="page-title">Complain List</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                        <li class="breadcrumb-item active">Complain List</li>
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
                                    <th>SL</th>
                                    <th>orderitem_id</th>
                                    <th>user_id</th>
                                    <th>Complain_number</th>
                                    <th>delivery_date</th>
                                    <th>alt_customer_phone</th>
                                    <th>alt_customer_address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach( $allcomplain as $complain )
                                    <tr>
                                        <th scope="row">{{ $serial++ }}</th>
                                        <td>{{$complain->orderitem_id}}</td>
                                        <td>{{$complain->user_id}}</td>
                                        <td>{{$complain->complain_number}}</td>
                                        <td>{{$complain->delivery_date}}</td>
                                        <td>{{$complain->alt_customer_phone}}</td>
                                        <td>{{$complain->alt_customer_address}}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm text-white"
                                                href="{{ route('admin.show.complain',$complain->id) }}" title="View"><span
                                                    class="mdi mdi mdi-eye d-flex align-items-center" >View</span></a>
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
