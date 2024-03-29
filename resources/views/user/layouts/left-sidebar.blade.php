<div class="left-side-menu">

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{route('user.dashboard')}}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm-dark.png" alt="" height="24">
                <!-- <span class="logo-lg-text-light">Minton</span> -->
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend') }}/assets/images/small-logo.png" alt="" height="20">
                <!-- <span class="logo-lg-text-light">M</span> -->
            </span>
        </a>

        <a href="{{route('user.dashboard')}}" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/heshelghor-dashboard-logo1.png') }}" alt="" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/heshelghor-dashboard-logo1.png') }}" alt="" height="20">
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

                <li class="menu-title">My Dashboard</li>

                <li>
                    <a href="{{route('user.dashboard')}}"aria-expanded="false" aria-controls="sidebarDashboards" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge bg-success rounded-pill float-end">3</span>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarOrders" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarOrders">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarOrders">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{route('user.order')}}">My Orders</a>
                            </li>

                            <li>
                                <a href="{{route('user.order.complain.all')}}">All Complain </a>
                            </li>
                            <li>
                                {{-- <a  target="_blank" href="{{route('user.order.pdf'), $Order->id}}">view</a> --}}
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarProfile" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarOrders">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Account </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProfile">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{route('user.account')}}">My Account</a>
                            </li>
                            <li>
                                <a href="{{route('user.account.edit')}}">Update Account</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('user.product.review.list')}}"aria-expanded="false" aria-controls="sidebarDashboards" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>My Reviews </span>
                    </a>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
