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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Product List</li>
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
                                <div class="col-lg-4 col-xl-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <img src="../assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xl img-thumbnail"
                                            alt="profile-image">

                                            <h4 class="mt-3 mb-0">Nik G. Patel</h4>
                                            <p class="text-muted">@webdesigner</p>

                                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

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
                                                                <td class="text-muted">Nik G. Patel</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mobile :</th>
                                                                <td class="text-muted">(123) 123 1234</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email :</th>
                                                                <td class="text-muted">user@email.domain</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Location :</th>
                                                                <td class="text-muted">USA</td>
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
                                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                                            class="mdi mdi-github"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> <!-- end card-box -->

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Skills</h4>
                                            <p class="sub-header mb-3">Everyone realizes why a new common language would be desirable</p>

                                            <div class="pt-1">
                                                <h6 class="text-uppercase mt-0">HTML5 <span class="float-end">90%</span></h6>
                                                <div class="progress progress-sm m-0">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                        <span class="visually-hidden">90% Complete</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 pt-1">
                                                <h6 class="text-uppercase">PHP <span class="float-end">67%</span></h6>
                                                <div class="progress progress-sm m-0">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%">
                                                        <span class="visually-hidden">67% Complete</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 pt-1">
                                                <h6 class="text-uppercase">WordPress <span class="float-end">48%</span></h6>
                                                <div class="progress progress-sm m-0">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%">
                                                        <span class="visually-hidden">48% Complete</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 pt-1">
                                                <h6 class="text-uppercase">Laravel <span class="float-end">95%</span></h6>
                                                <div class="progress progress-sm m-0">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                        <span class="visually-hidden">95% Complete</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 pt-1">
                                                <h6 class="text-uppercase">ReactJs <span class="float-end">72%</span></h6>
                                                <div class="progress progress-sm m-0">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                                                        <span class="visually-hidden">72% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-box-->

                                </div> <!-- end col-->

                                <div class="col-lg-8 col-xl-8">
                                    <div class="card">
                                        <div class="card-body">

                                             <ul class="nav nav-pills navtab-bg">
                                                <li class="nav-item">
                                                    <a href="#about-me" data-bs-toggle="tab" aria-expanded="true" class="nav-link active ms-0">
                                                        <i class="mdi mdi-face-profile me-1"></i>About Me
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                        <i class="mdi mdi-cog me-1"></i>Settings
                                                    </a>
                                                </li>
                                            </ul>

                                            {{-- <div class="tab-content">

                                                <div class="tab-pane show active" id="about-me">

                                                    <h5 class="mb-4 text-uppercase">Experience</h5>

                                                    <ul class="list-unstyled timeline-sm">
                                                        <li class="timeline-sm-item">
                                                            <span class="timeline-sm-date">2015 - 19</span>
                                                            <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                                            <p>websitename.com</p>
                                                            <p class="text-muted mt-2">Everyone realizes why a new common language
                                                                would be desirable: one could refuse to pay expensive translators.
                                                                To achieve this, it would be necessary to have uniform grammar,
                                                                pronunciation and more common words.</p>

                                                        </li>
                                                        <li class="timeline-sm-item">
                                                            <span class="timeline-sm-date">2012 - 15</span>
                                                            <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                                            <p>Software Inc.</p>
                                                            <p class="text-muted mt-2">If several languages coalesce, the grammar
                                                                of the resulting language is more simple and regular than that of
                                                                the individual languages. The new common language will be more
                                                                simple and regular than the existing European languages.</p>
                                                        </li>
                                                        <li class="timeline-sm-item">
                                                            <span class="timeline-sm-date">2010 - 12</span>
                                                            <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                                            <p>Coderthemes LLP</p>
                                                            <p class="text-muted mt-2 mb-0">The European languages are members of
                                                                the same family. Their separate existence is a myth. For science
                                                                music sport etc, Europe uses the same vocabulary. The languages
                                                                only differ in their grammar their pronunciation.</p>
                                                        </li>
                                                    </ul>

                                                    <h5 class="mb-3 mt-5 text-uppercase">Projects</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-nowrap mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Project Name</th>
                                                                    <th>Start Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Status</th>
                                                                    <th>Clients</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>App design and development</td>
                                                                    <td>01/01/2015</td>
                                                                    <td>10/15/2018</td>
                                                                    <td><span class="badge bg-info">Work in Progress</span></td>
                                                                    <td>Halette Boivin</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Coffee detail page - Main Page</td>
                                                                    <td>21/07/2016</td>
                                                                    <td>12/05/2018</td>
                                                                    <td><span class="badge bg-success">Pending</span></td>
                                                                    <td>Durandana Jolicoeur</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Poster illustation design</td>
                                                                    <td>18/03/2018</td>
                                                                    <td>28/09/2018</td>
                                                                    <td><span class="badge bg-pink">Done</span></td>
                                                                    <td>Lucas Sabourin</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Drinking bottle graphics</td>
                                                                    <td>02/10/2017</td>
                                                                    <td>07/05/2018</td>
                                                                    <td><span class="badge bg-danger">On Hold</span></td>
                                                                    <td>Donatien Brunelle</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Landing page design - Home</td>
                                                                    <td>17/01/2017</td>
                                                                    <td>25/05/2021</td>
                                                                    <td><span class="badge bg-warning">Coming soon</span></td>
                                                                    <td>Karel Auberjo</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- end timeline content-->

                                                <div class="tab-pane" id="settings">
                                                    <form>
                                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="firstname" class="form-label">First Name</label>
                                                                    <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="lastname" class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-2">
                                                                    <label for="userbio" class="form-label">Bio</label>
                                                                    <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="useremail" class="form-label">Email Address</label>
                                                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                                                    <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="userpassword" class="form-label">Password</label>
                                                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                                    <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="companyname" class="form-label">Company Name</label>
                                                                    <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="cwebsite" class="form-label">Website</label>
                                                                    <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
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
                                                        </div> <!-- end row -->

                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- end settings content-->

                                            </div> <!-- end tab-content --> --}}
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
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<!-- third party js -->
<script src="{{ asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend')}}/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->
<script src="{{ asset('backend')}}/assets/js/pages/product-list.init.js"></script>

@endpush
