@php
    // Shared focus style for every interactive element in the masthead.
    $focus = "outline-none focus-visible:ring-1 focus-visible:ring-[#047857] transition-colors";
@endphp

{{-- Editorial masthead: warm paper bar, hairline bottom rule, monospaced navigation.
     Replaces the previous frosted-glass bar with emerald pill links. --}}
<nav class="fixed top-0 left-0 w-full z-[999] bg-[#fbfaf5]/95 backdrop-blur border-b border-[rgba(11,27,20,0.14)]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16 md:h-[72px]">

        <a href="/" class="{{$focus}} flex items-center gap-3 shrink-0">
            <img src="{{ asset('assets/logos/jicest.png') }}" class="h-10 md:h-11 w-auto" alt="JICEST 2026" />
            <img src="{{ asset('assets/img/unja-logo-2026.png') }}" class="h-8 w-auto" alt="Universitas Jambi" />
        </a>

        <button type="button" onclick="toggleNavbar('navbar-dropdown', this)"
            class="{{$focus}} md:hidden w-10 h-10 flex flex-col items-center justify-center gap-[5px] text-[#0b1b14] border border-[rgba(11,27,20,0.14)]"
            aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbar-dropdown">
            <span class="block w-5 h-px bg-current"></span>
            <span class="block w-5 h-px bg-current"></span>
            <span class="block w-5 h-px bg-current"></span>
        </button>

        <div id="navbar-dropdown"
            class="scale-0 h-0 overflow-hidden w-full md:overflow-visible md:scale-100 md:h-auto md:w-auto">
            <div class="border-t border-[rgba(11,27,20,0.14)] md:border-t-0 mt-3 md:mt-0 pb-4 md:pb-0">
                @include('templates.navlist', [
                    'navList' => [
                        ['name' => 'Home', 'type' => 'single', 'link' => '/', 'inclusion' => ['Home']],
                        [
                            'name' => 'Information',
                            'type' => 'multiple',
                            'menu' => [
                                ['name' => 'Registration Fee', 'type' => 'single', 'link' => '/registration-fee', 'inclusion' => ['Registration Fee']],
                                ['name' => 'About Conference', 'type' => 'single', 'link' => '/about-conference', 'inclusion' => ['About']],
                                ['name' => 'Contact', 'type' => 'single', 'link' => '/contact', 'inclusion' => ['Contact']],
                            ],
                            'inclusion' => ['Registration Fee', 'About', 'Contact'],
                        ],
                        ['name' => 'Schedule', 'type' => 'single', 'link' => '/rundown', 'inclusion' => ["Schedule"]],
                        [
                            'name' => 'Download',
                            'type' => 'multiple',
                            'menu' => [
                                 ['name' => 'Paper Template JICEST', 'type' => 'download', 'link' => route('downloads.paper'), 'inclusion' => [""]],
                                 ['name' => 'Abstract Template JICEST', 'type' => 'download', 'link' => route('downloads.abstract'), 'inclusion' => [""]],
                                ['name' => 'Oral Presentation Schedule JICEST', 'type' => 'download', 'link' => '/download-schedule-template', 'inclusion' => [""]],
                                ['name' => 'Presentation Guideline JICEST', 'type' => 'download', 'link' => '/download-guidelines-template', 'inclusion' => [""]],
                            ],
                            'inclusion' => [''],
                        ],
                        ['name' => 'Proceeding', 'type' => 'single', 'link' => '/proceeding', 'inclusion' => ['Proceeding']],
                    ],
                ])
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleNavbar(id, trigger) {
        const element = document.getElementById(id);
        const opening = element.classList.contains('scale-0');
        if (opening) {
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
        if (trigger) trigger.setAttribute('aria-expanded', opening ? 'true' : 'false');
    }
</script>
