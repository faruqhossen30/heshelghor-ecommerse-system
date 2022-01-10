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
                                        <th class="all">S.N</th>
                                        <th>Image</th>
                                        <th class="all">Product</th>
                                        {{-- <th class="all">Photo</th> --}}
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Status</th>
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
                                            <img src="{{$product->img_small}}" alt="contact-img" title="contact-img" class="avatar-sm">
                                        </td>
                                        <td>
                                            <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$product->title}}</a></h5>
                                        </td>

                                        <td>
                                            <span>{{$product->category->name}}</span>
                                        </td>
                                        <td>
                                            <span>{{$product->subCategory->name}}</span>
                                        </td>
                                        <td>
                                            {{$product->brand->name}}
                                        </td>

                                        <td>
                                            <div>
                                                ৳{{$product->price}}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-success">{{$product->status ? 'Active' : 'Deactive'}}</span>
                                        </td>

                                        <td>
                                            <ul class="list-inline table-action m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{route('product.show', $product->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{route('product.edit', $product->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="{{route('product.destroy', $product->id)}}" method="post" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none; background:none; color:gray; font-size:17px" type="submit" onclick="confirm('Are you sure you want to delete this ?')"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach

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


<!-- sweetalert js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('create'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Product has been created Successfully!'
            })
        </script>
    @endif

    @if (Session::has('update'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Product has been updated Successfully!'
            })
        </script>
    @endif

    @if (Session::has('delete'))
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Product has been deleted Successfully!',
            })
        </script>
    @endif

@endpush
