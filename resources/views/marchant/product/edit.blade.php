@extends('marchant.layouts.app')

@section('content')
    <div class="content">
        <x-mediamodal />
        <x-multiplemediamodal />
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Edit Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('homepage')}}">HeshelGhor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Title --}}
                                <div id="addProductMedia">

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Product Name <span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" name="title" id="product-name"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Example: Apple iMac" value="{{ $product->title}}">
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
                                                <option value="{{$category->id}}" {{($product->category_id == $category->id) ? ' selected' : ''}}>{{$category->name}}</option>
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
                                            <label for="product-reference" class="form-label">Sub-Category <span class="text-danger">*</span> <span id="catCom" class="badge bg-success float-end ml-5"></span></label>
                                            <select name="subcategory_id" value="{{$product->subcategory_id}}" class="form-control" id="product-category">
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{$subcategory->id}}" {{($product->subcategory_id == $subcategory->id) ? ' selected ' : ''}}>{{$subcategory->name}}</option>
                                                @endforeach
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
                                            <label for="brand_id" class="form-label">Brand <span class="text-danger">*</span></label>
                                                <select name="brand_id" value="{{$product->brand_id}}" class="form-control selectize-drop-header" id="select-code-language">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}" {{($product->brand_id == $brand->id) ? ' selected ' : ''}}>{{$brand->name}}</option>
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
                                            <label for="shop_id" class="form-label">Select Shop <span class="text-danger">*</span></label>
                                            <select name="shop_id" value="{{$product->shop_id}}"  class="form-control @error('shop_id') is-invalid @enderror" id="shop_id" >
                                                @foreach ($shops as $shop)
                                                    <option value="{{ $shop->id }}" {{($product->shop_id == $shop->id) ? ' selected ' : ''}}>{{ $shop->name }}</option>
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
                                {{-- Shop and Location --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="division_id" class="form-label">Division <span
                                                    class="text-danger">*</span></label>
                                            <select name="division_id" class="form-control @error('division_id') is-invalid @enderror" id="division_id">
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}" {{($product->division_id == $division->id) ? ' selected ' : ''}}>{{ $division->name }}</option>
                                                @endforeach

                                            </select>
                                            <div class="text-danger">
                                                @error('division_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="district_id" class="form-label">District <span class="text-danger">*</span></label>
                                            <select name="district_id" class="form-control @error('district_id') is-invalid @enderror" id="district_id" readonly>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}" {{($product->district_id == $district->id) ? ' selected ' : ''}}>{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('district_id')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="upazila_id" class="form-label">Upazila <span
                                                    class="text-danger">*</span></label>
                                            <select name="upazila_id"
                                                class="form-control @error('upazila_id') is-invalid @enderror"
                                                id="upazila_id" readonly>
                                                @foreach ($upazilas as $upazila)
                                                    <option value="{{ $upazila->id }}" {{($product->upazila_id == $upazila->id) ? ' selected ' : ''}}>{{ $upazila->name }}</option>
                                                @endforeach

                                            </select>
                                            <div class="text-danger">
                                                @error('upazila_id')
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
                                            <label for="retularPrice" class="form-label">Regular Price<span class="text-danger">*</span></label>
                                            <input name="regular_price" type="number" class="form-control @error('regular_price') is-invalid @enderror" id="retularPrice"  value="{{ $product->regular_price }}">

                                            <div class="text-danger">
                                                @error('regular_price')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="sellPriceID" class="form-label">Discount (%) <span class="text-danger">*</span></label>
                                            <input name="discount" type="number" value="{{$product->discount}}" min="0" max="100" class="form-control @error('discount') is-invalid @enderror" id="sellPriceID">
                                            <div class="text-danger">
                                                @error('discount')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="net_price" value="0">

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                                            <input readonly name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity<span class="text-danger">*</span></label>
                                            <input name="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"  value="{{ $product->quantity }}">

                                            <div class="text-danger">
                                                @error('quantity')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="quantityAlerm" class="form-label">Alert Quantity<span  class="text-danger">*</span></label>
                                            <input name="quantity_alert" type="text" class="form-control @error('quantity_alert') is-invalid @enderror"  id="quantityAlerm"  value="{{ $product->quantity_alert }}">

                                            <div class="text-danger">
                                                @error('quantity_alert')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- Description --}}
                                <div class="mb-3">
                                    <label for="product-description" class="form-label">Product Description <span  class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" rows="3">{{ $product->description}}</textarea>
                                    <div class="text-danger">
                                        @error('description')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Short Description --}}
                                <div class="mb-3">
                                    <label for="product-summary" class="form-label">Product Summary<span class="text-danger">*</span></label>
                                    <textarea name="short_description"
                                        class="form-control @error('short_description') is-invalid @enderror" id="product-summary" rows="5">{{ $product->short_description }}</textarea>
                                    <div class="text-danger">
                                        @error('short_description')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Color and Size --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="font-14 mb-2">Select Color<span class="text-danger">*</span>
                                            </h5>
                                            <div style="display: flex; flex-wrap: wrap; ">
                                            @foreach ($colors as $color)
                                                <div class="form-check" style="margin-right: 5px">
                                                    <input @if (in_array(['color_id'=>$color->id], $colorArray)) checked @endif name="colors[]" class="form-check-input @error('colors') is-invalid @enderror"  type="checkbox" value="{{ $color->id }}"  id="flexCheckDefault{{ $color->id }}">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $color->id }}">
                                                        {{ $color->name }}
                                                    </label>

                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="text-danger">
                                                @error('colors')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="font-14 mb-2">Select Size<span class="text-danger">*</span>
                                            </h5>
                                            <div style="display: flex; flex-wrap: wrap; ">
                                                @foreach ($sizes as $size)
                                                    <div class="form-check" style="margin-right: 5px">
                                                        <input name="sizes[]"
                                                        @if (in_array(['size_id'=>$size->id], $sizeArray)) checked @endif
                                                        class="form-check-input @error('sizes') is-invalid @enderror"
                                                        type="checkbox" value="{{ $size->id }}"
                                                        id="flexCheckDefault{{ $size->id }}">
                                                        <label class="form-check-label"
                                                            for="flexCheckDefault{{ $size->id }}">
                                                            {{ $size->name }}
                                                        </label>

                                                    </div>
                                                @endforeach
                                            </div>


                                            <div class="text-danger">
                                                @error('sizes')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                {{-- Image Section --}}
                                <div class="mb-3">
                                    <h4 class="header-title">Product Photo<span class="text-danger">*</span></h4>
                                    <div id="productImage" style="width: 100%; border:1px dashed gray"
                                        class="text-center my-2 @error('img_full') is-invalid @enderror">

                                        <i class="mdi mdi-image h1 text-secondary"></i>
                                        <p>Select Photos</p>
                                    </div>
                                    <div class="text-danger">
                                        @error('img_full')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="productImageMediaArea">
                                    {{-- @if ($product->img_full) --}}
                                    <div id="selectedProductImageMedia">
                                        <img src="{{$product->img_full}}" alt="" class="img-responsive p-2 img-thumbnail" style="width:100px;height:100px" >
                                        <button  id="selectedProductImageMediaCloseButton" type="button" class="btn btn-danger"> Close</button>
                                        <div>
                                            <input type="hidden" name="img_full" value="{{$product->img_full}}">
                                            <input type="hidden" name="img_small" value="{{$product->img_full}}">
                                            <input type="hidden" name="img_medium" value="{{$product->img_full}}">
                                            <input type="hidden" name="img_large" value="{{$product->img_full}}">
                                        </div>
                                    </div>
                                    {{-- @endif --}}

                                </div>

                                <div class="mb-3">
                                    <h4 class="header-title mt-2">Product Slider Photos</h4>
                                    <div id="productSliderImage" style="width: 100%; border:1px dashed gray"
                                        class="text-center my-2">

                                        <i class="mdi mdi-image h1 text-secondary"></i>
                                        <p>Prduct Gallery Photos</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="productSliderMediaArea" class="col-12"
                                        style="display: flex; flex-wrap: wrap;">
                                    @foreach ($images as $image)
                                        <div class="selectedProductImageMedia p-1" style="text-align:center">
                                            <img src="{{$image->url}}" alt="" class="img-responsive p-2 img-thumbnail" style="width:150px;height:150px" > <br>
                                            <button  type="button" class="selectedProductImageMediaCloseButton btn btn-danger btn-sm mt-1"> Close</button>
                                            <input type="hidden" name="fullsizeimages[]" value="{{$image->url}}">
                                        </div>
                                    @endforeach


                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Product <i
                                    class="mdi mdi-arrow-right ms-1"></i></button>

                        </div>



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
<link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    {{-- Dropyfiy --}}
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <style>
        .dropify-message .file-icon p {
            font-size: 14px;
        }

        .dropify-wrapper {
            width: 150px;
            height: 150px;
        }

    </style>
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
    <script src="{{ asset('backend') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    {{-- <script src="{{ asset('backend') }}/assets/libs/mohithg-switchery/switchery.min.js"></script> --}}
    {{-- <script src="{{ asset('backend') }}/assets/libs/multiselect/js/jquery.multi-select.js"></script> --}}
    {{-- <script src="{{ asset('backend') }}/assets/libs/jquery.quicksearch/jquery.quicksearch.min.js"></script> --}}
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    {{-- <script src="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script> --}}
    <script src="{{ asset('backend') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>

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
                                    `<option value="${row.id}"> ${row.name } </option>`
                                );
                            });
                        }
                    });
                }

            });
            // For Division, District and Upazila
            var shop_id = $('#shop_id');
            var division_id = $('#division_id');
            var district_id = $('#district_id');
            var upazila_id = $('#upazila_id');

            $(document).on('change', 'select[id="shop_id"]', function() {
                var shopno = shop_id.val();
                console.log(shopno);
                if (shopno) {
                    $.get(`{{ url('getshop/${shopno}') }}`, function(data, status) {
                        if (data) {
                            console.log(data);
                            division_id.append(
                                `<option value="${data.division_id}" selected>${data.division.name}</option>`
                            );
                            district_id.append(
                                `<option value="${data.district_id}" selected>${data.district.name}</option>`
                            );
                            upazila_id.append(
                                `<option value="${data.upazila_id}" selected>${data.upazila.name}</option>`
                            );
                        }
                    });
                }
            });

            // For Price
            var categoryCommission = 0;
            var catCom = $('#catCom');

            $(document).on('change keyup select', 'select[name = "subcategory_id"]',
                function() {
                    var subCatID = subcategory_id.val();
                    if (subcategory_id) {
                        $.get(`{{ url('commission/${subCatID}') }}`, function(data, status) {
                            categoryCommission = data.commission;
                            if (data) {
                                catCom.text(`${data.commission}%`);

                            }
                        });
                    };

                });


            var regular_price = $('input[name="regular_price"]');
            var discount = $('input[name="discount"]');
            var net_price = $('input[name="net_price"]');
            var price = $('input[name="price"]');


            $(document).on('keyup change', 'input[name="regular_price"], input[name="discount"]', function() {

                var regularPrice = Number(regular_price.val());
                var disCount = Number(discount.val());
                var netPrice = Number(net_price.val());

                var some = regularPrice + ((regularPrice * categoryCommission) / 100) - ((regularPrice *
                    disCount) / 100);
                $('#price').val(some);

            });

        });



        // For Image Gallery
        if($('#selectedProductImageMediaCloseButton')){
            $('#productImage').hide()
        }
        var mediaGallery = $('#mediaGallery');

        function getSingleGallery(mediaGallery) {
            mediaGallery.empty();
            $.ajax({
                url: '{{ route('merchant.modal.gallery') }}',
                method: 'GET',
                // dataType: "json",
                success(data) {
                    if (data) {
                        mediaGallery.append(data);
                    }
                },
                error() {
                    console.log('Upload error');
                }
            });
        };
        // For Image Gallery
        var productImage = $('#productImage');
        $mediaModal = $('#mediaModal');

        $('#productImage').on('click', function() {
            $mediaModal.modal('show');
            getSingleGallery(mediaGallery)
        });

        // Media From Submit
        $('#mediaForm').on('submit', function(event) {
            event.preventDefault();
            var selectimage = $('input[name="selectimage"]:checked');
            var brandMediaSelectArea = $('#brandMediaSelectArea');
            var brandMediaArea = $('#brandMediaArea');

            var fullUrl = selectimage.data('urlfull');
            var smallUrl = selectimage.data('rulsmall');
            var mediumUrl = selectimage.data('urlmedium');
            var largeUrl = selectimage.data('urllarge');

            var productImageMediaArea = $('#productImageMediaArea');

            $('#productImage').hide();
            productImageMediaArea.append(`<div id="selectedProductImageMedia">
                                        <img src="${smallUrl}" alt="" class="img-responsive p-2 img-thumbnail" style="width:100px;height:100px" >
                                        <button  id="selectedProductImageMediaCloseButton" type="button" class="btn btn-danger"> Close</button>
                                    </div>`);


            $('#addProductMedia').append(
                `<div>
                    <input type="hidden" name="img_full" value="${fullUrl}">
                    <input type="hidden" name="img_small" value="${smallUrl}">
                    <input type="hidden" name="img_medium" value="${mediumUrl}">
                    <input type="hidden" name="img_large" value="${largeUrl}">
                </div>`
            );
            $mediaModal.modal('hide');

        });

        $(document).on('click', '#selectedProductImageMediaCloseButton', function() {
            $('#addProductMedia').empty();
            $(this).parent().remove();
            $('#productImage').show();
        });
        // Multiple Media Modal

        function getMultipleGallery(multipleMediaGallery) {
            multipleMediaGallery.empty();
            $.ajax({
                url: '{{ route('merchant.modal.gallerymultiple') }}',
                method: 'GET',
                // dataType: "json",
                success(data) {
                    if (data) {
                        multipleMediaGallery.append(data);
                    }
                },
                error() {
                    console.log('Upload error');
                }
            });
        };


        var productSliderImage = $('#productSliderImage');
        var multipleMediaGallery = $('#multipleMediaGallery');

        $multipleMediaModal = $('#multipleMediaModal');
        $('#productSliderImage').on('click', function() {
            $multipleMediaModal.modal('show');
            getMultipleGallery(multipleMediaGallery)

        });


        $('#multipleMediaForm').on('submit', function(event) {
            event.preventDefault();
            // alert('ok')
            var selectimage = $('input[name="selectimage"]:checked');
            var brandMediaSelectArea = $('#brandMediaSelectArea');
            var brandMediaArea = $('#brandMediaArea');

            // var fullUrl = selectimage.data('urlfull');
            // var smallUrl = selectimage.data('urlsmall');
            // var mediumUrl = selectimage.data('urlmedium');
            // var largeUrl = selectimage.data('urllarge');
            var urlfull = [];
            var urlsmall = [];
            var urlmedium = [];
            var urllarge = [];

            $.each(selectimage, function() {
                urlfull.push($(this).data('urlfull'));
                urlsmall.push($(this).data('urlsmall'));
            });

            // console.log(data);

            var productSliderMediaArea = $('#productSliderMediaArea');

            $.each(urlfull, function(key, value) {
                console.log(value);

                productSliderMediaArea.append(`<div class="selectedProductImageMedia p-1" style="text-align:center">
                                        <img src="${value}" alt="" class="img-responsive p-2 img-thumbnail" style="width:150px;height:150px" > <br>
                                        <button  type="button" class="selectedProductImageMediaCloseButton btn btn-danger btn-sm mt-1"> Close</button>
                                        <input type="hidden" name="fullsizeimages[]" value="${value}">
                                    </div>`);
            });
            $multipleMediaModal.modal('hide');

        });
        $(document).on('click', '.selectedProductImageMediaCloseButton', function() {
            $(this).parent().remove()
        });
    </script>
@endpush
