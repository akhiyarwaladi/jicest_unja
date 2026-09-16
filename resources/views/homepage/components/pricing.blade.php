{{--
    Registration fees.

    Rendered as a printed price list (category / early bird / regular) instead of a set of
    gradient cards. The ink band below is the one deliberately dramatic moment on the
    homepage; everything around it stays on paper.

    Data comes from App\Models\Fee::getAllPricingTiers(), keyed as:
    presenter, presenter_student, participant, participant_student.
--}}
<div class="ed-ink-band w-full py-24 md:py-28 text-white">
    <div class="max-w-5xl mx-auto px-6">
        <header class="max-w-3xl">
            <p class="ed-eyebrow" style="color:#6ee7b7">Registration</p>
            <h2 class="ed-display text-4xl md:text-5xl mt-3 text-white">Registration Fees</h2>
            <p class="mt-5 text-white/70 leading-relaxed">
                Fees are quoted per person and cover attendance, the conference proceedings, and
                a certificate of presentation or participation issued online.
            </p>
        </header>

        {{-- Round dates, taken from the live fee table --}}
        <div class="mt-10 flex flex-wrap items-baseline gap-x-8 gap-y-2 ed-mono text-xs tracking-[.14em] uppercase">
            @if(isset($pricing['presenter']['early_bird']) && $pricing['presenter']['early_bird'])
                <span style="color:#6ee7b7">
                    Early bird &middot;
                    {{ $pricing['presenter']['early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}
                </span>
            @else
                <span style="color:#6ee7b7">Early bird &middot; 01 Aug &ndash; 14 Oct 2026</span>
            @endif

            @if(isset($pricing['presenter']['non_early_bird']) && $pricing['presenter']['non_early_bird'])
                <span class="text-white/60">
                    Regular &middot;
                    {{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}
                </span>
            @else
                <span class="text-white/60">Regular &middot; 15 Oct &ndash; 09 Nov 2026</span>
            @endif
        </div>

        {{-- Column headings --}}
        <div class="mt-10 hidden md:grid grid-cols-12 gap-6 pb-4 border-b border-white/25">
            <div class="col-span-1"></div>
            <div class="col-span-5 ed-mono text-[.75rem] tracking-[.2em] uppercase text-white/60">Category</div>
            <div class="col-span-3 ed-mono text-[.75rem] tracking-[.2em] uppercase text-white/60">Early bird</div>
            <div class="col-span-3 ed-mono text-[.75rem] tracking-[.2em] uppercase text-white/60 md:text-right">Regular</div>
        </div>

        @php
            $tiers = [
                ['key' => 'presenter', 'index' => '01', 'name' => 'Presenter', 'note' => 'Authors presenting an accepted paper. Regular and institutional rate.', 'early' => '350K IDR / 35 USD', 'regular' => '400K IDR / 40 USD'],
                ['key' => 'presenter_student', 'index' => '02', 'name' => 'Presenter', 'note' => 'Authors presenting an accepted paper. Student rate, valid student ID required.', 'early' => '250K IDR / 25 USD', 'regular' => '300K IDR / 30 USD'],
                ['key' => 'participant', 'index' => '03', 'name' => 'Participant', 'note' => 'Attendees without a paper. Regular and institutional rate.', 'early' => '100K IDR / 10 USD', 'regular' => '150K IDR / 15 USD'],
                ['key' => 'participant_student', 'index' => '04', 'name' => 'Participant', 'note' => 'Attendees without a paper. Student rate, valid student ID required.', 'early' => '50K IDR / 4 USD', 'regular' => '50K IDR / 4 USD'],
            ];
        @endphp

        <div>
            @foreach ($tiers as $tier)
                <div class="grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7 border-t border-white/15">
                    <div class="ed-mono text-xs text-white/60 md:col-span-1">{{ $tier['index'] }}</div>

                    <div class="md:col-span-5">
                        <h3 class="ed-display text-2xl text-white">{{ $tier['name'] }}</h3>
                        <p class="text-[15px] text-white/70 mt-2">{{ $tier['note'] }}</p>
                    </div>

                    <div class="md:col-span-3">
                        <div class="ed-mono text-[.75rem] tracking-[.18em] uppercase text-white/60 md:hidden">Early bird
                        </div>
                        <div class="ed-mono text-base" style="color:#6ee7b7">
                            {{ $pricing[$tier['key']]['early_bird']['formatted'] ?? $tier['early'] }}
                        </div>
                    </div>

                    <div class="md:col-span-3 md:text-right">
                        <div class="ed-mono text-[.75rem] tracking-[.18em] uppercase text-white/60 md:hidden">Regular</div>
                        <div class="ed-mono text-base text-white">
                            {{ $pricing[$tier['key']]['non_early_bird']['formatted'] ?? $tier['regular'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6 border-t border-white/15 pt-8">
            <p class="text-[15px] text-white/70 max-w-xl">
                Payment is made by bank transfer and confirmed by uploading the receipt in your dashboard.
                Students are asked to include a scan of their student card with the receipt.
            </p>
            <a href="{{ auth()->check() ? '/dashboard' : '/register' }}" class="ed-btn ed-btn-inverse shrink-0">
                Register now
            </a>
        </div>
    </div>
</div>
