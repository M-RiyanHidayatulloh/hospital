<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="{{asset('style/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Tailwind CSS -->
    <link href="{{asset('sign/assets/css/tailwind.min.css')}}" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('sign/assets/css/animate.min.css')}}">

    <!-- Custom CSS for particles.js -->
    <style>
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #0e7d75;
            z-index: -1;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen relative">
    <!-- Particles.js container -->
    <div id="particles-js"></div>

    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper animate__animated animate__fadeIn">
        <div class="auth-content text-center">
        <img src="{{asset('images/logo.png')}}" alt="logo" class="img-fluid mb-4 mx-auto">
            <div class="card bg-white p-8 rounded-lg shadow-lg w-96">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="text-2xl font-bold mb-5">Sign up</h4>
                            <hr class="mb-4">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="sr-only">Name</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="sr-only">Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group mb-3">
                                <label for="phone" class="sr-only">Phone</label>
                                    <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone" placeholder="Phone Number" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <!-- address -->
                                <div class="form-group mb-3">
                                <label for="address" class="sr-only">Address</label>
                                    <input id="address" type="text" name="address" value="{{ old('address') }}" required autofocus autocomplete="address" placeholder="Your Adress" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-700 transition duration-200">
                                    Register
                                </button>
                                <hr class="my-4">
                                <p class="mb-2">Already have an account? <a href="{{ route('login') }}" class="text-green-600 hover:underline">Signin</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- [ auth-signup ] end -->

    <!-- Required Js -->
    <script src="{{asset('sign/assets/js/particles.min.js')}}"></script>
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
</body>

</html>

