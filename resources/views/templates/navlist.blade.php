@php
    $outline = "outline-none outline-offset-0 border-2 border-transparent focus:border-emerald-500 focus:outline-[3px] focus:outline-emerald-300 transition-all duration-300";
@endphp

<script>
    // console.log("{{$title}}");
</script>

<ul class="w-full flex md:flex-row flex-col h-full gap-3 ">

    @foreach ($navList as $nav)
        @if ($nav['type'] == 'single')
            <li class="h-8">
                <a href="{{ $nav['link'] }}"
                    class="{{$outline}} {{in_array($title, $nav['inclusion']) ? "bg-gradient-to-r text-white" : "" }} block py-1 rounded-full px-3 hover:text-white text-black hover:bg-gradient-to-r from-emerald-400 to-emerald-500"
                    aria-current="page">{{ $nav['name'] }}</a>
            </li>
        @endif
        @if ($nav['type'] == 'multiple')
            <li class="relative group flex flex-col h-8" tabindex="0">
                <button id="dropdownNavbarLink{{ $loop->index }}"
                    class="{{ in_array($title, $nav['inclusion']) ? 'bg-gradient-to-r from-emerald-400 to-emerald-500 text-white' : '' }} z-[2] py-1 {{$outline}} flex justify-start md:justify-center items-center rounded-full group-hover:text-white px-3 group-hover:bg-gradient-to-r from-emerald-400 to-emerald-500">
                    {{ $nav['name'] }}
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="dropdownNavbar{{ $loop->index }}"
                    class="z-[3] top-8 font-semibold divide-y rounded-lg shadow w-44 transition duration-300 ease-in-out transform opacity-0 group-hover:opacity-100 group-hover:scale-100 group-focus:opacity-100 group-focus:scale-100 absolute scale-0 border border-orange-500 glassmorphism bg-white bg-opacity-95">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        @foreach ($nav['menu'] as $navmenu)
                            <li>
                                <a href="{{ $navmenu['link'] }}"
                                    class="{{$outline}} {{ in_array($title, $navmenu['inclusion']) ? 'bg-gradient-to-r from-blue-400 to-sky-500 text-white' : '' }} z-[3] block px-4 py-2 hover:bg-gray-100 text-black group-focus:opacity-100 group-focus:scale-100">{{ $navmenu['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>

        @endif
        @if ($nav['type'] == 'download')
            <li class="h-8 ">
                <a href="#"
                    class="{{$outline}} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Download</a>
            </li>
        @endif
    @endforeach
    @if(Auth::user())
        <li class="">
            <a class="{{$outline}} bg-gradient-to-r from-blue-400 to-sky-500 font-semibold flex items-center justify-center px-4 rounded-full text-white md:py-0  h-full group cursor-pointer" href="/dashboard">
                <span class="drop-shadow-md group-hover:text-gray-200">Dashboard</span>
            </a>
        </li>
    @else
        <li class="">
            <a class="{{$outline}} bg-gradient-to-r from-blue-400 to-sky-500 font-semibold flex items-center justify-center px-4 rounded-full text-white md:py-0 py-1   h-full group cursor-pointer" href="/login">
                <span class="drop-shadow-md group-hover:text-gray-200">Login</span>
            </a>
        </li>
        <li class="">
            <a class="{{$outline}} bg-gradient-to-r from-blue-400 to-sky-500 font-semibold flex items-center justify-center px-4 rounded-full text-white md:py-0 py-1  h-full group cursor-pointer" href="/register">
                <span class="drop-shadow-md group-hover:text-gray-200  ">Registration</span>
            </a>
        </li>
    @endif

</ul>
