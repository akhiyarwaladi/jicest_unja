<div class="w-full py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 max-w-5xl">
            <div>
                <p class="ed-eyebrow">Speakers</p>
                <h2 class="ed-display text-4xl md:text-5xl mt-3">Keynote Speakers</h2>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-2">
                Meet the four confirmed keynote speakers for JICEST 2026.
            </p>
        </header>

        @php
            $speakers = [
                [
                    'name' => 'Asst. Prof. Dr. Nattinee Thongdee',
                    'role' => 'Director',
                    'institution' => 'Khorat Fossil Museum',
                    'image' => 'uploads/speakers/nattinee-thongdee-2026.jpg',
                    'alt' => 'Portrait of Asst. Prof. Dr. Nattinee Thongdee',
                    'url' => 'https://www.khoratfossil.org/khoratfossil/index.php/en/about-us/board/administrative-board',
                ],
                [
                    'name' => 'Asst. Prof. Dr. Worapat Paireekreng',
                    'role' => 'Assistant Professor',
                    'institution' => 'KMITL Business School',
                    'image' => 'uploads/speakers/worapat-paireekreng.jpg',
                    'alt' => 'Portrait of Asst. Prof. Dr. Worapat Paireekreng',
                    'url' => 'https://www.kbs.kmitl.ac.th/en/person/dr-vorapat-pairigreng/',
                ],
                [
                    'name' => 'Prof. Dr. rer. nat. Martin Dressel',
                    'role' => 'Head of Institute',
                    'institution' => 'University of Stuttgart',
                    'image' => 'uploads/speakers/martin-dressel.jpg',
                    'alt' => 'Portrait of Prof. Dr. rer. nat. Martin Dressel',
                    'url' => 'https://www.pi1.uni-stuttgart.de/institute/team/Dressel/',
                ],
                [
                    'name' => 'Nur Hamid',
                    'role' => 'Postdoctoral Fellow',
                    'institution' => 'King Fahd University of Petroleum & Minerals',
                    'image' => 'uploads/speakers/nur-hamid.JPG',
                    'alt' => 'Portrait of Nur Hamid',
                    'url' => 'https://pure.kfupm.edu.sa/en/persons/dr-nur-hamid/',
                ],
            ];
        @endphp

        <div class="mt-14 mx-auto max-w-5xl grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-14">
            @foreach ($speakers as $index => $speaker)
                <article class="border-t border-[var(--ed-hair)] pt-5">
                    <div class="flex items-baseline justify-between ed-mono text-sm tracking-[.14em] uppercase ed-quiet">
                        <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span>Confirmed</span>
                    </div>

                    <div class="mt-5 aspect-[4/5] bg-[#f3f2ec] border border-[var(--ed-hair)] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset($speaker['image']) }}" alt="{{ $speaker['alt'] }}"
                            class="ed-media w-full h-full object-cover" loading="lazy">
                    </div>

                    <h3 class="ed-display text-xl mt-5">{{ $speaker['name'] }}</h3>
                    <p class="ed-mono text-sm mt-3" style="color:var(--ed-accent)">{{ $speaker['role'] }}</p>
                    <p class="ed-quiet text-base mt-1">{{ $speaker['institution'] }}</p>
                    <a href="{{ $speaker['url'] }}" target="_blank" rel="noopener"
                        class="ed-mono text-sm tracking-[.08em] uppercase ed-underline inline-block mt-4">
                        View profile
                    </a>
                </article>
            @endforeach
        </div>

        <p class="ed-quiet text-lg mt-12 max-w-2xl leading-relaxed border-t border-[var(--ed-hair)] pt-6">
            Lecture titles and session assignments will be published with the final programme.
        </p>
    </div>
</div>
