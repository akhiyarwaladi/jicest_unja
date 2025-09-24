@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section>
        <div class="relative w-full h-fit py-10 pt-20">
            <img src="{{ asset('assets/bg/pricing-bg.jpg') }}" class="z-[-1] absolute top-0 left-0 w-full h-full object-cover" />
            <div class="flex items-center flex-col p-10 gap-4">
                <header class="text-4xl font-bold text-white">Ticket Pricing</header>
                <div class="text-base text-neutral-400">Get your event ticket plan</div>
                <div class="flex flex-col gap-10">
                    <div>
                <div class="text-xl font-semibold text-white drop-shadow-md mt-2 text-center">Early Bird </div>
                <div class="text-xl font-normal text-white drop-shadow-md mt-2 text-center">August 1 - September 14 Offline</div>
                        <div class="flex flex-col md:flex-row gap-7 mt-5">
                            <div class="md:w-64 rounded bg-white py-7 text-2xl text-center relative">
                                <div class="absolute top-0 right-12 drop-shadow-md">
                                    <div class="w-[30px] h-[45px] absolute bg-orange-400 z-20">
                                        <img src="{{asset('assets/logos/start.svg')}}" class="mt-2"/>
                                    </div>
                                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-l-[30px] border-l-orange-400 border-b-[30px] border-b-transparent"></div>
                                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-r-[30px] border-r-orange-400 border-b-[30px] border-b-transparent"></div>
                                </div>
                                <div class="font-bold py-3">PRESENTER</div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">OFFLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div>500K IDR/50 USD</div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div>300K IDR/30 USD</div>
                                </div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">ONLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div>350K IDR/35 USD</div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div>250K IDR/25 USD</div>
                                </div>
                            </div>
                            <div class="md:w-64 rounded bg-white py-7 text-2xl text-center">
                                <div class="font-bold py-3">PARTICIPANT</div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">OFFLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div> 150K IDR/15 USD
                                    </div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div> 100K IDR/10 USD</div>
                                </div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">ONLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div> 100K IDR/10 USD</div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div> 50K IDR/5 USD</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        
                <div class="text-xl font-semibold text-white drop-shadow-md mt-2 text-center">Non-Early Bird </div>
                <div class="text-xl font-normal text-white drop-shadow-md mt-2 text-center">September 15 - October 25 Offline</div>
                <div class="text-xl font-normal text-white drop-shadow-md mt-2 text-center">September 15 - October 27 Online</div>
                        <div class="flex flex-col md:flex-row gap-7 mt-5">
                            <div class="md:w-64 rounded bg-white py-7 text-2xl text-center relative">
                                <div class="absolute top-0 right-12 drop-shadow-md">
                                    <div class="w-[30px] h-[45px] absolute bg-orange-400 z-20">
                                        <img src="{{asset('assets/logos/start.svg')}}" class="mt-2"/>
                                    </div>
                                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-l-[30px] border-l-orange-400 border-b-[30px] border-b-transparent"></div>
                                    <div class="absolute z-10 -w-0 h-0 border-t-[30px] border-t-transparent border-r-[30px] border-r-orange-400 border-b-[30px] border-b-transparent"></div>
                                </div>
                                <div class="font-bold py-3">PRESENTER</div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">OFFLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div>600K IDR/60 USD</div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div>350K IDR/35 USD</div>
                                </div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">ONLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div>400K IDR/40 USD</div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div>300K IDR/30 USD</div>
                                </div>
                            </div>
                            <div class="md:w-64 rounded bg-white py-7 text-2xl text-center">
                                <div class="font-bold py-3">PARTICIPANT</div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">OFFLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div> 200K IDR/20 USD
                                    </div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div> 125K IDR/12.5 USD</div>
                                </div>
                                <div class="bg-gradient-to-r py-3 text-white from-orange-400 to-pink-500">ONLINE</div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>REGULER</div> :
                                    <div> 150K IDR/15 USD</div>
                                </div>
                                <div class="text-left w-full text-xl px-2 py-3 flex gap-3">
                                    <div>STUDENT</div> :
                                    <div> 75K IDR/7.5 USD</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-md mt-5 p-5 max-w-[700px] w-full">
                    <header class="text-2xl text-black font-bold text-center">Payment</header>
                    <section class="w-full text-center">
                        <div class="text-center mt-4 text-xl font-semibold">Bank BTN</div>
                        <div class="text-center text-xl font-semibold bg-gradient-to-r from-orange-400 to-pink-400 w-fit block mx-auto px-5 rounded-full text-white">0003801300008828</div>

                        <section>
                            <header class="text-center mt-4 text-lg font-[300]">Account Name</header>
                            <div class="text-center text-xl font-semibold">RPL 012 BLU UNJA UTK OPS PENERIMAAN</div>
                        </section>
                    </section>
                </div>
            </div>
        </div>

    </section>
@endsection
