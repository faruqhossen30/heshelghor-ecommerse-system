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
                                    <a href="{{ route('user.product.review.list') }}" class="btn btn-danger mb-2"><i
                                            class="mdi mdi-plus-circle me-1"></i> Review
                                        Products</a>
                                    {{-- <a href="{{ route('user.product.review.edit', $orderitem->id) }}"
                                        class="btn btn-primary mb-2"><i class="mdi mdi-plus-circle me-1"></i> Review
                                        Edit</a> --}}
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
                                                <img src="{{ $orderitem->product->img_small }}" alt="Card image"
                                                    class="img-fluid" style="width: 150px; height:100px">

                                            </div>
                                            <div class="col-md-9">
                                                <h2>Product Review</h2>
                                                <p class="mb-5">{{ $orderitem->product->title }}</p>
                                                {{-- <p class="mt-4"><span>Color:red</span></p> --}}
                                                {{-- <p class="mt-4"><span>Color:red</span></p> --}}
                                                {{-- <p>Product Id: <span>{{ $orderitem->product_id }}</span></p> --}}
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins --}}
                                                <form action="{{ route('user.product.review.store', $orderitem->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $orderitem->product_id }}">
                                                    <input type="hidden" name="orderitem_id" value="{{ $orderitem->id }}">
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
            top: 70%;
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




    <style>
        /* @media only screen and (max-width: 600px) {

                        .rating {
                            position: absolute;
                            top: 67%;
                            margin: 0;
                            transform: translate(0%, -370%) rotateY(180deg);
                            display: flex;
                        }
                    } */



        /* Large Mobile :480px. */
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .rating {
                position: absolute;
                top: 75%;
                margin: 0;
                transform: translate(0%, -370%) rotateY(180deg);
                display: flex;
            }
        }


        /* small mobile :320px. */
        @media only screen and (min-width: 320px) and (max-width: 479px) {


            .rating label::before {
                content: '\f005';
                font-family: fontAwesome;
                position: relative;
                display: block;
                font-size: 25px;
                color: #d7d4d4;
            }

            .rating label::after {
                content: '\f005';
                font-family: fontAwesome;
                position: absolute;
                display: block;
                font-size: 25px;
                color: #FACA51;
                top: 0;
                opacity: 0;
                transition: 0.5s;
                text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            }


            .rating {
                position: absolute;
                top: 75%;
                margin: 0;
                transform: translate(0%, -525%) rotateY(180deg);
                display: flex;
            }

        }

    </style>
@endpush
