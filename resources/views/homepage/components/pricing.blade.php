<!-- Pricing Section with Dark Background -->
<div class="relative w-full h-fit py-20 bg-gradient-to-br from-gray-900 via-sky-900 to-emerald-900 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>

    <div class="relative flex items-center flex-col p-6 md:p-10">
        <!-- Header -->
        <header class="text-4xl md:text-5xl font-bold text-white mb-4">Registration Fees</header>
        <div class="text-xl text-white/80 mb-8">Choose your ticket plan and secure your spot at JICEST 2025</div>

        <!-- Period Information -->
        <div class="text-center mt-6 mb-8 flex flex-col md:flex-row gap-4 md:gap-3">
            @if(isset($pricing['presenter']['early_bird']) && $pricing['presenter']['early_bird'])
                <div class="inline-block text-lg md:text-xl font-semibold text-white drop-shadow-md bg-emerald-500 rounded-lg px-6 py-3">
                    Early Bird: {{ $pricing['presenter']['early_bird']['period_start']->format('d M') }} - {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}
                </div>
            @endif
            @if(isset($pricing['presenter']['non_early_bird']) && $pricing['presenter']['non_early_bird'])
                <div class="inline-block text-lg md:text-xl font-semibold text-white drop-shadow-md bg-orange-500 rounded-lg px-6 py-3">
                    Non Early Bird: {{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }} - {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}
                </div>
            @endif
        </div>

        <!-- Pricing Cards -->
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Presenter Card -->
            <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border-t-4 border-purple-500">
                <!-- Ribbon Badge -->
                <div class="absolute top-4 right-4 z-10">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-full shadow-lg flex items-center gap-2 text-sm font-bold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Popular
                    </div>
                </div>

                <div class="p-8">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-lg mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>

                    <h3 class="text-3xl font-black text-gray-900 text-center mb-6">PRESENTER</h3>

                    <!-- Early Bird Pricing -->
                    <div class="mb-4">
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="font-bold">Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-emerald-50 py-4 px-4 rounded-b-lg border-2 border-emerald-100">
                            <p class="text-3xl font-black text-emerald-600 text-center">{{ $pricing['presenter']['early_bird']['formatted'] ?? '350K IDR / 25 USD' }}</p>
                        </div>
                    </div>

                    <!-- Non Early Bird Pricing -->
                    <div>
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-bold">Non Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-orange-50 py-4 px-4 rounded-b-lg border-2 border-orange-100">
                            <p class="text-3xl font-black text-orange-600 text-center">{{ $pricing['presenter']['non_early_bird']['formatted'] ?? '450K IDR / 30 USD' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Participant Card -->
            <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border-t-4 border-sky-500">
                <div class="p-8">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-sky-400 to-sky-600 rounded-xl flex items-center justify-center shadow-lg mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>

                    <h3 class="text-3xl font-black text-gray-900 text-center mb-6">PARTICIPANT</h3>

                    <!-- Early Bird Pricing -->
                    <div class="mb-4">
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="font-bold">Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-emerald-50 py-4 px-4 rounded-b-lg border-2 border-emerald-100">
                            <p class="text-3xl font-black text-emerald-600 text-center">{{ $pricing['participant']['early_bird']['formatted'] ?? '250K IDR / 18 USD' }}</p>
                        </div>
                    </div>

                    <!-- Non Early Bird Pricing -->
                    <div>
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-bold">Non Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-orange-50 py-4 px-4 rounded-b-lg border-2 border-orange-100">
                            <p class="text-3xl font-black text-orange-600 text-center">{{ $pricing['participant']['non_early_bird']['formatted'] ?? '350K IDR / 23 USD' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Presenter Student Card -->
            <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border-t-4 border-indigo-500">
                <div class="p-8">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                        </svg>
                    </div>

                    <h3 class="text-3xl font-black text-gray-900 text-center mb-2">PRESENTER</h3>
                    <p class="text-lg text-indigo-600 font-semibold text-center mb-6">Student</p>

                    <!-- Early Bird Pricing -->
                    <div class="mb-4">
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="font-bold">Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-emerald-50 py-4 px-4 rounded-b-lg border-2 border-emerald-100">
                            <p class="text-3xl font-black text-emerald-600 text-center">{{ $pricing['presenter_student']['early_bird']['formatted'] ?? '250K IDR / 18 USD' }}</p>
                        </div>
                    </div>

                    <!-- Non Early Bird Pricing -->
                    <div>
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-bold">Non Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-orange-50 py-4 px-4 rounded-b-lg border-2 border-orange-100">
                            <p class="text-3xl font-black text-orange-600 text-center">{{ $pricing['presenter_student']['non_early_bird']['formatted'] ?? '250K IDR / 18 USD' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Participant Student Card -->
            <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border-t-4 border-teal-500">
                <div class="p-8">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-600 rounded-xl flex items-center justify-center shadow-lg mb-4 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>

                    <h3 class="text-3xl font-black text-gray-900 text-center mb-2">PARTICIPANT</h3>
                    <p class="text-lg text-teal-600 font-semibold text-center mb-6">Student</p>

                    <!-- Early Bird Pricing -->
                    <div class="mb-4">
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="font-bold">Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-emerald-50 py-4 px-4 rounded-b-lg border-2 border-emerald-100">
                            <p class="text-3xl font-black text-emerald-600 text-center">{{ $pricing['participant_student']['early_bird']['formatted'] ?? '50K IDR / 4 USD' }}</p>
                        </div>
                    </div>

                    <!-- Non Early Bird Pricing -->
                    <div>
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-t-lg">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-bold">Non Early Bird</span>
                            </div>
                        </div>
                        <div class="bg-orange-50 py-4 px-4 rounded-b-lg border-2 border-orange-100">
                            <p class="text-3xl font-black text-orange-600 text-center">{{ $pricing['participant_student']['non_early_bird']['formatted'] ?? '50K IDR / 4 USD' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
