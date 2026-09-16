@extends('layouts.main-tailwind')

@section('content')
{{--
    Registration.

    Warm paper field with a white hairline card, matching the login page,
    replacing the emerald/sky gradient backdrop.
--}}
<div class="ed-paper w-full min-h-screen flex items-start md:items-center justify-center px-4 pt-28 pb-20">
    <div class="w-full max-w-2xl">
        <div class="bg-white border border-[var(--ed-hair)] shadow-[0_24px_48px_-32px_rgba(11,27,20,0.35)] p-8 md:p-10">
            <div class="flex justify-center mb-8">
                <a href="/"><img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST 2026" class="h-12 w-auto"></a>
            </div>

            <p class="ed-eyebrow text-center">Participant registration</p>
            <h1 class="ed-display text-3xl mt-3 text-center">Registration</h1>
            <p class="ed-quiet text-[15px] text-center mt-3">Fill in the form below to register for JICEST 2026.</p>

            <div class="mt-8">
                <livewire:register-form />
            </div>
        </div>

        <p class="ed-mono text-[.75rem] tracking-[.16em] uppercase text-center mt-6 ed-quiet">
            Already registered?
            <a href="/login" class="ed-underline" style="color:var(--ed-accent)">Log in</a>
        </p>
    </div>
</div>
@endsection
