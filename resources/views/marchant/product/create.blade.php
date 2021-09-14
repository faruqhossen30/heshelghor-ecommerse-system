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

                                <li class="nav-item">
                                    <a href="#metadata" class="nav-link" data-bs-toggle="tab" data-toggle="tab">
                                        <span class="number">03</span>
                                        <span class="d-none d-sm-inline">Meta Data</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane" id="general-info">
                                    <h4 class="header-title">General Information</h4>
                                    <p class="sub-header">Fill all information below</p>

                                    <div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="product-name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="product-name" class="form-control" placeholder="e.g : Apple iMac">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="product-reference" class="form-label">Reference <span class="text-danger">*</span></label>
                                                    <input type="text" id="product-reference" class="form-control" placeholder="e.g : Apple iMac">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="product-description" class="form-label">Product Description <span class="text-danger">*</span></label>
                                            <div id="snow-editor" style="height: 200px;"></div> <!-- end Snow-editor-->
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="product-summary" class="form-label">Product Summary</label>
                                                    <textarea class="form-control" id="product-summary" rows="5" placeholder="Please enter summary"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="product-category" class="form-label">Categories <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" id="product-category">
                                                        <option>Select</option>
                                                        <optgroup label="Shopping">
                                                            <option value="SH1">Shopping 1</option>
                                                            <option value="SH2">Shopping 2</option>
                                                            <option value="SH3">Shopping 3</option>
                                                            <option value="SH4">Shopping 4</option>
                                                        </optgroup>
                                                        <optgroup label="CRM">
                                                            <option value="CRM1">Crm 1</option>
                                                            <option value="CRM2">Crm 2</option>
                                                            <option value="CRM3">Crm 3</option>
                                                            <option value="CRM4">Crm 4</option>
                                                        </optgroup>
                                                        <optgroup label="eCommerce">
                                                            <option value="E1">eCommerce 1</option>
                                                            <option value="E2">eCommerce 2</option>
                                                            <option value="E3">eCommerce 3</option>
                                                            <option value="E4">eCommerce 4</option>
                                                        </optgroup>

                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product-price" class="form-label">Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="product-price" placeholder="Enter amount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-2">Status <span class="text-danger">*</span></label>
                                            <br/>
                                            <div class="radio form-check-inline">
                                                <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                                <label for="inlineRadio1"> Online </label>
                                            </div>
                                            <div class="radio form-check-inline">
                                                <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                                <label for="inlineRadio2"> Offline </label>
                                            </div>
                                            <div class="radio form-check-inline">
                                                <input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                                                <label for="inlineRadio3"> Draft </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="form-label">Comment</label>
                                            <textarea class="form-control" rows="3" placeholder="Please enter comment"></textarea>
                                        </div>
                                    </div>

                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="next list-inline-item">
                                            <button type="button" class="btn btn-success">Add More Info <i class="mdi mdi-arrow-right ms-1"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="product-img">
                                    <h4 class="header-title">Product Images</h4>
                                    <p class="sub-header">Upload product image</p>

                                    <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                        data-upload-preview-template="#uploadPreviewTemplate">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>

                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                            <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                                <strong>not</strong> actually uploaded.)</span>
                                        </div>
                                    </form>

                                    <!-- Preview -->
                                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="previous list-inline-item">
                                            <button type="button" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Back to General </button>
                                        </li>
                                        <li class="next list-inline-item">
                                            <button type="button" class="btn btn-success">Add Meta Data <i class="mdi mdi-arrow-right ms-1"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="metadata">
                                    <h4 class="header-title">Meta Data</h4>
                                    <p class="sub-header">Fill all information below</p>

                                    <form>
                                        <div class="mb-3">
                                            <label for="product-meta-title" class="form-label">Meta title</label>
                                            <input type="text" class="form-control" id="product-meta-title" placeholder="Enter title">
                                        </div>

                                        <div class="mb-3">
                                            <label for="product-meta-keywords" class="form-label">Meta Keywords</label>
                                            <input type="text" class="form-control" id="product-meta-keywords" placeholder="Enter keywords">
                                        </div>

                                        <div>
                                            <label for="product-meta-description" class="form-label">Meta Description </label>
                                            <textarea class="form-control" rows="5" id="product-meta-description" placeholder="Please enter description"></textarea>
                                        </div>
                                    </form>

                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="previous list-inline-item">
                                            <button type="button" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Edit Information </button>
                                        </li>
                                        <li class="list-inline-item">
                                            <button type="submit" class="btn btn-success">Publish Product <i class="mdi mdi-arrow-right ms-1"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
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
<!-- For create page  -->
<link href="{{ asset('backend')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend')}}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend')}}/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend')}}/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
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
