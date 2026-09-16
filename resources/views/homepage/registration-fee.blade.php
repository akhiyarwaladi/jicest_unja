@extends('layouts.main-tailwind')

@section('content')
{{--
    Registration fees page.

    The fee prospectus rendered as a printed price list: hairline rows, monospaced
    figures, one accent for early bird and one signal colour for the regular round.
    Amounts and periods are read from the fees table via Fee::getAllPricingTiers().
--}}
<div class="ed-paper pt-32 pb-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-10">
            <div>
                <p class="ed-eyebrow">Registration</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Registration Fees</h1>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-1">
                Fees are quoted per person and cover attendance, the conference proceedings,
                and a certificate of presentation or participation issued online.
            </p>
        </header>

        {{-- Fee periods, taken from the live fee table --}}
        <div class="flex flex-wrap items-baseline gap-x-8 gap-y-2 ed-mono text-xs tracking-[.14em] uppercase">
            @if(isset($pricing['presenter']['early_bird']) && $pricing['presenter']['early_bird'])
                <span style="color:var(--ed-accent)">
                    Early bird &middot;
                    {{ $pricing['presenter']['early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}
                </span>
            @else
                <span style="color:var(--ed-accent)">Early bird &middot; 01 Aug &ndash; 14 Oct 2026</span>
            @endif

            @if(isset($pricing['presenter']['non_early_bird']) && $pricing['presenter']['non_early_bird'])
                <span class="ed-quiet">
                    Regular &middot;
                    {{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}
                </span>
            @else
                <span class="ed-quiet">Regular &middot; 15 Oct &ndash; 09 Nov 2026</span>
            @endif
        </div>
    </div>
</div>

{{-- Fee list --}}
<div class="w-full py-16 md:py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="hidden md:grid grid-cols-12 gap-6 pb-4 border-b border-[var(--ed-hair)]">
            <div class="col-span-1"></div>
            <div class="col-span-5 ed-mono text-[.75rem] tracking-[.2em] uppercase ed-quiet">Category</div>
            <div class="col-span-3 ed-mono text-[.75rem] tracking-[.2em] uppercase ed-quiet">Early bird</div>
            <div class="col-span-3 ed-mono text-[.75rem] tracking-[.2em] uppercase ed-quiet md:text-right">Regular</div>
        </div>

        @php
            $tiers = [
                ['key' => 'presenter', 'index' => '01', 'name' => 'Presenter', 'note' => 'Authors presenting an accepted paper. Regular and institutional rate.', 'early' => '350K IDR / 35 USD', 'regular' => '400K IDR / 40 USD'],
                ['key' => 'presenter_student', 'index' => '02', 'name' => 'Presenter, student', 'note' => 'Authors presenting an accepted paper. Student rate, valid student ID required.', 'early' => '250K IDR / 25 USD', 'regular' => '300K IDR / 30 USD'],
                ['key' => 'participant', 'index' => '03', 'name' => 'Participant', 'note' => 'Attendees without a paper. Regular and institutional rate.', 'early' => '100K IDR / 10 USD', 'regular' => '150K IDR / 15 USD'],
                ['key' => 'participant_student', 'index' => '04', 'name' => 'Participant, student', 'note' => 'Attendees without a paper. Student rate, valid student ID required.', 'early' => '50K IDR / 4 USD', 'regular' => '50K IDR / 4 USD'],
            ];
        @endphp

        <div>
            @foreach ($tiers as $tier)
                <div class="grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7 border-t border-[var(--ed-hair)]">
                    <div class="ed-mono text-xs ed-quiet md:col-span-1">{{ $tier['index'] }}</div>

                    <div class="md:col-span-5">
                        <h2 class="ed-display text-2xl">{{ $tier['name'] }}</h2>
                        <p class="ed-quiet text-[15px] mt-2">{{ $tier['note'] }}</p>
                    </div>

                    <div class="md:col-span-3">
                        <div class="ed-mono text-[.75rem] tracking-[.18em] uppercase ed-quiet md:hidden">Early bird</div>
                        <div class="ed-mono text-base mt-1 md:mt-0" style="color:var(--ed-accent)">
                            {{ $pricing[$tier['key']]['early_bird']['formatted'] ?? $tier['early'] }}
                        </div>
                    </div>

                    <div class="md:col-span-3 md:text-right">
                        <div class="ed-mono text-[.75rem] tracking-[.18em] uppercase ed-quiet md:hidden">Regular</div>
                        <div class="ed-mono text-base mt-1 md:mt-0">
                            {{ $pricing[$tier['key']]['non_early_bird']['formatted'] ?? $tier['regular'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="ed-quiet text-[15px] mt-8 max-w-2xl leading-relaxed">
            All amounts include attendance, the conference proceedings and the certificate.
            Students are asked to include a scan of their student card with the payment receipt.
        </p>
    </div>
</div>

{{-- How to pay and who to contact --}}
<div class="w-full py-16 ed-paper">
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-7">
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-xs tracking-[.22em] uppercase" style="color:var(--ed-accent)">How to pay</h2>
                <span class="ed-leader"></span>
            </div>

            <div class="mt-2">
                @php
                    $steps = [
                        ['index' => '01', 'title' => 'Bank transfer', 'desc' => 'Transfer the fee for your category to the conference bank account. Ask the secretariat for the current account details.'],
                        ['index' => '02', 'title' => 'Upload the receipt', 'desc' => 'Log in to your dashboard and upload a photo or scan of the transfer receipt. Students add a scan of their student card.'],
                        ['index' => '03', 'title' => 'Verification', 'desc' => 'The secretariat verifies the payment, usually within one working day, and your registration status updates automatically.'],
                    ];
                @endphp
                @foreach ($steps as $step)
                    <div class="ed-row grid grid-cols-12 gap-x-5 gap-y-1 py-5 items-baseline">
                        <div class="col-span-2 md:col-span-1 ed-mono text-xs ed-quiet">{{ $step['index'] }}</div>
                        <div class="col-span-10 md:col-span-11">
                            <h3 class="ed-display text-lg">{{ $step['title'] }}</h3>
                            <p class="ed-quiet text-[15px] mt-1 leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-xs tracking-[.22em] uppercase" style="color:var(--ed-accent)">Need help?</h2>
                <span class="ed-leader"></span>
            </div>

            <div class="mt-2">
                @php
                    $contacts = [
                        ['name' => 'Rara Ayu Lestary', 'phone' => '+62 822 1079 4479', 'wa' => 'https://wa.me/6282210794479'],
                        ['name' => 'Tia Wulandari', 'phone' => '+62 852 6646 9829', 'wa' => 'https://wa.me/6285266469829'],
                    ];
                @endphp
                @foreach ($contacts as $contact)
                    <div class="ed-row pt-6 pb-7">
                        <h3 class="ed-display text-xl">{{ $contact['name'] }}</h3>
                        <p class="ed-mono text-lg mt-3">{{ $contact['phone'] }}</p>
                        <a href="{{ $contact['wa'] }}" target="_blank" rel="noopener" class="ed-btn mt-5">
                            Message on WhatsApp
                        </a>
                    </div>
                @endforeach

                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)] ed-mono text-[15px]">
                    <span class="ed-quiet shrink-0">Email</span>
                    <span class="ed-leader"></span>
                    <a href="mailto:jicest@unja.ac.id" class="ed-underline">jicest@unja.ac.id</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
