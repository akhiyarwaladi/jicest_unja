@extends('layouts.main-tailwind')

@section('css')
    <style>
        .overlay-gradient {
            background: linear-gradient(to top, rgba(249, 115, 22, 0.5), rgba(249, 115, 22, 0));
        }

        .keynote-image {
            min-width: 100px;
            min-height: 100px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            object-position: 10% 10%;
            border-radius: 0.125em;
            cursor: pointer;
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }

        .cs-map {
            height: 400px;
            -webkit-box-shadow: 0px 12px 30px rgba(11, 12, 48, 0.15);
            box-shadow: 0px 12px 30px rgba(11, 12, 48, 0.15);
        }

        .cs-map iframe {
            width: 100%;
        }

        .triangle-1 {
            border-top: 30px solid;
            border-top-color: linear-gradient(to bottom right, #fb923c, #ec4899);   ;
            border-left: 30px solid;
            border-left-color: transparent;
            background: linear-gradient(to bottom left, #fb923c, #ec4899);
            -webkit-clip-path: polygon(0 100%, 100% 100%, 100% 0);
            clip-path: polygon(0 100%, 100% 100%, 100% 0);
        }

        .triangle-2 {
            border-top: 30px solid;
            border-top-color: linear-gradient(to bottom right, #fb923c, #ec4899);;
            border-right: 30px solid;
            border-right-color: transparent;
            background: linear-gradient(to bottom right, #fb923c, #ec4899);
            -webkit-clip-path: polygon(0 0, 0 100%, 100% 100%);
            clip-path: polygon(0 0, 0 100%, 100% 100%);
        }
    </style>
@endsection

@section('content')
    <div class="main static z-[-1]">
        @include('homepage.components.header')
        <div class="main h-fit w-full  ">
            <div class="bg-gradient-to-b from-orange-400 to-pink-500 p-10 text-white gap-3 flex flex-col md:flex-row items-center justify-between ">
                <div class="">
                    <div class="drop-shadow text-xl">Conference Date</div>
                    <div class="drop-shadow text-3xl font-bold">Count Every Second Until the Event</div>
                </div>
                <div id="countdown" class="bg-white shadow rounded-full text-pink-500 text-xl font-bold px-5 py-2 w-fit">Loading...</div>
                <script>
                    const targetDate = new Date('October 29, 2024 00:00:00').getTime();

                    const countdownTimer = setInterval(() => {
                        const now = new Date().getTime();
                        const distance = targetDate - now;
                        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        document.getElementById('countdown').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                        if (distance < 0) {
                            clearInterval(countdownTimer);
                            document.getElementById('countdown').innerHTML = "EXPIRED";
                        }
                    }, 1000);
                </script>

            </div>
            @include('homepage.components.about')
            @include('homepage.components.keynote')
            @include('homepage.components.date')
            @include('homepage.components.pricing')
            @include('homepage.components.icon-jambi')
            <section class="flex flex-col md:flex-row p-10 items-start md:items-center md:justify-center w-full gap-7" style="">
                <div class="w-fit">
                    <div class="section-title">
                        <h2 class="text-2xl font-bold">Location</h2>
                        <p class="text-sm text-gray-500">Get directions to our event center</p>
                    </div>
                    <div class="py-3">
                        <div class="text-sm text-gray-500">Address: </div>
                        <div class="">Universitas Jambi, Indonesia</div>
                    </div>
                    <div class="py-3">
                        <div class="text-sm text-gray-500">Phone:</div>
                        <div>Winny (+6282182797606)</div>
                        <div>Sarah (+6285213441800)</div>
                    </div>

                    <div class="py-3">
                        <div class="text-sm text-gray-500">Email:</div>
                        <div>jicest@unja.ac.id</div>
                    </div>
                    <div class="py-3">
                        <span class="text-sm text-gray-500">Website:</span>
                        <a href="https://jicest.unja.ac.id" class="text-sky-500 cursor-pointer underline">
                            <p>https://jicest.unja.ac.id</p>
                        </a>
                    </div>
                </div>
                <div class="h-full w-full md:w-1/2 max-w-[700px]">
                    <div class="cs-map">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.6927320260347!2d103.52009062425653!3d-1.6153859902453034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f63af4c66b3ab%3A0xcfc5de0b9dfcc65e!2sFakultas%20Sains%20Dan%20Teknologi%20Gedung%20B!5e0!3m2!1sid!2sid!4v1694851413099!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('js')
@endpush
