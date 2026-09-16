{{--
    Keynote speakers.

    The 2026 plenary line-up is not yet fixed, so the five slots are published as
    placeholders: hairline rules, a quiet portrait frame and "To be announced".
    A confirmed speaker replaces a slot with a portrait, name, role and topic.
--}}
<div class="w-full py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 max-w-5xl">
            <div>
                <p class="ed-eyebrow">Speakers</p>
                <h2 class="ed-display text-4xl md:text-5xl mt-3">Keynote Speakers</h2>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-2">
                Five plenary lectures are planned for the 2026 programme.
            </p>
        </header>

        @php
            $slots = [1, 2, 3, 4, 5];
        @endphp

        <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-14">
            @foreach ($slots as $slot)
                <article class="border-t border-[var(--ed-hair)] pt-5">
                    <div class="flex items-baseline justify-between ed-mono text-[.75rem] tracking-[.18em] uppercase ed-quiet">
                        <span>{{ str_pad($slot, 2, '0', STR_PAD_LEFT) }}</span>
                        <span>Keynote</span>
                    </div>

                    {{-- Portrait frame held open until the speaker is confirmed --}}
                    <div class="mt-5 aspect-[4/5] bg-[#f3f2ec] border border-[var(--ed-hair)] flex items-center justify-center">
                        <span class="ed-mono text-[.75rem] tracking-[.18em] uppercase ed-quiet">
                            Portrait to be announced
                        </span>
                    </div>

                    <h3 class="ed-display text-xl mt-5">To be announced</h3>
                </article>
            @endforeach
        </div>

        <p class="ed-quiet text-[15px] mt-12 max-w-2xl leading-relaxed border-t border-[var(--ed-hair)] pt-6">
            The keynote line-up is being confirmed. Names, affiliations and lecture topics
            will be published on this page as they are fixed.
        </p>
    </div>
</div>
