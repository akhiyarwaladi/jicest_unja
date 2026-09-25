<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Jambi International Conference on Engineering, Science and Technology
    2026">
    <meta name="keywords" content="jicest, jicest 2026, jicest2026, jicest jambi, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JICEST 2026 | {{ $title }}</title>

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="JICEST 2026 - Jambi International Conference on Engineering, Science and Technology">
    <meta property="og:description" content="Join us for JICEST 2026 - Accelerating Green Innovation and Digital Transformation in Science, Technology, and Engineering for a Sustainable Future. November 11, 2026">
    <meta property="og:url" content="https://jicest.unja.ac.id/">
    <meta property="og:type" content="event">
    <meta property="og:image" content="https://jicest.unja.ac.id/assets/logos/jicest.png">
    <meta property="og:site_name" content="JICEST 2026">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="JICEST 2026 - Jambi International Conference on Engineering, Science and Technology">
    <meta name="twitter:description" content="Join us for JICEST 2026 - Accelerating Green Innovation and Digital Transformation in Science, Technology, and Engineering for a Sustainable Future. November 11, 2026">
    <meta name="twitter:image" content="https://jicest.unja.ac.id/assets/logos/jicest.png">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "name": "JICEST 2026 - Jambi International Conference on Engineering, Science and Technology",
        "description": "Accelerating Green Innovation and Digital Transformation in Science, Technology, and Engineering for a Sustainable Future",
        "startDate": "2026-11-11T00:00:00+07:00",
        "endDate": "2026-11-11T23:59:59+07:00",
        "eventStatus": "https://schema.org/EventScheduled",
        "eventAttendanceMode": "https://schema.org/OnlineEventAttendanceMode",
        "location": {
            "@type": "VirtualLocation",
            "url": "https://jicest.unja.ac.id"
        },
        "organizer": {
            "@type": "Organization",
            "name": "Faculty of Science and Technology, Universitas Jambi",
            "url": "https://jicest.unja.ac.id",
            "email": "jicest@unja.ac.id"
        },
        "offers": {
            "@type": "Offer",
            "name": "Conference Registration",
            "price": "350000",
            "priceCurrency": "IDR",
            "availability": "https://schema.org/InStock",
            "url": "https://jicest.unja.ac.id/register"
        },
        "image": "https://jicest.unja.ac.id/assets/logos/jicest.png",
        "url": "https://jicest.unja.ac.id"
    }
    </script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('assets.editorial')

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css" type="text/css">
    @livewireStyles
    @yield('css')
    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee2 {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        .animate-marquee2 {
            animation: marquee2 30s linear infinite;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .image-link:hover {
            opacity: 0.8;
        }

        .hero-section.set-bg {
            position: relative;
            isolation: isolate;
        }

        .hero-section.set-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: rgba(11, 27, 20, .62);
        }

        .hero-section.set-bg > .container {
            position: relative;
            z-index: 1;
        }

        .hero-section.set-bg h1,
        .hero-section.set-bg h2,
        .hero-section.set-bg h3,
        .hero-section.set-bg p {
            color: #fff !important;
            text-shadow: none !important;
        }

        /* Loader styles */
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
        }

        @keyframes loader {
            0% {
                transform: rotate(0deg);
                border: 4px solid #f44336;
                border-left-color: transparent;
            }
            50% {
                transform: rotate(180deg);
                border: 4px solid #673ab7;
                border-left-color: transparent;
            }
            100% {
                transform: rotate(360deg);
                border: 4px solid #f44336;
                border-left-color: transparent;
            }
        }

        .overlay-gradient {
            background: linear-gradient(to top, rgba(249, 115, 22, 0.5), rgba(249, 115, 22, 0));
        }

        .glassmorphism {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .glassmorphism-success {
            background: rgba(76, 175, 80, 0.4);
        }

        .glassmorphism-primary {
            background: rgba(33, 150, 243, 0.4);
        }

        .glassmorphism-error {
            background: rgba(244, 67, 54, 0.4);
        }

        .glassmorphism-danger {
            background: rgba(255, 69, 58, 0.15);
        }

        .glassmorphism-warning {
            background: rgba(255, 193, 7, 0.4);
        }

        .glassmorphism-secondary {
            background: rgba(158, 158, 158, 0.4);
        }

        .glassmorphism-white {
            background: rgba(255, 255, 255, 0.6);
        }

        .glassmorphism-sm {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(7px);
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('templates.navbar')

    @yield('content')
    @include('components.editorial-footer')

    <!-- Js Plugins -->
    <script src="{{ url('') }}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.countdown.min.js"></script>
    <script src="{{ url('') }}/assets/js/jquery.slicknav.js"></script>
    <script src="{{ url('') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ url('') }}/assets/js/main.js"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('to-top', (event) => {
            event.preventDefault();
            window.scrollTo(0, 0);
        });
    </script>
    @yield('script')
</body>

</html>
