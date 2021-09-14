@extends('marchant.layouts.app')

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
                                        <th class="all">Product</th>
                                        <th>Rating</th>
                                        <th>Category</th>
                                        <th>Added Date</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck1">
                                                <label class="form-check-label" for="productlistCheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-1.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Blue color T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.9</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            09 Mar, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 32
                                            </div>
                                        </td>

                                        <td>
                                            112
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('product.show') }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck2">
                                                <label class="form-check-label" for="productlistCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-2.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Half sleeve maroon T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning"><i class="mdi mdi-star"></i> 3.1</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            05 Mar, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 33
                                            </div>
                                        </td>

                                        <td>
                                            60
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck3">
                                                <label class="form-check-label" for="productlistCheck3">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-3.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Cream color T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.3</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            02 Mar, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 33
                                            </div>
                                        </td>

                                        <td>
                                            58
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-danger">Deactive</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck4">
                                                <label class="form-check-label" for="productlistCheck4">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-4.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Blue color T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.9</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            27 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 34
                                            </div>
                                        </td>

                                        <td>
                                            98
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck5">
                                                <label class="form-check-label" for="productlistCheck5">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-5.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Half sleeve T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger"><i class="mdi mdi-star"></i> 2.5</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            23 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 35
                                            </div>
                                        </td>

                                        <td>
                                            85
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-danger">Deactive</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck6">
                                                <label class="form-check-label" for="productlistCheck6">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-6.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Blue Hoodie for men</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning"><i class="mdi mdi-star"></i> 3.4</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            21 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 36
                                            </div>
                                        </td>

                                        <td>
                                            88
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck7">
                                                <label class="form-check-label" for="productlistCheck7">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-7.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Vneck green T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.5</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            19 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 37
                                            </div>
                                        </td>

                                        <td>
                                            82
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck8">
                                                <label class="form-check-label" for="productlistCheck8">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-8.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Full sleeve Pink T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger"><i class="mdi mdi-star"></i> 2.4</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            15 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 38
                                            </div>
                                        </td>

                                        <td>
                                            54
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck9">
                                                <label class="form-check-label" for="productlistCheck9">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-1.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Blue color T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.3</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            15 Feb, 2020
                                        </td>
                                        <td>
                                           <div>
                                                $ 38
                                           </div>
                                        </td>

                                        <td>
                                            60
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck10">
                                                <label class="form-check-label" for="productlistCheck10">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-2.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Half sleeve maroon T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.0</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            13 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 45
                                            </div>
                                        </td>

                                        <td>
                                            32
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-danger">Deactive</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck11">
                                                <label class="form-check-label" for="productlistCheck11">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-3.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Cream color T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.2</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            12 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 46
                                            </div>
                                        </td>

                                        <td>
                                            64
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check mb-0 font-16">
                                                <input class="form-check-input" type="checkbox" id="productlistCheck112">
                                                <label class="form-check-label" for="productlistCheck112">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../assets/images/products/product-4.png" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">Blue color T-shirt</a></h5>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><i class="mdi mdi-star"></i> 4.0</span>
                                        </td>
                                        <td>
                                            T-shirt
                                        </td>
                                        <td>
                                            08 Feb, 2020
                                        </td>
                                        <td>
                                            <div>
                                                $ 47
                                            </div>
                                        </td>

                                        <td>
                                            74
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-danger">Deactive</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
<!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
