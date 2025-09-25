@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full min-h-screen py-[100px] px-2 bg-gradient-to-br from-emerald-500 via-sky-400 to-emerald-600 flex justify-center items-center">
        <div class="container p-10 bg-white/95 backdrop-blur-sm shadow-2xl shadow-emerald-900/20 border border-white/20  max-w-[500px] w-full h-fit rounded-md">
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
