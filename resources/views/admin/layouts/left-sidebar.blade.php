@php
$admin = Auth::guard('admin')->user();
@endphp
<div class="left-side-menu">

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('admin.home') }}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm-dark.png" alt="" height="24">
                <!-- <span class="logo-lg-text-light">Minton</span> -->
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo/dashboard-lg.png') }}" alt="" height="35">
                <!-- <span class="logo-lg-text-light">M</span> -->
            </span>
        </a>

        <a href="{{ route('admin.home') }}" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/small-logo.png" alt="" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo/dashboard-lg.png') }}" alt="" height="35">
            </span>
        </a>
    </div>

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="#" class="text-reset dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">Nik
                    Patel</a>
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

                <li>
                    <a style="text-align: center">Role :
                        <strong>{{ Auth::guard('admin')->user()->getRoleNames()->first() }}</strong></a>
                </li>

                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="sidebarDashboards" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge bg-success rounded-pill float-end">3</span>
                        <span> Dashboards </span>
                    </a>
                    {{-- <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.home') }}">Sales</a>
                            </li>
                            <li>
                                <a href="dashboard-crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="dashboard-analytics.html">Analytics</a>
                            </li>
                        </ul>
                    </div> --}}
                </li>
                <li>
                    <a href="{{ route('promotion.index') }}">
                        <i class="mdi mdi-youtube-studio"></i>
                        <span> Promotion </span>
                    </a>
                </li>
                {{-- Admin start --}}
                @if ($admin->can('admin.create') || $admin->can('admin.view') || $admin->can('admin.edit') || $admin->can('admin.delete') || $admin->can('admin.status'))

                    <li>
                        <a href="#admin" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarTables">
                            <i class="mdi mdi-account-circle"></i>
                            <span> Admin List </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="admin">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.index') }}">All Admin</a>
                                </li>
                                @if ($admin->can('admin.create'))
                                <li>
                                    <a href="{{ route('admin.create') }}">Create Admin</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                {{-- Admin  End --}}

                {{-- Roll and Permission start --}}
                @if ($admin->can('role.create') || $admin->can('role.view') || $admin->can('role.edit') || $admin->can('role.delete') || $admin->can('role.status'))
                    <li>
                        <a href="#rolesPermission" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarTables">
                            <i class="mdi mdi-lock-minus"></i>
                            <span> Roll & Permission </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="rolesPermission">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('roles.index') }}">All Roles</a>
                                </li>
                                <li>
                                    <a href="{{ route('roles.create') }}">Add Role & Permission</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                {{-- Roll and permission  End --}}
                {{-- Product Start --}}
                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="sidebarTables">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">All Products</a>
                            </li>
                            <li>
                                <a href="#">Add Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Product End --}}
                {{-- Order Start --}}
                <li>
                    <a href="#orderTable" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="mdi mdi-gift-outline"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="orderTable">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.order.all') }}">All Order</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Order End --}}
                {{-- Merchant Start --}}
                <li>
                    <a href="#merchantTable" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="sidebarTables">
                        <i class="mdi mdi-account-cash"></i>
                        <span> Merchant </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="merchantTable">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('merchant.list.all') }}">Merchant List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Merchant End --}}
                {{-- Merchant Start --}}
                <li>
                    <a href="#userTable" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="mdi mdi-contacts"></i>
                        <span>Customer</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="userTable">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('customer.list.all') }}">Customer List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Merchant End --}}
                @if ($admin->can('category.create') || $admin->can('category.view') || $admin->can('category.edit') || $admin->can('category.delete') || $admin->can('category.status'))
                    <li>
                        <a href="#sidebarCategory" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarCategory">
                            <i class="mdi mdi-layers-outline"></i>
                            <span> Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCategory">
                            <ul class="nav-second-level">
                                @if ($admin->can('category.view') || $admin->can('category.edit'))
                                    <li>
                                        <a href="{{ route('category.index') }}">All Category</a>
                                    </li>
                                @endif
                                @if ($admin->can('category.create'))
                                    <li>
                                        <a href="{{ route('category.create') }}">Add Category</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif


                @if ($admin->can('subcategory.create') || $admin->can('subcategory.view') || $admin->can('subcategory.edit') || $admin->can('subcategory.delete') || $admin->can('subcategory.status'))
                    <li>
                        <a href="#sidebarSubCategory" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarCategory">
                            <i class="mdi mdi-text-box-multiple-outline"></i>
                            <span> Sub Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarSubCategory">
                            <ul class="nav-second-level">
                                @if ($admin->can('subcategory.view') || $admin->can('subcategory.edit'))
                                    <li>
                                        <a href="{{ route('subcategory.index') }}">All Sub-Category</a>
                                    </li>
                                @endif
                                @if ($admin->can('subcategory.create'))
                                    <li>
                                        <a href="{{ route('subcategory.create') }}">Add Sub-Category</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif


                <li>
                    <a href="#sidebarBrand" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="sidebarBrand">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Brand </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBrand">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('brands.index') }}">All Brand</a>
                            </li>
                            <li>
                                <a href="{{ route('brands.create') }}">Add Brand</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if ($admin->can('market.create') || $admin->can('market.view') || $admin->can('market.edit') || $admin->can('market.delete') || $admin->can('market.status'))
                    <li>
                        <a href="#sidebarMarket" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarBrand">
                            <i class="mdi mdi-text-box-multiple-outline"></i>
                            <span> Market </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMarket">
                            <ul class="nav-second-level">
                                @if ($admin->can('market.view') || $admin->can('market.edit'))
                                    <li>
                                        <a href="{{ route('market.index') }}">All Market</a>
                                    </li>
                                @endif
                                @if ($admin->can('market.delete'))
                                    <li>
                                        <a href="{{ route('market.create') }}">Add Market</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif
                @if ($admin->can('payment'))
                    <li>
                        <a href="#sidePayment" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarBrand">
                            <i class="mdi mdi-bank"></i>
                            <span> Payment & Delivery </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidePayment">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('deliverysystem.index') }}"><span><i
                                                class="mdi mdi-truck-delivery-outline"></i></span>Delivery System</a>
                                </li>
                                <li>
                                    <a href="{{ route('courier.index') }}"><span><i
                                                class="mdi mdi-truck-delivery-outline"></i></span>Courier Service</a>
                                </li>
                                <li>
                                    <a href="{{ route('paymentmethod.index') }}"><span><i
                                                class="mdi mdi-cash-usd"></i></span>Payment Methods</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if ($admin->can('location'))
                    <li>
                        <a href="#sidebarLocation" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="sidebarLocation">
                            <i class="mdi mdi-map-marker"></i>
                            <span>Location </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <div class="collapse" id="sidebarLocation">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="#">All Location</a>
                                </li>
                                <li>
                                    <a href="{{ route('upazila.create') }}">Upazila</a>
                                </li>
                                <li>
                                    <a href="{{ route('divission.index') }}">Division</a>
                                </li>
                                <li>
                                    <a href="{{ route('district.create') }}">District</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif


                @if ($admin->can('setting'))
                    <li>
                        <a href="{{ route('setting') }}">
                            <i class="mdi mdi-youtube-studio"></i>
                            <span> Setting </span>
                        </a>
                    </li>
                @endif


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
