@extends('layouts.main-tailwind')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-20 bg-gradient-to-br from-emerald-50 via-sky-50 to-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #059669 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <!-- Logo & Title -->
        <div class="text-center mb-16">
            <div class="inline-block mb-8">
                <img src="{{ asset('assets/logos/jicest.png') }}" class="max-w-[400px] w-full drop-shadow-2xl hover:scale-105 transition-transform duration-300">
            </div>
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6">
                About <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-sky-600">JICEST</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Jambi International Conference on Engineering, Science, and Technology
            </p>
        </div>

        <!-- Conference Highlights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-emerald-100">
                <div class="text-4xl font-black text-emerald-600 mb-2">2025</div>
                <div class="text-sm text-gray-600">Conference Year</div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-sky-100">
                <div class="text-4xl font-black text-sky-600 mb-2">Nov 28</div>
                <div class="text-sm text-gray-600">Conference Date</div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-purple-100">
                <div class="text-4xl font-black text-purple-600 mb-2">5</div>
                <div class="text-sm text-gray-600">Sub-Themes</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <article class="text-lg text-gray-700 leading-relaxed space-y-8">
        <section class="text-justify">
            Welcome to the official website of the <span class="font-bold">Jambi International Conference on Engineering, Science, and Technology (JICEST)</span>, taking place at Universitas Jambi, Indonesia, on <span class="font-bold">28 November 2025</span>. As a flagship annual event hosted by the Faculty of Science and Technology, JICEST serves as a premier international platform that unites researchers, experts, practitioners, scholars, and students to exchange groundbreaking research, innovative ideas, and transformative solutions across the dynamic fields of engineering, science, and technology.
        </section>
        <!-- Theme Section -->
        <section class="bg-gradient-to-br from-emerald-50 to-sky-50 rounded-2xl p-8 border border-emerald-100">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Conference Theme 2025</h3>
                    <p class="text-lg">
                        The central theme for JICEST 2025 is <span class="font-bold text-emerald-700">"Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society."</span> This theme highlights the critical role that digital transformation, green energy innovations, and advanced materials play in creating a sustainable future for society.
                    </p>
                </div>
            </div>
        </section>
    </article>
    </div>
</div>

<!-- Sub-Themes Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Conference Sub-Themes</h2>
            <p class="text-xl text-gray-600">Exploring cutting-edge research across five key domains</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Sub-theme 1 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-emerald-500">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Mathematical & Natural Sciences</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Chemistry, Physics, Biology, Mathematics, Industrial Chemistry, Chemical Analysis
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sub-theme 2 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-amber-500">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Earth Sciences & Mining Technology</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Geophysics, Geology, Mining Engineering, Sustainable Resource Management
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sub-theme 3 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-blue-500">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Civil, Chemical & Environmental Engineering</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Sustainable Infrastructure, Chemical Process Engineering, Environmental Technology, Green Engineering
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sub-theme 4 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-purple-500">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Electrical Engineering & Information Systems</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Smart Technology, IoT Applications, Data Analytics, Digital Innovation
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sub-theme 5 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-pink-500 md:col-span-2">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Educational Technology</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Digital Transformation in Education, STEM (Science, Technology, Engineering and Mathematics) Education
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Descriptions -->
<div class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Explore Our Research Domains</h2>
            <p class="text-lg text-gray-600">Deep dive into the five key areas driving innovation at JICEST 2025</p>
        </div>

        <div class="space-y-6">
            <!-- Mathematical & Natural Sciences -->
            <div class="group bg-gradient-to-r from-emerald-50 to-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-emerald-500">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Mathematical & Natural Sciences</h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Mathematical & Natural Sciences form the fundamental backbone of scientific innovation. The conference will showcase cutting-edge research in chemistry, physics, biology, and mathematics, including specialized applications in industrial chemistry and chemical analysis. These disciplines drive breakthrough discoveries that power technological advancement and sustainable development.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Earth Sciences & Mining Technology -->
            <div class="group bg-gradient-to-r from-amber-50 to-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-amber-500">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Earth Sciences & Mining Technology</h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Earth Sciences & Mining Technology address critical challenges in sustainable resource management. Through geophysics, geology, and mining engineering, researchers will present innovative approaches to responsible resource extraction, environmental monitoring, and geological hazard mitigation, ensuring sustainable practices for future generations.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Civil, Chemical & Environmental Engineering -->
            <div class="group bg-gradient-to-r from-blue-50 to-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Civil, Chemical & Environmental Engineering</h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Civil, Chemical & Environmental Engineering focus on building resilient infrastructure and developing clean technologies. The conference will highlight sustainable infrastructure development, advanced chemical process engineering, environmental remediation technologies, and green engineering solutions that address contemporary challenges while minimizing ecological impact.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Electrical Engineering & Information Systems -->
            <div class="group bg-gradient-to-r from-purple-50 to-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-purple-500">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Electrical Engineering & Information Systems</h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Electrical Engineering & Information Systems represent the digital transformation era. Discussions will cover smart technology implementations, Internet of Things (IoT) applications, advanced data analytics, and digital innovation strategies that are reshaping industries and improving quality of life through intelligent systems.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Educational Technology -->
            <div class="group bg-gradient-to-r from-pink-50 to-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-pink-500">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Educational Technology</h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Educational Technology continues to be a cornerstone of modern learning. The conference will explore digital transformation in education and innovative STEM pedagogies that enhance learning outcomes, foster critical thinking, and prepare students for the challenges of an increasingly technological society.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
