{{-- @php
    $merchantId = Auth::guard('marchant')->user()->id;
    $profile = App\Models\Merchant\MerchantProfile::where('merchant_id', $merchantId)->first();
@endphp --}}
<div class="left-side-menu">
    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{route('deliveryman.home')}}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm-dark.png" alt="" height="24">
                <!-- <span class="logo-lg-text-light">Minton</span> -->
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend') }}/assets/images/small-logo.png" alt="" height="20">
                <!-- <span class="logo-lg-text-light">M</span> -->
            </span>
        </a>

        <a href="{{route('deliveryman.home')}}" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/small-logo.png" alt="" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend') }}/assets/images/heshelghor-dashboard-logo1.png" alt="" height="30">
            </span>
        </a>
    </div>
    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="#" class="text-reset dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Nik Patel</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-reset">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Marchant Dashboard</li>

                <li>
                    <a href="{{route('deliveryman.home')}}" >
                        <i class="mdi mdi-view-dashboard"></i>

                        <span> Dashboards </span>
                    </a>
                </li>
                {{-- Product Start --}}
                <li>
                    <a href="{{route('deliveryman.stack.products')}}" >
                        <i class="mdi mdi-cart"></i>
                        <span class="badge bg-success rounded-pill float-end">
                            {{App\Models\DeliveryMan\DeliveryManCollectProduct::where('accept_status', false)->get()->count();}}
                        </span>
                        <span> Stack </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('deliveryman.processing.products')}}" >
                        <i class="mdi mdi-bike-fast"></i>
                        <span class="badge bg-success rounded-pill float-end">
                            {{App\Models\DeliveryMan\DeliveryManCollectProduct::where('deliveryman_id', Auth::guard('deliveryman')->user()->id)->where('pointmanager_receive_status', false)->get()->count();}}
                        </span>
                        <span> Processing </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('deliveryman.submited.products')}}" >
                        <i class="mdi mdi-bike-fast"></i>
                        <span class="badge bg-success rounded-pill float-end">
                            {{App\Models\DeliveryMan\DeliveryManCollectProduct::where('deliveryman_id', Auth::guard('deliveryman')->user()->id)->where('pointmanager_receive_status', true)->get()->count();}}
                        </span>
                        <span> Submited </span>
                    </a>
                </li>
                {{-- Product End --}}

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
