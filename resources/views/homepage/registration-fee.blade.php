@extends('layouts.main-tailwind')

@section('content')
{{-- Fee amounts and General Presenter periods come from the fees table. --}}
@php
    $schedule = $schedule ?? [];
    $earlyStart = $schedule['early_start'] ?? null;
    $earlyEnd = $schedule['early_end'] ?? null;
    $regularStart = $schedule['regular_start'] ?? null;
    $regularEnd = $schedule['regular_end'] ?? null;
@endphp
<div class="ed-paper pt-32 pb-10 md:pb-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-10">
            <div>
                <p class="ed-eyebrow">Registration</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Registration Fees</h1>
            </div>
            <p class="ed-quiet text-lg max-w-sm md:text-right md:pb-1">
                Fees are quoted per person and cover attendance and
                a certificate of presentation or participation issued online.
            </p>
        </header>

        <p class="ed-quiet text-base mb-4 leading-relaxed">
            Early Bird and Regular rates apply only to General Presenters. Other categories have a fixed fee.
        </p>
        <div class="flex flex-wrap items-baseline gap-x-8 gap-y-2 ed-mono text-sm tracking-[.14em] uppercase">
            @if(isset($pricing['presenter']['early_bird']) && $pricing['presenter']['early_bird'])
                <span style="color:var(--ed-accent)">
                    Early bird &middot;
                    {{ $pricing['presenter']['early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}
                </span>
            @elseif ($earlyStart && $earlyEnd)
                <span style="color:var(--ed-accent)">Early bird &middot; {{ $earlyStart->format('d M') }} &ndash; {{ $earlyEnd->format('d M Y') }}</span>
            @else
                <span style="color:var(--ed-accent)">Early bird &middot; Date pending</span>
            @endif

            @if(isset($pricing['presenter']['non_early_bird']) && $pricing['presenter']['non_early_bird'])
                <span class="ed-quiet">
                    Regular &middot;
                    {{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}
                </span>
            @elseif ($regularStart && $regularEnd)
                <span class="ed-quiet">Regular &middot; {{ $regularStart->format('d M') }} &ndash; {{ $regularEnd->format('d M Y') }}</span>
            @else
                <span class="ed-quiet">Regular &middot; Date pending</span>
            @endif
        </div>
    </div>
</div>

{{-- Fee list --}}
<div class="w-full pt-8 pb-12 md:py-16 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <aside class="mb-8 grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3" aria-label="Publication fee notice">
            <h2 class="ed-display text-xl md:text-2xl md:col-span-4">Publication fee is separate</h2>
            <p class="text-base ed-quiet leading-relaxed md:col-span-8">
                An additional publication fee will apply to participants who wish to have their accepted papers published in the Conference Proceedings, subject to the applicable publication terms and conditions.
            </p>
        </aside>

        @include('homepage.components.fee-list', ['dark' => false])

        <p class="ed-quiet text-lg mt-8 max-w-2xl leading-relaxed">
            All amounts include attendance and the certificate.
            Students are asked to include a scan of their student card with the payment receipt.
        </p>
    </div>
</div>

{{-- How to pay and who to contact --}}
<div class="w-full py-16 ed-paper">
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-7">
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">How to pay</h2>
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
                        <div class="col-span-2 md:col-span-1 ed-mono text-sm ed-quiet">{{ $step['index'] }}</div>
                        <div class="col-span-10 md:col-span-11">
                            <h3 class="ed-display text-lg">{{ $step['title'] }}</h3>
                            <p class="ed-quiet text-base mt-1 leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Need help?</h2>
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

                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)] ed-mono text-base">
                    <span class="ed-quiet shrink-0">Email</span>
                    <span class="ed-leader"></span>
                    <a href="mailto:jicest@unja.ac.id" class="ed-underline">jicest@unja.ac.id</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
