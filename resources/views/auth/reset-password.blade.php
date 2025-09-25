@php
    $title = 'Reset Password';
@endphp
@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full min-h-screen py-[100px] px-2 bg-gradient-to-b from-sky-300 to-sky-500 flex justify-center items-center">
        <div class="container p-10 bg-gray-50  max-w-[700px] w-full h-fit rounded-md shadow-md">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="text-3xl font-bold mb-10">Reset Password</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-3">
                                <form method="POST" action="{{ route('password.store') }}" style="width:100%">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="form-group flex flex-col gap-1">
                                        <label class="font-[300] text-base" for="email">Email address</label>
                                        <input readonly type="email" class="form-control p-2 outline-none outline-offset-0  border-2 focus:border-sky-500 focus:outline-[3px]  focus:outline-sky-300 rounded-md transition-all @error('email') is-invalid focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                                        id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email', $request->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group flex flex-col gap-1">
                                        <label class="font-[300] text-base" for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control p-2 outline-none outline-offset-0  border-2 focus:border-sky-500 focus:outline-[3px]  focus:outline-sky-300 rounded-md transition-all @error('password') is-invalid focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group flex flex-col gap-1">
                                        <label for="password">Confirm Password</label>
                                        <input id="password" type="password"
                                            class="form-control p-2 outline-none outline-offset-0  border-2 focus:border-sky-500 focus:outline-[3px]  focus:outline-sky-300 rounded-md transition-all @error('password_confirmation') is-invalid focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                                            name="password_confirmation" id='password_confirmation'
                                            autocomplete="current-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit" class="btn btn-primary bg-gradient-to-r from-sky-300 to-sky-500 border-none text-white font-semibold p-2 outline-none outline-offset-0 focus:border-sky-500 focus:outline-4 focus:outline-sky-300 rounded-md transition-all w-full shadow border border-orange-600 hover:contrast-[80%]">Reset Password</button>

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
{{--
<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
