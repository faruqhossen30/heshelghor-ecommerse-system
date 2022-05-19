@extends('user.layouts.app')
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-1"></i> Review
                                        Products</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-sm-end">

                                        <button type="button" class="btn btn-success mb-2 mb-sm-0"><i
                                                class="mdi mdi-cog"></i></button>

                                    </div>
                                </div><!-- end col-->
                            </div>
                            <!-- end row -->

                            <div style="font-weight: bold">
                                <h5>Delivered on 29 Dec 2020</h5>
                                <p>Rate and review purchased producrt</p>
                                <div class="">
                                    <div class="row g-0">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('backend') }}/assets/images/small/img-4.jpg"
                                                    alt="Card image" class="img-fluid"
                                                    style="width: 150px; height:100px">
                                            </div>
                                            <div class="col-md-9">
                                                <p class="mb-3">{{ $product->title }}</p>
                                                <p class="mt-4"><span>Color:red</span></p>
                                                <p>Product Id: <span>65.01.269.22</span></p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        <form action="{{ route('user.product.review.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="rating">
                                                                <input id="star5" name="rating" type="radio" value="5">

                                                                <label for="star5"></label>
                                                                <input id="star4" name="rating" type="radio" value="4">

                                                                <label for="star4"></label>
                                                                <input id="star3" name="rating" type="radio" value="3">

                                                                <label for="star3"></label>
                                                                <input id="star2" name="rating" type="radio" value="2">

                                                                <label for="star2"></label>
                                                                <input id="star1" name="rating" type="radio" value="1">

                                                                <label for="star1"></label>
                                                            </div>
                                                            <div class="mt-3">
                                                                <input type="radio" id="html" name="recommend" value="1">
                                                                <label for="html" style="font-weight: bold">Yes I
                                                                    recommanded to buy this product.</label><br>
                                                            </div>


                                                            <div class="mt-2">
                                                                <input type="radio" id="html" name="recommend" value="0">
                                                                <label for="html" style="font-weight: bold">No I don't
                                                                    recommanded this product.</label><br>

                                                            </div>
                                                            <div class="mb-2 mt-2">
                                                                <label for="review" class="form-label"
                                                                    style="font-weight: bold">Review detail . </label>
                                                                <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea"
                                                                    style="height: 100px"></textarea>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->
@endsection


@push('css')
    <style>
        .rating {
            position: absolute;
            top: 57%;
            margin: 0;
            /* transform: translate(-66%, -50%) rotateY(180deg); */
            transform: translate(0%, -370%) rotateY(180deg);
            display: flex;
        }

        .rating input {
            display: none;
        }

        .rating lable {
            display: block;
            cursor: pointer;
            width: 50px;

        }

        .rating label::before {
            content: '\f005';
            font-family: fontAwesome;
            position: relative;
            display: block;
            font-size: 30px;
            color: #d7d4d4;
        }

        .rating label::after {
            content: '\f005';
            font-family: fontAwesome;
            position: absolute;
            display: block;
            font-size: 30px;
            color: #FACA51;
            top: 0;
            opacity: 0;
            transition: 0.5s;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .rating label:hover:after {
            opacity: 1;
        }

        .rating label:hover:after,
        .rating label:hover~label::after,
        .rating input:checked~label::after {
            opacity: 1;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
