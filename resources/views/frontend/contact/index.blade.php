@extends('layouts.frontend.master')
<title> {{ $setting['contact_title'] ?? '' }}</title>
@section('content')
    <div class="fixed top-0 right-0 p-4 z-50 hidden" id="popup"
        style="opacity: 0; transform: translateX(100%); transition: opacity 0.5s ease, transform 0.5s ease;">
        <div id="popup-message"
            style="background-color: #38a169; padding: 1rem; border-radius: 8px; color: white; max-width: 300px; width: 100%;">
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
                        Contact Us
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
                    Contact Us
                </li>
            </ol>
        </div>
    </div>
    <!-- / Page Banner  -->

    <!-- Branches Section  -->
    @if ($branch->isNotEmpty())
        <section class="home-branches py-16 bg-[#eff6f9]">
            <div class="container mx-auto px-4 md:px-0">
                <h2 class="uppercase text-center text-base font-semibold text-black">
                    Our Branches
                </h2>
                <h4 class="text-3xl md:text-4xl text-center font-semibold text-black leading-[32px] md:leading-[48px]">
                    Stop by our nearest branch to get started!
                </h4>
                <div class="max-h-[800px] overflow-y-auto" id="scrollspy-scrollable-parent-1 md:my-20 ">
                    <div class="container mx-auto">
                        <header class="sticky top-0 left-0 right-0 z-40 w-full bg-white text-sm py-2 shadow-lg mt-12">
                            <nav class="w-full">
                                <div class="overflow-hidden transition-all duration-300 basis-full grow"
                                    id="hs-scrollspy-basic-collapse-heading" aria-labelledby="hs-scrollspy-basic-collapse">
                                    <div class="flex gap-4 [--scrollspy-offset:220] md:[--scrollspy-offset:70]"
                                        id="country-links" data-hs-scrollspy="#scrollspy-1"
                                        data-hs-scrollspy-scrollable-parent="#scrollspy-scrollable-parent-1">
                                        <div class="flex gap-4 w-full justify-center">
                                            @foreach ($branchtabs as $index => $brt)
                                                <a class="tab-btn {{ $index === 0 ? 'active' : '' }} px-4 py-2 rounded-lg hover:bg-gray-200 transition-all"
                                                    data-tab-id="{{ $brt->id }}" data-link="{{ $brt->link ?? '' }}"
                                                    href="javascript:void(0);">
                                                    {{ $brt->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </header>

                        <div class="mt-3 space-y-4" id="scrollspy-1">
                            <div class="branches-card-container grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-4 gap-8">
                                @foreach ($branch as $branch)
                                    @php
                                        $branchTabs = $branch->tabs ? implode(',', $branch->tabs) : '';
                                        $firstTabId = $branchtabs->first()->id ?? null;
                                    @endphp
                                    <div class="card-branches bg-white shadow-md rounded-2xl p-6 transition-transform transform hover:scale-105"
                                        data-tabs="{{ $branchTabs }}"
                                        style="display: {{ in_array($firstTabId, explode(',', $branchTabs)) ? 'block' : 'none' }};">

                                        <h4 class="text-2xl font-semibold text-gray-800 mb-2">{{ $branch->title ?? '' }}
                                        </h4>
                                        <p
                                            class="pb-4 text-lg  text-gray-600 uppercase tracking-wide border-b border-gray-300">
                                            {{ $branch->branch_name ?? '' }}
                                        </p>

                                        <div class="mt-3 space-y-2 text-gray-700">
                                            <p class="text-base font-medium flex items-center gap-2">
                                                📍 {{ $branch->location ?? '' }}
                                            </p>
                                            <p class="text-base font-medium flex items-center gap-2">
                                                <a href="mailto:{{ $branch->email ?? '' }}" target="blank">
                                                    ✉️ {{ $branch->email ?? '' }}
                                                </a>
                                            </p>
                                            <p class="text-base font-medium flex items-center gap-2">
                                                <a href="tel:{{ $branch->phone ?? '' }}" target="blank">
                                                    📞 {{ $branch->phone ?? '' }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif
    <section class="contact-form py-18 bg-[#eff6f9]">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-semibold text-center text-black mb-3 pb-5">
                {{ $setting['contact_title'] ?? '' }}
            </h2>
            {{-- Wrapper to center the form with 25% space on left and right --}}
            <div class="w-full md:w-1/2 mx-auto">
                <form id="contact-form" enctype="multipart/form-data" method="post" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <input
                                    class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                                    type="text" name="first_name" placeholder="First Name" required />
                            </div>
                            <div class="space-y-3">
                                <input
                                    class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                                    type="text" name="last_name" placeholder="Last Name" required />
                            </div>
                            <div class="space-y-3">
                                <input
                                    class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                                    type="number" name="number" placeholder="Phone Number" required />
                            </div>
                            <div class="space-y-3">
                                <input
                                    class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 text-base focus:ring-0 disabled:opacity-50 disabled:pointer-events-none"
                                    type="email" name="email" placeholder="Email Address" required />
                            </div>
                            <div class="w-full space-y-3 col-span-2">
                                <textarea
                                    class="py-3 px-4 block w-full font-medium border-gray-200 rounded-xl bg-white border-0 focus:ring-0 text-base disabled:opacity-50 disabled:pointer-events-none"
                                    name="message" rows="3" placeholder="Write Your Message..." required></textarea>
                            </div>
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            <div class="w-full col-span-2 flex justify-center">
                                <button class="px-4 py-3 bg-secondary rounded-xl text-white font-medium text-base">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('contact-form');
            
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
            
                        grecaptcha.ready(function() {
                            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'contact_form'})
                            .then(function(token) {
                                document.getElementById('recaptcha_token').value = token;
                                form.submit();
                            });
                        });
                    });
                });
            </script>
            
            {{-- Popup script --}}
            <script>
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
        </div>
    </section>
    <div class="md:my-16">
        @php
            $firstBranchtab = $branchtabs->first();
            $iframeSrc =
                $firstBranchtab && !empty($firstBranchtab->link)
                    ? $firstBranchtab->link
                    : $setting['site_location_url'] ?? '';
        @endphp
        <iframe id="branch-iframe" src="{{ $iframeSrc }}" width="100%" height="380px" style="border: 0"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabButtons = document.querySelectorAll(".tab-btn");
            const branchCards = document.querySelectorAll(".card-branches");
            const iframe = document.getElementById("branch-iframe");

            let activeTab = document.querySelector(".tab-btn.active");
            let activeTabId = activeTab ? activeTab.getAttribute("data-tab-id") : null;

            function filterBranches(selectedTabId) {
                branchCards.forEach(card => {
                    let tabs = card.getAttribute("data-tabs").split(',');
                    card.style.display = tabs.includes(selectedTabId) ? "block" : "none";
                });
            }

            if (activeTabId) {
                filterBranches(activeTabId);
            }

            tabButtons.forEach(button => {
                button.addEventListener("click", function() {
                    let selectedTabId = this.getAttribute("data-tab-id");
                    let link = this.getAttribute("data-link");

                    // Remove 'active' class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");

                    // Filter branches for selected tab
                    filterBranches(selectedTabId);

                    // Update iframe source if link is available
                    if (link && iframe) {
                        iframe.src = link;
                    } else if (iframe) {
                        iframe.src = "{{ $setting['site_location_url'] ?? '' }}";
                    }
                });
            });
        });
    </script>
@endsection
