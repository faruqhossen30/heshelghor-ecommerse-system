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

                            <div>
                                <h5>Delivered on 29 Dec 2020</h5>
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            {{-- <img src="{{ asset('backend') }}/assets/images/small/img-4.jpg"
                                                alt="Card image" class="img-fluid"> --}}

                                            <img class="img-fluid"
                                                src="{{ asset('backend/assets/images/products' . $product->photo) }}"
                                                alt="" style="width: 280px; height:220px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->title }}</h5>

                                                {{-- <div class="rating">
                                                    <input id="star5" name="rating" type="radio" value="5" >

                                                    <label for="star5"></label>
                                                    <input id="star4" name="rating" type="radio" value="4" >

                                                    <label for="star4"></label>
                                                    <input id="star3" name="rating" type="radio" value="3" >

                                                    <label for="star3"></label>
                                                    <input id="star2" name="rating" type="radio" value="2" >

                                                    <label for="star2"></label>
                                                    <input id="star1" name="rating" type="radio" value="1" >

                                                    <label for="star1"></label>
                                                </div> --}}
                                                <p>Product Id: <span>65.01.269.22</span></p>
                                                <p class="card-text"></p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('user.product.review.store') }}" method="POST">


                                    @csrf

                                    <p>Rate and review purchased producrt</p>
                                    <div class="row">
                                        <div class=" rating form-group col-md-6 col-sm-12">
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
                                    </div>


                                    <P class="mt-3">Is it recommanded?</P>
                                    <input type="radio" id="html" name="recommend" value="0">
                                    <label for="html">No</label><br>

                                    <input type="radio" id="html" name="recommend" value="1">
                                    <label for="html">Yes</label><br>
                                    <div class="mb-2">

                                        <label for="review" class="form-label">Review detail </label>
                                        <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea"
                                            style="height: 100px"></textarea>
                                        {{-- <div id="emailHelp" class="form-text">Please share your feedback about the
                                            product:
                                            Was the product as described? What is the quality like?</div> --}}
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
            transform: translate(-66%, -50%) rotateY(180deg);
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
            color: #101010;
        }

        .rating label::after {
            content: '\f005';
            font-family: fontAwesome;
            position: absolute;
            display: block;
            font-size: 30px;
            color:#FACA51;
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
