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
                                            <div id="product-carousel" class="carousel slide product-detail-carousel"
                                                data-bs-ride="carousel">

                                                <div class="carousel-inner">
                                                    @foreach ($images as $image)
                                                        <div class="carousel-item active">
                                                            <div>
                                                                <img src="{{ asset('uploads/products/' . $image->image) }}"
                                                                    alt="product-img" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <ol class="carousel-indicators product-carousel-indicators mt-2">
                                                    @foreach ($images as $key => $image)
                                                        <li data-bs-target="#product-carousel" data-bs-slide-to="{{$key}}"
                                                            class="active">
                                                            <img src="{{ asset('uploads/products/' . $image->image) }}"
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
                                        <h4 class="mb-1">{{ $product->title }}
                                            <a href="javascript: void(0);" class="text-muted"><i
                                                    class="mdi mdi-square-edit-outline ms-2"></i></a>
                                        </h4>
                                        <div><a href="#" class="text-primary">{{ $product->subcategory->name }}</a></div>
                                        <div>{{ $product->short_description }}</div>

                                        <div class="mt-3">
                                            <h6 class="text-danger text-uppercase">{{$product->discount}} % Off</h6>
                                            <h4>Price :
                                                    <b>৳{{ $product->price }}</b>
                                            </h4>
                                        </div>

                                        <hr />

                                        <div>

                                            <div>
                                                {!! html_entity_decode($product->description) !!}
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="btn btn-warning waves-effect waves-light">
                                                <span class="btn-label"><i
                                                        class="mdi mdi-square-edit-outline"></i></span>Edit
                                            </button>
                                            <button type="button"
                                                class="btn btn-danger waves-effect waves-light">
                                                <span class="btn-label"><i
                                                        class="mdi mdi-delete"></i></span>Delete
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <h5 class="my-2 mb-3 border-bottom">Additional Information</h5>
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
        <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
            rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
            rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <!-- third party js -->
        <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
        </script>
        <script src="{{ asset('backend') }}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js">
        </script>
        <!-- third party js ends -->
        <script src="{{ asset('backend') }}/assets/js/pages/product-list.init.js"></script>
    @endpush
