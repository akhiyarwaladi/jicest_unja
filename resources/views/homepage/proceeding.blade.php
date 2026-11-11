@extends('layouts.main-tailwind')

@section('content')
@php
    $publicationRow = 'grid grid-cols-[5rem_minmax(0,1fr)] sm:grid-cols-[8rem_minmax(0,1fr)] lg:grid-cols-[10rem_minmax(0,1fr)_14rem] gap-x-5 sm:gap-x-8 gap-y-5 border-b border-[var(--ed-hair)] py-8';
    $publicationCover = 'row-span-2 lg:row-span-1 aspect-[210/297] w-full overflow-hidden border border-[var(--ed-hair)] bg-white';
    $publicationAction = 'ed-btn col-start-2 lg:col-start-auto justify-center self-start lg:self-center w-full sm:w-fit lg:w-full';
@endphp
<div class="ed-paper pt-32 pb-12 md:pb-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div>
                <p class="ed-eyebrow">Conference publications</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Proceedings</h1>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-1">
                Books of abstracts and conference proceedings, by edition.
            </p>
        </header>
    </div>
</div>

<section aria-labelledby="abstract-books-title" class="w-full py-12 md:py-16 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <h2 id="abstract-books-title" class="ed-display text-3xl md:text-4xl">Book of Abstracts</h2>

        <article aria-labelledby="abstract-book-2026-title"
            class="{{ $publicationRow }} mt-8 border-t">
            <div class="{{ $publicationCover }}">
                <img src="{{ asset('assets/img/publications/jicest-2026-book-of-abstracts-cover.png') }}"
                    alt="Cover of the 4th JICEST 2026 Book of Abstracts"
                    width="566" height="800" class="h-full w-full object-contain">
            </div>
            <div class="min-w-0 lg:self-center">
                <p class="ed-mono text-sm" style="color:var(--ed-accent)">Current edition</p>
                <h3 id="abstract-book-2026-title" class="ed-display text-2xl md:text-3xl mt-3">4th JICEST 2026</h3>
                <p class="ed-quiet text-base mt-3">11 November 2026</p>
                <p class="ed-mono text-sm ed-quiet mt-4">
                    <span class="block sm:inline">136 pages &middot; PDF</span><span class="hidden sm:inline"> &middot; </span><span class="block sm:inline">39.3 MB</span>
                </p>
            </div>
            <a href="{{ asset('uploads/downloads/proceedings/jicest-2026-book-of-abstracts.pdf') }}"
                download="jicest-2026-book-of-abstracts.pdf"
                aria-label="Download the JICEST 2026 Book of Abstracts PDF"
                class="{{ $publicationAction }}">
                Download PDF
            </a>
        </article>

        <article aria-labelledby="abstract-book-2025-title"
            class="{{ $publicationRow }}">
            <div class="{{ $publicationCover }}">
                <img src="{{ asset('assets/img/publications/jicest-2025-book-of-abstracts-cover.png') }}"
                    alt="Cover of the 3rd JICEST 2025 Book of Abstracts"
                    width="566" height="800" class="h-full w-full object-contain" loading="lazy">
            </div>
            <div class="min-w-0 lg:self-center">
                <p class="ed-mono text-sm ed-quiet">Previous edition</p>
                <h3 id="abstract-book-2025-title" class="ed-display text-2xl md:text-3xl mt-3">3rd JICEST 2025</h3>
                <p class="ed-quiet text-base mt-3">28 November 2025</p>
                <p class="ed-mono text-sm ed-quiet mt-4">
                    <span class="block sm:inline">82 pages &middot; PDF</span><span class="hidden sm:inline"> &middot; </span><span class="block sm:inline">39.4 MB</span>
                </p>
            </div>
            <a href="{{ asset('uploads/downloads/proceedings/jicest-2025-book-of-abstracts.pdf') }}"
                download="jicest-2025-book-of-abstracts.pdf"
                aria-label="Download the JICEST 2025 Book of Abstracts PDF"
                class="{{ $publicationAction }}">
                Download PDF
            </a>
        </article>
    </div>
</section>

<section aria-labelledby="conference-proceedings-title" class="ed-paper w-full py-12 md:py-16">
    <div class="max-w-5xl mx-auto px-6">
        <h2 id="conference-proceedings-title" class="ed-display text-3xl md:text-4xl">Conference Proceedings</h2>

        <article aria-labelledby="proceedings-2026-title"
            class="{{ $publicationRow }} mt-8 border-t">
            <div class="{{ $publicationCover }}" role="img" aria-label="Placeholder cover for the 4th JICEST 2026 proceedings">
                <div aria-hidden="true" class="flex h-full flex-col justify-between p-2 sm:p-3 text-center">
                    <p class="ed-mono text-[.5rem] sm:text-[.65rem] leading-relaxed" style="color:var(--ed-accent)">4th JICEST<br>2026</p>
                    <p class="ed-display text-[.65rem] sm:text-base lg:text-lg">Conference<br>Proceedings</p>
                    <p class="ed-mono text-[.45rem] sm:text-[.6rem] leading-relaxed ed-quiet">Cover pending</p>
                </div>
            </div>
            <div class="min-w-0 lg:self-center">
                <p class="ed-mono text-sm" style="color:var(--ed-accent)">Current edition</p>
                <h3 id="proceedings-2026-title" class="ed-display text-2xl md:text-3xl mt-3">4th JICEST 2026</h3>
                <p class="ed-quiet text-base mt-3 leading-relaxed">
                    The proceedings will be listed here when available.
                </p>
            </div>
            <p class="ed-mono text-base col-start-2 lg:col-start-auto self-start lg:self-center" style="color:var(--ed-accent)">Coming soon</p>
        </article>

        <article aria-labelledby="proceedings-2025-title"
            class="{{ $publicationRow }}">
            <div class="{{ $publicationCover }}">
                <img src="{{ asset('assets/img/publications/jicest-3rd-proceedings-2026.png') }}"
                    alt="Cover of the 3rd JICEST conference proceedings"
                    class="h-full w-full object-contain" loading="lazy">
            </div>
            <div class="min-w-0 lg:self-center">
                <p class="ed-mono text-sm ed-quiet">Previous edition</p>
                <h3 id="proceedings-2025-title" class="ed-display text-2xl md:text-3xl mt-3">3rd JICEST 2025</h3>
                <p class="ed-quiet text-base mt-3">Vol. 2 No. 2 &middot; Published July 2026</p>
            </div>
            <a href="https://online-journal.unja.ac.id/PROCA/issue/view/2585" target="_blank" rel="noopener"
                class="{{ $publicationAction }}">
                View proceedings
                <span class="sr-only">for the 3rd JICEST 2025 (opens in a new tab)</span>
            </a>
        </article>
    </div>
</section>
@endsection
