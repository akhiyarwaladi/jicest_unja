@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full h-full py-[100px] px-2 bg-gradient-to-br from-emerald-500 via-sky-400 to-emerald-600 flex justify-center">
        <div class="container p-10 bg-white/95 backdrop-blur-sm shadow-2xl shadow-emerald-900/20 border border-white/20  max-w-[700px] w-full rounded-md">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class=" text-2xl font-bold">Registration</h2>
                        <p class="font-[300]">Fill in the form below to register.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <livewire:register-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->
@endsection
