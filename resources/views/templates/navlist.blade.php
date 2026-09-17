@php
    // Editorial nav links: small monospaced caps, active page in the accent green.
    $focus = "outline-none focus-visible:ring-2 focus-visible:ring-[#047857] transition-colors";
    $link = "ed-mono block py-1 text-sm tracking-[.16em] uppercase";
@endphp

<ul class="w-full flex flex-col md:flex-row md:items-center gap-2 md:gap-7">
    @foreach ($navList as $nav)
        @if ($nav['type'] == 'single')
            <li>
                <a href="{{ $nav['link'] }}"
                    class="{{$link}} {{$focus}} {{ in_array($title, $nav['inclusion']) ? 'text-[#047857]' : 'text-[rgba(11,27,20,0.80)] hover:text-[#0b1b14]' }}">
                    {{ $nav['name'] }}
                </a>
            </li>
        @endif
        @if ($nav['type'] == 'multiple')
            <li class="relative group" tabindex="0">
                <button
                    class="{{$link}} {{$focus}} flex items-center gap-1.5 {{ in_array($title, $nav['inclusion']) ? 'text-[#047857]' : 'text-[rgba(11,27,20,0.80)] group-hover:text-[#0b1b14]' }}">
                    {{ $nav['name'] }}
                    <svg class="w-2 h-2 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                {{-- Hairline dropdown: square corners, one soft shadow for lift. --}}
                <div
                    class="absolute left-0 top-full pt-3 z-[3] opacity-0 scale-95 pointer-events-none transition duration-200 origin-top group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto group-focus-within:opacity-100 group-focus-within:scale-100 group-focus-within:pointer-events-auto">
                    <ul class="w-52 border border-[rgba(11,27,20,0.14)] bg-white shadow-[0_24px_48px_-24px_rgba(11,27,20,0.35)]">
                        @foreach ($nav['menu'] as $navmenu)
                            <li class="border-b border-[rgba(11,27,20,0.08)] last:border-b-0">
                                <a href="{{ $navmenu['link'] }}" @if ($navmenu['type'] == 'download') download @endif
                                    class="{{$focus}} block px-4 py-2.5 text-[14px] {{ in_array($title, $navmenu['inclusion']) ? 'text-[#047857]' : 'text-[rgba(11,27,20,0.80)] hover:bg-[#f3f2ec] hover:text-[#0b1b14]' }}">
                                    {{ $navmenu['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endif
    @endforeach
    @if (Auth::user())
        <li class="md:ml-3">
            <a href="/dashboard" class="{{$focus}} ed-btn !py-2 !px-4">Dashboard</a>
        </li>
    @else
        <li class="md:ml-3">
            <a href="/login"
                class="{{$focus}} ed-mono text-sm tracking-[.16em] uppercase py-1 px-1 text-[rgba(11,27,20,0.80)] hover:text-[#0b1b14]">Login</a>
        </li>
        <li>
            <a href="/register" class="{{$focus}} ed-btn !py-2 !px-4">Registration</a>
        </li>
    @endif
</ul>
