@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="bg-gradient-to-r from-sky-300 to-sky-500 flex w-full min-h-screen flex-col items-center py-[100px] gap-5 px-2" style="">
        {{-- <div class="w-fit h-full">
            <div class="section-title">
                <h2 class="text-2xl font-bold">Location</h2>
                <p class="text-sm text-gray-500">Get directions to our event center</p>
            </div>
            <div class="py-3">
                <div class="text-sm text-gray-500">Address: </div>
                <div class="">Universitas Jambi, Indonesia</div>
            </div>
            <div class="py-3">
                <div class="text-sm text-gray-500">Phone:</div>
                <div>Winny (+6282182797606)</div>
                <div>Sarah (+6285213441800)</div>
            </div>

            <div class="py-3">
                <div class="text-sm text-gray-500">Email:</div>
                <div>jicest@unja.ac.id</div>
            </div>
            <div class="py-3">
                <span class="text-sm text-gray-500">Website:</span>
                <a href="https://jicest.unja.ac.id" class="text-sky-500 cursor-pointer underline">
                    <p>https://jicest.unja.ac.id</p>
                </a>
            </div>
        </div> --}}
        <div class="w-full flex flex-col items-center gap-5">
            <div class="flex flex-col md:flex-row w-full justify-center max-w-full gap-4 items-center">
                <div class="bg-white text-center shadow-md rounded-md  w-full p-5 md:max-w-[300px] max-w-[620px]">
                    <div class="text-center text-xl font- text-black">Yudi Arista Yulanda</div>
                    <a href="https://wa.me/6285266524920" class="underline text-center text-xl font-bold text-black">+62 852 6652 4920</a>
                </div>
                <div class="bg-white text-center shadow-md rounded-md  md:max-w-[300px] max-w-[620px] w-full p-5">
                    <div class="text-center text-xl font-normal text-black">Andini Vermita Bestari</div>
                    <a href="https://wa.me/6285719405940" class="underline text-center text-xl font-bold text-black">+62 857 1940 5940</a>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-md max-w-[620px] w-full p-5">
                <div class="text-center text-xl font-normal text-black">Address</div>
                <div class="text-center text-xl font-bold text-black">Universitas Jambi,</div>
                <div class="text-center text-xl font-normal text-black">Jl. Jambi - Muara Bulian No.KM. 15, Mendalo Darat, Kec. Jambi Luar Kota, Kabupaten Muaro Jambi, Jambi</div>
            </div>
            <div class="bg-white text-center shadow-md rounded-md max-w-[620px] w-full p-5">
                <div class="text-center text-xl font- text-black">Email</div>
                <a href="#" class="underline text-center text-xl font-bold text-black">jicest@unja.ac.id</a>
            </div>
        </div>
        <div class="w-full max-w-[620px] rounded-md shadow-xl overflow-hidden">
            <div class="cs-map h-full">
                <iframe class="w-full h-[500px]"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.6927320260347!2d103.52009062425653!3d-1.6153859902453034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2f63af4c66b3ab%3A0xcfc5de0b9dfcc65e!2sFakultas%20Sains%20Dan%20Teknologi%20Gedung%20B!5e0!3m2!1sid!2sid!4v1694851413099!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
@endsection
