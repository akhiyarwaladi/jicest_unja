{{-- Important dates: a printed deadline table rather than a grid of gradient cards. --}}
<div class="ed-paper w-full py-20 md:py-24">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-8">
            <div class="max-w-2xl">
                <p class="ed-eyebrow">Deadlines</p>
                <h2 class="ed-display text-4xl md:text-5xl mt-3">Abstract &amp; Paper Schedule</h2>
                <p class="ed-quiet text-lg mt-4">All cut-offs are 23:59 Jambi time (UTC+7). Submissions received after a
deadline move to the next round.</p>
            </div>
            <div class="ed-mono text-lg ed-quiet md:text-right md:pb-1">
                <div>Conference &middot; 11 Nov 2026</div>
                <div class="mt-1" style="color:var(--ed-accent)">Online attendance</div>
            </div>
        </header>

        {{-- Early bird round --}}
        <section class="pt-10">
            <div class="flex items-center gap-4">
                <h3 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Early bird round
    </h3>
                <span class="ed-leader"></span>
                <span class="ed-mono text-sm ed-quiet">closes 14 Oct 2026</span>
            </div>

            <div class="ed-row grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7">
                <div class="ed-mono text-sm ed-quiet md:col-span-1">01</div>
                <div class="md:col-span-5">
                    <h4 class="ed-display text-2xl">Abstract submission</h4>
                    <p class="ed-quiet text-base mt-2">Extended abstract, 250-300 words, in the provided template. Early
        bird fee applies.</p>
                </div>
                <div class="ed-mono text-lg md:col-span-2 md:text-right">14 Oct 2026</div>
                <div class="md:col-span-4 md:text-right">
                    <div class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Closes in</div>
                    <div id="countdown-abstract-early" class="ed-mono text-2xl mt-1" style="color:var(--ed-accent)">&mdash;</div>
                </div>
            </div>

            <div class="ed-row grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7">
                <div class="ed-mono text-sm ed-quiet md:col-span-1">02</div>
                <div class="md:col-span-5">
                    <h4 class="ed-display text-2xl">Full paper submission</h4>
                    <p class="ed-quiet text-base mt-2">Final manuscript for the proceedings, submitted after abstract
        acceptance.</p>
                </div>
                <div class="ed-mono text-lg md:col-span-2 md:text-right">9 Nov 2026</div>
                <div class="md:col-span-4 md:text-right">
                    <div class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Closes in</div>
                    <div id="countdown-paper-early" class="ed-mono text-2xl mt-1" style="color:var(--ed-accent)">&mdash;</div>
                </div>
            </div>
        </section>

        {{-- Final round --}}
        <section class="pt-12">
            <div class="flex items-center gap-4">
                <h3 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-signal)">Final round</h3>
                <span class="ed-leader"></span>
                <span class="ed-mono text-sm ed-quiet">early bird rates no longer apply</span>
            </div>

            <div class="ed-row grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7">
                <div class="ed-mono text-sm ed-quiet md:col-span-1">03</div>
                <div class="md:col-span-5">
                    <h4 class="ed-display text-2xl">Abstract submission</h4>
                    <p class="ed-quiet text-base mt-2">Last call for abstracts. Regular registration fee applies.</p>
                </div>
                <div class="ed-mono text-lg md:col-span-2 md:text-right">9 Nov 2026</div>
                <div class="md:col-span-4 md:text-right">
                    <div class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Closes in</div>
                    <div id="countdown-abstract-regular" class="ed-mono text-2xl mt-1" style="color:var(--ed-signal)">&mdash;</div>
                </div>
            </div>

            <div class="ed-row grid grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-3 items-baseline py-7 border-b border-[var(--ed-hair)]">
                <div class="ed-mono text-sm ed-quiet md:col-span-1">04</div>
                <div class="md:col-span-5">
                    <h4 class="ed-display text-2xl">Full paper submission</h4>
                    <p class="ed-quiet text-base mt-2">Absolute deadline for manuscripts to be included in the
        proceedings.</p>
                </div>
                <div class="ed-mono text-lg md:col-span-2 md:text-right">9 Nov 2026</div>
                <div class="md:col-span-4 md:text-right">
                    <div class="ed-mono text-sm tracking-[.14em] uppercase ed-quiet">Closes in</div>
                    <div id="countdown-paper-regular" class="ed-mono text-2xl mt-1" style="color:var(--ed-signal)">&mdash;</div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    // Countdown to a fixed deadline. Each element shows days / hours / minutes / seconds
    // and settles on "Closed" once the date has passed.
    function startCountdown(targetDate, elementId) {
        const el = document.getElementById(elementId);
        if (!el) return;

        let timer = null;

        const tick = () => {
            const distance = targetDate - new Date().getTime();

            if (distance < 0) {
                el.textContent = 'Closed';
                if (timer) clearInterval(timer);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            el.textContent = days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's';
        };

        tick();
        timer = setInterval(tick, 1000);
    }

    // Early bird round
    const abstractEarlyDeadline = new Date('October 14, 2026 23:59:59').getTime();
    const paperEarlyDeadline = new Date('November 9, 2026 23:59:59').getTime();

    // Final round
    const abstractRegularDeadline = new Date('November 9, 2026 23:59:59').getTime();
    const paperRegularDeadline = new Date('November 9, 2026 23:59:59').getTime();

    startCountdown(abstractEarlyDeadline, 'countdown-abstract-early');
    startCountdown(paperEarlyDeadline, 'countdown-paper-early');
    startCountdown(abstractRegularDeadline, 'countdown-abstract-regular');
    startCountdown(paperRegularDeadline, 'countdown-paper-regular');
</script>
