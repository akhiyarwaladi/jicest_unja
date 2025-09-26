<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Jambi International Conference on Enginering, Science and Technology
    2025">
    <meta name="keywords" content="jicest, jicest 2025, jicest2025, jicest jambi, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JICEST 2025 | {{ $title }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


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

    <!-- Footer Section Begin -->
    <footer>
        <div id="partners" class="bg-gray-100 w-full pt-12 h-fit text-center flex flex-col items-center overflow-x-hidden">
            <header class="text-black font-semibold text-2xl font-serif">INSTITUTE PARTNERS</header>
            <div class="relative flex overflow-x-hidden h-fit overflow-y-hidden py-5 w-[1200px] justify-center">
                <div class="flex animate-marquee whitespace-nowrap h-fit gap-14">
                    <img src="{{asset('assets/img/institute-partnert/int-2.png')}}" class="w-32 h-32 object-contain"/>
                    <img src="{{asset('assets/img/institute-partnert/int-3.png')}}" class="w-32 h-32 object-contain"/>
                    <img src="{{asset('assets/img/institute-partnert/int-4.png')}}" class="w-32 h-32 object-contain"/>
                    <img src="{{asset('assets/img/institute-partnert/int-2.png')}}" class="w-32 h-32 object-contain"/>
                    <img src="{{asset('assets/img/institute-partnert/int-3.png')}}" class="w-32 h-32 object-contain"/>
                    <img src="{{asset('assets/img/institute-partnert/int-4.png')}}" class="w-32 h-32 object-contain"/>
                </div>
            </div>

            <!--<header class="text-black font-semibold text-2xl font-serif mt-10">OTHER PUBLISHER PARTNERS</header>-->
            <!--<div class="relative flex overflow-x-hidden h-fit overflow-y-hidden py-5 w-[1200px] justify-center">-->
            <!--    <div class="flex animate-marquee2 whitespace-nowrap h-fit gap-14">-->
            <!--        <img data-link="https://jkk.unjani.ac.id/index.php/jkk"  src="{{asset('assets/img/partner-logo/jicest/partner-1.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://journal.uinsgd.ac.id/index.php/tadris-kimiya/index"  src="{{asset('assets/img/partner-logo/jicest/partner-2.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://jurnal.untirta.ac.id/index.php/EduChemia"  src="{{asset('assets/img/partner-logo/jicest/partner-3.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://jurnal.un   .ac.id/jcena"  src="{{asset('assets/img/partner-logo/jicest/partner-4.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://journal.uinsgd.ac.id/index.php/ak/inde"  src="{{asset('assets/img/partner-logo/jicest/partner-5.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-6.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-7.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-8.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-9.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-10.jpg')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://jkk.unjani.ac.id/index.php/jkk"  src="{{asset('assets/img/partner-logo/jicest/partner-1.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://journal.uinsgd.ac.id/index.php/tadris-kimiya/index"  src="{{asset('assets/img/partner-logo/jicest/partner-2.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://jurnal.untirta.ac.id/index.php/EduChemia"  src="{{asset('assets/img/partner-logo/jicest/partner-3.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://jurnal.unpad.ac.id/jcena"  src="{{asset('assets/img/partner-logo/jicest/partner-4.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://journal.uinsgd.ac.id/index.php/ak/inde"  src="{{asset('assets/img/partner-logo/jicest/partner-5.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-6.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-7.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-8.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-9.png')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--        <img data-link="https://online-journal.unja.ac.id/jisic"  src="{{asset('assets/img/partner-logo/jicest/partner-10.jpg')}}" class="image-link cursor-pointer w-full h-32 object-contain"/>-->
            <!--    </div>-->
            <!--    <script>-->
            <!--        document.addEventListener("DOMContentLoaded", function() {-->
            <!--            const image = document.querySelectorAll('.image-link');-->
            <!--            image.forEach(img => {-->
            <!--                const url = img.getAttribute('data-link');-->
                            <!--img.style.cursor = 'pointer'; // Change cursor to pointer to indicate it's clickable-->
            <!--                img.addEventListener('click', function() {-->
            <!--                    window.open(url, '_blank');-->
            <!--                });-->
            <!--            });-->
            <!--        });-->
            <!--    </script>-->
            <!--</div>-->
            <div class="mt-11">
                <header class="italic text-black">Sponsored By</header>
                <div class="flex gap-10 px-5 justify-center">
                    <img src="{{asset('uploads/logo bank jambi.png')}}" class="object-contain mt-2 w-96" width=""/>
                </div>
            </div>
            <div class="mt-11">
                <header class="italic text-black">Hosted and Managed by</header>
                <div class="flex gap-10 px-5 justify-center">
                    <img src="{{asset('assets/logos/unja3d.png')}}" class="object-contain" width="90"/>
                    <div class="text-white py-5 text-left w-fit">
                        <p class="font-serif text-3xl font-medium text-blue-800">FACULTY OF SCIENCE AND TECHNOLOGY</p>
                        <p class="font-sans text-3xl font-semibold text-orange-500">UNIVERSITAS JAMBI</p>
                    </div>
                </div>
            </div>
            <div class="border-t-[1px] border-gray-400 text-black py-3 mt-10 w-full">
                Copyright © 2025 All rights reserved | JICEST 2025
            </div>
        </div>

    </footer>

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
    </script>
    @yield('script')
</body>

</html>
