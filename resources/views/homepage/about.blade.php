@extends('layouts.main-tailwind')

@section('content')
{{--
    About the conference.

    A masthead, a theme pull-quote and two numbered indexes (short sub-theme list, then the
    longer research-domain descriptions). Replaces the previous stack of gradient statistic
    tiles and rainbow-bordered cards.
--}}
<div class="ed-paper pt-32 pb-20 w-full">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
            <div class="lg:col-span-7 order-2 lg:order-1">
                <p class="ed-eyebrow">About the conference</p>
                <h1 class="ed-display text-5xl md:text-6xl mt-4">
                    JICEST <span style="color:var(--ed-accent)">2026</span>
                </h1>
                <p class="ed-quiet text-xl mt-6 max-w-xl leading-relaxed">
                    Jambi International Conference on Engineering, Science, and Technology, hosted by
                    the Faculty of Science and Technology, Universitas Jambi.
                </p>
            </div>

            <div class="lg:col-span-5 order-1 lg:order-2 lg:justify-self-end w-full">
                <img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST 2026 logo"
                     class="w-full max-w-[320px] h-auto">
            </div>
        </div>

        <dl class="mt-16 grid grid-cols-1 md:grid-cols-3 border-t border-[var(--ed-hair)]">
            <div class="py-7 md:pr-8 md:border-r border-[var(--ed-hair)]">
                <dt class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Edition</dt>
                <dd class="ed-display text-4xl mt-3">4th</dd>
            </div>
            <div class="py-7 md:px-8 md:border-r border-[var(--ed-hair)]">
                <dt class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Conference date</dt>
                <dd class="ed-display text-4xl mt-3">11 Nov 2026</dd>
            </div>
            <div class="py-7 md:pl-8">
                <dt class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Sub-themes</dt>
                <dd class="ed-display text-4xl mt-3">06</dd>
            </div>
        </dl>
    </div>
</div>

{{-- Introduction and theme --}}
<div class="w-full bg-white py-20">
    <div class="max-w-4xl mx-auto px-6">
        <p class="text-lg leading-relaxed ed-quiet">
            Welcome to the official website of the Jambi International Conference on Engineering, Science,
            and Technology (JICEST), taking place online from Universitas Jambi, Indonesia, on
            <span class="font-semibold" style="color:var(--ed-ink)">11 November 2026</span>. As an annual event
            hosted by the Faculty of Science and Technology, JICEST brings together researchers, experts,
            practitioners, scholars, and students to exchange research, ideas, and practical solutions across
            engineering, science, and technology.
        </p>

        <figure class="mt-14 border-l-2 pl-8" style="border-color:var(--ed-accent)">
            <figcaption class="ed-eyebrow">Conference theme 2026</figcaption>
            <blockquote class="ed-display text-2xl md:text-3xl mt-5 leading-snug">
                &ldquo;Accelerating Green Innovation and Digital Transformation in Science, Technology, and
                Engineering for a Sustainable Future.&rdquo;
            </blockquote>
            <p class="ed-quiet text-lg mt-6 leading-relaxed">
                The theme puts green innovation and digital transformation side by side, and asks how advances in
                science, technology, and engineering can be turned into outcomes that hold up in practice: cleaner
                processes, more resilient infrastructure, and tools that reach the people who need them.
            </p>
        </figure>
    </div>
</div>

