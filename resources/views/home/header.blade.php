<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>Call : +01 8889999</span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>Email : rumahsehat@gmail.com</span>
                </a>
                <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>Location</span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('images/logo1.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about2') }}">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="healthInfoDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="healthInfoDropdown">
                                <a class="dropdown-item" href="{{ route('doctor_schedule') }}">Doctor Schedule</a>
                                <a class="dropdown-item" href="{{ route('user.appointments.index') }}">Appointment</a>
                                <a class="dropdown-item" href="{{ route('user.OnlineConsultation.index') }}">Online
                                    Consultation</a>
                                <a class="dropdown-item" href="{{ route('user.medicalrecord.index') }}">Medical
                                    Record</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.Information.index') }}">Health Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact2') }}">Contact Us</a>
                        </li>
                    </ul>

                    <!-- <form class="form-inline mx-auto">
                        <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form> -->

                    @guest
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/login') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">
                                    <i class="fa fa-vcard" aria-hidden="true"></i>
                                    <span>Sign Up</span>
                                </a>
                            </li>
                        </ul>
                        <!-- <form class="form-inline mx-auto">
                                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>  -->
                    @endguest

                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('user.dashboard.index') }}">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i> Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                                        </a>
                                    </form>
                                </div>
                            </li>
                            <form class="form-inline mx-auto">

                                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </ul>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</header>
