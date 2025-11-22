@extends('layouts.main-tailwind')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-16 bg-gradient-to-br from-sky-50 via-emerald-50 to-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #0284c7 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-lg mb-6 border border-sky-100">
            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="text-sm font-semibold text-gray-700">28 November 2025</span>
        </div>

        <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
            Conference <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 to-emerald-600">Schedule</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Join us for a full day of inspiring sessions, networking, and knowledge sharing at JICEST 2025
        </p>
    </div>
</div>

<!-- Timeline Section -->
<div class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Timeline Container -->
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-emerald-200 via-sky-200 to-purple-200 transform md:-translate-x-1/2"></div>

            <!-- Timeline Items -->
            <div class="space-y-12">
                <!-- Registration -->
                <div class="relative flex items-center md:justify-start group">
                    <!-- Timeline Node -->
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-emerald-500 rounded-full border-4 border-white shadow-lg transform -translate-x-1/2 group-hover:scale-150 transition-transform duration-300 z-10"></div>

                    <!-- Content Card -->
                    <div class="ml-20 md:ml-0 md:w-5/12 md:pr-12 md:text-right">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 md:border-l-0 md:border-r-4 border-emerald-500 transform hover:-translate-y-1">
                            <div class="flex md:flex-row-reverse items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Registration</h3>
                                    <div class="inline-block bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm font-semibold mb-2">
                                        07:00 - 08:00
                                    </div>
                                    <p class="text-gray-600 text-sm">Senate Meeting Building of Universitas Jambi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Opening Ceremony -->
                <div class="relative flex items-center md:justify-end group">
                    <!-- Timeline Node -->
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-sky-500 rounded-full border-4 border-white shadow-lg transform -translate-x-1/2 group-hover:scale-150 transition-transform duration-300 z-10"></div>

                    <!-- Content Card -->
                    <div class="ml-20 md:ml-0 md:w-5/12 md:pl-12">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-sky-500 transform hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-sky-400 to-sky-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Opening Ceremony</h3>
                                    <div class="inline-block bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm font-semibold mb-2">
                                        08:00 - 08:30
                                    </div>
                                    <p class="text-gray-600 text-sm">Senate Meeting Building of Universitas Jambi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plenary Session -->
                <div class="relative flex items-center md:justify-start group">
                    <!-- Timeline Node -->
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-purple-500 rounded-full border-4 border-white shadow-lg transform -translate-x-1/2 group-hover:scale-150 transition-transform duration-300 z-10"></div>

                    <!-- Content Card -->
                    <div class="ml-20 md:ml-0 md:w-5/12 md:pr-12 md:text-right">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 md:border-l-0 md:border-r-4 border-purple-500 transform hover:-translate-y-1">
                            <div class="flex md:flex-row-reverse items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Plenary Session</h3>
                                    <div class="inline-block bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold mb-2">
                                        08:30 - 12:00
                                    </div>
                                    <p class="text-gray-600 text-sm">Senate Meeting Building of Universitas Jambi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Break -->
                <div class="relative flex items-center md:justify-end group">
                    <!-- Timeline Node -->
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-orange-500 rounded-full border-4 border-white shadow-lg transform -translate-x-1/2 group-hover:scale-150 transition-transform duration-300 z-10"></div>

                    <!-- Content Card -->
                    <div class="ml-20 md:ml-0 md:w-5/12 md:pl-12">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-orange-500 transform hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Break</h3>
                                    <div class="inline-block bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold mb-2">
                                        12:00 - 13:00
                                    </div>
                                    <p class="text-gray-600 text-sm">Senate Meeting Building of Universitas Jambi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parallel Session -->
                <div class="relative flex items-center md:justify-start group">
                    <!-- Timeline Node -->
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg transform -translate-x-1/2 group-hover:scale-150 transition-transform duration-300 z-10"></div>

                    <!-- Content Card -->
                    <div class="ml-20 md:ml-0 md:w-5/12 md:pr-12 md:text-right">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 md:border-l-0 md:border-r-4 border-blue-500 transform hover:-translate-y-1">
                            <div class="flex md:flex-row-reverse items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Parallel Session</h3>
                                    <div class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold mb-2">
                                        13:00 - 16:30
                                    </div>
                                    <p class="text-gray-600 text-sm">Senate Meeting Building of Universitas Jambi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Closing Ceremony -->
                <div class="relative flex items-center md:justify-end group">
                    <!-- Timeline Node -->
                    <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-pink-500 rounded-full border-4 border-white shadow-lg transform -translate-x-1/2 group-hover:scale-150 transition-transform duration-300 z-10"></div>

                    <!-- Content Card -->
                    <div class="ml-20 md:ml-0 md:w-5/12 md:pl-12">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-pink-500 transform hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Closing Ceremony</h3>
                                    <div class="inline-block bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-sm font-semibold mb-2">
                                        16:30 - 17:00
                                    </div>
                                    <p class="text-gray-600 text-sm">Senate Meeting Building of Universitas Jambi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
