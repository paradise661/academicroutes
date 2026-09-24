@extends('layouts.frontend.master')
@section('content')
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        Class Registration
                    </h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrapper z-10">
            <ol class="flex items-center whitespace-nowrap breadcrumbs bg-white">
                <li class="inline-flex items-center">
                    <a class="flex items-center text-base text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="/">
                        Home
                    </a>
                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    Class Registration
                </li>
            </ol>
        </div>
    </div>

    <section class="registration-form pb-12">
        <div class="flex justify-center">
            <h2 class="text-2xl font-semibold text-primary pb-6 font-cabin tracking-wider">
                CLASS REGISTRATION FORM
            </h2>
        </div>
        <form id="ielts-form" method="post">
            @csrf
            <div class="container mx-auto px-4 md:px-0">
                <!-- PERSONAL DETAILS -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">PERSONAL DETAILS</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label class="block text-lg font-medium mb-2" for="name">Full Name *</label>
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="name" name="name" type="text" placeholder="Your Full Name" required />
                        </div>
                        <div class="w-full">
                            <label class="block text-lg font-medium mb-2" for="location">Location *</label>
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="location" name="location" type="text" placeholder="Your Location" required />
                        </div>
                        <div class="w-full">
                            <label class="block text-lg font-medium mb-2" for="number">Contact Number *</label>
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="number" name="number" type="text" placeholder="98XXXXXXXX" maxlength="10" oninput="validatePhoneNumber(this)" onblur="validatePhoneOnBlur(this)" required />
                            <div id="phone-error" style="color: red; font-size: 0.875rem; margin-top: 0.25rem; display: none;">
                                Phone number must be exactly 10 digits only
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="block text-lg font-medium mb-2" for="email">Email Address *</label>
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="email" name="email" type="email" placeholder="example@example.com" required />
                        </div>
                    </div>
                </div>

                <!-- PROGRAM ENROLLMENT -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">PROGRAM ENROLLMENT</h3>
                    <p class="mb-4 font-medium">Please select the test you are enrolling for:</p>
                    <div class="space-y-2 mb-4">
                        <label class="flex items-center">
                            <input type="radio" name="program_enrollment" value="IELTS" class="mr-2" required>
                            <span>IELTS</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="program_enrollment" value="PTE" class="mr-2">
                            <span>PTE</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="program_enrollment" value="ELLT" class="mr-2">
                            <span>ELLT</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="program_enrollment" value="Others" class="mr-2" id="program_others">
                            <span>Others (please specify):</span>
                        </label>
                    </div>
                    <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="program_other" name="program_other" type="text" placeholder="Please specify" style="display:none;" />
                </div>

                <!-- CLASS TYPE -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">CLASS TYPE</h3>
                    <p class="mb-4 font-medium">Please select your preferred mode of class:</p>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="class_type" value="Online" class="mr-2" required>
                            <span>Online</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="class_type" value="Physical" class="mr-2">
                            <span>Physical</span>
                        </label>
                    </div>
                </div>

                <!-- DEPOSIT INFORMATION -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">DEPOSIT INFORMATION</h3>
                    <p class="mb-4 font-medium">Have you made any deposit?</p>
                    <div class="space-y-2 mb-4">
                        <label class="flex items-center">
                            <input type="radio" name="deposit_made" value="1" class="mr-2" id="deposit_yes" required>
                            <span>Yes</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="deposit_made" value="0" class="mr-2" id="deposit_no">
                            <span>No</span>
                        </label>
                    </div>
                    <div id="deposit_amount_field" style="display:none;">
                        <label class="block text-lg font-medium mb-2" for="deposit_amount">Deposit Amount</label>
                        <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="deposit_amount" name="deposit_amount" type="number" step="0.01" placeholder="Amount" />
                    </div>
                </div>

                <!-- CLASS SCHEDULE -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">CLASS SCHEDULE</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label class="block text-lg font-medium mb-2" for="preferred_joining_date">Preferred Class Joining Date *</label>
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="preferred_joining_date" name="preferred_joining_date" type="date" required />
                        </div>
                        <div class="w-full">
                            <label class="block text-lg font-medium mb-2" for="preferred_timing">Preferred Class Timing *</label>
                            <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="preferred_timing" name="preferred_timing" required>
                                <option value="">Select timing</option>
                                <option value="8am - 9am">8am - 9am</option>
                                <option value="9am - 10am">9am - 10am</option>
                                <option value="10am - 11am">10am - 11am</option>
                                <option value="11am - 12pm">11am - 12pm</option>
                                <option value="12pm - 1pm">12pm - 1pm</option>
                                <option value="1pm - 2pm">1pm - 2pm</option>
                                <option value="2pm - 3pm">2pm - 3pm</option>
                                <option value="3pm - 4pm">3pm - 4pm</option>
                                <option value="4pm - 5pm">4pm - 5pm</option>
                                <option value="Others">Others</option>
                            </select>
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 mt-2" id="timing_other" name="timing_other" type="text" placeholder="Please specify timing" style="display:none;" />
                        </div>
                    </div>
                </div>

                <!-- UNIVERSITY APPLICATION STATUS -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">UNIVERSITY APPLICATION STATUS</h3>
                    <p class="mb-4 font-medium">Have you applied to any university?</p>
                    <div class="space-y-2 mb-4">
                        <label class="flex items-center">
                            <input type="radio" name="university_applied" value="1" class="mr-2" id="uni_yes" required>
                            <span>Yes</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="university_applied" value="0" class="mr-2" id="uni_no">
                            <span>No</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="university_applied" value="other" class="mr-2" id="uni_other">
                            <span>Others (please specify)</span>
                        </label>
                    </div>
                    <div id="university_name_field" style="display:none;">
                        <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 mb-2" id="university_name" name="university_name" type="text" placeholder="University Name" />
                    </div>
                    <div id="university_other_field" style="display:none;">
                        <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="university_other" name="university_other" type="text" placeholder="Please specify" />
                    </div>
                </div>

                <!-- COUNTRY OF INTEREST -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">COUNTRY OF INTEREST</h3>
                    <label class="block text-lg font-medium mb-2" for="country_interest">Which country are you willing to apply to? *</label>
                    <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="country_interest" name="country_interest" type="text" placeholder="Country name" required />
                </div>

                <!-- CONSULTANCY INFORMATION -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">CONSULTANCY INFORMATION</h3>
                    <label class="block text-lg font-medium mb-2" for="consultancy">From which consultancy are you applying? *</label>
                    <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="consultancy" name="consultancy" type="text" placeholder="Consultancy name" required />
                </div>

                <!-- REFERENCE -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-primary mb-4">REFERENCE</h3>
                    <label class="block text-lg font-medium mb-2" for="reference">Where did you hear about us? *</label>
                    <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="reference" name="reference" type="text" placeholder="e.g., Facebook, Friend, Google, etc." required />
                </div>

                <div class="mt-8">
                    <div class="w-full flex justify-center">
                        <button class="bg-primary text-base rounded-xl hover:bg-secondary max-w-fit font-medium text-white px-12 py-3" type="submit">
                            Submit Registration
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            // Show/hide program other field
            $('input[name="program_enrollment"]').change(function() {
                if ($(this).val() === 'Others') {
                    $('#program_other').show().prop('required', true);
                } else {
                    $('#program_other').hide().prop('required', false);
                }
            });
            
            // Show/hide timing other field
            $('#preferred_timing').change(function() {
                if ($(this).val() === 'Others') {
                    $('#timing_other').show().prop('required', true);
                } else {
                    $('#timing_other').hide().prop('required', false);
                }
            });
            
            // Show/hide deposit amount field
            $('input[name="deposit_made"]').change(function() {
                if ($(this).val() === '1') {
                    $('#deposit_amount_field').show();
                    $('#deposit_amount').prop('required', true);
                } else {
                    $('#deposit_amount_field').hide();
                    $('#deposit_amount').prop('required', false);
                }
            });
            
            // Show/hide university fields
            $('input[name="university_applied"]').change(function() {
                $('#university_name_field, #university_other_field').hide();
                $('#university_name, #university_other').prop('required', false);
                
                if ($(this).val() === '1') {
                    $('#university_name_field').show();
                    $('#university_name').prop('required', true);
                } else if ($(this).val() === 'other') {
                    $('#university_other_field').show();
                    $('#university_other').prop('required', true);
                }
            });
            
            $('#ielts-form').on('submit', function(e) {
                e.preventDefault();
                
                // Validate phone number
                const phoneInput = document.getElementById('number');
                const errorDiv = document.getElementById('phone-error');
                
                if (phoneInput.value.length !== 10) {
                    phoneInput.classList.add('border-red-500');
                    phoneInput.classList.remove('border-gray-200');
                    errorDiv.style.display = 'block';
                    phoneInput.focus();
                    return false;
                }
                
                $.ajax({
                    url: '{{ route("ielts-register.store") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Form submitted successfully!');
                            $('#ielts-form')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                toastr.error(errors[field][0]);
                            }
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
@endsection