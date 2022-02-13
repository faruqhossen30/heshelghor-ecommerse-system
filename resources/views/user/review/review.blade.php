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
                                <a href="#" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-1"></i> Review Products</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-end">

                                    <button type="button" class="btn btn-success mb-2 mb-sm-0"><i class="mdi mdi-cog"></i></button>

                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->

                        <div>
                            <h5>Delivered on 29 Dec 2020</h5>
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{asset('backend')}}/assets/images/small/img-4.jpg" alt="Card image" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Product Name</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Rate and review purchased producrt</p>
                            <form role="form">
                                <div class="mb-2">
                                    <label for="review" class="form-label">Review detail </label>
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px">Great! Nive Product.</textarea>
                                    <div id="emailHelp" class="form-text">Please share your feedback about the product:
                                        Was the product as described? What is the quality like?</div>
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
