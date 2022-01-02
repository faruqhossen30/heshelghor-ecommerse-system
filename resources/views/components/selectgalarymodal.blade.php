@php
$user = auth()
    ->guard('marchant')
    ->user();
$galleries = $user->getMedia();

@endphp

<div class="modal" id="gallerymodal" tabindex="-1" aria-labelledby="scrollableModalTitle" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Modal title</h5>
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
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    @foreach ($galleries as $gallery)
                                    <div class="col-md-3">
                                        <label class="image-checkbox">
                                            <img class="img-responsive border border-secondary my-1" src="{{$gallery->getUrl()}}" style="max-width: 100%; height:auto;" >
                                            <input name="image[]" value="" type="checkbox">
                                            {{-- <i class="fa fa-check hidden"></i> --}}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="col-4">
                                ssdf
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="upload">
                        <div class="row">
                            <div class="col-8">
                                Upload Media
                            </div>

                            <div class="col-4">
                                ssdf
                            </div>
                        </div>
                    </div>
                </div>





            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" >Crop & Save</button>

            </div>
        </div>
    </div>
</div>
