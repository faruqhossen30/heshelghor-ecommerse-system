<div class="modal" id="mediaCropModal" tabindex="-1" aria-labelledby="mediaCropModalLabel" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaCropModalLabelLabel">Media Crop Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="mediaCropModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="mediaimage" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-center">Final Image</h4>
                            <hr>
                            <div class="preview" style="margin: 0 auto"></div>
                            <hr>
                            <div class="row">
                                {{-- <div class="col-10" style="margin: 0 auto">
                                    <select class="form-select" name="collectionname" id="">
                                        <option value="none">None</option>
                                        <option value="brand">brand</option>
                                        <option value="product">product</option>
                                    </select>
                                </div> --}}
                            </div>
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
                            title="Rotate Left" id="mediaroatedMinus">
                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                data-original-title="cropper.rotate(-45)">
                                <span class="fa fa-undo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-success" data-method="rotate" data-option="45"
                            title="Rotate Right" id="mediaroatedPlus">
                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                data-original-title="cropper.rotate(45)">
                                <span class="fa fa-redo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-success" data-method="reset" title="Reset"
                            id="mediaroatedReset">
                            <span class="docs-tooltip" data-toggle="tooltip" title=""
                                data-original-title="cropper.reset()" aria-describedby="tooltip78370">
                                <span class="fa fa-sync-alt"></span>
                            </span>
                        </button>
                    </div>

                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="mediaCropModal">Close</button>
                    <button type="button" class="btn btn-primary" id="mediacrop">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