{{-- Sub-themes (short index) --}}
<div class="w-full py-16 md:py-20 ed-paper">
    <div class="max-w-6xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 pb-2">
            <div>
                <p class="ed-eyebrow">Tracks</p>
                <h2 class="ed-display text-4xl md:text-5xl mt-3">Conference Sub-Themes</h2>
            </div>
            <p class="ed-quiet text-lg md:text-right md:pb-2 max-w-xs">Six tracks, reviewed by separate scientific committees.</p>
        </header>

        @php
            $subThemes = [
                ['index' => '01', 'icon' => 'mathematical-natural-sciences.svg', 'title' => 'Mathematical &amp; Natural Sciences', 'desc' => 'Chemistry, Physics, Biology, Mathematics, Industrial Chemistry, Chemical Analysis'],
                ['index' => '02', 'icon' => 'earth-sciences-mining.svg', 'title' => 'Earth Sciences &amp; Mining Technology', 'desc' => 'Geophysics, Geology, Mining Engineering, Sustainable Resource Management'],
                ['index' => '03', 'icon' => 'civil-chemical-environmental.svg', 'title' => 'Civil, Chemical &amp; Environmental Engineering', 'desc' => 'Sustainable Infrastructure, Chemical Process Engineering, Environmental Technology, Green Engineering'],
                ['index' => '04', 'icon' => 'electrical-information-systems.svg', 'title' => 'Electrical Engineering &amp; Information Systems', 'desc' => 'Smart Technology, IoT Applications, Data Analytics, Digital Innovation'],
                ['index' => '05', 'icon' => 'educational-technology.svg', 'title' => 'Educational Technology', 'desc' => 'Digital Transformation in Education, STEM (Science, Technology, Engineering and Mathematics) Education'],
                ['index' => '06', 'icon' => 'applied-science-sustainable-innovation.svg', 'title' => 'Applied Science &amp; Sustainable Innovation', 'desc' => 'Technology Transfer, Innovation Management, Sustainable Solutions for Society'],
            ];
        @endphp

        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-x-14">
            @foreach ($subThemes as $theme)
                <div class="ed-row flex items-center gap-5 py-6">
                    <span class="ed-mono text-sm ed-quiet shrink-0">{{ $theme['index'] }}</span>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-baseline gap-3">
                            <h3 class="ed-display text-lg">{!! $theme['title'] !!}</h3>
                            <span class="ed-leader hidden lg:block"></span>
                        </div>
                        <p class="ed-quiet text-base mt-2">{!! $theme['desc'] !!}</p>
                    </div>
                    <img src="{{ asset('assets/img/subthemes/' . $theme['icon']) }}"
                        class="subtheme-icon shrink-0" width="32" height="32" loading="lazy" decoding="async"
                        alt="" aria-hidden="true">
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Research domains (long form) --}}
<div class="w-full bg-white py-20">
    <div class="max-w-4xl mx-auto px-6">
        <header class="pb-4">
            <p class="ed-eyebrow">In detail</p>
            <h2 class="ed-display text-3xl md:text-4xl mt-3">Research domains in detail</h2>
            <p class="ed-quiet text-lg mt-4">The six areas driving the 2026 programme.</p>
        </header>

        @php
            $domains = [
                [
                    'index' => '01',
                    'title' => 'Mathematical &amp; Natural Sciences',
                    'desc' => 'Mathematical and natural sciences form the backbone of scientific innovation. The conference showcases research in chemistry, physics, biology, and mathematics, including specialised applications in industrial chemistry and chemical analysis. These disciplines drive the discoveries that underpin technological advancement and sustainable development.',
                ],
                [
                    'index' => '02',
                    'title' => 'Earth Sciences &amp; Mining Technology',
                    'desc' => 'Earth sciences and mining technology address the practical challenges of sustainable resource management. Through geophysics, geology, and mining engineering, researchers present approaches to responsible resource extraction, environmental monitoring, and geological hazard mitigation.',
                ],
                [
                    'index' => '03',
                    'title' => 'Civil, Chemical &amp; Environmental Engineering',
                    'desc' => 'This track covers resilient infrastructure and clean technology: sustainable infrastructure development, advanced chemical process engineering, environmental remediation, and green engineering solutions that reduce ecological impact.',
                ],
                [
                    'index' => '04',
                    'title' => 'Electrical Engineering &amp; Information Systems',
                    'desc' => 'Electrical engineering and information systems sit at the centre of digital transformation. Sessions cover smart technology implementations, Internet of Things (IoT) applications, advanced data analytics, and digital innovation strategies reshaping industry and public services.',
                ],
                [
                    'index' => '05',
                    'title' => 'Educational Technology',
                    'desc' => 'Educational technology remains a cornerstone of modern learning. The conference explores digital transformation in education and STEM pedagogies that improve learning outcomes, foster critical thinking, and prepare students for a technology-intensive society.',
                ],
                [
                    'index' => '06',
                    'title' => 'Applied Science &amp; Sustainable Innovation',
                    'desc' => 'Applied science and sustainable innovation bridge theoretical research and practical implementation. This track focuses on technology transfer, innovation management, and solutions to real-world problems, highlighting collaborations that turn scientific discoveries into public benefit.',
                ],
            ];
        @endphp

        <div class="mt-8">
            @foreach ($domains as $domain)
                <article class="ed-row grid grid-cols-12 gap-x-6 gap-y-3 py-8">
                    <div class="col-span-12 md:col-span-2 ed-mono text-sm ed-quiet">{{ $domain['index'] }}</div>
                    <div class="col-span-12 md:col-span-10">
                        <h3 class="ed-display text-2xl">{!! $domain['title'] !!}</h3>
                        <p class="ed-quiet mt-3 leading-relaxed">{!! $domain['desc'] !!}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>
@endsection
