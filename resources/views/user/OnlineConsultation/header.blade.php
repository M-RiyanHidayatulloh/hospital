<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Font Awesome 6 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .nav-tabs .nav-link {
        margin-bottom: -1px;
    }
    .user-icon, .user-image {
        font-size: 1.5rem;
        color: #333;
        cursor: pointer;
    }
    .user-image {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }
    .user-card {
        position: absolute;
        top: 70px;
        right: 10px;
        z-index: 1000;
        display: none;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .user-card.show {
        display: block;
    }
    .user-card a {
        color: #333;
        text-decoration: none;
        display: block;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
    }
    .user-card a:hover {
        background-color: #f0f0f0;
    }
    .user-card a:last-child {
        border-top: 1px solid #f0f0f0;
    }
</style>

<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Call : +01 123455678990
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
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="treatment.html">Jadwal Dokter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="doctor.html">Janji Temu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimonial.html">Rekam Medis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
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
                        @auth
                            @if (Auth::user()->usertype == 'user')
                                <a href="#">
                                    <div class="position-relative">
                                        <a href="#" id="userIcon" class="user-icon">
                                            <i class="fas fa-user-circle" aria-hidden="true"></i>
                                        </a>
                                        <div class="user-card bg-light p-3 rounded position-absolute">
                                            <a href="/user">Profile</a>
                                            <a href="/user/appointments">Appointment</a>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="btn text-white btn-sm btn-danger" type="submit"><i
                                                        class="feather icon-log-out m-r-5"></i>Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <span>
                                        {{ Auth::user()->name }}
                                    </span> --}}
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}">
                                    <div class="position-relative">
                                        <a href="#" id="userIcon" class="user-icon">
                                            <i class="fas fa-user-circle" aria-hidden="true"></i>
                                        </a>
                                        <div class="user-card bg-light p-3 rounded position-absolute">
                                            <a href="/user">Profile</a>
                                            <a href="/dashboard">Dashboard</a>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="btn text-white btn-sm btn-danger" type="submit"><i
                                                        class="feather icon-log-out m-r-5"></i>Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endauth
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
