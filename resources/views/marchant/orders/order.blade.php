@extends('marchant.layouts.app')
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Product List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-8">
                                    <form class="d-flex flex-wrap align-items-center">
                                        <div class="d-flex flex-wrap align-items-center mb-2">
                                            <label for="inputPassword2" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center mx-sm-3 mb-2">
                                            <label for="status-select" class="me-2">Status</label>
                                            <div>
                                                <select class="form-select " id="status-select">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Paid</option>
                                                    <option value="2">Awaiting Authorization</option>
                                                    <option value="3">Payment failed</option>
                                                    <option value="4">Cash On Delivery</option>
                                                    <option value="5">Fulfilled</option>
                                                    <option value="6">Unfulfilled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-end">
                                        <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                                        <button type="button" class="btn btn-light mb-2">Export</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck">
                                                    <label class="form-check-label" for="orderlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Order ID</th>
                                            <th>Billing Name</th>
                                            <th>Date</th>
                                            <th>Payment Status</th>
                                            <th>Total</th>
                                            <th>Payment Method</th>
                                            <th>Order Status</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck01">
                                                    <label class="form-check-label" for="orderlistCheck01">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2048</a> </td>
                                            <td>James Modlin</td>
                                            <td>
                                                Apr 16 2020 <small class="text-muted">10:29 PM</small>
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="badge badge-soft-success">Paid</span>
                                                </div>
                                            </td>
                                            <td>
                                                $152.23
                                            </td>
                                            <td>
                                                Mastercard
                                            </td>
                                            <td>
                                                <div><span class="badge bg-info">Shipped</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck02">
                                                    <label class="form-check-label" for="orderlistCheck02">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2047</a> </td>
                                            <td>Lessie Craig</td>
                                            <td>
                                                Apr 15 2020 <small class="text-muted">09:34 A</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-warning">Awaiting Authorization</span></div>
                                            </td>
                                            <td>
                                                $112.24
                                            </td>
                                            <td>
                                                Mastercard
                                            </td>
                                            <td>
                                                <div><span class="badge bg-warning">Processing</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck03">
                                                    <label class="form-check-label" for="orderlistCheck03">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2046</a> </td>
                                            <td>Tia McCord</td>
                                            <td>
                                                Apr 14 2020 <small class="text-muted">11:09 AM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-success">Paid</span></div>
                                            </td>
                                            <td>
                                                $106.01
                                            </td>
                                            <td>
                                                Visa
                                            </td>
                                            <td>
                                                <div><span class="badge bg-warning">Processing</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck04">
                                                    <label class="form-check-label" for="orderlistCheck04">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2045</a> </td>
                                            <td>Charles Wilson</td>
                                            <td>
                                                Mar 13 2020 <small class="text-muted">02:22 PM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-success">Paid</span></div>
                                            </td>
                                            <td>
                                                $123.36
                                            </td>
                                            <td>
                                                Credit Card
                                            </td>
                                            <td>
                                                <div><span class="badge bg-success">Delivered</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck05">
                                                    <label class="form-check-label" for="orderlistCheck05">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2044</a> </td>
                                            <td>Kathryn McCann</td>
                                            <td>
                                                Mar 12 2020 <small class="text-muted">03:04 PM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-danger">Payment Failed</span></div>
                                            </td>
                                            <td>
                                                $176.41
                                            </td>
                                            <td>
                                                Mastercard
                                            </td>
                                            <td>
                                                <div><span class="badge bg-danger">Cancelled</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck06">
                                                    <label class="form-check-label" for="orderlistCheck06">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2043</a> </td>
                                            <td>William Eckert</td>
                                            <td>
                                                Mar 11 2020 <small class="text-muted">10:29 PM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-success">Paid</span></div>
                                            </td>
                                            <td>
                                                $145.56
                                            </td>
                                            <td>
                                                Mastercard
                                            </td>
                                            <td>
                                                <div><span class="badge bg-info">Shipped</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck07">
                                                    <label class="form-check-label" for="orderlistCheck07">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2042</a> </td>
                                            <td>Julius West</td>
                                            <td>
                                                Mar 10 2020 <small class="text-muted">09:14 AM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-warning">Awaiting Authorization</span></div>
                                            </td>
                                            <td>
                                                $113.25
                                            </td>
                                            <td>
                                                Visa
                                            </td>
                                            <td>
                                                <div><span class="badge bg-success">Delivered</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck08">
                                                    <label class="form-check-label" for="orderlistCheck08">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2041</a> </td>
                                            <td>Janice Louie</td>
                                            <td>
                                                Feb 09 2020 <small class="text-muted">01:25 PM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-success">Paid</span></div>
                                            </td>
                                            <td>
                                                $132.14
                                            </td>
                                            <td>
                                                Paypal
                                            </td>
                                            <td>
                                                <div><span class="badge bg-info">Shipped</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck09">
                                                    <label class="form-check-label" for="orderlistCheck09">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2040</a> </td>
                                            <td>Marie Harris</td>
                                            <td>
                                                Feb 08 2020 <small class="text-muted">04:24 PM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-success">Paid</span></div>
                                            </td>
                                            <td>
                                                $175.25
                                            </td>
                                            <td>
                                                Credit Card
                                            </td>
                                            <td>
                                                <div><span class="badge bg-warning">Processing</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck10">
                                                    <label class="form-check-label" for="orderlistCheck10">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="ecommerce-orders-detail.html" class="text-body fw-medium">#MN2039</a> </td>
                                            <td>Robin Hill</td>
                                            <td>
                                                Jan 07 2020 <small class="text-muted">02:24 PM</small>
                                            </td>
                                            <td>
                                                <div><span class="badge badge-soft-danger">Payment Failed</span></div>
                                            </td>
                                            <td>
                                                $158.48
                                            </td>
                                            <td>
                                                Mastercard
                                            </td>
                                            <td>
                                                <div><span class="badge bg-info">Shipped</span></div>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div>
                                        <h5 class="font-14 text-body">Showing orders 1 to 10 of 112</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-sm-end">
                                        <ul class="pagination pagination-rounded mb-sm-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection

@push('css')
<!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<!-- third party js -->
<script src="{{ asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->
<script src="{{ asset('backend')}}/assets/js/pages/product-list.init.js"></script>

@endpush
