<div class="relative w-full h-fit">
    <img src="{{ asset('assets/bg/pricing-bg.jpg') }}" class="z-[-1] absolute top-0 left-0 w-full h-full object-cover" />
    <div class="flex items-center flex-col p-10">
        <header class="text-4xl font-bold text-white">Ticket Pricing</header>
        <div class="text-base text-neutral-400">Get your event ticket plan</div>

        <div class="text-center mt-6 mb-4">
            <div class="text-xl font-semibold text-emerald-100 drop-shadow-md bg-emerald-500/20 backdrop-blur-sm rounded-lg p-3 mb-2">Early Bird: 29 September - 31 October 2025</div>
            <div class="text-xl font-semibold text-orange-100 drop-shadow-md bg-orange-500/20 backdrop-blur-sm rounded-lg p-3">Non Early Bird: 1 November - 22 November 2025</div>
        </div>

        <div class="flex flex-col md:flex-row gap-7 mt-8">
            <div class="md:w-80 rounded bg-white py-7 text-2xl text-center relative transform transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer hover:ring-2 hover:ring-sky-400/50">
                <div class="absolute top-0 right-12 drop-shadow-md">
                    <div class="w-[30px] h-[45px] absolute bg-orange-400 z-20">
                        <img src="{{asset('assets/logos/start.svg')}}" class="mt-2"/>
                    </div>
                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-l-[30px] border-l-orange-400 border-b-[30px] border-b-transparent"></div>
                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-r-[30px] border-r-orange-400 border-b-[30px] border-b-transparent"></div>
                </div>
                <div class="font-bold py-3 text-3xl">PRESENTER</div>
                <div class="bg-gradient-to-r py-3 text-white from-emerald-500 to-emerald-600 text-xl font-semibold">Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-emerald-600">350K IDR / 25 USD</div>
                <div class="bg-gradient-to-r py-3 text-white from-orange-500 to-orange-600 text-xl font-semibold">Non Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-orange-600">450K IDR / 30 USD</div>
            </div>
            <div class="md:w-80 rounded bg-white py-7 text-2xl text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer hover:ring-2 hover:ring-sky-400/50">
                <div class="font-bold py-3 text-3xl">PARTICIPANT</div>
                <div class="bg-gradient-to-r py-3 text-white from-emerald-400 to-emerald-500 text-xl font-semibold">Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-emerald-600">250K IDR / 18 USD</div>
                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-orange-500 text-xl font-semibold">Non Early Bird</div>
                <div class="text-center text-2xl font-bold py-3 text-orange-600">350K IDR / 23 USD</div>
            </div>
        </div>
    </div>
</div>
