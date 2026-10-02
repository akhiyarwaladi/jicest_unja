@php
    $dark = $dark ?? false;
    $fees = [
        ['name' => 'General Presenter', 'note' => 'Authors presenting an accepted paper.', 'rates' => [
            'Early Bird' => $pricing['presenter']['early_bird']['idr'] ?? null,
            'Regular' => $pricing['presenter']['non_early_bird']['idr'] ?? null,
        ]],
        ['name' => 'Student Presenter', 'note' => 'Authors presenting an accepted paper. Valid student ID required.', 'rates' => [
            'Fixed fee' => $pricing['presenter_student']['non_early_bird']['idr'] ?? $pricing['presenter_student']['early_bird']['idr'] ?? null,
        ]],
        ['name' => 'General Participant', 'note' => 'Attendees without a paper.', 'rates' => [
            'Fixed fee' => $pricing['participant']['non_early_bird']['idr'] ?? $pricing['participant']['early_bird']['idr'] ?? null,
        ]],
        ['name' => 'Student Participant', 'note' => 'Attendees without a paper. Valid student ID required.', 'rates' => [
            'Fixed fee' => $pricing['participant_student']['non_early_bird']['idr'] ?? $pricing['participant_student']['early_bird']['idr'] ?? null,
        ]],
    ];
    $quiet = $dark ? 'text-white/70' : 'ed-quiet';
@endphp

<div class="mt-8" aria-label="Registration fees">
    @foreach ($fees as $fee)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7 border-t {{ $dark ? 'border-white/15' : 'border-[var(--ed-hair)]' }}">
            <div class="ed-mono text-sm {{ $quiet }} md:col-span-1">{{ sprintf('%02d', $loop->iteration) }}</div>

            <div class="md:col-span-5">
                @if ($dark)
                    <h3 class="ed-display text-2xl">{{ $fee['name'] }}</h3>
                @else
                    <h2 class="ed-display text-2xl">{{ $fee['name'] }}</h2>
                @endif
                <p class="text-base {{ $quiet }} mt-2">{{ $fee['note'] }}</p>
            </div>

            <div class="md:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                @foreach ($fee['rates'] as $label => $amount)
                    <div class="{{ count($fee['rates']) === 1 ? 'sm:col-span-2 sm:text-right' : ($loop->last ? 'sm:text-right' : '') }}">
                        <p class="ed-mono text-sm tracking-[.14em] uppercase {{ $quiet }}">{{ $label }}</p>
                        <p class="ed-mono text-xl lg:text-2xl mt-2 {{ $amount !== null ? 'whitespace-nowrap' : '' }} {{ $label === 'Early Bird' ? ($dark ? 'text-[#6ee7b7]' : 'text-[var(--ed-accent)]') : '' }}">
                            @if ($amount !== null)
                                IDR {{ number_format($amount) }}
                            @else
                                To be confirmed
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
