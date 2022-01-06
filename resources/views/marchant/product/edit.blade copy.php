@extends('marchant.layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Edit Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
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
                            <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Title --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="product-name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                            <input required type="text" name="title" id="product-name" class="form-control @error('title') is-invalid @enderror"  value="{{ $product->title}}">
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
                                            <label for="product-name" class="form-label">Category <span class="text-danger">*</span></label>
                                                <select name="category_id" value="{{$product->category_id}}" class="form-control" id="product-category">
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
                                                <select name="brand_id" value="{{$product->brand_id}}" class="form-control" id="brand_id">
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
                                    <label for="product-summary" class="form-label">Product Summary</label>
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
                                        <div class="mt-1 card card-body">
                                            <h5 class="font-14 mb-2">Select Color<span class="text-danger">*</span></h5>
                                            @foreach ($colors as $color)
                                                <div class="form-check">
                                                    <input @if (in_array(['color_id'=>$color->id], $colorArray)) checked @endif name="colors[]" class="form-check-input @error('colors') is-invalid @enderror"  type="checkbox" value="{{ $color->id }}"  id="flexCheckDefault{{ $color->id }}">
                                                    <label class="form-check-label" for="flexCheckDefault{{ $color->id }}">
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
                                            <h5 class="font-14 mb-2">Select Size<span class="text-danger">*</span>
                                            </h5>
                                            @foreach ($sizes as $size)
                                                <div class="form-check">
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
                                <div class="mb-3 row">
                                    <label for="formFile" class="form-label">
                                        <h4 class="header-title">Product Images</h4>
                                        <p class="sub-header">Image size should be ( width: 800px height: 800px )</p>

                                    </label>
                                    <div class="col-3">
                                        <input name="photo" class="form-control dropify @error('photo') is-invalid @enderror" type="file" id="formFile"
                                        data-show-errors="true" data-errors-position="outside"
                                        data-allowed-file-extensions="jpg jpeg png bmp" data-max-file-size-preview="3M" data-max-file-size="1M"
                                        >
                                    </div>
                                    <div class="col-3">
                                        <small style="display: block">Product Photo</small>
                                        <img style="width: 130px; height:130px" class="img-thumbnail" src="{{asset('/uploads/product/'.$product->photo)}}" alt="photo">
                                    </div>
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
                                        <p class="sub-header m-0">Image size should be ( width: 800px height: 800px )</p>
                                       @foreach ($images as $item)
                                        <img class="avatar-lg rounded bg-light" src="{{asset('uploads/products/'.$item->image)}}" alt="photo">
                                       @endforeach

                                    </label>
                                    <input name="image[]" class="form-control @error('image') is-invalid @enderror"
                                        type="file" id="formFileMultiple" multiple>
                                    <div class="text-danger">
                                        @error('image')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Product <i
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
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <!-- Dropzone file uploads-->
    <script src="{{ asset('backend') }}/assets/libs/dropzone/min/dropzone.min.js"></script>

    <!-- Init js-->
    <script src="{{ asset('backend') }}/assets/js/pages/form-fileuploads.init.js"></script>

    <!-- Init js -->
    <script src="{{ asset('backend') }}/assets/js/pages/add-product.init.js"></script> {{-- Edit this line for js error --}}
    <script src="{{ asset('js/product.js') }}"></script>
    {{-- Dorpyfi --}}
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop product new photo or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>

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

        })
    </script>
@endpush
