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
                                    <a href="{{ route('product.create') }}" class="btn btn-danger mb-2"><i
                                            class="mdi mdi-plus-circle me-1"></i> Add Products</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-sm-end">

                                        <button type="button" class="btn btn-success mb-2 mb-sm-0"><i
                                                class="mdi mdi-cog"></i></button>

                                    </div>
                                </div><!-- end col-->
                            </div>
                            <!-- end row -->

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                        @foreach ($orderitems as $orderitem)
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-0 font-16">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="productlistCheck1">
                                                        <label class="form-check-label"
                                                            for="productlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="m-0 d-inline-block align-middle"><a href="#"
                                                            class="text-dark">{{ $serial++ }}</a></h5>
                                                </td>
                                                <td>
                                                    <img src="{{ $orderitem->product->img_small }}" alt="contact-img"
                                                        title="contact-img" class="avatar-sm">

                                                </td>
                                                <td>
                                                    <h5 class="m-0 d-inline-block align-middle"><a href="#"
                                                            class="text-dark">{{ $orderitem->product->title }}</a></h5>
                                                </td>
                                                <td>

                                                    @if ($orderitem->review)
                                                        <span class="badge bg-success"><i
                                                                class="mdi mdi-star"></i>{{ $orderitem->review->rating }}</span>
                                                                {{-- <div class=" rating form-group col-md-6 col-sm-12">
                                                                    <input id="star5" name="rating"  @if ($orderitem->review->rating == 5) checked @endif type="radio" value="5">
                                                                    <label for="star5"></label>
                                                                    <input id="star4" name="rating"  @if ($orderitem->review->rating == 4) checked @endif type="radio" value="4">
                                                                    <label for="star4"></label>
                                                                    <input id="star3" name="rating"  @if ($orderitem->review->rating == 3) checked @endif type="radio" value="3">
                                                                    <label for="star3"></label>
                                                                    <input id="star2" name="rating"  @if ($orderitem->review->rating == 2) checked @endif type="radio" value="2">
                                                                    <label for="star2"></label>
                                                                    <input id="star1" name="rating"  @if ($orderitem->review->rating == 1) checked @endif type="radio" value="1">
                                                                    <label for="star1"></label>
                                                                </div> --}}
                                                    @else
                                                        No Review
                                                    @endif


                                                </td>

                                                <td>
                                                    <div>
                                                        ৳{{ $orderitem->product->price }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="{{ route('user.product.review.product', $orderitem->id) }}"
                                                        class="btn btn-warning btn-sm">Review </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $orderitems->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
@endsection


