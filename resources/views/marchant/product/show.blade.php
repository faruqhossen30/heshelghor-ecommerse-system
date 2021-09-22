@extends('marchant.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">

                                    <div id="product-carousel"
                                        class="carousel slide product-detail-carousel"
                                        data-bs-ride="carousel">

                                        <div class="carousel-inner">

                                            {{-- {{$product->image}} --}}
                                            @php
                                                $images = json_decode($product->image);
                                                // echo print_r($images);
                                            @endphp
                                            @php

                                            @endphp
                                            <div class="carousel-item active">
                                                <div>
                                                    <img src="https://picsum.photos/200/300?grayscale"
                                                        alt="product-img" class="img-fluid">
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div>
                                                    <img src="https://picsum.photos/200/300?grayscale"
                                                        alt="product-img" class="img-fluid">
                                                </div>
                                            </div>


                                        </div>
                                        <ol
                                            class="carousel-indicators product-carousel-indicators mt-2">
                                            <li data-bs-target="#product-carousel" data-bs-slide-to="0"
                                                class="active">
                                                <img src=".https://picsum.photos/seed/picsum/200/300"
                                                    alt="product-img" class="img-fluid product-nav-img">
                                            </li>
                                            @foreach ($images as $image)
                                                <li data-bs-target="#product-carousel" data-bs-slide-to="2">
                                                    <img src="https://picsum.photos/200/300/?blur"
                                                        alt="product-img" class="img-fluid product-nav-img">
                                                </li>
                                            @endforeach


                                        </ol>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div>
                                <h4 class="mb-1">{{$product->title}}
                                    <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                                </h4>
                                <div><a href="#" class="text-primary">{{$product->short_description}}</a></div>

                                <p class="text-muted me-3 font-16">
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star"></span>
                                </p>

                                <div class="mt-3">
                                    <h6 class="text-danger text-uppercase">10 % Off</h6>
                                    <h4>Price : <span class="text-muted me-2"><del>{{$product->regular_price}}</del>
                                        <b>{{$product->sale_price}}</b></h4>
                                </div>

                                <hr/>

                            <div>

                                <div>
                                    {!! html_entity_decode($product->description) !!}
                                </div>

                                <div>
                                    <form class="d-flex flex-wrap align-items-center mb-3">

                                        <label class="my-1 me-2"
                                        for="quantityinput">Quantity</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1"
                                            id="quantityinput">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>

                                        <label class="my-1 me-2" for="sizeinput">Size</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1" id="sizeinput">
                                                <option selected>Small</option>
                                                <option value="1">Medium</option>
                                                <option value="2">Large</option>
                                                <option value="3">X-large</option>
                                            </select>
                                        </div>

                                    </form>

                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                            {{-- <span class="btn-label"><i
                                                class="mdi mdi-cart"></i></span> --}}
                                                <a href="{{route('product.edit', $product->id)}}" class="action-icon">Edit
                                                </a>
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light">
                                            <span class="btn-label"><i
                                                    class="mdi mdi-cart"></i></span>Delete
                                        </button>


                                        {{-- <button type="button" class="btn btn-danger waves-effect waves-light" onclick="confirm('Are you sure you want to delete this ?')">
                                            <span class="btn-label"><i
                                                    class="mdi mdi-cart"></i></span>
                                                    <a href="{{route('product.destroy', $product->id)}}" class="action-icon"> Delete
                                                    </a>
                                                    <form action="{{route('product.destroy', $product->id)}}" method="post" >
                                                        Delete
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger waves-effect waves-light" type="submit" onclick="confirm('Are you sure you want to delete this ?')"> </button>
                                                    </form>
                                        </button> --}}

                                    </div>
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
</div> <!-- content -->
@endsection

@push('css')
<!-- third party css -->
<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
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
