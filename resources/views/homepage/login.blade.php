@extends('layouts.main-tailwind')

@section('content')
{{--
    Login.

    Warm paper field with a white hairline card — the same treatment as the
    editorial contact page, replacing the emerald/sky gradient backdrop.
    The Livewire form keeps its own field styling.
--}}
<div class="ed-paper w-full min-h-screen flex items-center justify-center px-4 pt-28 pb-20">
    <div class="w-full max-w-md">
        <div class="bg-white border border-[var(--ed-hair)] shadow-[0_24px_48px_-32px_rgba(11,27,20,0.35)] p-8 md:p-10">
            <div class="flex justify-center mb-8">
                <a href="/"><img src="{{ asset('assets/logos/jicest.png') }}" alt="JICEST 2026" class="h-12 w-auto"></a>
            </div>

            <p class="ed-eyebrow text-center">Member area</p>
            <h1 class="ed-display text-3xl mt-3 text-center">Log in</h1>
            <p class="ed-quiet text-base text-center mt-3">Use your email and password to access the submission dashboard.</p>

            <div class="mt-8">
                <livewire:login-form />
            </div>

            <p class="text-center mt-6 pt-6 border-t border-[var(--ed-hair)]">
                <a href="/forgot-password" class="ed-mono text-sm tracking-[.16em] uppercase ed-underline" style="color:var(--ed-accent)">Forgot password?</a>
            </p>
        </div>

        <p class="ed-mono text-sm tracking-[.16em] uppercase text-center mt-6 ed-quiet">
            New to JICEST?
            <a href="/register" class="ed-underline" style="color:var(--ed-accent)">Create an account</a>
        </p>
    </div>
</div>
@endsection
