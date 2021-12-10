@extends('user.layouts.app')
@section('content')
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-8 col-xl-8 offset-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                        class="mdi mdi-account-circle me-1"></i> Update Personal Info</h5>
                                                <form action="{{ route('user.account.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="Id" class="form-label">Upload
                                                                        photo</label>
                                                                    <input name="photo" type="file"
                                                                        class="form-control dropify"
                                                                        data-show-errors="true"
                                                                        data-errors-position="outside"
                                                                        data-allowed-file-extensions="jpg jpeg png bmp"
                                                                        data-max-file-size-preview="1M" id="photo">
                                                                </div>
                                                                <div class="col-md-6 ">

                                                                    <img class="img-thumbnail rounded-circle mt-3"
                                                                        src="{{ asset('uploads/user/profile/' . $user->photo) }}"
                                                                        alt="" style="width: 150px; height:150px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="firstname" class="form-label">Full
                                                                    Name</label>
                                                                <input type="text" name="name" value="{{ $user->name }}"
                                                                    class="form-control" id="firstname"
                                                                    placeholder="Enter Full name">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="firstname" class="form-label">Address
                                                                </label>
                                                                <input required type="text" name="address"
                                                                    value="{{ $user->address }}" class="form-control"
                                                                    id="firstname" placeholder="Enter Full name">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-2">
                                                                <label for="userbio" class="form-label">Bio</label>
                                                                <textarea name="bio" class="form-control" id="userbio"
                                                                    rows="4"
                                                                    placeholder="Write something...">{{ $user->bio }}</textarea>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="mobile" class="form-label">Mobile</label>
                                                                <input disabled type="text" name="mobile"
                                                                    value="{{ $user->mobile }}" class="form-control"
                                                                    id="mobile" placeholder="Enter mobile number">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="useremail" class="form-label">Email
                                                                    Address</label>
                                                                <input disabled type="email" name="email"
                                                                    value="{{ $user->email }}" class="form-control"
                                                                    id="useremail" placeholder="Enter email">
                                                                <span class="form-text text-muted"><small>If you want to
                                                                        change email please <a
                                                                            href="javascript: void(0);">click</a>
                                                                        here.</small></span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->
                                                    <div class="text-start">
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light mt-2"><i
                                                                class="mdi mdi-content-save"></i> Save</button>
                                                    </div>



                                                    {{-- <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="social-fb" class="form-label">Facebook</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                                                    <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="social-tw" class="form-label">Twitter</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                                    <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="social-insta" class="form-label">Instagram</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                                    <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="social-lin" class="form-label">Linkedin</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>

                                                                    <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="social-sky" class="form-label">Skype</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                                                    <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="social-gh" class="form-label">Github</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="fab fa-github"></i></span>

                                                                    <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row --> --}}


                                                </form>
                                                <!-- end settings content-->
                                            </div>
                                        </div> <!-- end card-->

                                    </div> <!-- end col -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <style>
        .dropify-message .file-icon p {
            font-size: 14px;
        }

        .dropify-wrapper {
            width: 150px;
            height: 150px;
        }

    </style>
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
    {{-- Dropify --}}
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop profile new photo or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>

@endpush
