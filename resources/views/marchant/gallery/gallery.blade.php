@extends('marchant.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <x-gallerycropmodal/>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <h4 class="page-title">Gallery</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('homepage')}}">Heshelghor</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                                <li class="breadcrumb-item active">Gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Filter -->
            <div class="row">
                <div class="row">
                    <p>
                        <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#uploadCollapse" role="button"
                            aria-expanded="false" aria-controls="uploadCollapse">
                            Add Image
                        </a>

                    </p>
                    <div class="collapse" id="uploadCollapse">
                        <div class="card card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div style="display: flex; justify-content:space-between" class="my-1">
                                        <label class="control-label text-center">Select Image For Upload</label>
                                        <button class="btn btn-danger btn-sm" id="collapseClose"
                                            type="button">Close</button>
                                    </div>
                                    <div class="preview-zone hidden">
                                        <div class="box box-solid">
                                            <div class="box-body"></div>
                                        </div>
                                    </div>
                                    <div class="dropzone-wrapper">
                                        <div class="dropzone-desc">
                                            <i class="glyphicon glyphicon-download-alt"></i>
                                            <p>Choose an image file or drag it here.</p>
                                        </div>
                                        <input type="file" name="photomedia" id="image" class="dropzone image">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->

            <div class="row filterable-content" style="opacity: 1;">


                @foreach ($galleries as $gallery)


                <div class="col-xs-2 col-sm-3 col-xl-2 filter-item all web illustrator p-1" style="">
                        <form action="{{route('merchant.delete.gallery', $gallery->id)}}" method="POST">
                            @csrf
                        <div class="gal-box">
                            <a href="{{ $gallery->getUrl() }}" class="image-popup" title="Screenshot-1">
                                <img src="{{ $gallery->getUrl() }}" class="img-fluid img-thumbnail" alt="work-thumbnail">
                            </a>
                            <div class="gall-info py-1" style="display: flex; justify-content:space-between">
                                <button type="button" class="border-0 text-success"><i class="mdi mdi-eye-check"></i></button>
                                <button class="border-0 text-danger" onclick="return confirm('Are You Sure Delete Photo ?');"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div> <!-- gallery info -->

                        </div> <!-- end gal-box -->
                    </form>
                    </div> <!-- end col -->
                @endforeach




            </div>
            <!-- end row -->

        </div>
    </div> <!-- content -->
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/libs/magnific-popup/magnific-popup.css">

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
@endpush
@push('scripts')
<script src="{{asset('js/merchantgallerycrop.js')}}"></script>
{{-- <script src="{{asset('js/merchantmediacrop.js')}}"></script> --}}
@endpush
