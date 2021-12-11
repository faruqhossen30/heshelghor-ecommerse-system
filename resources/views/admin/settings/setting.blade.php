@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Admin ')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box page-title-box-alt">
                <h4 class="page-title">CRM</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">CRM</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-3 border-end">
                    <h2 class="pb-2 h3 border-bottom">
                        <span> <i class="mdi mdi-menu"></i></span>
                        Settings
                    </h2>
                    <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link border-bottom show mb-1 " id="v-pills-home-tab" data-bs-toggle="pill"
                            href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
                            <span> <i class="mdi mdi-youtube-studio"></i></span>
                            Header </a>
                        <a class="nav-link border-bottom mb-1 active" id="v-pills-profile-tab" data-bs-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                            <span> <i class="mdi mdi-wrench-outline"></i></span>
                            Footer</a>
                        <a class="nav-link border-bottom mb-1" id="v-pills-social-media-tab" data-bs-toggle="pill"
                            href="#v-pills-social-media" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                            <span> <i class="mdi mdi-facebook"></i></span>
                            Social Media</a>
                        <a class="nav-link border-bottom mb-1" id="v-pills-contact-tab" data-bs-toggle="pill"
                            href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">
                            <span> <i class="mdi mdi-account-box"></i></span>
                            Contact</a>
                        <a class="nav-link border-bottom mb-1" id="v-pills-settings-tab" data-bs-toggle="pill"
                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            Settings</a>
                    </div>
                </div> <!-- end col-->
                <div class="col-sm-9">
                    <div class="tab-content pt-0">
                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            Header
                        </div>
                        <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            footer
                        </div>
                        {{-- Social Media --}}
                        <div class="tab-pane fade" id="v-pills-social-media" role="tabpanel"
                            aria-labelledby="v-pills-social-media-tab">
                            <div class="card-body pt-1">
                                <form action="{{ route('setting.socialmedia') }}" method="POST">
                                    @csrf
                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social
                                        Media Links</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-fb" class="form-label">Facebook Page</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-facebook-square"></i></span>
                                                    <input name="facebook" type="url" class="form-control" id="social-fb"
                                                        placeholder="Facebook Page Link"
                                                        value="{{ $socialmedia->facebook }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-fb" class="form-label">Facebook Group</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-facebook-square"></i></span>
                                                    <input name="facebook_group" type="url" class="form-control"
                                                        id="social-fb" placeholder="Facebook Group Link"
                                                        value="{{ $socialmedia->facebook_group }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-tw" class="form-label">Twitter</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                    <input name="twitter" type="url" class="form-control" id="social-tw"
                                                        placeholder="Twitter Link" value="{{ $socialmedia->twitter }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-insta" class="form-label">Instagram</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                    <input name="instagram" type="url" class="form-control"
                                                        id="social-insta" placeholder="Instagram Link"
                                                        value="{{ $socialmedia->facebook_group }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-lin" class="form-label">Linkedin</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>

                                                    <input name="linkedin" type="url" class="form-control" id="social-lin"
                                                        placeholder="Linkedin Company Link"
                                                        value="{{ $socialmedia->linkedin }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-sky" class="form-label">Instagram</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                    <input name="instagram" type="url" class="form-control"
                                                        id="social-sky" placeholder="Instagram Profile Link"
                                                        value="{{ $socialmedia->instagram }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-gh" class="form-label">Youtube</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>

                                                    <input name="youtube" type="url" class="form-control" id="social-gh"
                                                        placeholder="Youtube Channel Link"
                                                        value="{{ $socialmedia->youtube }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="text-start">
                                        <button type="submit" onclick="return confirm('Are you sure update informarion ?')"
                                            class="btn btn-primary waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- Contacts --}}
                        <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                            aria-labelledby="v-pills-contact-tab">
                            <div class="card-body">
                                <form action="{{ route('setting.contact') }}" method="POST">
                                    @csrf
                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social
                                        Media Links</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-fb" class="form-label">Teliphone</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-deskphone"></i></span>
                                                    <input name="phone" type="text" class="form-control" id="social-fb"
                                                        placeholder="Office Number" value="{{ $contact->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-tw" class="form-label">Mobile</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="mdi mdi-cellphone-basic"></i></span>
                                                    <input name="mobile" type="text" class="form-control" id="social-tw"
                                                        placeholder="Mobile Number" value="{{ $contact->mobile }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-tw" class="form-label">Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                    <input name="email" type="email" class="form-control" id="social-tw"
                                                        placeholder="Email" value="{{ $contact->email }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-tw" class="form-label">Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-map"></i></span>
                                                    <input name="address" type="text" class="form-control" id="social-tw"
                                                        placeholder="Address" value="{{ $contact->address }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-tw" class="form-label">Working Day</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    <input name="working_day" type="text" class="form-control"
                                                        id="social-tw" placeholder="Working Days"
                                                        value="{{ $contact->working_day }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="social-tw" class="form-label">Office Time</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                                    <input name="working_time" name="working_time" type="text"
                                                        class="form-control" id="social-tw" placeholder="Office Time"
                                                        value="{{ $contact->working_time }}">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->


                                    <div class="text-start">
                                        <button type="submit" onclick="return confirm('Are you sure update informarion ?')"
                                            class="btn btn-primary waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id
                                dolor proident
                                in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua
                                amet qui
                                mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa
                                ullamco sit
                                adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                        </div>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->

        </div>
    </div>

    <!-- end row -->

@endsection
