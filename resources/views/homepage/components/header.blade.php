<div id="page-header w-screen w-fit flex overflow-hidden relative z-[-1]">

    <div
        class="w-full min-h-screen h-full gap-3 flex flex-col justify-center items-center p-10 pt-24 top-0 left-0 relative">
        <img src="{{ asset('assets/bg/fstaaa.jpeg') }}" class="w-full h-full object-cover absolute left-0 top-0" />
        <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
        <div class="w-full h-full absolute top-0 left-0 glassmorphism glassmorphism-sm "></div>
        <div class="w-full h-full absolute top-0 left-0 flex flex-col justify-end">
            <div class="overlay-gradient w-full h-[200px]"></div>
        </div>

        <p class="text-white text-xl drop-shadow-lg w-full text-center italic bg-black/20 backdrop-blur-sm rounded-lg p-3 max-w-md mx-auto">Faculty Science and Technology, Universitas Jambi</p>
        <div class="poppins text-2xl md:text-4xl font-bold drop-shadow-lg text-white text-center leading-tight max-w-4xl mx-auto">
            Digital Transformation, Green Energy, and Advanced Materials for a Sustainable Society
        </div>
        <div
            class="bg-white z-[10] flex p-2 px-3 items-center max-w-[500px] w-full justify-between mx-auto shadow rounded-full ">
            <div class="font-semibold md:block hidden">Friday, 28 November 2025</div>
            <a
                href="{{auth()->check() ? '/dashboard' : '/login'}}"
                class="text-white text-center font-semibold bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 px-8 py-3 rounded-full transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg hover:shadow-xl w-full md:w-fit flex items-center justify-center gap-2">
                📝 Submit Abstract
            </a>
        </div>
        <div class=" mt-5">
            <div class="w-full block md:block items-center gap-2 justify-center text-white drop-shadow-lg ">

                <p class="text-white text-xl italic font-semibold w-full text-center mb-3">Opening Speech</p>
                <div class=" block md:flex gap-4">
                    <div class="flex items-center text-right">
                        <div class="drop-shadow-lg mr-3">
                            <p class="font-bold">Drs. Jefri Marzal, M.Sc., D.I.T.</p>
                            <p>Dean of Faculty <br> Science and Technology <br> Universitas Jambi</p>
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
