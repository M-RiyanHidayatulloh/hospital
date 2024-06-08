<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>hospital</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome 6 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .nav-tabs .nav-link {
            margin-bottom: -1px;
        }

        .user-icon,
        .user-image {
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
</head>

<body>
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


                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Jadwal Dokter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user/appointment')}}">Janji Temu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Rekam Medis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Kosultasi Online</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Informasi Kesehatan</a>
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
                            @auth
                            @if (Auth::user()->usertype == 'user')
                            <a href="#">
                                <div class="position-relative">
                                    <a href="#" id="userIcon" class="user-icon">
                                        <i class="fas fa-user-circle" aria-hidden="true"></i>
                                    </a>
                                    <div class="user-card bg-light p-3 rounded position-absolute">
                                        <a href="/user">Profile</a>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="btn text-white btn-sm btn-danger" type="submit"><i class="feather icon-log-out m-r-5"></i>Logout</button>
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
                                            <button class="btn text-white btn-sm btn-danger" type="submit"><i class="feather icon-log-out m-r-5"></i>Logout</button>
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

    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if(isset($book))
                    <form action="{{ route('user/editappointment', ['id' => $book->id]) }}" method="GET">
                        @csrf
                        <h4>
                            EDIT <span>APPOINTMENT</span>
                        </h4>
                        @else
                        <form action="{{ route('user/appointment') }}" method="GET">
                            @csrf
                            <h4>
                                BOOK <span>APPOINTMENT</span>
                            </h4>
                            @endif

                            <div class="form-row ">
                                <div class="form-group col-lg-4">
                                    <label for="patient_id">Patient</label>
                                    <select name="patient_id" class="form-control" required>
                                        @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ isset($book) && $book->patient_id == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="doctor_id">Doctor's Name</label>
                                    <select name="doctor_id" class="form-control wide" required>
                                        @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ isset($book) && $book->doctor_id == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="department_name">Department's Name</label>
                                    <input type="text" name="department_name" class="form-control wide" id="department_name">
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-lg-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="XXXXXXXXXX">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="symptoms">Symptoms</label>
                                    <input type="text" class="form-control" id="symptoms" name="symptoms" placeholder="">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="date">Choose Date </label>
                                    <div class="input-group date" id="date" data-date-format="mm-dd-yyyy">
                                        <input type="text" class="form-control" name="date" readonly>
                                        <span class="input-group-addon date_icon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="btn ">Submit Now</button>
                            </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>




    <section class="info_section ">
        <div class="container">
            <div class="info_top">
                <div class="info_logo">
                    <a href="">
                        <img src="images/logo1.png" alt="">
                    </a>
                </div>
                <div class="info_form">
                    <form action="">
                        <input type="email" placeholder="Your email">
                        <button>
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            <div class="info_bottom layout_padding2">
                <div class="row info_main_row">
                    <div class="col-md-6 col-lg-3">
                        <h5>
                            Address
                        </h5>
                        <div class="info_contact">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope"></i>
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                        <div class="social_box">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_links">
                            <h5>
                                Useful link
                            </h5>
                            <div class="info_links_menu">
                                <a class="active" href="index.html">
                                    Home
                                </a>
                                <a href="about.html">
                                    About
                                </a>
                                <a href="treatment.html">
                                    Treatment
                                </a>
                                <a href="doctor.html">
                                    Doctors
                                </a>
                                <a href="testimonial.html">
                                    Testimonial
                                </a>
                                <a href="contact.html">
                                    Contact us
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_post">
                            <h5>
                                LATEST POSTS
                            </h5>
                            <div class="post_box">
                                <div class="img-box">
                                    <img src="images/post1.jpg" alt="">
                                </div>
                                <p>
                                    Normal
                                    distribution
                                </p>
                            </div>
                            <div class="post_box">
                                <div class="img-box">
                                    <img src="images/post2.jpg" alt="">
                                </div>
                                <p>
                                    Normal
                                    distribution
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_post">
                            <h5>
                                News
                            </h5>
                            <div class="post_box">
                                <div class="img-box">
                                    <img src="images/post3.jpg" alt="">
                                </div>
                                <p>
                                    Normal
                                    distribution
                                </p>
                            </div>
                            <div class="post_box">
                                <div class="img-box">
                                    <img src="images/post4.png" alt="">
                                </div>
                                <p>
                                    Normal
                                    distribution
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Toggle user card display
        document.getElementById('userIcon').addEventListener('click', function() {
            var userCard = document.querySelector('.user-card');
            userCard.classList.toggle('show');
        });

        // Simulate a login status check
        var isLoggedIn = false; // Change to true to simulate logged-in state
        var userImageUrl = 'path/to/user/image.jpg'; // Replace with actual image URL

        // Function to update the icon based on login status
        function updateIcon() {
            var userIcon = document.getElementById('userIcon');
            var userImage = document.getElementById('userImage');
            if (isLoggedIn) {
                userIcon.querySelector('.user-icon').classList.add('d-none');
                userImage.src = userImageUrl;
                userImage.classList.remove('d-none');
            } else {
                userIcon.querySelector('.user-icon').classList.remove('d-none');
                userImage.classList.add('d-none');
            }
        }

        // Call the function on page load
        document.addEventListener('DOMContentLoaded', updateIcon);
    </script>
</body>

</html>