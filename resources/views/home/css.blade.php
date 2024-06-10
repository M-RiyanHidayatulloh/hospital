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
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- nice select -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
<!-- datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />


<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<!-- Font Awesome 6 CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
<!-- <style>
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

</style> -->

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            margin - top: 20 px;
            color: #1a202c;
                text-align: left;
                background-color: # e2e8f0;
        }
        .main - body {
                padding: 15 px;
            }
            .card {
                box - shadow: 0 1 px 3 px 0 rgba(0, 0, 0, .1), 0 1 px 2 px 0 rgba(0, 0, 0, .06);
            }

            .card {
                position: relative;
                display: flex;
                flex - direction: column;
                min - width: 0;
                word - wrap: break -word;
                background - color: #fff;
                background - clip: border - box;
                border: 0 solid rgba(0, 0, 0, .125);
                border - radius: .25 rem;
            }

            .card - body {
                flex: 1 1 auto;
                min - height: 1 px;
                padding: 1 rem;
            }

            .gutters - sm {
                margin - right: -8 px;
                margin - left: -8 px;
            }

            .gutters - sm > .col, .gutters - sm > [class *= col - ] {
                padding - right: 8 px;
                padding - left: 8 px;
            }
            .mb - 3, .my - 3 {
                margin - bottom: 1 rem!important;
            }

            .bg - gray - 300 {
                background - color: #e2e8f0;
            }
            .h - 100 {
                height: 100 % !important;
            }
            .shadow - none {
                box - shadow: none!important;
            }
    </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

