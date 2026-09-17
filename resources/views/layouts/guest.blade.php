<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - JICEST 2026</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Editorial system: the branding panel below uses .ed-ink-band and
             .ed-display, so the stylesheet must be loaded here too. --}}
        @include('assets.editorial')

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
            <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden ed-ink-band">

                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-center items-center p-12 text-white w-full">
                    <a href="/" class="mb-8">
                        <img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST Logo" class="w-64">
                    </a>

                    <div class="text-center max-w-md">
                        <h1 class="ed-display text-4xl mb-5 text-white">Welcome to JICEST 2026</h1>
                        <p class="text-base text-white/70 mb-8 leading-relaxed">
                            Jambi International Conference on Engineering, Science, and Technology
                        </p>

                        <div class="ed-mono text-base text-white/70 border-y border-white/15 py-4">
                            Wednesday, 11 November 2026 &middot; online
                        </div>

                        <!-- Conference Info -->
                        <dl class="grid grid-cols-2 gap-6 mt-10 text-left">
                            <div class="border-t border-white/15 pt-4">
                                <dt class="ed-mono text-sm tracking-[.14em] uppercase text-white/70">Edition</dt>
                                <dd class="ed-display text-2xl text-white mt-2">4th</dd>
                            </div>
                            <div class="border-t border-white/15 pt-4">
                                <dt class="ed-mono text-sm tracking-[.14em] uppercase text-white/70">Sub-themes</dt>
                                <dd class="ed-display text-2xl text-white mt-2">06</dd>
                            </div>
                        </dl>
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

                <!-- Form Container: hairline card, square corners, no drop shadow -->
                <div class="w-full max-w-md mt-20 lg:mt-0">
                    <div class="bg-white border border-[rgba(11,27,20,0.14)] p-8 md:p-10">
                        {{ $slot }}
                    </div>

                    <!-- Back to Home -->
                    <div class="text-center mt-6">
                        <a href="/" class="ed-mono text-sm tracking-[.16em] uppercase text-[rgba(11,27,20,0.80)] hover:text-[#0b1b14] transition-colors inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
