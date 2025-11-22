<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - JICEST 2025</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            * {
                font-family: "Poppins", sans-serif;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(5deg); }
            }

            .floating-orb {
                animation: float 6s ease-in-out infinite;
            }

            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }

            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient-shift 15s ease infinite;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-hidden">
        <div class="min-h-screen flex">
            <!-- Left Side - Branding (Hidden on mobile, visible on lg+) -->
            <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-emerald-600 via-sky-600 to-emerald-700 animate-gradient">
                <!-- Animated Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
                </div>

                <!-- Floating Orbs -->
                <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl floating-orb"></div>
                <div class="absolute bottom-20 right-20 w-96 h-96 bg-emerald-400/20 rounded-full blur-3xl floating-orb" style="animation-delay: 2s;"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-center items-center p-12 text-white w-full">
                    <a href="/" class="mb-8">
                        <img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST Logo" class="w-64 drop-shadow-2xl hover:scale-105 transition-transform duration-300">
                    </a>

                    <div class="text-center max-w-md">
                        <h1 class="text-4xl font-bold mb-4 drop-shadow-lg">Welcome to JICEST 2025</h1>
                        <p class="text-lg text-white/90 mb-6 leading-relaxed">
                            Jambi International Conference on Engineering, Science, and Technology
                        </p>
                        <div class="bg-white/20 backdrop-blur-md rounded-full px-6 py-3 inline-block border border-white/30">
                            <p class="font-semibold">📅 November 28, 2025</p>
                        </div>

                        <!-- Conference Info -->
                        <div class="grid grid-cols-2 gap-4 mt-12">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                                <div class="text-3xl font-bold">2025</div>
                                <div class="text-sm text-white/80">Conference</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                                <div class="text-3xl font-bold">5</div>
                                <div class="text-sm text-white/80">Sub-Themes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-gray-50 relative overflow-y-auto">
                <!-- Mobile Logo -->
                <div class="lg:hidden absolute top-6 left-1/2 transform -translate-x-1/2">
                    <a href="/">
                        <img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST Logo" class="w-32">
                    </a>
                </div>

                <!-- Form Container -->
                <div class="w-full max-w-md mt-20 lg:mt-0">
                    <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
                        {{ $slot }}
                    </div>

                    <!-- Back to Home -->
                    <div class="text-center mt-6">
                        <a href="/" class="text-sm text-gray-600 hover:text-emerald-600 transition-colors inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to Homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
