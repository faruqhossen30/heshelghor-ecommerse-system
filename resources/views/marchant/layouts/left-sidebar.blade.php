<div class="left-side-menu">

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm-dark.png" alt="" height="24">
                <!-- <span class="logo-lg-text-light">Minton</span> -->
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend') }}/assets/images/small-logo.png" alt="" height="20">
                <!-- <span class="logo-lg-text-light">M</span> -->
            </span>
        </a>

        <a href="index.html" class="logo logo-light text-center">
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
                    <a href="#sidebarDashboards" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarDashboards" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge bg-success rounded-pill float-end">3</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">

                    </div>
                </li>
                {{-- Product Start --}}
                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="mdi mdi-table"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('product.index')}}">All Products</a>
                            </li>
                            <li>
                                <a href="{{route('product.create')}}">Add Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Product End --}}

                <li>
                    <a href="#sidebarBrand" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarBrand">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Brand </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBrand">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('brand.index')}}">All Brand</a>
                            </li>
                            <li>
                                <a href="{{route('brand.create')}}">Add Brand</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#createShop" data-bs-toggle="collapse" aria-expanded="false" aria-controls="createShop">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Shops </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="createShop">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('shop.index')}}">All Shop</a>
                            </li>
                            <li>
                                <a href="{{route('shop.create')}}">Create Shop</a>
                            </li>
                        </ul>
                    </div>
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
                                <a href="{{route('marchant.order.index')}}">All Orders</a>
                            </li>

                            <li>
                                <a href="{{route('marchant.order.show')}}">Single Order</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarProfile" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarProfile">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Merchant Profile </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProfile">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{route('merchantprofile.index')}}">Update Profile</a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
