@extends('layouts.main-tailwind')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-16 bg-gradient-to-br from-purple-50 via-orange-50 to-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #9333ea 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-lg mb-6 border border-purple-100">
            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
            </svg>
            <span class="text-sm font-semibold text-gray-700">Conference Registration</span>
        </div>

        <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
            Registration <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-orange-600">Fees</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-8">
            Choose your ticket plan and secure your spot at JICEST 2025
        </p>

        <!-- Period Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-3xl mx-auto">
            @if($pricing['presenter']['early_bird'])
            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl p-6 shadow-lg text-white">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <h3 class="font-bold text-lg">Early Bird</h3>
                </div>
                <p class="text-emerald-100">{{ $pricing['presenter']['early_bird']['period_start']->format('d M') }} - {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}</p>
            </div>
            @endif

            @if($pricing['presenter']['non_early_bird'])
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 shadow-lg text-white">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="font-bold text-lg">Non Early Bird</h3>
                </div>
                <p class="text-orange-100">{{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }} - {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Pricing Cards Section -->
<div class="py-20 bg-white">
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

<!-- Payment Information Section -->
<div class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Payment Information</h2>
            <p class="text-lg text-gray-600">Contact our team for payment details and registration assistance</p>
        </div>

        <!-- Contact Persons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Contact Person 1 -->
            <div class="group bg-gradient-to-br from-emerald-50 to-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-emerald-100">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Rara Ayu Lestary</h3>
                    <p class="text-gray-600 mb-4 text-lg font-semibold">+6282210794479</p>
                    <a href="https://wa.me/6282210794479" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Chat on WhatsApp
                    </a>
                </div>
            </div>

            <!-- Contact Person 2 -->
            <div class="group bg-gradient-to-br from-sky-50 to-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-sky-100">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Tia Wulandari</h3>
                    <p class="text-gray-600 mb-4 text-lg font-semibold">+6285266469829</p>
                    <a href="https://wa.me/6285266469829" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Email Contact -->
        <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-purple-500 text-center">
            <div class="flex items-center justify-center gap-3 mb-3">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Email Us</h3>
            </div>
            <a href="mailto:jicest@unja.ac.id" class="text-2xl font-bold text-purple-600 hover:text-purple-700 hover:underline">jicest@unja.ac.id</a>
        </div>
    </div>
</div>
@endsection
