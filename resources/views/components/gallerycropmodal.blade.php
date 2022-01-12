<div class="modal" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static" >
    <div class="modal-dialog modal-lg" style="height: 90vh">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8" style="position: relative; max-height:100%">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" style="position: absolute; max-height:100%">
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-center">Final Image</h4>
                            <hr>
                            <div class="preview" style="margin: 0 auto"></div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display: flex; justify-content:space-between">
                <div>
                    {{-- <div class="btn-group">
                                        <button type="button" class="btn btn-success" data-method="move"
                                            data-option="-10" data-second-option="0" title="Move Left">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(-10, 0)">
                                                <span class="fa fa-arrow-left"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="move"
                                            data-option="10" data-second-option="0" title="Move Right">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(10, 0)">
                                                <span class="fa fa-arrow-right"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="move" data-option="0"
                                            data-second-option="-10" title="Move Up">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(0, -10)">
                                                <span class="fa fa-arrow-up"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-success" data-method="move" data-option="0"
                                            data-second-option="10" title="Move Down">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                                data-original-title="cropper.move(0, 10)">
                                                <span class="fa fa-arrow-down"></span>
                                            </span>
                                        </button>
                                    </div> --}}
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" data-method="rotate" data-option="-45"
                            title="Rotate Left" id="roatedMinus">
                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                data-original-title="cropper.rotate(-45)">
                                <span class="fa fa-undo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-success" data-method="rotate" data-option="45"
                            title="Rotate Right" id="roatedPlus">
                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                data-original-title="cropper.rotate(45)">
                                <span class="fa fa-redo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-success" data-method="reset" title="Reset"
                            id="roatedReset">
                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                data-original-title="cropper.reset()" aria-describedby="tooltip78370">
                                <span class="fa fa-sync-alt"></span>
                            </span>
                        </button>


                    </div>

                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop & Save</button>

                    <button id="uploadingbutton" class="btn btn-success" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Uploading ...
                      </button>
                </div>
            </div>
        </div>
    </div>
</div>
