@extends('layouts.main-tailwind')

@section('content')
<div class="ed-paper pt-32 pb-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div>
                <p class="ed-eyebrow">Conference publications</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Proceedings</h1>
            </div>
            <p class="ed-quiet max-w-sm md:text-right md:pb-1">
                Official publications of the Jambi International Conference on Engineering, Science and Technology.
            </p>
        </header>
        <hr class="ed-hair mt-10">
    </div>
</div>

<div class="w-full py-16 md:py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-16">
            <article>
                <div class="flex items-baseline justify-between ed-mono text-sm tracking-[.14em] uppercase ed-quiet">
                    <span>01</span>
                    <span style="color:var(--ed-accent)">Available</span>
                </div>

                <h2 class="ed-display text-2xl md:text-3xl mt-4">Book of Abstracts</h2>
                <p class="ed-quiet text-base mt-3 leading-relaxed">
                    Research summaries from JICEST 2025 presenters across the six conference sub-themes,
                    published by the Faculty of Science and Technology, Universitas Jambi.
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
                        Scan the code with your phone camera, or download the PDF directly.
                    </p>
                </div>

                <a href="{{ asset('uploads/proceeding_related/Book_of_Abstract_JICEST_2025.pdf') }}"
                    download="Book_of_Abstract_JICEST_2025.pdf"
                    class="ed-btn mt-8 w-full justify-center">
                    Download PDF
                </a>
            </article>

            <article>
                <div class="flex items-baseline justify-between ed-mono text-sm tracking-[.14em] uppercase ed-quiet">
                    <span>02</span>
                    <span style="color:var(--ed-accent)">Available</span>
                </div>

                <h2 class="ed-display text-2xl md:text-3xl mt-4">The 3rd JICEST Proceedings</h2>
                <p class="ed-quiet text-base mt-3 leading-relaxed">
                    Full proceedings from the 3rd Jambi International Conference on Engineering,
                    Science and Technology, held on 28 November 2025.
                </p>

                <div class="mt-8 border border-[var(--ed-hair)] p-5 grid grid-cols-1 sm:grid-cols-[8rem_1fr] gap-6 items-start">
                    <img src="{{ asset('uploads/proceeding_related/JICEST_3rd_Proceeding_2026.png') }}"
                        alt="Cover of the 3rd JICEST conference proceedings"
                        class="w-32 border border-[var(--ed-hair)]" loading="lazy">
                    <dl class="ed-mono text-sm">
                        <div class="flex items-baseline gap-3 py-2 border-t border-[var(--ed-hair)]">
                            <dt class="ed-quiet">Issue</dt>
                            <span class="ed-leader"></span>
                            <dd>Vol. 2 No. 2</dd>
                        </div>
                        <div class="flex items-baseline gap-3 py-2 border-t border-[var(--ed-hair)]">
                            <dt class="ed-quiet">Published</dt>
                            <span class="ed-leader"></span>
                            <dd>15 Jul 2026</dd>
                        </div>
                        <div class="flex items-baseline gap-3 py-2 border-t border-b border-[var(--ed-hair)]">
                            <dt class="ed-quiet">Contents</dt>
                            <span class="ed-leader"></span>
                            <dd>35 manuscripts</dd>
                        </div>
                    </dl>
                </div>

                <dl class="ed-mono text-base mt-6">
                    <div class="flex items-baseline gap-3 py-3 border-t border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Authors</dt>
                        <span class="ed-leader"></span>
                        <dd>200</dd>
                    </div>
                    <div class="flex items-baseline gap-3 py-3 border-t border-b border-[var(--ed-hair)]">
                        <dt class="ed-quiet">Access</dt>
                        <span class="ed-leader"></span>
                        <dd>Open online</dd>
                    </div>
                </dl>

                <a href="https://online-journal.unja.ac.id/PROCA/issue/view/2585" target="_blank" rel="noopener"
                    class="ed-btn mt-8 w-full justify-center">
                    View issue
                </a>
            </article>
        </div>
    </div>
</div>

<div class="ed-paper py-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <div class="border border-[var(--ed-hair)] bg-white p-8 md:p-10">
            <p class="ed-eyebrow">2026 proceedings</p>
            <p class="ed-quiet mt-4 leading-relaxed max-w-2xl">
                The 4th JICEST proceedings will be published after the conference. The secretariat will
                announce the release date through the official conference channels.
            </p>
            <a href="/contact"
                class="ed-mono text-sm tracking-[.16em] uppercase ed-underline inline-block mt-6"
                style="color:var(--ed-accent)">
                Contact the secretariat
            </a>
        </div>
    </div>
</div>

<div class="ed-ink-band w-full">
    <div class="max-w-5xl mx-auto px-6 py-16 md:py-20">
        <p class="ed-mono text-sm tracking-[.16em] uppercase text-white/70">Conference theme 2025</p>
        <blockquote class="ed-display italic text-2xl md:text-4xl leading-snug mt-6 max-w-3xl" style="color:#fff">
            &ldquo;Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society&rdquo;
        </blockquote>
    </div>
</div>
@endsection
