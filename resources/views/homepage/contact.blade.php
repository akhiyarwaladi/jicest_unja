@extends('layouts.main-tailwind')

@section('content')
{{--
    Contact page.

    Hairline rules, monospaced phone numbers and dotted leaders instead of the previous
    rounded gradient cards with circular icon badges.
--}}
<div class="ed-paper pt-32 pb-16 w-full">
    <div class="max-w-5xl mx-auto px-6">
        <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-10">
            <div>
                <p class="ed-eyebrow">Get in touch</p>
                <h1 class="ed-display text-4xl md:text-5xl mt-3">Contact Us</h1>
            </div>
            <p class="ed-quiet text-lg max-w-sm md:text-right md:pb-1">
                Questions about JICEST 2026, submissions or payment? The secretariat replies within one working day.
            </p>
        </header>

        {{-- Contact persons --}}
        <section class="pb-16">
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Contact persons</h2>
                <span class="ed-leader"></span>
                <span class="ed-mono text-sm ed-quiet">WhatsApp</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12">
                <div class="ed-row pt-6 md:pt-7 pb-7">
                    <h3 class="ed-display text-xl">Rara Ayu Lestary</h3>
                    <p class="ed-mono text-lg mt-3">+62 822 1079 4479</p>
                    <a href="https://wa.me/6282210794479" target="_blank" rel="noopener" class="ed-btn mt-5">
                        Message on WhatsApp
                    </a>
                </div>

                <div class="ed-row pt-6 md:pt-7 pb-7">
                    <h3 class="ed-display text-xl">Tia Wulandari</h3>
                    <p class="ed-mono text-lg mt-3">+62 852 6646 9829</p>
                    <a href="https://wa.me/6285266469829" target="_blank" rel="noopener" class="ed-btn mt-5">
                        Message on WhatsApp
                    </a>
                </div>
            </div>
        </section>

        {{-- Secretariat details --}}
        <section class="pb-16">
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Secretariat</h2>
                <span class="ed-leader"></span>
            </div>

            <dl class="mt-6 ed-mono text-base">
                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)]">
                    <dt class="ed-quiet">Email</dt>
                    <span class="ed-leader"></span>
                    <dd><a href="mailto:jicest@unja.ac.id" class="ed-underline">jicest@unja.ac.id</a></dd>
                </div>
                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)]">
                    <dt class="ed-quiet">Website</dt>
                    <span class="ed-leader"></span>
                    <dd>
                        <a href="https://jicest.unja.ac.id" target="_blank" rel="noopener" class="ed-underline">jicest.unja.ac.id</a>
                    </dd>
                </div>
                <div class="flex items-baseline gap-3 py-4 border-t border-b border-[var(--ed-hair)]">
                    <dt class="ed-quiet">Host</dt>
                    <span class="ed-leader"></span>
                    <dd>Faculty of Science and Technology, Universitas Jambi</dd>
                </div>
            </dl>
        </section>

        {{-- Venue --}}
        <section>
            <div class="flex items-center gap-4">
                <h2 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Venue</h2>
                <span class="ed-leader"></span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-6">
                <address class="lg:col-span-4 not-italic">
                    <p class="ed-display text-xl">Universitas Jambi</p>
                    <p class="ed-quiet text-base mt-3 leading-relaxed">
                        Jl. Jambi &ndash; Muara Bulian No. KM. 15<br>
                        Mendalo Darat, Kec. Jambi Luar Kota<br>
                        Kabupaten Muaro Jambi<br>
                        Jambi, Indonesia
                    </p>
                    <p class="ed-mono text-sm ed-quiet mt-5">1.6154&deg; S, 103.5201&deg; E</p>
                </address>

                <div class="lg:col-span-8 border border-[var(--ed-hair)]">
                    <iframe class="w-full h-[360px] md:h-[420px] block"
                        title="Map of the Faculty of Science and Technology, Universitas Jambi"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.6927320260347!2d103.52009062425653!3d-1.6153859902453034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f63af4c66b3ab%3A0xcfc5de0b9dfcc65e!2sFakultas%20Sains%20Dan%20Teknologi%20Gedung%20B!5e0!3m2!1sid!2sid!4v1694851413099!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
