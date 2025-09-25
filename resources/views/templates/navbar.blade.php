@php
    $outline = "outline-none outline-offset-0 border-2 border-transparent focus:border-orange-500 focus:outline-[3px] focus:outline-orange-300 transition-all";
@endphp

<nav class="glassmorphism bg-white bg-opacity-75 fixed top-0 left-0 w-full border-gray-200 font-semibold z-[999]">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 h-fit">
        <a href="/" class="{{$outline}} flex items-center space-x-3 rtl:space-x-reverse px-3 gap-3 h-8 overflow-y-visible">
            <img src="{{ asset('assets/logos/jicest.png') }}" class="h-[70px]" alt="jicest" />
            <img src="{{ asset('assets/logos/unja3d.png') }}" class="h-8" alt="unja" />
        </a>
        <button type="button"
            class="w-10 h-10 bg-gradient-to-r from-orange-500 to-pink-500 flex items-center justify-center rounded md:hidden "
            onclick="toggleNavbar('navbar-dropdown')">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="scale-0 w-full h-0 flex flex-col mt-2 md:mt-0 md:py-0 md:scale-100 md:w-auto bg-transparent md:h-8 "
            id="navbar-dropdown">
            @include('templates.navlist', [
                'navList' => [
                    ['name' => 'Home', 'type' => 'single', 'link' => '/', 'inclusion' => ['Home']],
                    [
                        'name' => 'Information',
                        'type' => 'multiple',
                        'menu' => [
                            ['name' => 'Registration Fee', 'type' => 'single', 'link' => '/registration-fee','inclusion' => ['Registration Fee'],],
                            ['name' => 'About Conference', 'type' => 'single', 'link' => '/about-conference','inclusion' => ['About'],],
                            ['name' => 'Contact', 'type' => 'single', 'link' => '/contact','inclusion' => ['Contact'],],
                        ],
                        'inclusion' => ['Registration Fee', 'About', 'Contact'],

                    ],
                    ['name' => 'Rundown', 'type' => 'single', 'link' => '/rundown-jicest2023', 'inclusion' => ["Rundown Jicest 2023"]],
                    [
                        'name' => 'Download',
                        'type' => 'multiple',
                        'menu' => [
                            ['name' => 'Paper Template JICEST', 'type' => 'download', 'link' => 'https://jicest.unja.ac.id/uploads/downloads/JICEST_Paper.docx', 'inclusion' => [""]],
                            ['name' => 'Abstrack Template JICEST', 'type' => 'download', 'link' => 'https://jicest.unja.ac.id/uploads/TemplateAbstract2025.docx', 'inclusion' => [""]],
                            ['name' => 'Oral Presentation Schedule JICEST', 'type' => 'download', 'link' => '/download-schedule-template', 'inclusion' => [""]],
                            ['name' => 'Presentation Guideline JICEST', 'type' => 'download', 'link' => '/download-guidelines-template', 'inclusion' => [""]],
                        ],
                        'inclusion' => [''],
                    ],
                ],
            ])
        </div>
    </div>
</nav>

<script>
    function toggleNavbar(id) {
        const element = document.getElementById(id);
        if (element.classList.contains('scale-0')) {
            element.classList.remove('scale-0');
            element.classList.add('scale-100');
            element.classList.add('h-full');
            element.classList.remove('h-0');
        } else {
            element.classList.add('scale-0');
            element.classList.remove('scale-100');
            element.classList.remove('h-full');
            element.classList.add('h-0');
        }
    }
</script>
