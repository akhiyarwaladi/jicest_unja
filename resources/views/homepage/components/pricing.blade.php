{{-- Fee amounts and General Presenter periods come from the fees table. --}}
@php
    $schedule = $schedule ?? [];
    $earlyStart = $schedule['early_start'] ?? null;
    $earlyEnd = $schedule['early_end'] ?? null;
    $regularStart = $schedule['regular_start'] ?? null;
    $regularEnd = $schedule['regular_end'] ?? null;
@endphp
<div class="ed-ink-band w-full py-24 md:py-28 text-white">
    <div class="max-w-5xl mx-auto px-6">
        <header class="max-w-3xl">
            <p class="ed-eyebrow" style="color:#6ee7b7">Registration</p>
            <h2 class="ed-display text-4xl md:text-5xl mt-3 text-white">Registration Fees</h2>
            <p class="mt-5 text-lg text-white/70 leading-relaxed">
                Fees are quoted per person and cover attendance and
                a certificate of presentation or participation issued online.
            </p>
        </header>

        <p class="mt-8 text-base text-white/90 leading-relaxed">
            Early Bird and Regular rates apply only to General Presenters. Other categories have a fixed fee.
        </p>
        <div class="mt-4 flex flex-wrap items-baseline gap-x-8 gap-y-2 ed-mono text-sm tracking-[.14em] uppercase">
            @if(isset($pricing['presenter']['early_bird']) && $pricing['presenter']['early_bird'])
                <span style="color:#6ee7b7">
                    Early bird &middot;
                    {{ $pricing['presenter']['early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}
                </span>
            @elseif ($earlyStart && $earlyEnd)
                <span style="color:#6ee7b7">Early bird &middot; {{ $earlyStart->format('d M') }} &ndash; {{ $earlyEnd->format('d M Y') }}</span>
            @else
                <span style="color:#6ee7b7">Early bird &middot; Date pending</span>
            @endif

            @if(isset($pricing['presenter']['non_early_bird']) && $pricing['presenter']['non_early_bird'])
                <span class="text-white/70">
                    Regular &middot;
                    {{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }}
                    &ndash;
                    {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}
                </span>
            @elseif ($regularStart && $regularEnd)
                <span class="text-white/70">Regular &middot; {{ $regularStart->format('d M') }} &ndash; {{ $regularEnd->format('d M Y') }}</span>
            @else
                <span class="text-white/70">Regular &middot; Date pending</span>
            @endif
        </div>

        <aside class="mt-8 grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 border-t border-white/25 pt-6" aria-label="Publication fee notice">
            <h3 class="ed-display text-xl md:text-2xl md:col-span-4">Publication fee is separate</h3>
            <p class="text-base text-white/90 leading-relaxed md:col-span-8">
                An additional publication fee will apply to participants who wish to have their accepted papers published in the Conference Proceedings, subject to the applicable publication terms and conditions.
            </p>
        </aside>

        @include('homepage.components.fee-list', ['dark' => true])

        <div class="mt-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6 border-t border-white/15 pt-8">
            <p class="text-lg text-white/70 max-w-xl">
                Payment is made by bank transfer and confirmed by uploading the receipt in your dashboard.
                Students are asked to include a scan of their student card with the receipt.
            </p>
            <a href="{{ auth()->check() ? '/dashboard' : '/register' }}" class="ed-btn ed-btn-inverse shrink-0">
                Register now
            </a>
        </div>
    </div>
</div>
