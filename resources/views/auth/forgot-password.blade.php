@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full min-h-screen py-[100px] px-2 bg-gradient-to-b from-orange-400 to-pink-400 flex justify-center items-center">
        <div class="container p-10 bg-gray-50  max-w-[700px] w-full h-fit rounded-md shadow-md">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="text-3xl font-bold">Forgot Password</h2>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-3">
                                @if (session('status'))
                                    <div class="mb-4">
                                        <p class="text-primary">Reset password link has been sent to the email address.</p>
                                    </div>
                                @endif
                                <p>Forgot your password? No problem. Just let us know your email address and we will email
                                    you a password reset link that will allow you to choose a new one.</p>
                            </div>

                            <div class="row mx-3">
                                <form method="POST" action="{{ route('password.email') }}" style="width:100%">
                                    @csrf
                                    <div class="form-group flex flex-col gap-1">
                                        <label for="email" class="font-[300] text-base">Email address</label>
                                        <input type="email" class="form-control p-2 outline-none outline-offset-0  border-2 focus:border-sky-500 focus:outline-[3px]  focus:outline-sky-300 rounded-md transition-all @error('email') is-invalid focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                                            id="email" aria-describedby="emailHelp" placeholder="Enter email"
                                            name="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit" class="btn btn-primary bg-gradient-to-r from-orange-400 to-pink-400 border-none text-white font-semibold p-2 outline-none outline-offset-0 focus:border-sky-500 focus:outline-4 focus:outline-sky-300 rounded-md transition-all w-full shadow border border-orange-600 hover:contrast-[80%]">Email Password Reset Link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->
@endsection

{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
