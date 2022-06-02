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
                                <a href="{{route('product.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add Products</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-end">

                                    <button type="button" class="btn btn-success mb-2 mb-sm-0"><i class="mdi mdi-cog"></i></button>

                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all" style="width: 20px;">
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck">
                                                <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="all">S.N</th>
                                        <th>Image</th>
                                        <th class="all">Product</th>
                                        <th>Rating</th>
                                        <th>Price</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck1">
                                                <label class="form-check-label" for="productlistCheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$serial++}}</a></h5>
                                        </td>
                                        <td>
                                            <img src="{{$product->product->img_small}}" alt="contact-img" title="contact-img" class="avatar-sm">
                                            {{-- <img src="{{ asset('storage/images/' . $product->img_small) }}" height="50px"
                                            width="50px" alt="{{ $product->img_small }}"> --}}
                                        </td>
                                        <td>
                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$product->product->title}}</a></h5>
                                        </td>
                                        <td>
                                            {{-- <span class="badge bg-success"><i class="mdi mdi-star"></i>{{$product->review->rating}}</span> --}}
                                        </td>

                                        <td>
                                            <div>
                                                ৳{{$product->price}}
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{ route('user.product.review.product', $product->id) }}" class="btn btn-warning btn-sm">Review </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->
@endsection
