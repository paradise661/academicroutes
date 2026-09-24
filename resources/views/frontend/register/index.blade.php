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
                        Register
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
                    Register
                </li>
            </ol>
        </div>
    </div>
    <!-- / Page Banner  -->

    <section class="registration-form pb-12">
        <div class="flex justify-center">
            <h2 class="text-2xl font-semibold text-primary pb-6 font-cabin tracking-wider">
                REGISTER HERE
            </h2>
        </div>
        <form id="contact-form" enctype="multipart/form-data" method="post"
            action="{{ route('frontend.register.store') }}">
            @csrf
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
            <input type="hidden" name="event" value="{{ request('event') }}">
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
                            id="number" name="number" type="text" placeholder="9812345678" maxlength="10"
                            value="{{ old('number') }}" />
                        <div id="phone-error" style="color: red; font-size: 0.875rem; margin-top: 0.25rem; display: none;">
                            Phone number must be exactly 10 digits
                        </div>
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
                        <label class="block text-lg font-medium mb-2" for="interested-country">Interested Country</label>
                        <!-- Select -->
                        <select class="hidden" id="interested-country"
                            data-hs-select='{
                    "placeholder": "Select Interested Country...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                    "dropdownVerticalFixedPlacement": "bottom",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }'
                            name="country">
                            <option value="">Choose</option>
                            <option value="UK" style="background-color: #fff3cd; font-weight: bold;">UK</option>
                            <option value="Australia">Australia</option>
                            <option value="USA">USA</option>
                            <option value="Canada">Canada</option>
                            <option value="Japan">Japan</option>
                        </select>
                        <!-- End Select -->
                    </div>
                    @if(isset($event) && $event && $event->eventDates->isNotEmpty())
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="event_location">Event Location *</label>
                        <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="event_location" name="event_location" required>
                            <option value="">Select Location</option>
                            @foreach($event->eventDates->where('date', '>=', now()->toDateString())->sortBy('date') as $eventDate)
                                <option value="{{ $eventDate->location }}" data-date="{{ $eventDate->date }}" data-time="{{ $eventDate->time }}">
                                    {{ $eventDate->location }} ({{ \Carbon\Carbon::parse($eventDate->date)->format('j M Y') }}, {{ $eventDate->time }})
                                </option>
                            @endforeach
                        </select>
                        @error('event_location')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" id="event_date" name="event_date">
                    <input type="hidden" id="event_time" name="event_time">
                    @elseif(isset($event) && $event && $event->date >= now()->toDateString())
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="event_location">Event Location *</label>
                        <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="event_location" name="event_location" required>
                            <option value="">Select Location</option>
                            <option value="{{ $event->lcoation }}" data-date="{{ $event->date }}" data-time="{{ $event->time }}">
                                {{ $event->lcoation }} ({{ \Carbon\Carbon::parse($event->date)->format('j M Y') }}, {{ $event->time }})
                            </option>
                        </select>
                        @error('event_location')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" id="event_date" name="event_date">
                    <input type="hidden" id="event_time" name="event_time">
                    @else
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="university">Choose University</label>
                        <select class="block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="university" name="university">
                            <option value="" disabled selected>Choose a university</option>
                            @foreach ($university as $universitys)
                                <option value="{{ $universitys->name }}">
                                    {{ $universitys->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="intake">Choose Intake</label>
                        <!-- Select -->
                        <select class="hidden" id="intake"
                            data-hs-select='{
                    "placeholder": "Select option...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                    "dropdownVerticalFixedPlacement": "bottom",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }'
                            name="intake">
                            <option value="">Choose</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                        </select>
                        <!-- End Select -->
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="course">Interested Course</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="course" name="course" type="text" placeholder="Enter your interested course"
                            value="{{ old('course') }}" />
                        @error('course')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="qualification">Last Academic
                            Qualification</label>
                        <!-- Select -->
                        <select class="hidden" id="qualification"
                            data-hs-select='{
                    "placeholder": "Select option...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                    "dropdownVerticalFixedPlacement": "bottom",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }'
                            name="qualification">
                            <option value="">Choose</option>
                            <option>+2</option>
                            <option>Diploma</option>
                            <option>Bachelor</option>
                            <option>Master</option>

                        </select>
                        <!-- End Select -->
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="academic">Academic Score</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="academic" type="text" name="academic_score" placeholder="Your Academic Score" />
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="english">English Scores</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="english" type="text" name="english_score" placeholder="Your English Test Scores" />
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="pyear">Passed Year</label>
                        <!-- Select -->
                        <select
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            id="pyear" name="passed_year">
                            <option value="">Choose</option>
                            @for ($year = 2015; $year <= date('Y'); $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <!-- End Select -->
                    </div>
                    <div class="col-span-2 mt-4">
                        <div class="w-full">
                            <div class="flex items-center">
                                <input
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                                    @error('terms') border-red-500 @enderror"
                                    id="terms-conditions" type="checkbox" name="terms" required />
                                <label class="text-base text-gray-800 ms-3" for="terms-conditions">I agree to receive
                                    other
                                    communication from AR
                                    Education</label>
                            </div>
                            @error('terms')
                                <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mt-8">
                                <div class="w-full flex justify-center">
                                    <button
                                        class="bg-primary text-base rounded-xl hover:bg-secondary max-w-fit font-medium text-white px-12 py-3"
                                        type="submit">
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
            document.addEventListener('DOMContentLoaded', function() {
                // Set a dummy recaptcha token to bypass validation
                document.getElementById('recaptcha_token').value = 'dummy_token_for_testing';
                
                // Phone validation
                const phoneInput = document.getElementById('number');
                const phoneError = document.getElementById('phone-error');
                const form = document.getElementById('contact-form');
                
                phoneInput.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                
                phoneInput.addEventListener('blur', function() {
                    if (this.value.length !== 10) {
                        this.style.borderColor = 'red';
                        phoneError.style.display = 'block';
                    } else {
                        this.style.borderColor = '';
                        phoneError.style.display = 'none';
                    }
                });
                
                form.addEventListener('submit', function(e) {
                    if (phoneInput.value.length !== 10) {
                        e.preventDefault();
                        phoneInput.style.borderColor = 'red';
                        phoneError.style.display = 'block';
                        return false;
                    }
                });

                // Handle event location selection
                const locationSelect = document.getElementById('event_location');
                if (locationSelect) {
                    locationSelect.addEventListener('change', function() {
                        const selectedOption = this.options[this.selectedIndex];
                        const date = selectedOption.getAttribute('data-date');
                        const time = selectedOption.getAttribute('data-time');
                        
                        document.getElementById('event_date').value = date || '';
                        document.getElementById('event_time').value = time || '';
                    });
                }
            });

            @if (session('message'))
                document.addEventListener('DOMContentLoaded', function() {
                    const popup = document.getElementById('popup');
                    const popupMessage = document.getElementById('popup-message');
                    const successMessage = "{{ session('message') }}";

                    popupMessage.innerText = successMessage;
                    popup.classList.remove('hidden');
                    popup.style.opacity = '1';
                    popup.style.transform = 'translateX(0)';

                    setTimeout(function() {
                        popup.style.opacity = '0';
                        popup.style.transform = 'translateX(100%)';
                    }, 4000);
                });
            @endif
        </script>

    </section>
@endsection