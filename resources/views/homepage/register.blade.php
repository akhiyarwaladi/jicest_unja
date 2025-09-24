@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full h-full py-[100px] px-2 bg-gradient-to-b from-orange-400 to-purple-400 flex justify-center">
        <div class="container p-10 bg-gray-50  max-w-[700px] w-full rounded-md shadow-md">
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
