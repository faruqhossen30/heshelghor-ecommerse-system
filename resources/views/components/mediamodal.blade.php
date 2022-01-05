@php
$user = auth()
    ->guard('marchant')
    ->user();
$galleries = $user->getMedia();

@endphp

<div class="modal" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <form action="" method="post" id="mediaForm">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediaModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#upload" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                <span class="d-none d-sm-inline-block">Upload Photo</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#mediaGallery" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                <span class="d-inline-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-inline-block">Media Gallery</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="mediaGallery">

                        </div>
                        <div class="tab-pane" id="upload">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div style="display: flex; justify-content:space-between"
                                                    class="my-1">
                                                    <label class="control-label text-center">Select Image For
                                                        Upload</label>
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
                                                    <input type="file" name="mediaImage" id="mediaImage"
                                                        class="dropzone mediaImage">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Select Image</button>

                </div>
            </div>
        </div>
    {{-- </form> --}}
</div>
