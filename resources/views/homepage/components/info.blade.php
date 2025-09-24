<div class="p-28">
    <div id="controls-carousel" class="relative w-full z-[1]" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden h-screen ">
            <!-- Item 1 -->
            <div class="hidden duration-300 ease-linear absolute top-0 left-0" data-carousel-item>
                <img src="{{ asset('assets/bg/candi.jpg') }}"
                    class="absolute block w-full h-full top-0 left-0 object-cover" alt="...">
                <div class="bg-gradient-to-t from-black to-transparent w-full h-full absolute top-0 left-0"></div>
                <div class="absolute top-0 left-0 w-full h-full flex items-end text-white">
                    <div class="w-full p-10 flex flex-col items-center">
                        <header class="text-2xl font-semibold">Muaro Jambi Temple Compounds</header>
                        <div class="text-center">
                            Muaro Jambi (Indonesian: Candi Muaro Jambi) is a Buddhist temple complex, in Muaro Jambi
                            Regency, Jambi province, Sumatra, Indonesia. It is situated 26 kilometers east from the city
                            of
                            Jambi. The temple complex was built by the Melayu Kingdom, with its surviving temples and
                            other
                            archaeological remains estimated to date from the 7th to 13th century CE.

                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-300 ease-linear" data-carousel-item="active">
                <img src="{{ asset('assets/bg/gentala.jpg') }}"
                    class="absolute block w-full h-full top-0 left-0 object-cover" alt="...">
                <div class="bg-gradient-to-t from-black to-transparent w-full h-full absolute top-0 left-0"></div>
                <div class="absolute top-0 left-0 w-full h-full flex items-end text-white">
                    <div class="w-full p-10 flex flex-col items-center">
                        <header class="text-2xl font-semibold">Gentala Arasy Bridge</header>
                        <div class="text-center">
                            Gentala Arasy bridge is one of the icons in Jambi. This bridge was built in 2012 and was
                            inaugurated by Mr. Jusuf Kalla as Vice President at that time. Actually there are two
                            objects in
                            this location, the tower of Gentala Arasy and Pedestrian bridge. But most people prefer to
                            call
                            Gentala Arasy bridge.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>
