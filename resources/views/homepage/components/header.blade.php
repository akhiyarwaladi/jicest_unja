<div id="page-header w-screen w-fit flex overflow-hidden relative z-[-1]">

    <div
        class="w-full min-h-screen h-full gap-3 flex flex-col justify-center items-center p-10 pt-24 top-0 left-0 relative">
        <img src="{{ asset('assets/bg/fstaaa.jpeg') }}" class="w-full h-full object-cover absolute left-0 top-0" />
        <div class="w-full h-full absolute top-0 left-0 glassmorphism glassmorphism-sm "></div>
        <div class="w-full h-full absolute top-0 left-0 flex flex-col justify-end">
            <div class="overlay-gradient w-full h-[200px]"></div>
        </div>

        <p class="text-white text-xl drop-shadow w-full text-center italic">Faculty Science and Technology,
            Universitas Jambi</p>
        <div class="poppins text-3xl font-semibold drop-shadow-md text-white text-center">
            The Impacts, Challenges and Strategies in Science and Technology
        </div>
        <div
            class="bg-white z-[10] flex p-2 px-3 items-center max-w-[500px] w-full justify-between mx-auto shadow rounded-full ">
            <div class="font-semibold md:block hidden">Tuesday, 29 October 2024</div>
            <a
                href="{{auth()->check() ? '/dashboard' : '/login'}}"
                class="text-white  text-center font-semibold a hover:to-orange-500  bg-gradient-to-r from-orange-500 to-pink-500 px-3 rounded-full p-1 transition-all duration-300 ease-in-out transform w-full md:w-fit">Buy
                Ticket
            </a>
        </div>
        <div class=" mt-5">
            <div class="w-full block md:block items-center gap-2 justify-center text-white drop-shadow-lg ">

                <p class="text-white text-xl italic font-semibold w-full text-center mb-3">Opening Speech</p>
                <div class=" block md:flex gap-4">
                    <div class="flex items-center text-right">
                        <div class="drop-shadow-lg mr-3">
                            <p class="font-bold">Drs. Jefri Marzal, M.Sc., D.I.T.</p>
                            <p>Dean of Faculty <br> Science and Technology</p>
                        </div>
                        <img class="drop-shadow-md border-2 border-black w-[120px] h-[120px] object-cover rounded-full" src="{{ asset('assets/dean.jpg') }}" />
                    </div>
                    <div class="flex gap-4 items-center">
                        <img class="drop-shadow-md border-2 border-black w-[120px] h-[120px] object-cover rounded-full" src="{{ asset('assets/xrector.png') }}" />
                        <div class="drop-shadow-lg">
                            <p class="font-bold">Prof. Dr. Helmi, S.H., M.H. </p>
                            <p>Rector of Universitas Jambi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
