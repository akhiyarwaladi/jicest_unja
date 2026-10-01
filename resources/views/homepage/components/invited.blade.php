{{-- Invited speakers sit below the keynotes as a quieter printed index: one
     hairline row per speaker with a small 4:5 thumbnail, so the portraits read
     as supporting figures rather than a second bank of keynote portraits.
     The 4:5 frame matches the keynote and crops less than a square would —
     most of these source photos are portrait. --}}
<div id="invited-speakers" class="w-full border-t border-[var(--ed-hair)] bg-white py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 max-w-5xl">
            <div>
                <p class="ed-eyebrow">Invited speakers</p>
                <h2 class="ed-display text-4xl md:text-5xl mt-3">Invited Speakers</h2>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-2">
                Five invited speakers joining the JICEST 2026 programme.
            </p>
        </header>

        @php
            $invited = [
                [
                    'name' => 'Ilmi Fadhilah Rizki, M.Si',
                    'role' => 'Researcher',
                    'institution' => 'Mechanization, Post-Harvest and Environmental Conservation, Indonesian Oil Palm Research Institute',
                    'image' => 'uploads/speakers/ilmi-fadhilah-rizki.jpeg',
                    'alt' => 'Portrait of Ilmi Fadhilah Rizki',
                    // Subject reads small in the source; crop in for a head-and-shoulders frame.
                    'zoom' => 1.35,
                    'focus' => '50% 40%',
                ],
                [
                    'name' => 'Tika Restianingsih, M.Sc.',
                    'role' => 'Researcher',
                    'institution' => 'Department of Materials Science and Engineering, Science Tokyo',
                    'image' => 'uploads/speakers/tika-restianingsih.jpeg',
                    'alt' => 'Portrait of Tika Restianingsih',
                    // Source is a close crop; pull back so the portrait sits smaller in the frame.
                    'zoom' => 0.86,
                    'focus' => '50% 35%',
                ],
                [
                    'name' => 'Asmida Herawati, M.Sc., Ph.D.',
                    'role' => 'Researcher',
                    'institution' => 'Research Center for Photonics, National Research and Innovation Agency (BRIN)',
                    'image' => 'uploads/speakers/asmida-herawati.jpeg',
                    'alt' => 'Portrait of Asmida Herawati',
                ],
                [
                    'name' => 'Dr. Rini Arianti',
                    'role' => 'Researcher',
                    'institution' => 'Department of Biochemistry and Molecular Biology, Faculty of Medicine, University of Debrecen',
                    'image' => 'uploads/speakers/rini-arianti.jpeg',
                    'alt' => 'Portrait of Dr. Rini Arianti',
                ],
                [
                    'name' => 'Prof. Drs. H. Sutrisno, M.Sc., Ph.D.',
                    'role' => 'Professor of Chemistry',
                    'institution' => 'Faculty of Science and Technology, Universitas Jambi',
                    'image' => 'uploads/speakers/sutrisno.jpg',
                    'alt' => 'Portrait of Prof. Drs. H. Sutrisno, M.Sc., Ph.D.',
                ],
            ];
        @endphp

        <div class="mt-4 mx-auto max-w-5xl">
            @foreach ($invited as $index => $speaker)
                <article class="ed-row flex items-start sm:items-center gap-5 sm:gap-7 py-6">
                    @php $zoom = $speaker['zoom'] ?? 1; @endphp
                    <div class="relative shrink-0 w-16 sm:w-20 aspect-[4/5] bg-[#f3f2ec] border border-[var(--ed-hair)] overflow-hidden">
                        @if ($zoom < 1)
                            {{-- Zooming out past the frame: the photograph has no more
                                 content to reveal, so a softened copy of itself fills the
                                 margin behind the front image instead of a hard matte. --}}
                            <img src="{{ asset($speaker['image']) }}" alt="" aria-hidden="true"
                                class="absolute inset-0 w-full h-full object-cover"
                                style="filter: blur(16px) saturate(.85); transform: scale(1.3);" loading="lazy">
                        @endif

                        <div class="absolute inset-0" style="transform: scale({{ $zoom }});">
                            <img src="{{ asset($speaker['image']) }}" alt="{{ $speaker['alt'] }}"
                                class="ed-media w-full h-full object-cover"
                                style="object-position: {{ $speaker['focus'] ?? '50% 50%' }};" loading="lazy">
                        </div>
                    </div>

                    <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between sm:gap-8">
                        <div class="min-w-0">
                            <div class="flex items-baseline gap-3">
                                <span class="ed-mono text-xs tracking-[.14em] ed-quiet">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="ed-display text-lg md:text-xl">{{ $speaker['name'] }}</h3>
                            </div>
                            <p class="ed-mono text-xs mt-1.5" style="color:var(--ed-accent)">{{ $speaker['role'] }}</p>
                        </div>

                        <p class="ed-quiet text-sm leading-snug mt-2 sm:mt-0 sm:text-right sm:max-w-md">
                            {{ $speaker['institution'] }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>
