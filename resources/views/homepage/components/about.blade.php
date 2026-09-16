{{--
    About JICEST and the six conference sub-themes.

    The sub-themes are presented as a numbered index with dotted leaders, in the manner of a
    printed table of contents, using a single accent colour. This replaces the previous grid
    of six differently-coloured gradient tiles.
--}}
<div id="about" class="ed-paper py-20 md:py-24 w-full">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            {{-- Identity column --}}
            <div class="lg:col-span-4">
                <img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST logo"
                     class="w-full max-w-[260px] h-auto">

                <p class="ed-eyebrow mt-10">About the conference</p>
                <h2 class="ed-display text-3xl md:text-4xl mt-3">Jambi International Conference on Engineering, Science
    and Technology</h2>

                <dl class="mt-8 ed-mono text-[15px]">
                    <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Edition</dt>
                        <span class="ed-leader"></span>
                        <dd>4th</dd>
                    </div>
                    <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Date</dt>
                        <span class="ed-leader"></span>
                        <dd>11 Nov 2026</dd>
                    </div>
                    <div class="flex items-baseline gap-3 py-3 border-t border-b border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Format</dt>
                        <span class="ed-leader"></span>
                        <dd>Online</dd>
                    </div>
                </dl>
            </div>

            {{-- Narrative and sub-theme index --}}
            <div class="lg:col-span-8">
                <p class="text-lg leading-relaxed ed-quiet">
                    JICEST is the annual international conference of the Faculty of Science and Technology,
                    Universitas Jambi. It brings together researchers, practitioners and students to present
                    work that crosses the boundaries between the natural sciences, engineering and technology,
                    and to turn that work into solutions that hold up outside the laboratory.
                </p>

                <div class="mt-12">
                    <div class="flex items-center gap-4">
                        <h3 class="ed-mono text-xs tracking-[.22em] uppercase" style="color:var(--ed-accent)">Conference
    sub-themes</h3>
                        <span class="ed-leader"></span>
                        <span class="ed-mono text-xs ed-quiet">06 tracks</span>
                    </div>

                    @php
                        $subThemes = [
                            ['index' => '01', 'title' => 'Mathematical &amp; Natural Sciences', 'desc' => 'Chemistry, physics, biology, mathematics, industrial chemistry, chemical analysis'],
                            ['index' => '02', 'title' => 'Earth Sciences &amp; Mining Technology', 'desc' => 'Geology, mining engineering, mineral processing, geospatial mapping'],
                            ['index' => '03', 'title' => 'Civil, Chemical &amp; Environmental Engineering', 'desc' => 'Structures, materials, process engineering, water and waste treatment'],
                            ['index' => '04', 'title' => 'Electrical Engineering &amp; Information Systems', 'desc' => 'Smart technology, IoT applications, data analytics, digital innovation'],
                            ['index' => '05', 'title' => 'Educational Technology', 'desc' => 'Digital transformation in education, STEM education'],
                            ['index' => '06', 'title' => 'Applied Science &amp; Sustainable Innovation', 'desc' => 'Technology transfer, innovation management, sustainable solutions for society'],
                        ];
                    @endphp

                    <div class="mt-2">
                        @foreach ($subThemes as $theme)
                            <div class="ed-row grid grid-cols-12 gap-x-5 gap-y-1 py-5 items-baseline">
                                <div class="col-span-2 md:col-span-1 ed-mono text-xs ed-quiet">{{ $theme['index'] }}</div>
                                <div class="col-span-10 md:col-span-11">
                                    <h4 class="ed-display text-lg">{!! $theme['title'] !!}</h4>
                                    <p class="ed-quiet text-[15px] mt-1">{!! $theme['desc'] !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
