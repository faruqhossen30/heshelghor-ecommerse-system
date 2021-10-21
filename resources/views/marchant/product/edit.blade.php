@extends('marchant.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Create Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
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
                        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard form-wizard-header">
                            <ul class="twitter-bs-wizard-nav mb-2">
                                <li class="nav-item">
                                    <a href="#general-info" class="nav-link" data-bs-toggle="tab" data-toggle="tab">
                                        <span class="number">01</span>
                                        <span class="d-none d-sm-inline">General</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-img" class="nav-link" data-bs-toggle="tab" data-toggle="tab">
                                        <span class="number">02</span>
                                        <span class="d-none d-sm-inline">Product Images</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane" id="general-info">
                                    <h4 class="header-title">General Information</h4>
                                    <p class="sub-header">Fill all information below</p>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="product-name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" value="{{$product->title}}" id="product-name" class="form-control" placeholder="e.g : Apple iMac" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="product-name" class="form-label">Category <span class="text-danger">*</span></label>
                                                    <select name="catagory_id" value="{{$product->catagory_id}}" class="form-control" id="product-category">
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="product-reference" class="form-label">Sub-Category <span class="text-danger">*</span></label>
                                                    <select name="subcatagory_id" value="{{$product->subcatagory_id}}" class="form-control" id="product-category">
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="brand_id" class="form-label">Brand <span class="text-danger">*</span></label>
                                                    <select name="brand_id" value="{{$product->brand_id}}" class="form-control" id="brand_id">
                                                        @foreach ($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="vendor" class="form-label">Select Vendor <span class="text-danger">*</span></label>
                                                    <select name="vendor_id"  class="form-control" id="vendor">
                                                        <option value="">Select</option>
                                                        <option value="">Select</option>
                                                        <option value="">Select</option>
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="product-description" class="form-label">Product Description <span class="text-danger">*</span></label>
                                            <textarea name="description"  id="summernote" class="form-control" rows="3" placeholder="Please enter comment">{{$product->description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product-summary" class="form-label">Product Summary</label>
                                            <textarea name="short_description" class="form-control" id="product-summary" rows="5" placeholder="Please enter summary">{{$product->short_description}}</textarea>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="buyPrice" class="form-label">Buy Price<span class="text-danger">*</span></label>
                                                    <input name="buy_price" value="{{$product->buy_price}}" type="text" class="form-control" id="buyPrice" placeholder="Buy Price">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="sellPrice" class="form-label">Sell Price <span class="text-danger">*</span></label>
                                                    <input name="sell_price" value="{{$product->sale_price}}" type="text" class="form-control" id="sellPrice" placeholder="Enter amount">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="retularPrice" class="form-label">Regular Price<span class="text-danger">*</span></label>
                                                        <input name="regular_price" value="{{$product->regular_price}}" type="text" class="form-control" id="retularPrice" placeholder="Regular Price">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label">Quantity<span class="text-danger">*</span></label>
                                                        <input name="quantity" value="{{$product->quantity}}" type="text" class="form-control" id="quantity" placeholder="Enter amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="next list-inline-item">
                                            <button type="button" class="btn btn-success">Add Photo <i class="mdi mdi-arrow-right ms-1"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="product-img">

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">
                                            <h4 class="header-title">Product Images</h4>
                                            <p class="sub-header">Image size should be ( width: 800px height: 800px )</p>
                                        </label>
                                        <input name="image[]" class="form-control" type="file" id="formFileMultiple" multiple>
                                      </div>
                                      <div>
                                          @php
                                              $images = json_decode($product->image);
                                          @endphp
                                            @foreach ($images as $image)
                                                <img class="img-thumbnail" src="{{ asset('uploads/products/'.$image)}}" alt="" style="width: 150px; height:auto">
                                            @endforeach
                                      </div>
                                      @php
                                        //   exit;
                                      @endphp
                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="previous list-inline-item">
                                            <button type="button" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Back to General </button>
                                        </li>
                                        <li class="next list-inline-item">
                                            <button type="submit" class="btn btn-primary">Upload Product <i class="mdi mdi-arrow-right ms-1"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </form>
                    </div>  {{--  card-body-end --}}

                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- file preview template -->
        <div class="d-none" id="uploadPreviewTemplate">
            <div class="card mt-1 mb-0 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                        </div>
                        <div class="col ps-0">
                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                            <p class="mb-0" data-dz-size></p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                <i class="fe-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->

</div> <!-- content -->
@endsection

        @push('css')
        <link href="{{ asset('backend')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend')}}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        @endpush

        @push('summernote')
        <script>
            $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
            });
        </script>
        @endpush
@push('scripts')

<!-- third party js -->
<script src="{{ asset('backend')}}/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<!-- Plugins js -->
<script src="{{ asset('backend')}}/assets/libs/quill/quill.min.js"></script>

<!-- Select2 js-->
<script src="{{ asset('backend')}}/assets/libs/select2/js/select2.min.js"></script>
<!-- Dropzone file uploads-->
<script src="{{ asset('backend')}}/assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- Init js-->
<script src="{{ asset('backend')}}/assets/js/pages/form-fileuploads.init.js"></script>

<!-- Init js -->
<script src="{{ asset('backend')}}/assets/js/pages/add-product.init.js"></script>
@endpush
