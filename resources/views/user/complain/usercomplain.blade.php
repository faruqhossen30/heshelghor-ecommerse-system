@extends('user.layouts.app')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">User Complain Information</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Complain</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom bg-transparent">
                            <h5 class="header-title mb-0">Invoice: {{$orderitem->order->invoice_number}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="d-flex mb-2">
                                        <div class="me-2 align-self-center">
                                            <i class="ri-hashtag h2 m-0 text-muted"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="mb-1">Order No</p>
                                            <h5 class="mt-0">
                                                #{{$orderitem->order_number}}
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
                                                {{$orderitem->order->name}}
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
                                                <p class="mb-0">{{ Carbon\Carbon::parse($orderitem->created_at)->format('d F Y') }}</p>
                                                <small class="">{{ Carbon\Carbon::parse($orderitem->created_at)->format('h:m A') }}</small>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-sm-6">
                                    <div class="d-flex mb-2">
                                        <div class="me-2 align-self-center">
                                            <i class="ri-map-pin-time-line h2 m-0 text-muted"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="mb-1">Tracking ID</p>
                                            <h5 class="mt-0">
                                                123456789
                                            </h5>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <table class="table table-bordered" width="100%">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            {{ $orderitem->order->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <strong>{{ $orderitem->order->email }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>
                                            {{ $orderitem->order->phone }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            {{ $orderitem->order->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product name</th>
                                        <td>
                                            <strong>{{ $orderitem->product->title }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Complain Number</th>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Numbe</th>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{route('user.order.complain', $orderitem->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="complain-name" class="form-label text-dark">Delivery Date<span
                                                    class="text-danger">*</span></label>
                                            <input required type="date" name="delivery_date" id="complain-name"
                                                class="form-control @error('delivery_date') is-invalid @enderror"
                                                placeholder="Enter complain number" value="{{ old('delivery_date') }}">
                                            <div class="text-danger">
                                                @error('delivery_date')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="complain-name" class="form-label text-dark">Delivery Time<span
                                                    class="text-danger">*</span></label>
                                            <input required type="time" name="delivery_time" id="complain-name"
                                                class="form-control @error('delivery_time') is-invalid @enderror"
                                                placeholder="Enter complain number" value="{{ old('delivery_time') }}">
                                            <div class="text-danger">
                                                @error('delivery_time')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="alt_customer_phone"
                                                class="form-label text-dark">Alternative Mobile<span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" name="alt_customer_phone" id="alt_customer_phone"
                                                class="form-control @error('alt_customer_phone') is-invalid @enderror"
                                                placeholder="Enter complain number"
                                                value="{{ old('alt_customer_phone') }}">
                                            <div class="text-danger">
                                                @error('alt_customer_phone')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="alt_customer_email"
                                                class="form-label text-dark">alt_customer_email<span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" name="alt_customer_email" id="alt_customer_email"
                                                class="form-control @error('alt_customer_email') is-invalid @enderror"
                                                placeholder="Enter complain number"
                                                value="{{ old('alt_customer_email') }}">
                                            <div class="text-danger">
                                                @error('alt_customer_email')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="complain_message" class="form-label text-dark">Product
                                                Complain Message
                                                <span class="text-danger">*</span></label>
                                            <textarea name="complain_message" id="summernote" class="form-control @error('complain_message') is-invalid @enderror"
                                                rows="3"
                                                placeholder="Please enter comment">{{ old('complain_message') }}</textarea>
                                            <div class="text-danger">
                                                @error('complain_message')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Image 1 </label>
                                            <input type="file" name="defect_pic_1"
                                                class="form-control dropify  @error('defect_pic_1') is-invalid @enderror"
                                                data-show-errors="true" data-errors-position="outside"
                                                data-allowed-file-extensions="jpg jpeg png bmp" data-max-file-size-preview="6M">
                                            <x-error name='defect_pic_1' />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Image 2 </label>
                                            <input type="file" name="defect_pic_2"
                                                class="form-control dropify  @error('defect_pic_2') is-invalid @enderror"
                                                data-show-errors="true" data-errors-position="outside"
                                                data-allowed-file-extensions="jpg jpeg png bmp" data-max-file-size-preview="6M">
                                            <x-error name='defect_pic_2' />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Image 3 </label>
                                            <input type="file" name="defect_pic_3"
                                                class="form-control dropify  @error('defect_pic_3') is-invalid @enderror"
                                                data-show-errors="true" data-errors-position="outside"
                                                data-allowed-file-extensions="jpg jpeg png bmp" data-max-file-size-preview="6M">
                                            <x-error name='defect_pic_3' />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Image 4</label>
                                            <input type="file" name="defect_pic_4"
                                                class="form-control dropify  @error('defect_pic_4') is-invalid @enderror"
                                                data-show-errors="true" data-errors-position="outside"
                                                data-allowed-file-extensions="jpg jpeg png bmp" data-max-file-size-preview="6M">
                                            <x-error name='defect_pic_4' />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Image 5 </label>
                                            <input type="file" name="defect_pic_5"
                                                class="form-control dropify  @error('defect_pic_5') is-invalid @enderror"
                                                data-show-errors="true" data-errors-position="outside"
                                                data-allowed-file-extensions="jpg jpeg png bmp" data-max-file-size-preview="6M">
                                            <x-error name='defect_pic_5' />
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary mt-3">Submit Complain<i
                                        class="mdi mdi-arrow-right ms-1"></i></button>
                            </form>
                        </div> {{-- card-body-end --}}

                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->
    @endsection
