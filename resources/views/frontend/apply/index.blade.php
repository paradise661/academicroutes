@extends('layouts.frontend.master')
@section('content')
    <div class="fixed top-40 right-0 p-4 z-50 hidden" id="popup"
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
                        Apply Now
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
                    Apply Now
                </li>
            </ol>
        </div>
    </div>

    <section class="registration-form pb-12">
        <div class="flex justify-center">
            <h2 class="text-2xl font-semibold text-primary pb-6 font-cabin tracking-wider">
                APPLY HERE
            </h2>
        </div>
        <form id="contact-form" enctype="multipart/form-data" method="post" action="{{ route('registration.store') }}">
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
                            id="number" name="number" type="text" placeholder="98XXXXXXXX" maxlength="10"
                            value="{{ old('number') }}" oninput="validatePhoneNumber(this)" onblur="validatePhoneOnBlur(this)" />

                        <div id="phone-error" style="color: red; font-size: 0.875rem; margin-top: 0.25rem; display: none;">
                            Phone number must be exactly 10 digits only
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
                        <label class="block text-lg font-medium mb-2" for="address">Address *</label>
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
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="country" type="text" name="country" placeholder="Your Current Address" />
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="university">Interested University</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="university" type="text" name="university" placeholder="Your Current Address" />
                    </div>

                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="course">Interested Course</label>
                        <input
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="course" type="text" name="course" placeholder="Your Interested Course" />
                    </div>
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
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                        </select>
                        <!-- End Select -->
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
                }'>
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
                            id="academic" name="academic_score" placeholder="Your Academic Score" />
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
                        <select class="hidden" id="pyear"
                            data-hs-select='{
                    "placeholder": "Select year...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                    "dropdownVerticalFixedPlacement": "bottom",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }'>
                            <option value="">Choose</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                        </select>
                        <!-- End Select -->
                    </div>

                    <div class="col-span-2">
                        <h6 class="text-lg uppercase font-semibold text-primary">
                            choose files
                        </h6>
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="master-deg">Master Degree Certificate</label>

                        <label class="sr-only" for="master-deg">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="master-deg" type="file" name="master_certificate" accept=".pdf,.jpg,.jpeg,.png" />
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="bachelor-deg">Bachelor Degree
                            Certificate</label>
                        <label class="sr-only" for="bachelor-deg">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="bachelor-deg" type="file" name="bachelor_certificate"
                            accept=".pdf,.jpg,.jpeg,.png" />

                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="diploma">Diploma</label>

                        <label class="sr-only" for="diploma">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="diploma" type="file" name="diploma" accept=".pdf,.jpg,.jpeg,.png" />

                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="grade-twelve">Grade 12 Certificate</label>

                        <label class="sr-only" for="grade-twelve">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="grade-twelve" type="file" name="grade_twelve" accept=".pdf,.jpg,.jpeg,.png" />
                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="cv">CV </label>
                        <label class="sr-only" for="cv">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="cv" type="file" name="cv" accept=".pdf,.jpg,.jpeg,.png" />

                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="passport">Passport
                        </label>

                        <label class="sr-only" for="passport">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="passport" type="file" name="passport" accept=".pdf,.jpg,.jpeg,.png" />

                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="ielts">IELTS
                        </label>

                        <label class="sr-only" for="ielts">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="ielts" type="file" name="ielts" accept=".pdf,.jpg,.jpeg,.png" />

                    </div>
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="others">Others
                        </label>

                        <label class="sr-only" for="others">Choose file</label>
                        <input
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            id="others" type="file" name="other" accept=".pdf,.jpg,.jpeg,.png" />

                    </div>
                    <div class="col-span-2 mt-4">
                        <div class="w-full">
                            <div class="flex items-center">
                                <input
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    id="terms-conditions" type="checkbox" />
                                <label class="text-base text-gray-800 ms-3" for="terms-conditions">I agree to receive
                                    other
                                    communication from AR
                                    Education</label>
                            </div>
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
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                </div>
            </div>
        </form>
        <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    function validatePhoneNumber(input) {
        input.value = input.value.replace(/[^0-9]/g, '').slice(0, 10);
    }

    function validatePhoneOnBlur(input) {
        const errorDiv = document.getElementById('phone-error');
        if (input.value.length > 0 && input.value.length !== 10) {
            input.classList.add('border-red-500');
            input.classList.remove('border-gray-200');
            errorDiv.style.display = 'block';
        } else {
            input.classList.remove('border-red-500');
            input.classList.add('border-gray-200');
            errorDiv.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-form');

        form.addEventListener('submit', function(e) {
            const phoneInput = document.getElementById('number');
            const errorDiv = document.getElementById('phone-error');
            
            if (phoneInput.value.length !== 10) {
                e.preventDefault();
                phoneInput.classList.add('border-red-500');
                phoneInput.classList.remove('border-gray-200');
                errorDiv.style.display = 'block';
                phoneInput.focus();
                return false;
            }

            e.preventDefault();

            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', { action: 'registration_form' })
                .then(function(token) {
                    document.getElementById('recaptcha_token').value = token;
                    form.submit();
                });
            });
        });
    });
</script>

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
