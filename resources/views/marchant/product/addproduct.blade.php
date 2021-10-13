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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Title --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Product Name <span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" name="title" id="product-name"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Example: Apple iMac">
                                            <div class="text-danger">
                                                @error('title')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Category and Subcategooyr --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Category <span
                                                    class="text-danger">*</span></label>
                                            <select name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror"
                                                id="product-category">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('category_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="product-reference" class="form-label">Sub-Category <span
                                                    class="text-danger">*</span> <span id="catCom"
                                                    class="badge bg-success float-end ml-5"></span></label>
                                            <select name="subcategory_id"
                                                class="form-control commission @error('subcategory_id') is-invalid @enderror"
                                                id="product-category">
                                                <option value="">Select</option>
                                            </select>
                                            <div class="text-danger">
                                                @error('subcategory_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Brand and Shop --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="brand_id" class="form-label">Brand <span
                                                    class="text-danger">*</span></label>
                                            <select name="brand_id"
                                                class="form-control @error('brand_id') is-invalid @enderror" id="brand_id">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('brand_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="shop_id" class="form-label">Select Shop <span
                                                    class="text-danger">*</span></label>
                                            <select name="shop_id"
                                                class="form-control @error('shop_id') is-invalid @enderror" id="shop_id">
                                                <option value="">Select</option>
                                                @foreach ($shops as $shop)
                                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('shop_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Price and queantity --}}
                                <div class="row">
                                    <label class="form-label">
                                        <h4 class="header-title">Product Price</h4>
                                        <p class="sub-header">Please fillup all requried information.</p>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="retularPrice" class="form-label">Regular Price<span
                                                    class="text-danger">*</span></label>
                                            <input name="regular_price" type="number" class="form-control"
                                                id="retularPrice" placeholder="Regular Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="sellPriceID" class="form-label">Sale Price <span
                                                    class="text-danger">*</span></label>
                                            <input name="sale_price" type="number"
                                                class="form-control @error('sale_price') is-invalid @enderror"
                                                id="sellPriceID" placeholder="Enter amount">
                                            <div class="text-danger">
                                                @error('sale_price')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price<span
                                                    class="text-danger">*</span></label>
                                            <input readonly name="price" type="text"
                                                class="form-control @error('category_id') is-invalid @enderror" id="price"
                                                placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity<span
                                                    class="text-danger">*</span></label>
                                            <input name="quantity" type="number" class="form-control" id="quantity"
                                                placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Alert Quantity<span
                                                    class="text-danger">*</span></label>
                                            <input name="quantity_alert" type="text" class="form-control" id="quantity"
                                                placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                </div>


                                {{-- Description --}}
                                <div class="mb-3">
                                    <label for="product-description" class="form-label">Product Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote"
                                        class="form-control @error('description') is-invalid @enderror" rows="3"
                                        placeholder="Please enter comment"></textarea>
                                    <div class="text-danger">
                                        @error('description')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Short Description --}}
                                <div class="mb-3">
                                    <label for="product-summary" class="form-label">Product Summary</label>
                                    <textarea name="short_description"
                                        class="form-control @error('short_description') is-invalid @enderror"
                                        id="product-summary" rows="5" placeholder="Promotion short description "></textarea>
                                    <div class="text-danger">
                                        @error('short_description')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Color and Size --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-1 card card-body">
                                            <h5 class="font-14 mb-2">Select Color<span class="text-danger">*</span></h5>
                                            @foreach ($colors as $color)
                                                <div class="form-check">
                                                    <input name="colors[]"
                                                        class="form-check-input @error('colors') is-invalid @enderror"
                                                        type="checkbox" value="{{ $color->id }}"
                                                        id="flexCheckDefault{{ $color->id }}">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $color->id }}">
                                                        {{ $color->name }}
                                                    </label>

                                                </div>
                                            @endforeach
                                            <div class="text-danger">
                                                @error('colors')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-1 card card-body">
                                            <h5 class="font-14 mb-2">Select Size<span class="text-danger">*</span></h5>
                                            @foreach ($sizes as $size)
                                                <div class="form-check">
                                                    <input name="sizes[]"
                                                        class="form-check-input @error('sizes') is-invalid @enderror"
                                                        type="checkbox" value="{{ $size->id }}"
                                                        id="flexCheckDefault{{ $size->id }}">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $size->id }}">
                                                        {{ $size->name }}
                                                    </label>

                                                </div>
                                            @endforeach
                                            <div class="text-danger">
                                                @error('sizes')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                {{-- Image Section --}}
                                <hr>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">
                                        <h4 class="header-title">Product Images</h4>
                                        <p class="sub-header">Image size should be ( width: 800px height: 800px )</p>
                                    </label>
                                    <input name="photo" class="form-control @error('photo') is-invalid @enderror"
                                        type="file" id="formFile">
                                    <div class="text-danger">
                                        @error('photo')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Image Section --}}
                                <hr>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">
                                        <h4 class="header-title">Product Slider Image</h4>
                                        <p class="sub-header">Image size should be ( width: 800px height: 800px )</p>
                                    </label>
                                    <input name="image[]" class="form-control @error('image') is-invalid @enderror"
                                        type="file" id="formFileMultiple" multiple>
                                    <div class="text-danger">
                                        @error('image')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Upload Product <i
                                        class="mdi mdi-arrow-right ms-1"></i></button>



                            </form>
                        </div> {{-- card-body-end --}}

                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('css')
    <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
