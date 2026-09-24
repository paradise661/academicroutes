@extends('layouts.frontend.master')
@section('content')
    <!-- Page Banner  -->
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        Our Representatives
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
                    Our Representatives
                </li>
            </ol>
        </div>
    </div>

    <section class="representatives pb-16 overflow-x-hidden relative">
        <div class="container mx-auto">
            <div class="representatives-content flex flex-col gap-4 z-10 relative">
                <h2 class="uppercase text-center text-base font-semibold text-black">
                    {!! $setting['uni_title'] ?? '' !!}
                </h2>
                <h4 class="text-3xl md:text-4xl text-center font-semibold text-black leading-[32px] md:leading-[48px]">
                    {!! $setting['rep_description'] ?? '' !!}
                </h4>
            </div>
        </div>
        <div>
            <div class="max-h-[800px] overflow-y-auto" id="scrollspy-scrollable-parent-1">
                <div class="container mx-auto">

                    <header class="sticky top-0 left-0 right-0 z-40 w-full bg-white text-sm py-4 shadow-lg">
                        <nav class="w-full">
                            <div class=" overflow-hidden transition-all duration-300 basis-full grow"
                                id="hs-scrollspy-basic-collapse-heading" aria-labelledby="hs-scrollspy-basic-collapse">
                                <div class="flex gap-4 [--scrollspy-offset:220] md:[--scrollspy-offset:70]"
                                    id="country-links" data-hs-scrollspy="#scrollspy-1"
                                    data-hs-scrollspy-scrollable-parent="#scrollspy-scrollable-parent-1">
                                    @php
                                        $filteredCountries = $countries->filter(
                                            fn($country) => $country->universities->isNotEmpty(),
                                        );
                                    @endphp
                                    @foreach ($filteredCountries as $index => $country)
                                        <a class="text-base px-4 py-2 rounded-md text-gray-700 leading-6 hover:text-gray-500 focus:outline-none focus:text-blue-600 hs-scrollspy-active:text-white hs-scrollspy-active:bg-primary {{ $index === 0 ? 'active' : '' }}"
                                            data-country="{{ $country->order }}" href="#{{ $country->order }}">
                                            {{ $country->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </nav>
                    </header>

                    <div class="mt-3 space-y-4" id="scrollspy-1">
                        @foreach ($filteredCountries as $country)
                            <div id="{{ $country->order }}">
                                <h3 class="text-3xl text-primary font-semibold text-center py-2">
                                    {{ $country->name }}
                                </h3>
                                <div class="repre">
                                    <div class="grid grid-cols-6 gap-8 mt-8">
                                        @foreach ($country->universities as $university)
                                            <div
                                                class="aspect-4/3 img-wrapper border border-primary-lighter rounded-lg p-2 flex items-center justify-center">
                                                <img class="w-full h-full" src="{{ asset($university->image) }}"
                                                    alt="{{ $university->name }}" style="object-fit: contain !important;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll("#country-links a");

            // Set the first link as active by default
            if (links.length > 0) {
                links[0].classList.add("active");
            }

            links.forEach(link => {
                link.addEventListener("click", function() {
                    // Remove "active" class from all links
                    links.forEach(l => l.classList.remove("active"));

                    // Add "active" class to the clicked link
                    this.classList.add("active");
                });
            });
        });
    </script>
@endsection
