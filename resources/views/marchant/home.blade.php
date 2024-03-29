@php
$userID = Auth::guard('marchant')->user()->id;
$totalordercount = App\Models\Merchant\OrderItem::where('merchant_id', $userID)->count();
$totalorderpending = App\Models\Merchant\OrderItem::where('merchant_id', $userID)->where('accept_status', 0)->count();
 $merchantId = Auth::guard('marchant')->user()->id;
 $totalamount =App\Models\Merchant\OrderItem::with('product', 'order')->where('merchant_id', $merchantId)->sum('price');

// dd($totalorderpending);
@endphp
@extends('marchant.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title">Merchant Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">HeshelGhor</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Merchant</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Total Product</h5>
                        <h3 class="my-2 py-1"><span data-plugin="counterup">{{$productcount}}</span></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-soft-primary rounded">
                            <i class="ri-stack-line font-20 text-primary"></i>
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
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">Total Order</h5>
                        <h3 class="my-2 py-1"><span data-plugin="counterup">{{$totalordercount}}</span></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><span class="mdi mdi-arrow-down-bold"></span> 3.27%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-soft-primary rounded">
                            <i class="ri-slideshow-2-line font-20 text-primary"></i>
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
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">Pending Order</h5>
                        <h3 class="my-2 py-1"><span data-plugin="counterup">{{$totalorderpending}}</span></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 8.58%</span>
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
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Booked Revenue">Total Sale</h5>
                        <h3 class="my-2 py-1">৳<span data-plugin="counterup"> {{ $totalamount }}</span></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 0%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-soft-primary rounded">
                            <i class="ri-money-dollar-box-line font-20 text-primary"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection
