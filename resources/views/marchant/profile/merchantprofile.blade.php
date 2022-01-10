@extends('marchant.layouts.app')
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
                    <div class="col-lg-4 col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">
                                @if ($merchant->photo)
                                    <img src="{{$merchant->photo}}"
                                        class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                @else
                                    <img src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg"
                                        class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                @endif

                                <h4 class="mt-3 mb-0">{{$merchant->name}}</h4>
                                <p class="text-muted">{{$merchant->email}}</p>

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
                                                    <td class="text-muted">{{$merchant->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile :</th>
                                                    <td class="text-muted">{{$merchant->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email :</th>
                                                    <td class="text-muted">{{$merchant->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address :</th>
                                                    <td class="text-muted">{{$merchant->address}}</td>
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
                                        <form action="{{route('merchant.profile.update', $merchant->id)}}" method="POST" >
                                            @csrf
                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-account-circle me-1"></i> Personal Info</h5>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="firstname" class="form-label">Full Name</label>
                                                        <input name="name" value="{{$merchant->name}}" type="text"  class="form-control" id="firstname"
                                                            placeholder="Enter FUll Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="lastname" class="form-label">Mobile</label>
                                                        <input name="phone_number" value="{{$merchant->phone_number}}" type="text" class="form-control" id="email"
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
                                                        <textarea name="address" class="form-control" id="userbio" rows="4"
                                                            placeholder="Enter Full Address">{{$merchant->address}}</textarea>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-0">
                                                        <label for="Email" class="form-label">
                                                            <Address>Email</Address>
                                                        </label>
                                                        <input value="{{$merchant->email}}" type="text" readonly class="form-control" id="Email"
                                                            placeholder="Email">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->



                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                                    class="mdi mdi-office-building me-1"></i> Others Info</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="NIDNo" class="form-label">NID No</label>
                                                        <input name="nid_no" type="text" class="form-control" id="NIDNo"
                                                            placeholder="National ID No">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="PINNo" class="form-label">PIN No</label>
                                                        <input name="pin_no" type="text" class="form-control" id="PINNo"
                                                            placeholder="PIN No">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-0">
                                                        <label for="Email" class="form-label">
                                                            <Address>Photo</Address>
                                                        </label>
                                                        <input name="photo" type="file" class="form-control" id="Email"
                                                            placeholder="Email">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->



                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light mt-2"><i
                                                        class="mdi mdi-content-save"></i> Save</button>
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
<script>

</script>
@endpush
