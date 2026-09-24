@extends('layouts.frontend.master')
@section('content')
    <div class="fixed top-10 right-0 p-4 z-50 hidden" id="popup"
        style="opacity: 0; transform: translateX(100%); transition: opacity 0.5s ease, transform 0.5s ease;">
        <div id="popup-message"
            style="background-color: #012169; padding: 1rem; border-radius: 8px; color: white; max-width: 300px; width: 100%;">
            <!-- Success message will be dynamically inserted here -->
        </div>
    </div>
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        Book Appointment
                    </h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrapper z-10">
            <ol class="flex items-center whitespace-nowrap breadcrumbs bg-white">
                <li class="inline-flex items-center">
                    <a class="flex items-center text-base text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                        href="/">
                        Home
                    </a>
                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16"
                        fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                </li>

                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    Appointment
                </li>
            </ol>
        </div>
    </div>

    <section class="registration-form pb-12">
        <div class="flex justify-center flex-col items-center">
            <h2 class="text-3xl  text-primary font-semibold pb-6 font-cabin tracking-wider">
                Book Your Appointment
            </h2>
            <h3 class="text-center text-base font-semibold text-black pb-8 tracking-wider">
                Please share your information so we can better understand you and the reason for your appointment.
            </h3>

        </div>
        <form id="contact-form" enctype="multipart/form-data" method="post" action="{{ route('appointment.apply') }}">
            @csrf
            <div class="container mx-auto px-4 md:px-0">
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="name">Full Name *</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                            @error('name') border-red-500 @enderror"
                            id="name" name="name" type="text" placeholder="Your Full Name"
                            value="{{ old('name') }}" />

                        @error('name')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="number">Contact Number *</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                            @error('number') border-red-500 @enderror"
                            id="number" name="number" type="text" placeholder="+977 98XXXXXXXX"
                            value="{{ old('number') }}" />

                        @error('number')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="email">Email *</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                            @error('email') border-red-500 @enderror"
                            id="email" name="email" type="email" placeholder="example@example.com"
                            value="{{ old('email') }}" />

                        @error('email')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="address">Address </label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                            @error('address') border-red-500 @enderror"
                            id="address" name="address" type="text" placeholder="Your Current Address"
                            value="{{ old('address') }}" />

                        @error('address')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="country">Interested Country</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                            @error('country') border-red-500 @enderror"
                            id="country" name="country" type="text" placeholder="Your Interested Country"
                            value="{{ old('country') }}" />

                        @error('country')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="address">Share any details to help propose and
                            plan our meeting. *</label>
                        <textarea
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                        @error('message') border-red-500 @enderror"
                            id="message" name="message" rows="4" placeholder="Your Message">{{ old('message') }}</textarea>

                        @error('message')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-2 mt-2">
                        <div class="w-full">
                            <div class="mt-8">
                                <div class="w-full flex justify-center">
                                    <button
                                        class="bg-primary text-base rounded-xl hover:bg-secondary max-w-fit font-medium text-white px-12 py-3"
                                        type="submit" @if ($errors->any()) disabled @endif>
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            @if (session('message'))
                document.addEventListener('DOMContentLoaded', function() {
                    const popup = document.getElementById('popup');
                    const popupMessage = document.getElementById('popup-message');
                    const successMessage = "{{ session('message') }}";

                    // Set the popup's background color and message content
                    popupMessage.innerText = successMessage;

                    // Show the popup
                    popup.classList.remove('hidden');
                    popup.style.opacity = '1';
                    popup.style.transform = 'translateX(0)';

                    // Hide the popup after 5 seconds
                    setTimeout(function() {
                        popup.style.opacity = '0';
                        popup.style.transform = 'translateX(100%)';
                    }, 4000); // 5000 ms = 5 seconds
                });
            @endif
        </script>

    </section>
@endsection
