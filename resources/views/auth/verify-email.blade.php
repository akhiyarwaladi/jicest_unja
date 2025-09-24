@extends('layouts.main-tailwind')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad w-full min-h-screen py-[100px] px-2 bg-white flex justify-center items-center">
        <div class="container p-10 max-w-[700px] w-full h-fit">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="text-3xl font-bold mb-8">Verification Email</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-3 text-center">
                                <p>Thanks for signing up! Before getting started, could you verify your email address by
                                    clicking on the link we just emailed to you? If you didn't receive the email, we will
                                    gladly send you another.</p>
                            </div>
                            <div class="row mx-3">
                                @if (session('status') == 'verification-link-sent')
                                    <div class="mb-4">
                                        <p class="text-primary">A new verification link has been sent to the email address
                                            you provided during
                                            registration.</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row mx-3 mt-5 flex flex-col w-full items-center justify-center gap-2">
                                <form method="POST" action="{{ route('verification.send') }}" class="max-w-[300px] w-full">
                                    @csrf
                                    <button type="submit" class="btn btn-warning w-full bg-gradient-to-r from-orange-400 to-pink-400 border-none text-white font-semibold p-2 outline-none outline-offset-0 focus:border-sky-500 focus:outline-4 focus:outline-sky-300 rounded-md transition-all hover:contrast-75">Resend Verification Email</button>
                                </form>
                                <form method="POST" action="{{ route('logout') }}" class="max-w-[300px] w-full">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-full bg-gradient-to-r from-red-500 to-red-400 border-none text-white font-semibold p-2 outline-none outline-offset-0 focus:border-sky-500 focus:outline-4 focus:outline-sky-300 rounded-md transition-all hover:contrast-75">Logout</button>
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
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>

    </div>
</x-guest-layout> --}}
