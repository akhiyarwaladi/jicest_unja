@extends('layouts.main-tailwind')

@section('content')
{{--
    Conference schedule.

    Set as a printed timetable: monospaced time column, serif session titles, hairline
    separators. The previous version used a serpentine timeline of coloured cards with
    gradient icon tiles.
--}}
<div class="ed-paper pt-32 pb-16 w-full">
    <div class="max-w-4xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-10">
            <div>
                <p class="ed-eyebrow">Programme</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Conference Schedule</h1>
            </div>
            <div class="ed-mono text-lg ed-quiet md:text-right md:pb-1">
                <div>Wednesday, 11 November 2026</div>
                <div class="mt-1" style="color:var(--ed-accent)">Online &middot; all times UTC+7</div>
            </div>
        </header>

        <p class="text-lg ed-quiet max-w-2xl leading-relaxed pb-12">
            A single day of plenary talks, parallel sessions and networking, broadcast from the
            Faculty of Science and Technology, Universitas Jambi.
        </p>

        @php
            $programme = [
                ['time' => '07:00', 'end' => '08:00', 'title' => 'Registration', 'note' => 'Delegate check-in, virtual room opens'],
                ['time' => '08:00', 'end' => '08:30', 'title' => 'Opening Ceremony', 'note' => 'Welcome address and conference opening'],
                ['time' => '08:30', 'end' => '12:00', 'title' => 'Plenary Session', 'note' => 'Keynote lectures from invited speakers'],
                ['time' => '12:00', 'end' => '13:00', 'title' => 'Break', 'note' => 'Lunch and networking'],
                ['time' => '13:00', 'end' => '16:30', 'title' => 'Parallel Session', 'note' => 'Presentations by sub-theme track'],
                ['time' => '16:30', 'end' => '17:00', 'title' => 'Closing Ceremony', 'note' => 'Best paper announcement and closing remarks'],
            ];
        @endphp

        <div>
            @foreach ($programme as $index => $item)
                <div class="ed-row grid grid-cols-12 gap-x-6 gap-y-2 py-6 items-baseline">
                    <div class="col-span-12 md:col-span-3 ed-mono text-base">
                        {{ $item['time'] }}<span class="ed-quiet"> &ndash; {{ $item['end'] }}</span>
                    </div>
                    <div class="col-span-12 md:col-span-9">
                        <h2 class="ed-display text-xl md:text-2xl">{{ $item['title'] }}</h2>
                        <p class="ed-quiet text-base mt-1">{{ $item['note'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex items-center gap-4 pt-10">
            <span class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Broadcast from</span>
            <span class="ed-leader"></span>
            <span class="ed-mono text-sm ed-quiet">Senate Meeting Building, Universitas Jambi</span>
        </div>

        <p class="ed-quiet text-base mt-10">
            Session links are emailed to registered delegates two days before the conference and are also
            available from your dashboard.
        </p>
    </div>
</div>
@endsection
