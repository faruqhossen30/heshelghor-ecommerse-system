@extends('user.layouts.app')
@section('content')
<div class="content">
    <!-- Start Content-->

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
    <!-- end page title -->

    <!-- Start Content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom bg-transparent d-flex justify-content-between">
                    <h5 class="header-title mb-0">Invoice: {{$order->invoice_number}}</h5>
                    {{-- {{$order->created_at}} --}}
                    {{-- @if (Carbon\Carbon::parse($order->created_at)->addMinutes(30)->greaterThan(Carbon\Carbon::now()))
                    somoy ase
                    @endif
                    @if (!Carbon\Carbon::parse($order->created_at)->addMinutes(30)->greaterThan(Carbon\Carbon::now()))
                    nah somoy nai
                    @endif --}}
                    <div class="">

                        @if (Carbon\Carbon::parse($order->created_at)->addMinutes(30)->greaterThan(Carbon\Carbon::now()))
                        <div class="countdown" data-expire="{{ Carbon\Carbon::parse($order->created_at)->addMinutes(30)->format('Y/m/d H:i:s') }}">

                            <span id="clock" class="text-danger" style="font-size: 35px"></span>
                        </div>
                        <h5 class="mt-0">
                            <a href="{{route('user.order.cancel', $order->id)}}" type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you want to complain about this order ?');">
                                <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>
                                Cancel Order
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="d-flex mb-2">
                                    <div class="me-2 align-self-center">
                                        <i class="ri-hashtag h2 m-0 text-muted"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="mb-1">Invoice No</p>
                                        <h5 class="mt-0">
                                            {{$order->invoice_number}}
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
                                            {{$order->name}}
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
                    </div>

                    <div class="mt-2">
                        <h4 class="header-title mb-3">Product List:</h4>
                        <div class="row">
                            <div class="col-lg-8">
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-centered border table-nowrap mb-lg-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Q.T</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Trace</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderitems as $item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-3">
                                                                <img src="{{$item->product->img_small}}" alt="product_imgsmall" height="40">
                                                            </div>
                                                            <div class="flex-1">
                                                                <h5 class="m-0">{{$item->product->title}}</h5>
                                                                <p class="mb-0">#{{$item->order_number}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>৳{{$item->price}}</td>
                                                    <td>৳{{$item->quantity * $item->price}}</td>
                                                    <td>
                                                        @if ($item->accept_status == 0 && $item->cancel_status == 0)
                                                        <span class="badge bg-danger">Pending</span>
                                    </div>
                                    @endif
                                    @if ($item->accept_status == 1)
                                    <span class="badge bg-success">Accepted !</span>
                                </div>
                                @endif
                                @if($item->cancel_status == 1 && $item->accept_status == 0)
                                <span class="badge badge-soft-danger">Canceled !</span>
                            </div>
                            @endif
                            </td>
                            <td>
                                @if ($item->cancel_status == 0)
                                <a href="{{route('user.order.track', $item->id)}}" class="badge badge-soft-danger">Trace Order </a>
                                @endif
                                @if ($item->cancel_status == 1)
                                <span class="badge badge-soft-danger">Not Available</span>
                        </div>
                        @endif
                        </td>
                        </tr>
                        @endforeach


                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div>

                    <div class="table-responsive">
                        <table class="table table-centered border mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th colspan="2">Order summary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Products price :</th>
                                    <td>৳{{$order->total_product_price}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Shipping Charge :</th>
                                    <td>৳{{$order->total_delivery_cost}}</td>
                                </tr>
                                {{-- <tr>
                                                        <th scope="row">Estimated Tax :</th>
                                                        <td>$12</td>
                                                    </tr> --}}
                                <tr>
                                    <th scope="row">Total :</th>
                                    <td>৳{{$order->amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer my-2">
           <strong>Customer Support: PHONE: +88 02477763843, MOBILE: +8801318-760087</strong>
        </div>
    </div>

</div>
</div>
<!-- end card -->

<div class="row mb-3">
    <div class="col-lg-4">
        <div>
            <h4 class="font-15 mb-2">Delivery Information</h4>


            <div class="card p-2 mb-lg-0">
                <div class="my-2">
                    <i class="mdi mdi-truck-fast h1 text-muted"></i>
                </div>

                <table class="table table-borderless table-sm mb-0">

                    <tbody>
                        <tr>
                            <th scope="row">Name :</th>
                            <td>{{$order->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile :</th>
                            <td>{{$order->phone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
</div>

</div> <!-- content -->
@endsection

@push('css')
<!-- third party css -->

@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var expiretime = $('.countdown').data('expire');
        // $('#clock').countdown('2022/06/19 24:00:00')
        if (expiretime) {
            $('#clock').countdown(expiretime)
                .on('update.countdown', function(event) {
                    var format = '%H:%M:%S';
                    if (event.offset.totalDays > 0) {
                        format = '%-d day%!d ' + format;
                    }
                    if (event.offset.weeks > 0) {
                        format = '%-w week%!w ' + format;
                    }
                    $(this).html(event.strftime(format));
                })
            // .on('finish.countdown', function(event) {
            //     $(this).html('This offer has expired!')
            //         .parent().addClass('disabled');

            // });
        }
    });

</script>




@endpush
