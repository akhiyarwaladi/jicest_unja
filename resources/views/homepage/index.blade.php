@extends('layouts.main-tailwind')

@section('css')
<style>
        {{--
            Styles for the Jambi landmarks slideshow (components/info2) only.
            The previous theme's decorative CSS (gradient overlays, orange-pink
            triangles, map shadows, keynote thumbnails) was removed with it.
        --}}

        .mySlides {
            display: none
        }

        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        .slideshow-container img {
            vertical-align: middle;
        }

        .numbertext {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            color: rgba(255, 255, 255, .85);
            font-size: .875rem;
            padding: 8px 12px;
            width: 100%;
            box-sizing: border-box;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: #fff;
            font-weight: bold;
            font-size: 1.125rem;
            border: 0;
            background: transparent;
            user-select: none;
            transition: background-color .3s ease;
        }

        .next {
            right: 0;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(11, 27, 20, .7);
        }

        .dot {
            cursor: pointer;
            height: 12px;
            width: 12px;
            margin: 0 3px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, .5);
            display: inline-block;
            transition: background-color .3s ease;
        }

        .dot:hover {
            background-color: #fff;
        }

        .dot.active,
        .dot[aria-current="true"] {
            background-color: var(--ed-accent);
        }

        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }
@endsection

@section('content')
    <div class="main static z-[-1]">
        @include('homepage.components.header')
        <div class="main h-fit w-full  ">
            @include('homepage.components.about')
            @include('homepage.components.keynote')
            @include('homepage.components.publication')
            @include('homepage.components.date')
            @include('homepage.components.pricing')
            @include('homepage.components.icon-jambi')
            {{-- Location and secretariat details, set with hairlines and dotted leaders rather
                 than four differently-coloured gradient cards. --}}
            <section class="w-full bg-white py-16 md:py-20">
                <div class="max-w-6xl mx-auto px-6">
                    <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 pb-10">
                        <div>
                            <p class="ed-eyebrow">Practical information</p>
                            <h2 class="ed-display text-4xl md:text-5xl mt-3">Location &amp; Contact</h2>
                        </div>
                        <p class="ed-quiet text-lg md:text-right md:pb-2 max-w-sm">
                            JICEST 2026 is held online. The secretariat sits at the Faculty of Science and
                            Technology, Universitas Jambi.
                        </p>
                    </header>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                        {{-- Secretariat details --}}
                        <div class="lg:col-span-5">
                            <h3 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Secretariat</h3>

                            <dl class="mt-6 ed-mono text-base">
                                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)]">
                                    <dt class="ed-quiet shrink-0">Email</dt>
                                    <span class="ed-leader"></span>
                                    <dd><a href="mailto:jicest@unja.ac.id" class="ed-underline">jicest@unja.ac.id</a></dd>
                                </div>
                                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)]">
                                    <dt class="ed-quiet shrink-0">Website</dt>
                                    <span class="ed-leader"></span>
                                    <dd>
                                        <a href="https://jicest.unja.ac.id" target="_blank" rel="noopener" class="ed-underline">jicest.unja.ac.id</a>
                                    </dd>
                                </div>
                                <div class="flex items-baseline gap-3 py-4 border-t border-[var(--ed-hair)]">
                                    <dt class="ed-quiet shrink-0">WhatsApp</dt>
                                    <span class="ed-leader"></span>
                                    <dd class="text-right">
                                        <a href="https://wa.me/6282210794479" target="_blank" rel="noopener" class="ed-underline">Rara Ayu Lestary<br>+62 822 1079 4479</a>
                                    </dd>
                                </div>
                                <div class="flex items-baseline gap-3 py-4 border-t border-b border-[var(--ed-hair)]">
                                    <dt class="ed-quiet shrink-0">WhatsApp</dt>
                                    <span class="ed-leader"></span>
                                    <dd class="text-right">
                                        <a href="https://wa.me/6285266469829" target="_blank" rel="noopener" class="ed-underline">Tia Wulandari<br>+62 852 6646 9829</a>
                                    </dd>
                                </div>
                            </dl>

                            <address class="not-italic mt-10">
                                <h3 class="ed-mono text-sm tracking-[.16em] uppercase" style="color:var(--ed-accent)">Address</h3>
                                <p class="ed-quiet text-base mt-4 leading-relaxed">
                                    Faculty of Science and Technology<br>
                                    Universitas Jambi<br>
                                    Jl. Jambi &ndash; Muara Bulian No. KM. 15<br>
                                    Mendalo Darat, Muaro Jambi, Jambi, Indonesia
                                </p>
                            </address>
                        </div>

                        {{-- Map --}}
                        <div class="lg:col-span-7">
                            <div class="border border-[var(--ed-hair)]">
                                <iframe class="w-full h-[420px] lg:h-[560px] block"
                                    title="Map of the Faculty of Science and Technology, Universitas Jambi"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.6927320260347!2d103.52009062425653!3d-1.6153859902453034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f63af4c66b3ab%3A0xcfc5de0b9dfcc65e!2sFakultas%20Sains%20Dan%20Teknologi%20Gedung%20B!5e0!3m2!1sid!2sid!4v1694851413099!5m2!1sid!2sid"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <p class="ed-mono text-sm ed-quiet mt-4">1.6154&deg; S, 103.5201&deg; E</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

@push('js')
@endpush
