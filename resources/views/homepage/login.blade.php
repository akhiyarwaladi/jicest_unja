@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full min-h-screen py-[100px] px-2 bg-gradient-to-b from-orange-400 to-purple-400 flex justify-center items-center">
        <div class="container p-10 bg-gray-50  max-w-[500px] w-full h-fit rounded-md shadow-md">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class=" text-3xl font-bold">Login</h2>
                        <p class="font-[300]">Use email and password to login.</p>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <livewire:login-form />
                            <div class="row mt-3">
                                <a href="/forgot-password" class="text-primary text-orange-700">Forgot password ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Contact Form Section End -->
@endsection
