<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Call : +01 8889999
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                        Email : rumahsehat@gmail.com
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        Location
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo1.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about2') }}">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="healthInfoDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Menu
                                </a>
                                <div class="dropdown-menu" aria-labelledby="healthInfoDropdown">

                                    <a class="dropdown-item" href="{{ route('doctor_schedule') }}"><span>Doctor
                                            Schedule</span></a>
                                    <a class="dropdown-item"
                                        href="{{ route('user.appointments.index') }}"><span>Appointment</span></a>
                                    <a class="dropdown-item" href="#"><span>Online Consultation</span></a>
                                    <a class="dropdown-item" href="#"><span>Medical Record</span></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Health Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="quote_btn-container">
                        @guest
                            <a href="{{ url('/login') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>
                                    Login
                                </span>
                            </a>
                            <a href="{{ url('/register') }}">
                                <i class="fa fa-vcard" aria-hidden="true"></i>
                                <span>
                                    Sign Up
                                </span>
                            </a>
                        @endguest
                        @if (Route::has('login'))
                            @auth

                                @if (Auth::user()->usertype == 'user')
                                    <div class="quote_btn-container dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                                            <span>{{ Auth::user()->name }}</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="{{ route('user.dashboard.index') }}">
                                                <i class="fa fa-user-circle" aria-hidden="true"></i> Profile
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                                @csrf
                                                <a Href="route('logout')"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                    class="dropdown-item"
                                                    style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                        </div>
                    @else
                        {{-- <div class="position-relative">
                            <a href="#" id="userIcon" class="user-icon">
                                <i class="fas fa-user-circle" aria-hidden="true"></i>
                            </a>
                            <div class="user-card bg-light p-3 rounded position-absolute">
                                <a href="/user">Profile</a>
                                <a href="/dashboard">Dashboard</a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn text-white btn-sm btn-danger" type="submit">
                                        <i class="feather icon-log-out m-r-5"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div> --}}
                        @endif
                    @endauth
                    @endif
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
        </div>
        </nav>
    </div>
    </div>
</header>
