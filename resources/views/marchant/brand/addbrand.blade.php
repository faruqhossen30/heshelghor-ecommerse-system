@extends('marchant.layouts.app')

@section('content')
    <div class="content">
        <x-mediamodal />
        <x-gallerycropmodal />
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Create Brand</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Brand List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data" class="form-horizontal"
                role="form" id="addBrandFrorm">
                @csrf
                <div id="addBrandFrormMedia">

                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <a href="{{ route('brand.index') }}" class="btn btn-success mb-2"><i
                                                class="mdi mdi-format-list-bulleted me-1"></i> All Brand</a>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{-- <h4 class="header-title">Create Brand </h4> --}}
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="p-2">

                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Brand Name<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-md-10">
                                                                    <input name="name" type="text" id="simpleinput"
                                                                        class="form-control @error('name') is-invalid @enderror "
                                                                        placeholder="Name" value="{{ old('name') }}">
                                                                    <div class="text-danger">
                                                                        @error('name')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="example-textarea">Description<span
                                                                        class="text-danger">*</span> </label>
                                                                <div class="col-md-10">
                                                                    <textarea name="description"
                                                                        class="form-control @error('description') is-invalid @enderror"
                                                                        id="example-textarea" rows="5"
                                                                        placeholder="Brand description...">{{ old('description') }}</textarea>
                                                                    <div class="text-danger">
                                                                        @error('description')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="mb-2 row">
                                                                <label class="col-md-2 col-form-label"
                                                                    for="simpleinput">Brand Image</label>
                                                                <div class="col-md-10">
                                                                    <input name="image" type="file" id="simpleinput"
                                                                        class="form-control @error('image') is-invalid @enderror"
                                                                        value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('image')
                                                                            <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div> --}}

                                                            <button type="submit" class="btn btn-success">Add Brand</button>


                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div> <!-- end card -->
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3"> {{-- Galary Image Start --}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-center m-0">Featured Image</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group" id="brandMediaSelectArea">
                                    <div style="display: flex; justify-content:space-between" class="my-1">
                                        <label class="control-label text-center">Select Image For Upload</label>
                                        {{-- <button class="btn btn-danger btn-sm" id="collapseClose"
                                        type="button">Close</button> --}}
                                    </div>
                                    <div class="selectmediadropzone-wrapper">
                                        <div class="selectmediadropzone-desc">
                                            <i class="mdi mdi-image h1 text-secondary"></i>
                                            <p>Select Image</p>
                                        </div>
                                        <button name="thumbnail" id="thumbnail" type="button"
                                            class="selectmediadropzone thumbnail"> Welcome </button>
                                    </div>
                                </div>
                                <div id="brandMediaArea">

                                </div>
                            </div>
                        </div>
                    </div> {{-- Galary Image End --}}
                </div>
            </form><!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection

@push('css')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
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




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

    </style>

    <script>

        // Show Gallery
        $(document).ready(function() {

            $mediaModal = $('#mediaModal');
            $('#thumbnail').on('click', function() {
                $mediaModal.modal('show');
                getGallery();
            });

            $('#mediaForm').on('submit', function(event) {
                event.preventDefault();
                var selectimage = $('input[name="selectimage"]:checked');
                var brandMediaSelectArea = $('#brandMediaSelectArea');
                var brandMediaArea = $('#brandMediaArea');

                var fullUrl = selectimage.data('urlfull');
                var smallUrl = selectimage.data('rulsmall');
                var mediumUrl = selectimage.data('urlmedium');
                var largeUrl = selectimage.data('urllarge');

                var brandMediaArea = $('#brandMediaArea');

                $('#brandMediaSelectArea').hide();
                brandMediaArea.append(`<div id="selectedBrandMedia" class="text-center">
                                        <h5>Brand Image</h5>
                                        <img src="${smallUrl}" alt="" class="img-responsive p-2">
                                        <button  id="selectedBrandMediaButton" type="button" class="btn btn-danger"> Close</button>
                                    </div>`);


                $('#addBrandFrormMedia').append(
                    `<div>
                        <input type="hidden" name="img_full" value="${fullUrl}">
                        <input type="hidden" name="img_small" value="${smallUrl}">
                        <input type="hidden" name="img_medium" value="${mediumUrl}">
                        <input type="hidden" name="img_large" value="${largeUrl}">
                    </div>`
                );
                $mediaModal.modal('hide');
                $('#selectedBrandMediaButton').on('click', function() {
                    $('#addBrandFrormMedia').empty();
                    $('#brandMediaSelectArea').show();
                    $(this).parent().remove();
                });


            });


        });
    </script>

    <script>
        // Crop Image
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var $modal = $('#modal');
            $('#uploadingbutton').hide()
            // collapse Close
            $('#collapseClose').click(function() {
                $('.collapse').collapse('hide')
            });

            var image = document.getElementById('image');
            var cropper;
            $("body").on("change", ".image", function(e) {
                $mediaModal.modal('hide');

                var files = e.target.files;
                // console.log(files);

                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {

                    file = files[0];
                    if (URL) {
                        // console.log(URL.createObjectURL)

                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        console.log(FileReader)
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });
            $modal.on('shown.bs.modal', function() {

                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 2,
                    preview: '.preview',
                    zoomOnWheel: true,
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            // For Editing Image
            $('#roatedPlus').click(function() {
                cropper.rotate(90)
            });
            $('#roatedMinus').click(function() {
                cropper.rotate(-90)
            });
            $('#roatedReset').click(function() {
                cropper.reset()
            });


            $("#crop").click(function() {
                var fileName = $('.image');
                var newFileName = fileName[0].files[0].name
                console.log();
                canvas = cropper.getCroppedCanvas({
                    width: 1000,
                    height: 1000,
                });

                canvas.toBlob((blob) => {
                    const formData = new FormData();

                    $('#uploadingbutton').show()
                    // Pass the image file name as the third parameter if necessary.
                    formData.append('croppedImage', blob, newFileName);

                    $('#footerButton').append(`
            <button class="btn btn-primary" type="button" disabled>
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            uploading .......
            </button>
            `);

                    // Use `jQuery.ajax` method for example
                    $.ajax({
                        url: '/merchant/gallary/sotre',
                        method: 'POST',
                        dataType: "json",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success(data) {
                            $modal.modal('hide');
                            $('.collapse').collapse('hide')
                            $('#uploadingbutton').hide()
                            $mediaModal.modal('show');
                            console.log(data);
                        },
                        error() {
                            console.log('Upload error');
                        },
                    });
                } /*, 'image/png' */ );
            })





        });
    </script>

@endpush
