{{-- 
    Homepage hero.

    The campus photo stays fully visible under a light transparent wash — no
    frosted tiles, no stat boxes. Serif display headline, one quiet date line
    with a live countdown, one primary action, square hairline portraits for
    the opening speeches.
--}}
<header id="top" class="relative w-full overflow-hidden text-white" style="background-color: var(--ed-ink)">
    <img src="{{ asset('assets/bg/fstaaa.jpeg') }}" alt="" aria-hidden="true"
        class="absolute inset-0 w-full h-full object-cover" />
    {{-- Light wash only: the photo remains clearly visible through it. --}}
    <div class="absolute inset-0"
        style="background: linear-gradient(to bottom, rgba(11, 27, 20, .50), rgba(11, 27, 20, .50) 45%, rgba(11, 27, 20, .85));"></div>

    <div class="relative max-w-6xl mx-auto px-6 pt-40 pb-16 md:pt-52 md:pb-24">

        {{-- The full conference name is a sentence, not a label: sentence case at a
            readable size instead of tiny tracked-out capitals. --}}
        <p class="ed-mono text-sm leading-relaxed" style="color: #6ee7b7">
            4th Jambi International Conference on Engineering, Science and Technology
        </p>

        <h1 class="ed-display text-5xl md:text-7xl lg:text-8xl mt-6 fade-in-up" style="color: #fff">
            JICEST 2026
        </h1>

        <p class="mt-6 max-w-2xl text-lg md:text-xl lg:text-2xl leading-relaxed text-white/80 fade-in-up">
            Accelerating Green Innovation and Digital Transformation in Science, Technology,
            and Engineering for a Sustainable Future
        </p>

        {{-- One quiet date line with a live countdown — plain text, no boxes. --}}
        <p class="ed-mono text-sm tracking-[.16em] uppercase mt-6 text-white/80 fade-in-up">
            Wednesday, 11 November 2026 &middot; Online &middot; UTC+7
        </p>
        <p class="ed-mono text-sm tracking-[.16em] uppercase mt-2 fade-in-up" style="color:#6ee7b7">
            Opens in <span id="hero-countdown">&mdash;</span>
        </p>

        {{-- One primary action; the anchor link to the about section stays quiet by design. --}}
        <div class="mt-10 flex flex-col sm:flex-row sm:items-center gap-5 fade-in-up">
            <a href="{{ auth()->check() ? '/dashboard' : '/login' }}" class="ed-btn ed-btn-inverse">
                Submit Abstract &rarr;
            </a>
            <a href="#about"
                class="ed-mono text-sm tracking-[.16em] uppercase text-white/80 hover:text-white ed-underline self-center sm:self-auto">
                About the conference &darr;
            </a>
        </div>

        {{-- Opening speeches: square hairline portraits, no drop shadows, no rings. --}}
        <div class="mt-16 md:mt-20 border-t border-white/15 pt-8">
            <p class="ed-mono text-sm tracking-[.16em] uppercase text-white/70">Opening speeches</p>
            <div class="mt-6 grid gap-8 md:grid-cols-2 max-w-3xl">
                <figure class="flex items-center gap-4">
                    <img src="{{ asset('assets/dean.jpg') }}" alt="Drs. Jefri Marzal, M.Sc., D.I.T."
                        class="w-16 h-16 md:w-20 md:h-20 object-cover object-top border border-white/20 ed-media shrink-0"
                        loading="lazy" />
                    <figcaption>
                        <p class="ed-display text-lg md:text-xl" style="color: #fff">Drs. Jefri Marzal, M.Sc., D.I.T.</p>
                        <p class="ed-mono text-sm tracking-[.04em] text-white/70 mt-1.5 leading-relaxed">
                            Dean, Faculty of Science and Technology, Universitas Jambi
                        </p>
                    </figcaption>
                </figure>
                <figure class="flex items-center gap-4">
                    <img src="{{ asset('assets/xrector.png') }}" alt="Prof. Dr. Helmi, S.H., M.H."
                        class="w-16 h-16 md:w-20 md:h-20 object-cover object-top border border-white/20 ed-media shrink-0"
                        loading="lazy" />
                    <figcaption>
                        <p class="ed-display text-lg md:text-xl" style="color: #fff">Prof. Dr. Helmi, S.H., M.H.</p>
                        <p class="ed-mono text-sm tracking-[.04em] text-white/70 mt-1.5 leading-relaxed">
                            Rector, Universitas Jambi
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>

    <script>
        // Live countdown to the conference opening (11 Nov 2026, 08:00 UTC+7),
        // rendered as one quiet text line in the hero. Clamps at zero and reads
        // "It's live" once the conference has started.
        (function () {
            const el = document.getElementById('hero-countdown');
            if (!el) return;

            const target = new Date('2026-11-11T08:00:00+07:00').getTime();
            const nf = new Intl.NumberFormat('en', { minimumIntegerDigits: 2 });

            let timer = 0;

            const tick = () => {
                let d = target - Date.now();
                if (d <= 0) {
                    el.textContent = 'it\'s live';
                    clearInterval(timer);
                    return;
                }
                const days = Math.floor(d / 86400000);
                const hours = Math.floor((d % 86400000) / 3600000);
                const minutes = Math.floor((d % 3600000) / 60000);
                const seconds = Math.floor((d % 60000) / 1000);
                el.textContent = days + ' days ' + nf.format(hours) + 'h ' + nf.format(minutes) + 'm ' + nf.format(seconds) + 's';
            };

            tick();
            timer = setInterval(tick, 1000);
        })();
    </script>
</header>
