@extends('admin.layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title">Order Detail</h4>
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
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="d-flex mb-2">
            <div class="me-2 align-self-center">
                <i class="ri-hashtag h2 m-0 text-muted"></i>
            </div>
            <div class="flex-1">
                <p class="mb-1">Invoice No</p>
                <h5 class="mt-0">
                    {{ $order->invoice_number }}
                </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="d-flex mb-2">
            <div class="me-2 align-self-center">
                <i class="ri-user-2-line h2 m-0 text-muted"></i>
            </div>
            <div class="flex-1">
                <p class="mb-1">Billing Name</p>
                <h5 class="mt-0">
                    {{ $order->name }}
                </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="d-flex mb-2">
            <div class="me-2 align-self-center">
                <i class="ri-calendar-event-line h2 m-0 text-muted"></i>
            </div>
            <div class="flex-1">
                <p class="mb-1">Order Date</p>
                <h5 class="mt-0">
                    {{ Carbon\Carbon::parse($order->created_at)->format('d F') }}
                    <small class="text-muted">{{ Carbon\Carbon::parse($order->created_at)->format('h:m A') }}</small>
                </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="d-flex mb-2">
            <div class="me-2 align-self-center">
                <i class="ri-money-dollar-box-line h2 m-0 text-muted"></i>
            </div>
            <div class="flex-1">
                <p class="mb-1">Payment Type</p>
                <h5 class="mt-0">
                    @if ($order->payment_type == 'cash')
                    Cash On Delivery
                    @endif
                    @if ($order->payment_type == 'online')
                    <span class="badge badge-soft-success">Paid !</span>
                    @endif
                </h5>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title">Complain Detail</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th><strong>Title</strong></th>
                            <th><strong>Details</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:20%"><strong>Order Item</strong></td>
                            <td style="width:80%">{{ $complain->orderitem_id }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>User ID</strong></td>
                            <td style="width:80%">{{ $complain->user_id }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>Order Complain</strong></td>
                            <td style="width:80%">{{ $complain->complain_number }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>Delivery Date</strong></td>
                            <td style="width:80%">{{ $complain->delivery_date->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>Another Number</strong></td>
                            <td style="width:80%">{{ $complain->alt_customer_phone }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>Customer Complain</strong></td>
                            <td style="width:80%">{{ $complain->alt_customer_address }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>Customer Complain</strong></td>
                            <td style="width:80%">{{ $complain->complain_message }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%"><strong>Picture</strong></td>
                            <td style="width:80%">
                                <img src="{{ asset('storage/images/defectphoto/1/' . $complain->defect_pic_1) }}" alt="" style="width: 100px; height:100px">
                                <img src="{{ asset('storage/images/defectphoto/2/' . $complain->defect_pic_2) }}" alt="" style="width: 100px; height:100px">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <button type="btn" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#complainModal">Next</button>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- Modal -->
<div class="modal fade" id="complainModal" tabindex="-1" aria-labelledby="complainModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="complainModalLabel">Customer Complain </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.complain') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="customer_complain" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Approve</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="customer_complain" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Reject</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="complain_desc" class="form-control" placeholder="Feedback"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