@push('summernote')
    <script>
        $('#summernote').summernote({
            placeholder: 'Describe your product in details.',
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
    <script src="{{ asset('backend') }}/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- Plugins js -->
    {{-- <script src="{{ asset('backend')}}/assets/libs/quill/quill.min.js"></script> --}}

    <!-- Select2 js-->
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <!-- Dropzone file uploads-->
    <script src="{{ asset('backend') }}/assets/libs/dropzone/min/dropzone.min.js"></script>

    <!-- Init js-->
    <script src="{{ asset('backend') }}/assets/js/pages/form-fileuploads.init.js"></script>

    <!-- Init js -->
    <script src="{{ asset('backend') }}/assets/js/pages/add-product.init.js"></script> {{-- Edit this line for js error --}}
    <script src="{{ asset('js/product.js') }}"></script>
    <script>
        $(function() {
            var category_id = $('select[name="category_id"]');
            var subcategory_id = $('select[name="subcategory_id"]');

            category_id.change(function() {
                var id = category_id.val();
                if (id) {
                    subcategory_id.empty();
                    subcategory_id.append(`<option value="">Please Select</option>`);
                    $.get(`{{ url('/subcategory?category_id=') }}${id}`, function(data, status) {
                        if (data) {

                            data.forEach(function(row) {
                                subcategory_id.append(
                                    `<option value="${row.id}"> ${row.name } </option>`);
                            });
                        }
                    });
                }

            });




            // For Price
            var saleprice = $('input[name="sale_price"]');
            var price = $('input[name="price"]');
            var categoryCommission = 0;
            var catCom = $('#catCom');


            $(document).ready(function() {
                $(document).on('change click keyup select',
                    'input[name="sale_price"], select[name="subcategory_id"]',
                    function() {


                        var subCatID = subcategory_id.val();
                        if (subcategory_id) {
                            $.get(`{{ url('commission/${subCatID}') }}`, function(data, status) {
                                categoryCommission = data.commission;
                                if (data) {
                                    catCom.text(`${data.commission}%`);
                                }


                                // console.log(data.commission);
                            });
                        };

                        // console.log(categoryCommission);
                        calculatorFun();

                        console.log(total);


                    });
            });

            function calculatorFun() {
                var lastSellPrice = parseInt(saleprice.val());
                var total = lastSellPrice + (lastSellPrice * categoryCommission / 100);
                price.val(total);
            };





        })
    </script>

@endpush
