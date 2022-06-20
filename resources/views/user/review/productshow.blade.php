@extends('user.layouts.app')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Review details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Product Review details</li>
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

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <img src="{{ $orderitem->product->img_small }}" alt="Card image"
                                            class="img-fluid my-5" style="width: 300px; height:300px">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div>
                                        <div><a href="#" class="text-primary">Product Name</a></div>
                                        <h4 class="mb-1">{{$orderitem->product->title}}
                                            <a href="{{route('user.product.review.edit',$orderitem->product_id)}}" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                                        </h4>

                                        <p class="text-muted me-3 font-16">
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i>{{$review->rating}}</span>
                                        </p>
                                        <h2>Review content</h2>
                                        <hr/>
                                        <div>
                                            <p> {{$review->body}}</p>
                                        </div>
                                    </div>
                                </div>
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




