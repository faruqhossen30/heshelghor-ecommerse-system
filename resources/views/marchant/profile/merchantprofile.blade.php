@extends('marchant.layouts.app')
@section('content')

    <x-mediamodal />
        <x-gallerycropmodal />
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Merchant Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">HeshelGhor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">
                                @if ($merchant->photo)
                                    <img src="{{ $merchant->photo }}" class="rounded-circle avatar-xl img-thumbnail"
                                        alt="profile-image">
                                @else
                                    <img src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg"
                                        class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                @endif

                                <h4 class="mt-3 mb-0">{{ $merchant->name }}</h4>
                                <p class="text-muted">{{ $merchant->email }}</p>

                                <button type="button"
                                    class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                                <button type="button"
                                    class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                                <div class="text-start mt-3">
                                    <h4 class="font-13 text-uppercase">About Me :</h4>
                                    <p class="text-muted font-13 mb-3">
                                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type.
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Full Name :</th>
                                                    <td class="text-muted">{{ $merchant->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile :</th>
                                                    <td class="text-muted">{{ $merchant->phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email :</th>
                                                    <td class="text-muted">{{ $merchant->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address :</th>
                                                    <td class="text-muted">{{ $merchant->address }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <ul class="social-list list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end card-box -->


                    </div> <!-- end col-->

                    <div class="col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills navtab-bg">
                                    <li class="nav-item">
                                        <a href="#about-me" data-bs-toggle="tab" aria-expanded="true"
                                            class="nav-link ms-0 active">
                                            <i class="mdi mdi-face-profile me-1"></i>About Me
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false"
                                            class="nav-link">
                                            <i class="mdi mdi-cog me-1"></i>Edit Information
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane show active" id="about-me">

                                        <h5 class="mb-4 text-uppercase">Information</h5>





                                    </div>
                                    <!-- end timeline content-->

                                    <div class="tab-pane" id="settings">
                                        <form action="{{ route('merchant.profile.update', $merchant->id) }}" method="POST">
                                            @csrf
                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-account-circle me-1"></i> Personal Info</h5>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="firstname" class="form-label">Full Name</label>
                                                        <input name="name" value="{{ $merchant->name }}" type="text"
                                                            class="form-control" id="firstname"
                                                            placeholder="Enter FUll Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="lastname" class="form-label">Mobile</label>
                                                        <input name="phone_number" value="{{ $merchant->phone_number }}"
                                                            type="text" class="form-control" id="email"
                                                            placeholder="Mobile">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="userbio" class="form-label">
                                                            <Address>Address</Address>
                                                        </label>
                                                        <textarea name="address" class="form-control" id="userbio"
                                                            rows="4"
                                                            placeholder="Enter Full Address">{{ $merchant->address }}</textarea>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-0">
                                                        <label for="Email" class="form-label">
                                                            <Address>Email</Address>
                                                        </label>
                                                        <input value="{{ $merchant->email }}" type="text" readonly
                                                            class="form-control" id="Email" placeholder="Email">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->



                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-office-building me-1"></i> Others Info</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="NIDNo" class="form-label">NID No</label>
                                                        <input name="nid_no" value="{{ $merchant->nid_no }}" type="text"
                                                            class="form-control" id="NIDNo" placeholder="National ID No">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="PINNo" class="form-label">TIN No</label>
                                                        <input name="tin_no" value="{{ $merchant->tin_no }}" type="text"
                                                            class="form-control" id="PINNo" placeholder="TIN No">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->



                                            <div class="mb-3">
                                                <h4 class="header-title">Profile Photo</h4>
                                                <div id="profilePhoto" style="width: 100%; border:1px dashed gray"
                                                    class="text-center my-2">

                                                    <i class="mdi mdi-image h1 text-secondary"></i>
                                                    <p>Select Photos</p>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div id="profileMediaArea">

                                                        <div id="selectedBrandMedia" class="text-center">
                                                            <h5>Profile Photo</h5>
                                                            <img src="{{ $merchant->photo }}" alt=""
                                                                class="img-responsive p-2" style="width:100px;height:100px">
                                                            <input type="hidden" name="photo"
                                                                value="{{ $merchant->photo }}">
                                                            <button id="selectedBrandMediaButton" type="button"
                                                                class="btn btn-danger"> Close</button>
                                                        </div>

                                                </div>
                                            </div>



                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mt-2"><i
                                                        class="mdi mdi-content-save"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end settings content-->

                                </div> <!-- end tab-content -->
                            </div>
                        </div> <!-- end card-->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('css')

@endpush

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .preview img {
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
        function getGallery(mediaGallery) {
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

        $(document).ready(function() {
                $('#profilePhoto').hide();

            var mediaGallery = $('#mediaGallery');
            $mediaModal = $('#mediaModal');
            $('#profilePhoto').on('click', function() {
                $mediaModal.modal('show');
                getGallery(mediaGallery);
            });

            $('#mediaForm').on('submit', function(event) {
                event.preventDefault();
                var selectimage = $('input[name="selectimage"]:checked');
                var profileMediaArea = $('#profileMediaArea');

                var fullUrl = selectimage.data('urlfull');

                var profileMediaArea = $('#profileMediaArea');

                profileMediaArea.append(`<div id="selectedBrandMedia" class="text-center">
                                    <h5>Profile Photo</h5>
                                    <img src="${fullUrl}" alt="" class="img-responsive p-2" style="width:100px;height:100px">
                                    <input type="hidden" name="photo" value="${fullUrl}">
                                    <button  id="selectedBrandMediaButton" type="button" class="btn btn-danger"> Close</button>
                                </div>`);
                $('#profilePhoto').hide();
                $mediaModal.modal('hide');



            });
            $(document).on('click', '#selectedBrandMediaButton', function() {
                $('#profilePhoto').show();
                $(this).parent().remove();
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
