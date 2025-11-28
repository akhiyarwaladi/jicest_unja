@extends('layouts.main-tailwind')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-16 bg-gradient-to-br from-emerald-50 via-sky-50 to-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #059669 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <!-- Title Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center px-4 py-2 bg-emerald-100 rounded-full mb-6">
                <svg class="w-5 h-5 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span class="text-emerald-700 font-semibold">Conference Publications</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6">
                JICEST 2025 <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-sky-600">Proceeding</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Jambi International Conference on Engineering, Science, and Technology
            </p>
            <p class="text-lg text-gray-500 mt-3">
                Faculty of Science and Technology, Universitas Jambi
            </p>
        </div>
    </div>
</div>

<!-- Publication Cards Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Book of Abstract Card - Available -->
            <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <!-- Header -->
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Book of Abstract</h3>
                                <p class="text-emerald-100">Research Summaries</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-4 py-2 bg-white text-emerald-600 font-bold text-sm rounded-full shadow-lg">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                            Available Now
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Access the complete collection of abstracts from JICEST 2025. This publication contains research summaries from all presenters across six conference sub-themes.
                    </p>

                    <!-- Features -->
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Complete abstracts from all presenters</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Covering six research domains</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">Official FST UNJA publication</span>
                        </div>
                    </div>

                    <!-- QR Code -->
                    <div class="bg-gradient-to-br from-emerald-50 to-sky-50 rounded-2xl p-6 mb-6">
                        <div class="flex flex-col sm:flex-row items-center gap-6">
                            <div class="bg-white rounded-xl p-3 shadow-md">
                                <img src="{{ asset('uploads/proceeding_related/Book_of_Abstract_JICEST_2025_Code.jpeg') }}"
                                     alt="QR Code - Book of Abstract JICEST 2025"
                                     class="w-32 h-32 object-contain">
                            </div>
                            <div class="text-center sm:text-left">
                                <h4 class="font-semibold text-gray-900 mb-1">Scan QR Code</h4>
                                <p class="text-sm text-gray-600">Use your smartphone camera to scan and download directly</p>
                            </div>
                        </div>
                    </div>

                    <!-- Download Button -->
                    <a href="{{ asset('uploads/proceeding_related/Book_of_Abstract_JICEST_2025.pdf') }}"
                       download="Book_of_Abstract_JICEST_2025.pdf"
                       class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download Book of Abstract
                    </a>
                    <p class="text-center text-sm text-gray-500 mt-3">PDF Format - Free Download</p>
                </div>
            </div>

            <!-- Full Paper Proceeding Card - Coming Soon -->
            <div class="bg-white rounded-3xl shadow-xl border border-amber-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <!-- Header -->
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Full Paper Proceeding</h3>
                                <p class="text-amber-100">Complete Research Papers</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-4 py-2 bg-white text-amber-600 font-bold text-sm rounded-full shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Coming Soon
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        The complete Full Paper Proceeding containing all accepted research papers from JICEST 2025 is currently being prepared and will be published soon.
                    </p>

                    <!-- Timeline Notice -->
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-6 mb-6 border border-amber-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Expected Publication</h4>
                                <p class="text-amber-700 font-semibold text-lg mb-1">3 - 6 Months</p>
                                <p class="text-gray-600 text-sm">Estimated availability: March - June 2026</p>
                            </div>
                        </div>
                    </div>

                    <!-- What to Expect -->
                    <h4 class="font-semibold text-gray-900 mb-4">What to Expect</h4>
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <span class="text-gray-700">Full research papers with complete methodology</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            <span class="text-gray-700">Detailed results and analysis</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                            <span class="text-gray-700">Peer-reviewed and indexed publication</span>
                        </div>
                    </div>

                    <!-- Status Illustration -->
                    <div class="bg-gray-50 rounded-2xl p-8 text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">In Preparation</h4>
                        <p class="text-gray-500 text-sm">Our editorial team is currently reviewing and compiling all accepted papers</p>
                    </div>

                    <!-- Disabled Button -->
                    <button disabled
                            class="w-full mt-6 inline-flex items-center justify-center gap-3 px-8 py-4 bg-gray-200 text-gray-500 font-bold text-lg rounded-xl cursor-not-allowed">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Coming Soon
                    </button>
                    <p class="text-center text-sm text-gray-400 mt-3">Check back in a few months</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Banner -->
<div class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6">
        <div class="bg-gradient-to-r from-sky-500 to-blue-600 rounded-3xl p-8 md:p-10 text-white shadow-2xl">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center md:text-left flex-1">
                    <h3 class="text-xl md:text-2xl font-bold mb-2">Stay Updated</h3>
                    <p class="text-sky-100 leading-relaxed">
                        We will announce the availability of the Full Paper Proceeding through official channels.
                        Please check this page periodically or follow our updates for the latest information.
                    </p>
                </div>
                <a href="/contact" class="flex-shrink-0 inline-flex items-center gap-2 px-6 py-3 bg-white text-sky-600 font-semibold rounded-xl hover:bg-sky-50 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Conference Theme Section -->
<div class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="bg-gradient-to-br from-emerald-500 to-sky-600 rounded-3xl p-8 md:p-12 text-white shadow-2xl">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="flex-shrink-0">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <h3 class="text-2xl md:text-3xl font-bold mb-3">Conference Theme 2025</h3>
                    <p class="text-lg md:text-xl text-emerald-50 leading-relaxed">
                        "Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society"
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
