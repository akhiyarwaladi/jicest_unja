<div id="page-header w-screen w-fit flex overflow-hidden relative z-[-1]">

    <div
        class="w-full min-h-screen h-full gap-6 flex flex-col justify-center items-center p-6 md:p-10 pt-24 md:pt-32 top-0 left-0 relative">
        <img src="{{ asset('assets/bg/fstaaa.jpeg') }}" class="w-full h-full object-cover absolute left-0 top-0" />
        <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-black/40 via-black/20 to-black/60"></div>
        <div class="w-full h-full absolute top-0 left-0 glassmorphism glassmorphism-sm "></div>
        <div class="w-full h-full absolute top-0 left-0 flex flex-col justify-end">
            <div class="overlay-gradient w-full h-[200px]"></div>
        </div>

        <!-- University Badge -->
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-6 py-3 mb-4 fade-in-up">
            <span class="text-white/90 text-sm md:text-base font-medium">November 28, 2025 • Online Conference</span>
        </div>

        <!-- Main Title - Ultra Large -->
        <h1 class="text-4xl md:text-6xl lg:text-8xl font-black text-white leading-tight mb-4 tracking-tight text-center drop-shadow-2xl fade-in-up max-w-5xl">
            JICEST <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-sky-400">2025</span>
        </h1>

        <!-- Subtitle - Better Contrast -->
        <p class="text-lg md:text-xl lg:text-2xl text-white/95 max-w-4xl mx-auto mb-8 leading-relaxed font-light text-center px-4 drop-shadow-lg fade-in-up">
            Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society
        </p>

        <!-- University Info -->
        <p class="text-white/80 text-base md:text-lg italic font-medium bg-black/20 backdrop-blur-sm rounded-lg px-6 py-2 mb-8 fade-in-up">
            Faculty of Science and Technology, Universitas Jambi
        </p>

        <!-- CTA Group -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12 z-10 fade-in-up">
            <a
                href="{{auth()->check() ? '/dashboard' : '/login'}}"
                class="group relative px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full font-semibold text-white shadow-2xl hover:shadow-emerald-500/50 transform hover:-translate-y-1 transition-all duration-300">
                <span class="flex items-center gap-2">
                    📝 Submit Abstract
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </span>
            </a>
            <a href="#about" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 rounded-full font-semibold text-white hover:bg-white/20 transition-all duration-300">
                Learn More
            </a>
        </div>
        <div class=" mt-5">
            <div class="w-full block md:block items-center gap-2 justify-center text-white drop-shadow-lg ">

                <p class="text-white text-xl italic font-semibold w-full text-center mb-3">Opening Speech</p>
                <div class=" block md:flex gap-4">
                    <div class="flex items-center text-right">
                        <div class="drop-shadow-lg mr-3">
                            <p class="font-bold">Drs. Jefri Marzal, M.Sc., D.I.T.</p>
                            <p>Dean of Faculty <br> Science and Technology <br> Universitas Jambi</p>
                        </div>
                        <img class="drop-shadow-md border-2 border-black w-[120px] h-[120px] object-cover rounded-full" src="{{ asset('assets/dean.jpg') }}" />
                    </div>
                    <div class="flex gap-4 items-center">
                        <img class="drop-shadow-md border-2 border-black w-[120px] h-[120px] object-cover rounded-full" src="{{ asset('assets/xrector.png') }}" />
                        <div class="drop-shadow-lg">
                            <p class="font-bold">Prof. Dr. Helmi, S.H., M.H. </p>
                            <p>Rector of Universitas Jambi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
