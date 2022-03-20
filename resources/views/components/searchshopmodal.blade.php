<!-- Modal -->
<div class="modal" id="searchShopModal" tabindex="-1" aria-labelledby="searchShopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchShopModalLabel">Shop Loation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="header-search hs-simple d-flex justify-content-center"
                    style="max-width: 100%; margin-right:0">
                    <form class="input-wrapper w-100"
                        style="position: relative" id="searchFrom">
                        {{-- @csrf --}}
                        {{-- <label class="form-label" for="shopSearchInpur" style="padding: 5px 5px; font-weight:bold; margin-top:5px">Search e: </label> --}}
                        <input type="text" class="form-control" name="shopSearchKeyword" autocomplete="off"
                            placeholder="Search you shop ..." id="shopSearchInpur" />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>

                <div id="modalShopSearchResultDiv">
                    {{-- <ul class="list-group my-4">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple
                            success list group item</a>
                    </ul> --}}


                    {{-- <div class="container-fluid p-0 my-2">
                        <div class="row">
                            <div class="col-6">
                                <a href="#">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/blog/2col/1.jpg') }}"
                                                    style="width: 150px" class="img-fluid rounded-start mt-1" alt="...">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <h6 class="card-title">Card title</h6>
                                                    <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                                        <i class="d-icon-map mr-2"></i>skdjfk
                                                    </p>
                                                    <p class="text-muted mb-0" style="font-size: 1.3rem">
                                                        <i class="far fa-building mr-2"></i>Basun Dara shopin complex
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/blog/2col/1.jpg') }}"
                                                    style="width: 150px" class="img-fluid rounded-start mt-1" alt="...">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <h6 class="card-title">Card title</h6>
                                                    <p class="text-muted text-truncate mb-0" style="font-size: 1.2rem">
                                                        <i class="d-icon-map mr-2"></i>skdjfk
                                                    </p>
                                                    <p class="text-muted mb-0" style="font-size: 1.3rem">
                                                        <i class="far fa-building mr-2"></i>Basun Dara shopin complex
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="d-flex justify-content-center my-4" style="display:none !important" id="searchShopPreloader">
                        <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
