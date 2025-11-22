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
        }

        .keynote-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center center;
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
            <div class="relative py-20 bg-gradient-to-br from-sky-500 via-sky-600 to-emerald-600 overflow-hidden">
                <!-- Animated Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
                </div>

                <div class="relative max-w-6xl mx-auto px-6 text-center">
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg">Event Starts In</h2>
                    <p class="text-white/90 text-base md:text-lg mb-12">Mark your calendar for November 28, 2025</p>

                    <!-- Enhanced Countdown -->
                    <div class="grid grid-cols-4 gap-3 md:gap-8 max-w-4xl mx-auto">
                        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 md:p-6 transform hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl md:text-6xl font-black text-white" id="days">000</div>
                            <div class="text-white/80 text-xs md:text-base mt-2 uppercase tracking-wider">Days</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 md:p-6 transform hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl md:text-6xl font-black text-white" id="hours">00</div>
                            <div class="text-white/80 text-xs md:text-base mt-2 uppercase tracking-wider">Hours</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 md:p-6 transform hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl md:text-6xl font-black text-white" id="minutes">00</div>
                            <div class="text-white/80 text-xs md:text-base mt-2 uppercase tracking-wider">Minutes</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 md:p-6 transform hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl md:text-6xl font-black text-white" id="seconds">00</div>
                            <div class="text-white/80 text-xs md:text-base mt-2 uppercase tracking-wider">Seconds</div>
                        </div>
                    </div>

                    <script>
                        const targetDate = new Date('November 28, 2025 00:00:00').getTime();
                        setInterval(() => {
                            const now = new Date().getTime();
                            const distance = targetDate - now;
                            document.getElementById('days').textContent = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(3, '0');
                            document.getElementById('hours').textContent = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                            document.getElementById('minutes').textContent = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                            document.getElementById('seconds').textContent = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                        }, 1000);
                    </script>
                </div>
            </div>
            @include('homepage.components.about')
            @include('homepage.components.keynote')
            @include('homepage.components.publication')
            @include('homepage.components.date')
            @include('homepage.components.pricing')
            @include('homepage.components.icon-jambi')
            <!-- Location & Contact Section -->
            <section class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="text-center mb-16">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Location & Contact</h2>
                        <p class="text-xl text-gray-600">Get in touch with us</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <!-- Contact Cards -->
                        <div class="space-y-6">
                            <!-- Address Card -->
                            <div class="bg-gradient-to-br from-sky-50 to-sky-100 rounded-2xl p-6 border border-sky-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-sky-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">Address</h3>
                                        <p class="text-gray-700">Faculty of Science and Technology<br>Universitas Jambi, Indonesia</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Person Cards -->
                            <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl p-6 border border-emerald-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-bold text-gray-900 mb-3">Contact Person</h3>
                                        <div class="space-y-3">
                                            <a href="https://wa.me/6282210794479" target="_blank" class="flex items-center gap-3 bg-white rounded-lg px-4 py-3 hover:bg-emerald-50 transition-colors group">
                                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                                </svg>
                                                <div class="text-left">
                                                    <div class="font-semibold text-gray-900">Rara Ayu Lestary</div>
                                                    <div class="text-sm text-gray-600">+62 822-1079-4479</div>
                                                </div>
                                            </a>
                                            <a href="https://wa.me/6285266469829" target="_blank" class="flex items-center gap-3 bg-white rounded-lg px-4 py-3 hover:bg-emerald-50 transition-colors group">
                                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                                </svg>
                                                <div class="text-left">
                                                    <div class="font-semibold text-gray-900">Tia Wulandari</div>
                                                    <div class="text-sm text-gray-600">+62 852-6646-9829</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Card -->
                            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">Email</h3>
                                        <a href="mailto:jicest@unja.ac.id" class="text-purple-600 hover:text-purple-700 font-semibold">jicest@unja.ac.id</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Website Card -->
                            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">Website</h3>
                                        <a href="https://jicest.unja.ac.id" target="_blank" class="text-orange-600 hover:text-orange-700 font-semibold">jicest.unja.ac.id</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map -->
                        <div class="h-[600px] rounded-2xl overflow-hidden shadow-xl border-4 border-gray-200">
                            <iframe class="w-full h-full"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.6927320260347!2d103.52009062425653!3d-1.6153859902453034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f63af4c66b3ab%3A0xcfc5de0b9dfcc65e!2sFakultas%20Sains%20Dan%20Teknologi%20Gedung%20B!5e0!3m2!1sid!2sid!4v1694851413099!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('js')
@endpush
