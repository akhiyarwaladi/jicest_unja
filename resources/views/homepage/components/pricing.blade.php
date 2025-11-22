<div class="relative w-full h-fit py-20 bg-gradient-to-br from-gray-900 via-sky-900 to-emerald-900 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>

    <div class="relative flex items-center flex-col p-6 md:p-10">
        <header class="text-4xl md:text-5xl font-bold text-white mb-4">Ticket Pricing</header>
        <div class="text-xl text-white/80 mb-8">Choose the plan that works for you</div>

        <div class="text-center mt-6 mb-8">
            @if(isset($pricing['presenter']['early_bird']))
                <div class="inline-block text-lg md:text-xl font-semibold text-white drop-shadow-md bg-emerald-500 rounded-lg px-6 py-3 mb-3">
                    Early Bird: {{ $pricing['presenter']['early_bird']['period_start']->format('d M') }} - {{ $pricing['presenter']['early_bird']['period_end']->format('d M Y') }}
                </div>
            @endif
            @if(isset($pricing['presenter']['non_early_bird']))
                <div class="inline-block text-lg md:text-xl font-semibold text-white drop-shadow-md bg-orange-500 rounded-lg px-6 py-3 ml-0 md:ml-3">
                    Non Early Bird: {{ $pricing['presenter']['non_early_bird']['period_start']->format('d M') }} - {{ $pricing['presenter']['non_early_bird']['period_end']->format('d M Y') }}
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mt-8 max-w-6xl mx-auto px-6 w-full">
            <div class="rounded-2xl bg-white py-8 px-6 text-2xl text-center relative transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-xl border-4 border-orange-400">
                <div class="absolute top-0 right-12 drop-shadow-md">
                    <div class="w-[30px] h-[45px] absolute bg-orange-400 z-20">
                        <img src="{{asset('assets/logos/start.svg')}}" class="mt-2"/>
                    </div>
                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-l-[30px] border-l-orange-400 border-b-[30px] border-b-transparent"></div>
                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-r-[30px] border-r-orange-400 border-b-[30px] border-b-transparent"></div>
                </div>
                <div class="font-bold py-3 text-3xl text-gray-900">PRESENTER</div>
                <div class="bg-gradient-to-r py-3 text-white from-emerald-500 to-emerald-600 text-xl font-semibold rounded-lg">Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-emerald-600">{{ $pricing['presenter']['early_bird']['formatted'] ?? '350K IDR / 25 USD' }}</div>
                <div class="bg-gradient-to-r py-3 text-white from-orange-500 to-orange-600 text-xl font-semibold rounded-lg">Non Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-orange-600">{{ $pricing['presenter']['non_early_bird']['formatted'] ?? '450K IDR / 30 USD' }}</div>
            </div>
            <div class="rounded-2xl bg-white py-8 px-6 text-2xl text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-xl">
                <div class="font-bold py-3 text-3xl text-gray-900">PARTICIPANT</div>
                <div class="bg-gradient-to-r py-3 text-white from-emerald-400 to-emerald-500 text-xl font-semibold rounded-lg">Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-emerald-600">{{ $pricing['participant']['early_bird']['formatted'] ?? '250K IDR / 18 USD' }}</div>
                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-orange-500 text-xl font-semibold rounded-lg">Non Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-orange-600">{{ $pricing['participant']['non_early_bird']['formatted'] ?? '350K IDR / 23 USD' }}</div>
            </div>
            <div class="rounded-2xl bg-white py-8 px-6 text-2xl text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-xl">
                <div class="font-bold py-3 text-3xl text-gray-900">
                    <div>PRESENTER</div>
                    <div>STUDENT</div>
                </div>
                <div class="bg-gradient-to-r py-3 text-white from-emerald-500 to-emerald-600 text-xl font-semibold rounded-lg">Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-emerald-600">{{ $pricing['presenter_student']['early_bird']['formatted'] ?? '250K IDR / 18 USD' }}</div>
                <div class="bg-gradient-to-r py-3 text-white from-orange-500 to-orange-600 text-xl font-semibold rounded-lg">Non Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-orange-600">{{ $pricing['presenter_student']['non_early_bird']['formatted'] ?? '250K IDR / 18 USD' }}</div>
            </div>
            <div class="rounded-2xl bg-white py-8 px-6 text-2xl text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-xl">
                <div class="font-bold py-3 text-3xl text-gray-900">
                    <div>PARTICIPANT</div>
                    <div>STUDENT</div>
                </div>
                <div class="bg-gradient-to-r py-3 text-white from-emerald-400 to-emerald-500 text-xl font-semibold rounded-lg">Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-emerald-600">{{ $pricing['participant_student']['early_bird']['formatted'] ?? '50K IDR / 4 USD' }}</div>
                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-orange-500 text-xl font-semibold rounded-lg">Non Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-orange-600">{{ $pricing['participant_student']['non_early_bird']['formatted'] ?? '50K IDR / 4 USD' }}</div>
            </div>
        </div>
    </div>
</div>
