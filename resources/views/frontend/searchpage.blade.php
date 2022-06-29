@extends('frontend.layouts.app')

@section('content')
    <input type="hidden" name="minprice" value="{{ $minPrice }}">
    <input type="hidden" name="maxprice" value={{ $maxPrice }}>
    <!-- breadcrumb start -->
    <div class="bradcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb" class="d-flex justify-content-between">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                        <ol class="breadcrumb">
                            @if (isset($_GET['keyword']))
                                <span>Searching your item <strong>{{ $_GET['keyword'] }}</strong></span>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb end -->

    <!-- product start -->
    <div class="product-area">
        <div class="container">
            <form action="" method="GET">
                <div class="row">
                    @if (count($products)>0)
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="search-sidebar">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <span class="text-secondary fs-6 location" data-bs-toggle="modal"
                                        data-bs-target="#location">Select Your Location</span>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="location" tabindex="-1" aria-labelledby="location"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="location">Your Location</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="">All Bangladesh</a>
                                                <hr>
                                                <ul class="location">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="search-location-left">
                                                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab"
                                                                    role="tablist" aria-orientation="vertical">
                                                                    <h5>Citis</h5>
                                                                    <button class="nav-link active" id="pill-1"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-1"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-1" aria-selected="true">
                                                                        <span>Dhaka</span>
                                                                        <span><i class="fa-solid fa-angle-right"></i></span>
                                                                    </button>
                                                                    <button class="nav-link" id="pill-2"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-2"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-2" aria-selected="false">
                                                                        <span>Chattogram</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-3"
                                                                        data-bs-toggle="pill" data-bs-target="#paii-tab-3"
                                                                        type="button" role="tab"
                                                                        aria-controls="paii-tab-3" aria-selected="false">
                                                                        <span>Sylhet</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-4"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-4"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-4" aria-selected="false">
                                                                        <span>Khulna</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-5"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-5"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-5" aria-selected="false">
                                                                        <span>Barishal</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-6"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-6"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-6" aria-selected="false">
                                                                        <span>Rajshahi</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-7"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-7"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-7" aria-selected="false">
                                                                        <span>Rangpur</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-8"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-8"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-8" aria-selected="false">
                                                                        <span>Mymensingh</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>

                                                                    <h5>Divisions</h5>

                                                                    <button class="nav-link" id="pill-9"
                                                                        data-bs-toggle="pill" data-bs-target="#pill-tab-9"
                                                                        type="button" role="tab"
                                                                        aria-controls="pill-tab-9" aria-selected="false">
                                                                        <span>Dhaka Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-10"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-10" type="button"
                                                                        role="tab" aria-controls="pill-tab-10"
                                                                        aria-selected="false">
                                                                        <span>Chattogram
                                                                            Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-11"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-11" type="button"
                                                                        role="tab" aria-controls="pill-tab-11"
                                                                        aria-selected="false">
                                                                        <span>Sylhet Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-12"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-12" type="button"
                                                                        role="tab" aria-controls="pill-tab-12"
                                                                        aria-selected="false">
                                                                        <span>Khulna Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-13"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-13" type="button"
                                                                        role="tab" aria-controls="pill-tab-13"
                                                                        aria-selected="false">
                                                                        <span>Rajshahi
                                                                            Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span></button>
                                                                    <button class="nav-link" id="pill-14"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-14" type="button"
                                                                        role="tab" aria-controls="pill-tab-14"
                                                                        aria-selected="false">
                                                                        <span>Rangpur Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span>
                                                                    </button>
                                                                    <button class="nav-link" id="pill-15"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-15" type="button"
                                                                        role="tab" aria-controls="pill-tab-15"
                                                                        aria-selected="false">
                                                                        <span>Barishal Division</span>
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </button>
                                                                    <button class="nav-link" id="pill-16"
                                                                        data-bs-toggle="pill"
                                                                        data-bs-target="#pill-tab-16" type="button"
                                                                        role="tab" aria-controls="pill-tab-16"
                                                                        aria-selected="false">
                                                                        <span>Mymensingh Division</span>
                                                                        <span><i
                                                                                class="fa-solid fa-angle-right"></i></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="pill-tab-1"
                                                                    role="tabpanel" aria-labelledby="pill-1">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-2"
                                                                    role="tabpanel" aria-labelledby="pill-2">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="paii-tab-3"
                                                                    role="tabpanel" aria-labelledby="pill-3">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-4"
                                                                    role="tabpanel" aria-labelledby="pill-4">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-5"
                                                                    role="tabpanel" aria-labelledby="pill-5">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-6"
                                                                    role="tabpanel" aria-labelledby="pill-6">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-7"
                                                                    role="tabpanel" aria-labelledby="pill-7">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-8"
                                                                    role="tabpanel" aria-labelledby="pill-8">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-9"
                                                                    role="tabpanel" aria-labelledby="pill-9">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-10"
                                                                    role="tabpanel" aria-labelledby="pill-10">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-11"
                                                                    role="tabpanel" aria-labelledby="pill-11">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-12"
                                                                    role="tabpanel" aria-labelledby="pill-12">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-13"
                                                                    role="tabpanel" aria-labelledby="pill-13">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-14"
                                                                    role="tabpanel" aria-labelledby="pill-14">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-15"
                                                                    role="tabpanel" aria-labelledby="pill-15">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pill-tab-16"
                                                                    role="tabpanel" aria-labelledby="pill-16">
                                                                    <h5>Select local area in Dhaka</h5>
                                                                    <h6>Popular areas</h6>
                                                                    <ul class="local-area">
                                                                        <li>mirpur</li>
                                                                        <li>Uttara</li>
                                                                        <li>farmgate</li>
                                                                        <li>gulshan</li>
                                                                    </ul>
                                                                    <hr>
                                                                    <span>Select others areas</span>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect03"
                                                                            aria-label="Example select with button addon">
                                                                            <option selected>Choose other area...
                                                                            </option>
                                                                            <option value="1">mirpur</option>
                                                                            <option value="2">Uttara</option>
                                                                            <option value="3">farmgate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header">
                                    <span class="text-secondary fs-6">Categories</span>
                                </div>
                                <ul class="expandible">
                                    @foreach ($categories as $category)
                                        <li>
                                            <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                                onchange="this.form.submit()"
                                                @if (isset($_GET['category']) && in_array($category->id, $_GET['category'])) checked @endif />
                                            <label>{{ $category->name }}</label><br>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header">
                                    <span class="text-secondary fs-6">Brand</span>
                                </div>
                                <ul class="expandible">
                                    @foreach ($brands as $brand)
                                        <li>
                                            <input type="checkbox" name="brand[]" value="{{ $brand->id }}"
                                                onchange="this.form.submit()"
                                                @if (isset($_GET['brand']) && in_array($brand->id, $_GET['brand'])) checked @endif />
                                            <label> {{ $brand->name }}</label><br>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="card mb-2">
                                <div class="card-header mb-3">
                                    <span class="text-secondary fs-6">Price</span>
                                </div>
                                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                <div class="price-range"><strong>৳</strong>
                                    <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');"
                                        id="min_price" class="price-range-field" /><strong>৳</strong>
                                    <input type="number" name="maxprice" value="0" min=0 max="10000"
                                        oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field"
                                        onchange="this.form.submit()" />

                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-12 col-md-12 not-found">
                        <div class="product-page">
                            <div class="product-sort-sytem d-flex justify-content-between mb-3">
                                <div class="product-sort-left">
                                    <label for="" style="font-size: 12px;">SORT BY : </label>
                                    <select name="price" onchange="this.form.submit()">
                                        <option value="">Latest</option>
                                        <option @if (isset($_GET['price']) && $_GET['price'] == 'desc') selected @endif value="desc">High
                                            To
                                            Low
                                        </option>
                                        <option @if (isset($_GET['price']) && $_GET['price'] == 'asc') selected @endif value="asc">Low To
                                            High
                                        </option>
                                    </select>
                                </div>
                                <div class="product-sort-right d-flex align-items-center">
                                    <div class="product-show-count">
                                        <label for="" style="font-size: 12px;">SHOW : </label>
                                        <select name="count" onchange="this.form.submit()">
                                            <option selected value="30">30</option>
                                            <option @if (isset($_GET['count']) && $_GET['count'] == '40') selected @endif value="40">40
                                            </option>
                                            <option @if (isset($_GET['count']) && $_GET['count'] == '50') selected @endif value="40">50
                                            </option>
                                        </select>
                                    </div>
                                    <div class="product-filter-grid">
                                        <a href="#"><span class="grid"> <i
                                                    class="fa-solid fa-border-none"></i></span></a>
                                        <a href="#"><span class="list"><i class="fas fa-list-ul"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                                        <div class="single-product ">
                                            <div class="product-photo position-relative">
                                                <img data-src="{{ $product->img_small }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('frontend/images/placeholder.jpg') }}';"
                                                    data-placeholder-background="white" alt="product_img"
                                                    class="product_img lozad">
                                                <div class="product-offers">
                                                    @if ($product->discount > 0)
                                                        <span>{{ $product->discount }}% off</span>
                                                    @endif
                                                    <span class="new_product">new</span>
                                                </div>

                                                <div class="product-btn">
                                                    <button type="button" class="quickviewbutton"
                                                        data-productid="{{ $product->id }}">quick view</button>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <a href="{{ route('singleproduct', $product->slug) }}"
                                                    class="product_title">
                                                    <h5 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="{{ $product->title }}">{{ $product->title }}</h5>
                                                </a>
                                                <div class="product-price">
                                                    <span class="text-dark">৳{{ $product->price }}
                                                        @if ($product->discount > 0)
                                                            <del
                                                                class="text-secondary">৳{{ ($product->regular_price * $product->discount) / 100 + $product->regular_price }}</del>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="product-ratting ">
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <span class="text-secondary fs-6">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row my-3">
                                    {{ $products->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="not-found-product text-center d-flex justify-content-center align-items-center pb-5"
                    style="height: 100%">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                            fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                        <h3>No item found</h3>
                    </span>
                </div>
                    @endif


                </div>
            </form>
        </div>
    </div>

    <!-- product end -->
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css"
        media="all" />
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

    @include('frontend.script.pricerangescript')

    <script>
        $('ul.expandible').each(function() {
            var $ul = $(this),
                $lis = $ul.find('li:gt(9)'),
                isExpanded = $ul.hasClass('expanded');
            $lis[isExpanded ? 'show' : 'hide']();

            if ($lis.length > 0) {
                $ul
                    .append($('<span class="showmore"><li class="expand">' + (isExpanded ? 'Show Less' :
                            'Show More') + '</li></span>')
                        .click(function(event) {
                            var isExpanded = $ul.hasClass('expanded');
                            event.preventDefault();
                            $(this).html(isExpanded ? 'Show More' : 'Show Less');
                            $ul.toggleClass('expanded');
                            $lis.toggle();
                        }));
            }
        });
    </script>

    @include('frontend.script.pricerangescript')
@endpush
