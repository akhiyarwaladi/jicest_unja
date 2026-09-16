@extends('layouts.main-tailwind')

@section('title', 'Page not found')

@section('content')
{{--
    404, in the editorial voice: a monospaced index number, a serif line, and one
    action back to the conference. No Tailwind default error card.
--}}
<div class="ed-paper pt-32 pb-24 w-full">
    <div class="max-w-4xl mx-auto px-6">
        <p class="ed-mono text-[.75rem] tracking-[.22em] uppercase ed-quiet">Error &middot; not found</p>

        <h1 class="ed-display text-7xl md:text-8xl mt-6">404</h1>

        <p class="mt-6 max-w-xl text-lg leading-relaxed ed-quiet">
            The page you were looking for is not in these proceedings. It may have been moved,
            or the address was mistyped.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row sm:items-center gap-5">
            <a href="/" class="ed-btn">Back to the conference &rarr;</a>
            <a href="mailto:jicest@unja.ac.id"
                class="ed-mono text-[.75rem] tracking-[.16em] uppercase ed-quiet hover:text-[var(--ed-ink)] ed-underline self-center sm:self-auto">
                Report a broken link
            </a>
        </div>

        <dl class="mt-16 ed-mono text-[15px] max-w-xl">
            <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                <dt class="ed-quiet">Conference</dt>
                <span class="ed-leader"></span>
                <dd>JICEST 2026</dd>
            </div>
            <div class="flex items-baseline gap-3 py-3 border-t border-b border-[var(--ed-hair)]">
                <dt class="ed-quiet">Date</dt>
                <span class="ed-leader"></span>
                <dd>11 Nov 2026 &middot; online</dd>
            </div>
        </dl>
    </div>
</div>
@endsection
