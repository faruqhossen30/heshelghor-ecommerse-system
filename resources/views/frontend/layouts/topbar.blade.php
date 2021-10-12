<div class="header-top">
    <div class="container">
        <div class="header-left">
            <p class="welcome-msg">HeshelGhor | Stores Of Needs | <i class="far fa-envelope"></i>
                support@heshelghor.com</p>
        </div>
        <div class="header-right">
            {{-- <div class="dropdown">
                <a href="#currency">USD</a>
                <ul class="dropdown-box">
                    <li><a href="#USD">USD</a></li>
                    <li><a href="#EUR">EUR</a></li>
                </ul>
            </div> --}}
            <!-- End DropDown Menu -->
            <div class="dropdown ml-5">
                <a href="#language">BAN</a>
                <ul class="dropdown-box">
                    <li>
                        <a href="#USD">ENG</a>
                    </li>
                    <li>
                        <a href="#EUR">FRH</a>
                    </li>
                </ul>
            </div>
            <!-- End DropDown Menu -->
            <span class="divider"></span>
            <a href="{{ route('marchant.login') }}" class="contact d-lg-show"><i class="d-icon-percent"></i>Merchant</a>
            <a href="#" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
            <a href="#" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>
            @guest
                <a class="contact d-lg-show" href="{{ route('login') }}" data-toggle="login-modal"><i
                        class="d-icon-user"></i>Sign in</a>
                <span class="delimiter">/</span>
                <a class="contact d-lg-show ml-0" href="{{ route('register') }}" data-toggle="login-modal">Register</a>
            @endguest
            @auth
                <div class="dropdown ml-5">
                    <a href="#language">Account</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD">Dashboard</a>
                        </li>
                        <li>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            @endauth

            <!-- End of Login -->
        </div>
    </div>
</div>
<!-- End HeaderTop -->
