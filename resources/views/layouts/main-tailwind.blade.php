<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Jambi International Conference on Engineering, Science and Technology
    2026">
    <meta name="keywords" content="jicest, jicest 2026, jicest2026, jicest jambi, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JICEST 2026 | {{ $title }}</title>

    {{-- Fonts (Poppins via assets/poppins, IBM Plex via assets/editorial) are loaded by the
        includes below, each with their own preconnects. No duplicate requests here. --}}


    <!-- Css Styles -->

    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/font-awesome.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/elegant-icons.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/owl.carousel.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/magnific-popup.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/slicknav.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css" type="text/css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                animation: {
                    marquee: 'marquee 10s linear infinite',
                    marquee2: 'marquee2 25s linear infinite',
                },
                keyframes: {
                    marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-119%)' },
                    },
                    marquee2: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-360%)' },
                    },
                },
                },
            },
        }
    </script>
    @include('assets.poppins')
    @include('assets.editorial')

    @livewireStyles
    @yield('css')
    <style>
        #preloder {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999999;
            background: #000;
        }

        .loader {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -13px;
            margin-left: -13px;
            border-radius: 60px;
            animation: loader 0.8s linear infinite;
            -webkit-animation: loader 0.8s linear infinite;
        }

        @keyframes loader {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
                border: 4px solid #f44336;
                border-left-color: transparent;
            }
            50% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
                border: 4px solid #673ab7;
                border-left-color: transparent;
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
                border: 4px solid #f44336;
                border-left-color: transparent;
            }
        }

        /* @-webkit-keyframes loader {
            0% {
                -webkit-transform: rotate(0deg);
                border: 4px solid #f44336;
                border-left-color: transparent;
            }
            50% {
                -webkit-transform: rotate(180deg);
                border: 4px solid #673ab7;
                border-left-color: transparent;
            }
            100% {
                -webkit-transform: rotate(360deg);
                border: 4px solid #f44336;
                border-left-color: transparent;
            }
        } */

        .overlay-gradient {
            background: linear-gradient(to top, rgba(249, 115, 22, 0.5), rgba(249, 115, 22, 0));
        }

        * {
            font-family: "Poppins", sans-serif;
        }

        .poppins {
            font-family: "Poppins", sans-serif;
        }

        .glassmorphism {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .glassmorphism-success {
            background: rgba(76, 175, 80, 0.4);
            /* semi-transparent green */
        }

        .glassmorphism-primary {
            background: rgba(33, 150, 243, 0.4);
            /* semi-transparent blue */
        }

        .glassmorphism-error {
            background: rgba(244, 67, 54, 0.4);
            /* semi-transparent red */
        }

        .glassmorphism-danger {
            background: rgba(255, 69, 58, 0.15);
            /* semi-transparent dark red */
        }

        .glassmorphism-warning {
            background: rgba(255, 193, 7, 0.4);
            /* semi-transparent yellow */
        }

        .glassmorphism-secondary {
            background: rgba(158, 158, 158, 0.4);
            /* semi-transparent grey */
        }

        .glassmorphism-white {
            background: rgba(255, 255, 255, .6);
        }

        .glassmorphism-sm {
            background: rgba(255, 255, 255, .15);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
        }

        /* Fade in on scroll animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Custom gradient animation */
        @keyframes gradient-slow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .animate-gradient-slow {
            background-size: 200% 200%;
            animation: gradient-slow 15s ease infinite;
        }
    </style>
</head>

<body>


    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    {{-- navigation --}}
    @include('templates.navbar')
    {{-- end navigation --}}

    {{-- content --}}
    @yield('content')
    {{-- end content --}}

    @include('components.editorial-footer')

    <script src="{{ url('') }}/assets/js/jquery-3.3.1.min.js"></script>
    {{-- <script src="{{ url('') }}/assets/js/main.js"></script> --}}
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @livewireScripts
    <script>
        $(window).on('load', function () {
            $(".loader").fadeOut();
            $("#preloder").delay(20).fadeOut("slow");
        });

        window.addEventListener('to-top', (event) => {
            event.preventDefault();
            window.scrollTo(0, 0);
        });

        // Intersection Observer for scroll animations
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
        });
    </script>
    @yield('script')
</body>

</html>
