@extends('layouts.main-tailwind')

@php
    $header = "";//"flex items-center justify-center font-bold text-xl w-1/2 bg-white min-h-[130px] ";

    $container = "";//"max-w-[700px] w-full w-full flex text-center items-center bg-gradient-to-r from-orange-400 to-pink-400 rounded-md";

    $child = "";//"max-w-[500px] w-full rounded-sm px-3 text-lg font-semibold min-w-[150px] bg-white "

    $bgGradient = "bg-gradient-to-r from-orange-300 to-pink-300";
@endphp

@section('content')
    <!-- Contact Form Section Begin -->
    <section
        class="pt-[200px] pb-20 w-full px-2"
    >
        <header class="text-3xl font-bold text-center">RUNDOWN of JICEST 2025</header>
        <div class="italic font-[300] text-lg text-center">28 November 2025</div>
        <div class=" w-full flex justify-center">
            <div class="max-w-xl flex flex-col w-full justify-center items-center gap-4">
                <section class="{{$bgGradient}} py-2 px-2 rounded-lg shadow-md w-full flex justify-between items-center">
                    <div class=" font-semibold min-w-[150px]">Registration</div>
                    <div class="">
                        <div class="text-sm p-2 bg-white shadow-md w-fit rounded-md py-1">07:00 - 08:00</div>
                        <div class="text-sm ">Senate Meeting Building of Universitas Jambi</div>
                    </div>
                </section>
                <section class="{{$bgGradient}} py-2 px-2 rounded-lg shadow-md w-full flex justify-between items-center">
                    <div class=" font-semibold min-w-[150px]">Opening Ceremony</div>
                    <div class="">
                        <div class="text-sm p-2 bg-white shadow-md w-fit rounded-md py-1">08:00 - 08:30</div>
                        <div class="text-sm ">Senate Meeting Building of Universitas Jambi</div>
                    </div>
                </section>
                <section class="{{$bgGradient}} py-2 px-2 rounded-lg shadow-md w-full flex justify-between items-center">
                    <div class=" font-semibold min-w-[150px]">Planary Session</div>
                    <div class="">
                        <div class="text-sm p-2 bg-white shadow-md w-fit rounded-md py-1">08:30 - 12:00</div>
                        <div class="text-sm ">Senate Meeting Building of Universitas Jambi</div>
                    </div>
                </section>
                <section class="{{$bgGradient}} py-2 px-2 rounded-lg shadow-md w-full flex justify-between items-center">
                    <div class=" font-semibold min-w-[150px]">Break</div>
                    <div class="">
                        <div class="text-sm p-2 bg-white shadow-md w-fit rounded-md py-1">12:00 - 13:00</div>
                        <div class="text-sm ">Senate Meeting Building of Universitas Jambi</div>
                    </div>
                </section>
                <section class="{{$bgGradient}} py-2 px-2 rounded-lg shadow-md w-full flex justify-between items-center">
                    <div class=" font-semibold min-w-[150px]">Parallel Session</div>
                    <div class="">
                        <div class="text-sm p-2 bg-white shadow-md w-fit rounded-md py-1">13:00 - 16:30</div>
                        <div class="text-sm ">Senate Meeting Building of Universitas Jambi</div>
                    </div>
                </section>
                <section class="{{$bgGradient}} py-2 px-2 rounded-lg shadow-md w-full flex justify-between items-center">
                    <div class=" font-semibold min-w-[150px]">Closing Ceremony</div>
                    <div class="">
                        <div class="text-sm p-2 bg-white shadow-md w-fit rounded-md py-1">16:30 - 17:00</div>
                        <div class="text-sm ">Senate Meeting Building of Universitas Jambi</div>
                    </div>
                </section>
            </div>
        </div>

    </section>
    <!-- Contact Form Section End -->
@endsection
