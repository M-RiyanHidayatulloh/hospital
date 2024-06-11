<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="{{ asset('style/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Tailwind CSS -->
    <link href="{{ asset('sign/assets/css/tailwind.min.css') }}" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('sign/assets/css/animate.min.css') }}">

    <!-- Custom CSS for particles.js -->
    <style>
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #0e7d75;
            z-index: -1;
        }

        .auth-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen relative">
    <!-- Particles.js container -->
    <div id="particles-js"></div>

    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper animate__animated animate__fadeIn">
        <div class="auth-content text-center">
            <img src="{{ asset('images/lg2.png') }}" alt="logo" class="img-fluid mb-1 mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <h4 class="text-2xl font-bold mb-5">Sign In</h4>
                <hr class="mb-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4" for="email">
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ old('email') }}" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4" for="password">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mb-4">
                        <input id="remember_me" type="checkbox"
                            class="mr-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <label for="remember_me" class="text-sm text-gray-600">{{ __('Remember me') }}</label>
                    </div>

                    <!-- Forgot Password -->
                    <div class="mt-4 items-center justify-content-center mb-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        {{ __('Log in') }}
                    </button>

                    <!-- Signup Link -->
                    <p class="mt-4 text-center text-gray-600">Don’t have an account? <a href="{{ route('register') }}"
                            class="text-green-600 hover:underline">Signup</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <script src="{{ asset('sign/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('sign/assets/js/bootstrap.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('sign/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('sign/assets/js/toastr.min.js') }}"></script>

    <!-- particles.js -->
    <script src="{{ asset('sign/assets/js/particles.min.js') }}"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "star",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
    @if (Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,

            }
            // toastr.success("{{ Session::get('success') }}",'Selamat Datang Admin!',{timeOut:12000});
            // toastr.info("{{ Session::get('message') }}");
            // toastr.warning("{{ Session::get('message') }}");
            // toastr.warning("{{ Session::get('message') }}",'error!',{timeOut:12000});
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
</body>

</html>
