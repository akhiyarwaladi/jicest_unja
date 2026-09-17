@extends('layouts.main-tailwind')

@section('content')
{{--
    Proceeding page.

    Editorial treatment: numbered publication entries on hairline rules with
    monospaced metadata, replacing the previous gradient hero and rounded
    shadow cards. One ink band closes the page with the 2025 conference theme.
--}}
<div class="ed-paper pt-32 pb-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div>
                <p class="ed-eyebrow">Conference publications</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Proceeding</h1>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-1">
                Official publications of the 4th Jambi International Conference on Engineering, Science, and Technology.
            </p>
        </header>
        <hr class="ed-hair mt-10">
    </div>
</div>

{{-- Publications --}}
<div class="w-full py-16 md:py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-16">

            {{-- 01 · Book of Abstracts — available --}}
            <article>
                <div class="flex items-baseline justify-between ed-mono text-sm tracking-[.14em] uppercase ed-quiet">
                    <span>01</span>
                    <span style="color:var(--ed-accent)">Available</span>
                </div>

                <h2 class="ed-display text-2xl md:text-3xl mt-4">Book of Abstracts</h2>
                <p class="ed-quiet text-base mt-3 leading-relaxed">
                    Research summaries from all JICEST 2025 presenters across the six conference
                    sub-themes &mdash; an official publication of the Faculty of Science and
                    Technology, Universitas Jambi.
                </p>

                <dl class="ed-mono text-base mt-6">
                    <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Edition</dt>
                        <span class="ed-leader"></span>
                        <dd>JICEST 2025</dd>
                    </div>
                    <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Coverage</dt>
                        <span class="ed-leader"></span>
                        <dd>06 sub-themes</dd>
                    </div>
                    <div class="flex items-baseline gap-3 py-3 border-t border-b border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Format</dt>
                        <span class="ed-leader"></span>
                        <dd>PDF &middot; free download</dd>
                    </div>
                </dl>

                <div class="mt-8 border border-[var(--ed-hair)] p-5 flex items-center gap-5">
                    <img src="{{ asset('uploads/proceeding_related/Book_of_Abstract_JICEST_2025_Code.jpeg') }}"
                        alt="QR code linking to the JICEST 2025 Book of Abstracts"
                        class="w-24 h-24 object-contain shrink-0" loading="lazy">
                    <p class="ed-quiet text-base leading-relaxed">
                        Scan the code with your phone camera, or download the PDF directly below.
                    </p>
                </div>

                <a href="{{ asset('uploads/proceeding_related/Book_of_Abstract_JICEST_2025.pdf') }}"
                    download="Book_of_Abstract_JICEST_2025.pdf"
                    class="ed-btn mt-8 w-full justify-center">
                    Download PDF &darr;
                </a>
            </article>

            {{-- 02 · Full Paper Proceeding — in preparation --}}
            <article>
                <div class="flex items-baseline justify-between ed-mono text-sm tracking-[.14em] uppercase ed-quiet">
                    <span>02</span>
                    <span style="color:var(--ed-signal)">In preparation</span>
                </div>

                <h2 class="ed-display text-2xl md:text-3xl mt-4">Full Paper Proceeding</h2>
                <p class="ed-quiet text-base mt-3 leading-relaxed">
                    The complete collection of accepted research papers from JICEST 2025 is
                    currently being compiled and reviewed. It will be published on this page.
                </p>

                <dl class="ed-mono text-base mt-6">
                    <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Expected</dt>
                        <span class="ed-leader"></span>
                        <dd>March &ndash; June 2026</dd>
                    </div>
                    <div class="flex items-baseline gap-3 py-3 border-t border-b border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Content</dt>
                        <span class="ed-leader"></span>
                        <dd>Full papers &middot; peer-reviewed</dd>
                    </div>
                </dl>

                <h3 class="ed-mono text-sm tracking-[.16em] uppercase mt-10" style="color:var(--ed-accent)">What to expect</h3>
                <ul class="mt-4 text-base ed-quiet">
                    <li class="py-3 border-t border-[var(--ed-hair)]">Full research papers with complete methodology</li>
                    <li class="py-3 border-t border-[var(--ed-hair)]">Detailed results and analysis</li>
                    <li class="py-3 border-t border-b border-[var(--ed-hair)]">Peer-reviewed and indexed publication</li>
                </ul>

                <div class="border border-[var(--ed-hair)] p-5 mt-10">
                    <p class="ed-display text-lg">In preparation</p>
                    <p class="ed-quiet text-base mt-2 leading-relaxed">
                        Our editorial team is currently reviewing and compiling all accepted papers.
                        Check back in a few months.
                    </p>
                </div>
            </article>
        </div>
    </div>
</div>

{{-- Stay updated --}}
<div class="ed-paper py-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <div class="border border-[var(--ed-hair)] bg-white p-8 md:p-10">
            <p class="ed-eyebrow">Stay updated</p>
            <p class="ed-quiet mt-4 leading-relaxed max-w-2xl">
                We will announce the availability of the Full Paper Proceeding through official
                channels. Please check this page periodically or get in touch with the secretariat
                for the latest information.
            </p>
            <a href="/contact"
                class="ed-mono text-sm tracking-[.16em] uppercase ed-underline inline-block mt-6"
                style="color:var(--ed-accent)">
                Contact the secretariat &rarr;
            </a>
        </div>
    </div>
</div>

{{-- Conference theme --}}
<div class="ed-ink-band w-full">
    <div class="max-w-5xl mx-auto px-6 py-16 md:py-20">
        <p class="ed-mono text-sm tracking-[.16em] uppercase text-white/70">Conference theme 2025</p>
        <blockquote class="ed-display italic text-2xl md:text-4xl leading-snug mt-6 max-w-3xl" style="color:#fff">
            &ldquo;Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society&rdquo;
        </blockquote>
    </div>
</div>
@endsection
