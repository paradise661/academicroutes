@extends('layouts.frontend.master')
<title> {{ $setting['mainhomepage_title'] ?? '' }}</title>
@section('content')
    <!-- Popups -->

    @foreach ($popup as $popups)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-data="{ open: false }"
            x-init="open = true" x-show="open" x-transition aria-labelledby="popupModalLabel{{ $popups->id }}" role="dialog"
            aria-modal="true" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg max-w-4xl w-full mx-4 flex flex-col">
                <div class="flex justify-end p-2">
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none" @click="open = false"
                        aria-label="Close modal">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 text-center flex-grow">
                    @if ($popups->image)
                        <img class="mx-auto max-h-[70vh] object-contain" src="{{ asset('admin/images/popup/' . $popups->image) }}"
                            alt="Popup Image" />
                    @endif
                </div>
                <div class="p-4 flex justify-center border-t">
                    <a class="px-6 py-3 text-white rounded-md transition" href="{{ $popups->link }}"
                        style="background-color: #012168;" onmouseover="this.style.backgroundColor='#010f4a';"
                        onmouseout="this.style.backgroundColor='#012168';">
                        Register Now
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Banner Section  -->
    <section class="banner relative">
        <div class="container mx-auto px-2 md:px-0">
            <div class="grid md:grid-cols-2">
                <div class="flex flex-col gap-3 justify-center">
                    <div class="banner-title relative">
                        <h2 class="text-4xl md:text-6xl font-semibold text-primary bg-white z-10 relative">
                            {!! $setting['homepage_description'] ?? '' !!}
                        </h2>
                        <img class="absolute -top-10 -left-12 md:block hidden"
                            src="{{ asset('frontend/images/dotfill.png') }}" alt="" />
                    </div>
                    <p class="text-sm md:text-base text-gray-600 font-medium">
                        {!! $setting['homepage_title'] ?? '' !!}

                    </p>
                    <div class="flex justify-between w-full">
                        <a class="bg-primary text-base inline-flex gap-2 font-medium text-white font-cabin max-w-fit px-6 py-3 rounded-md"
                            href="/appointment">
                            Free Consultation
                            <svg id="_x32_" height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #ffffff;
                                        }
                                    </style>
                                    <g>
                                        <path class="st0"
                                            d="M165.013,288.946h75.034c6.953,0,12.609,5.656,12.609,12.608v26.424c0,7.065,3.659,9.585,7.082,9.585 c2.106,0,4.451-0.936,6.78-2.702l90.964-69.014c3.416-2.589,5.297-6.087,5.297-9.844c0-3.762-1.881-7.259-5.297-9.849 l-90.964-69.014c-2.329-1.766-4.674-2.702-6.78-2.702c-3.424,0-7.082,2.519-7.082,9.584v26.425c0,6.952-5.656,12.608-12.609,12.608 h-75.034c-8.707,0-15.79,7.085-15.79,15.788v34.313C149.223,281.862,156.305,288.946,165.013,288.946z">
                                        </path>
                                        <path class="st0"
                                            d="M256,0C114.842,0,0.002,114.84,0.002,256S114.842,512,256,512c141.158,0,255.998-114.84,255.998-256 S397.158,0,256,0z M256,66.785c104.334,0,189.216,84.879,189.216,189.215S360.334,445.215,256,445.215S66.783,360.336,66.783,256 S151.667,66.785,256,66.785z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <img class="md:block hidden" src="{{ asset('frontend/images/arrows-vector.svg') }}" alt="" />
                    </div>
                </div>
                <div class="banner-img">
                    <img src="{{ $setting['homepage_image'] ? asset($setting['homepage_image']) : '' }}">
                </div>
            </div>
        </div>
    </section>
    <!-- / Banner Section  -->

    <!-- Services Section  -->
    @if ($catalog->isNotEmpty())
        <div class="bg-cover py-3 md:py-12">
            <div class="container mx-auto px-2 md:px-0">
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach ($catalog as $data)
                        <div
                            class="border border-dashed rounded-[48px] bg-white border-[#42DFFF] p-5 md:p-8 rounded-tl-none relative">
                            <div class="flex gap-5 items-center">
                                <img src="{{ $data->image }}" width="40px" height="40px" alt="{{ $data->name }}" />
                                <div>
                                    <a class="text-primary text-xl md:text-2xl font-semibold stretched-link"
                                        href="{{ $data->url }}">
                                        {!! $data->name ?? '' !!}

                                    </a>
                                    <p class="text-gray-500 text-sm font-cabin font-normal py-1">
                                        {!! $data->description ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- / Services Section  -->

    <!-- Homepage About Section  -->
    <section class="home-about relative my-5 md:my-16">
        <div class="container mx-auto px-2 md:px-0">
            <div class="grid md:grid-cols-2 gap-4 h-full">
                <!-- Image Section -->
                <div class="home-about-img order-2 md:order-1">
                    <div class="md:mr-16 overflow-hidden flex-1">
                        <div class="img-wrapper h-full w-full"> <!-- Set fixed height here -->
                            {{-- <a href="https://wa.me/{{ $setting['whatsapp'] ?? '' }}" target="_blank"
                                rel="noopener noreferrer"> --}}
                                <img class="object-contain w-full h-full"
                                    src="{{ $setting['abt_image1'] ? asset($setting['abt_image1']) : '' }}"
                                    alt="WhatsApp Image" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="order-1 md:order-2 flex flex-col h-full">
                    <div class="home-about-content flex flex-col gap-4 z-10 relative flex-1">
                        <h2 class="uppercase text-base font-semibold text-black">
                            {!! $setting['abt_name'] ?? '' !!}
                        </h2>
                        <h4 class="text-3xl md:text-3xl font-semibold text-black leading-[32px] md:leading-[40px]">
                            {!! $setting['abt_title'] ?? '' !!}
                        </h4>
                        <p class="text-lg font-normal font-cabin line-clamp-5">
                            {!! $setting['abt_description'] ?? '' !!}
                        </p>
                        <div class="aspect-16/9 img-wrapper mt-4 z-10 relative">
                            <img class="w-full object-cover"
                                src="{{ $setting['abt_image2'] ? asset($setting['abt_image2']) : '' }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Homepage About Section  -->

    <!-- Achievement Section  -->
    <div class="py-16 mb-5 md:mb-20 achievements">
        <div class="container mx-auto px-2 md:px-0">
            <div class="home-procedure-content flex flex-col gap-4 z-10 relative">
                <h2 class="uppercase text-start text-base font-semibold text-white bg-[#ffffff60] max-w-fit px-2 py-2">
                    {!! $setting['commitment_name'] ?? '' !!}
                </h2>
                <h4 class="text-3xl md:text-4xl text-start font-semibold text-white leading-[32px] md:leading-[48px]">
                    {!! $setting['commitment_title'] ?? '' !!}
                </h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="card-achievement rounded-3xl overflow-hidden">
                        <svg fill="#ffffff" width="64px" height="64px" viewBox="-3 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>group</title>
                                <path
                                    d="M20.906 20.75c1.313 0.719 2.063 2 1.969 3.281-0.063 0.781-0.094 0.813-1.094 0.938-0.625 0.094-4.563 0.125-8.625 0.125-4.594 0-9.406-0.094-9.75-0.188-1.375-0.344-0.625-2.844 1.188-4.031 1.406-0.906 4.281-2.281 5.063-2.438 1.063-0.219 1.188-0.875 0-3-0.281-0.469-0.594-1.906-0.625-3.406-0.031-2.438 0.438-4.094 2.563-4.906 0.438-0.156 0.875-0.219 1.281-0.219 1.406 0 2.719 0.781 3.25 1.938 0.781 1.531 0.469 5.625-0.344 7.094-0.938 1.656-0.844 2.188 0.188 2.469 0.688 0.188 2.813 1.188 4.938 2.344zM3.906 19.813c-0.5 0.344-0.969 0.781-1.344 1.219-1.188 0-2.094-0.031-2.188-0.063-0.781-0.188-0.344-1.625 0.688-2.25 0.781-0.5 2.375-1.281 2.813-1.375 0.563-0.125 0.688-0.469 0-1.656-0.156-0.25-0.344-1.063-0.344-1.906-0.031-1.375 0.25-2.313 1.438-2.719 1-0.375 2.125 0.094 2.531 0.938 0.406 0.875 0.188 3.125-0.25 3.938-0.5 0.969-0.406 1.219 0.156 1.375 0.125 0.031 0.375 0.156 0.719 0.313-1.375 0.563-3.25 1.594-4.219 2.188zM24.469 18.625c0.75 0.406 1.156 1.094 1.094 1.813-0.031 0.438-0.031 0.469-0.594 0.531-0.156 0.031-0.875 0.063-1.813 0.063-0.406-0.531-0.969-1.031-1.656-1.375-1.281-0.75-2.844-1.563-4-2.063 0.313-0.125 0.594-0.219 0.719-0.25 0.594-0.125 0.688-0.469 0-1.656-0.125-0.25-0.344-1.063-0.344-1.906-0.031-1.375 0.219-2.313 1.406-2.719 1.031-0.375 2.156 0.094 2.531 0.938 0.406 0.875 0.25 3.125-0.188 3.938-0.5 0.969-0.438 1.219 0.094 1.375 0.375 0.125 1.563 0.688 2.75 1.313z">
                                </path>
                            </g>
                        </svg>
                        <p class="text-3xl font-semibold">{!! $setting['member_num'] ?? '' !!}+</p>
                        <p class="text-xl font-normal">{!! $setting['member_name'] ?? '' !!}</p>
                    </div>
                    <div class="card-achievement rounded-3xl overflow-hidden">
                        <svg fill="#ffffff" width="64px" height="64px" viewBox="0 0 96 96"
                            xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
                                stroke-width="0.384"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title></title>
                                <g id="Reward">
                                    <path
                                        d="M51.63,40.44q.49.12,1,.27l.15,0a.51.51,0,0,0,.48-.35.51.51,0,0,0-.33-.63l-1-.29a.51.51,0,0,0-.61.37A.49.49,0,0,0,51.63,40.44Z">
                                    </path>
                                    <path
                                        d="M37.47,44.12a.47.47,0,0,0,.34-.13c.25-.23.5-.44.75-.65a.5.5,0,0,0,.08-.7.51.51,0,0,0-.71-.08l-.8.69a.5.5,0,0,0,0,.71A.48.48,0,0,0,37.47,44.12Z">
                                    </path>
                                    <path
                                        d="M46.67,40.06h0l1,0a.5.5,0,0,0,.49-.51.49.49,0,0,0-.52-.49q-.52,0-1,.06a.5.5,0,0,0,0,1Z">
                                    </path>
                                    <path
                                        d="M37.15,65.35a.51.51,0,0,0-.71,0,.5.5,0,0,0,0,.71c.25.25.5.5.76.74a.53.53,0,0,0,.34.13.54.54,0,0,0,.37-.16.51.51,0,0,0,0-.71C37.61,65.83,37.38,65.59,37.15,65.35Z">
                                    </path>
                                    <path
                                        d="M41.73,41.32a.78.78,0,0,0,.21,0c.3-.14.6-.26.91-.38a.49.49,0,0,0,.3-.64.5.5,0,0,0-.64-.3l-1,.4a.5.5,0,0,0-.25.66A.49.49,0,0,0,41.73,41.32Z">
                                    </path>
                                    <path
                                        d="M33,51a.51.51,0,0,0-.6.37c-.07.35-.14.69-.2,1a.5.5,0,0,0,.41.57h.08a.5.5,0,0,0,.5-.42c0-.33.11-.65.19-1A.5.5,0,0,0,33,51Z">
                                    </path>
                                    <path
                                        d="M32.53,56.07a.49.49,0,0,0-.45.54c0,.36.08.71.14,1a.49.49,0,0,0,.49.42h.09a.5.5,0,0,0,.41-.57c-.06-.33-.1-.65-.13-1A.5.5,0,0,0,32.53,56.07Z">
                                    </path>
                                    <path
                                        d="M35.13,46.34a.51.51,0,0,0-.69.16c-.19.3-.36.6-.53.92a.49.49,0,0,0,.2.67.53.53,0,0,0,.24.06.49.49,0,0,0,.44-.26c.16-.29.32-.58.5-.86A.5.5,0,0,0,35.13,46.34Z">
                                    </path>
                                    <path
                                        d="M56.16,42.41q.42.27.81.57a.49.49,0,0,0,.3.1.48.48,0,0,0,.4-.2.5.5,0,0,0-.1-.7c-.28-.21-.57-.41-.86-.61a.51.51,0,0,0-.7.15A.5.5,0,0,0,56.16,42.41Z">
                                    </path>
                                    <path
                                        d="M34.37,61.28a.49.49,0,0,0-.66-.25.51.51,0,0,0-.25.66c.15.32.31.64.48,1a.51.51,0,0,0,.44.26.53.53,0,0,0,.24-.06.51.51,0,0,0,.2-.68C34.66,61.87,34.51,61.58,34.37,61.28Z">
                                    </path>
                                    <path
                                        d="M60.39,46.54a.5.5,0,0,0,.41.22.47.47,0,0,0,.28-.09.5.5,0,0,0,.14-.69c-.2-.29-.41-.58-.63-.85a.5.5,0,0,0-.79.61C60,46,60.2,46.27,60.39,46.54Z">
                                    </path>
                                    <path
                                        d="M62.11,61.45a.43.43,0,0,0,.19,0,.5.5,0,0,0,.46-.31c.14-.32.26-.65.38-1a.5.5,0,0,0-.31-.63.5.5,0,0,0-.64.31c-.11.31-.22.62-.35.93A.49.49,0,0,0,62.11,61.45Z">
                                    </path>
                                    <path
                                        d="M62.47,51a.5.5,0,0,0,.48.37l.13,0a.51.51,0,0,0,.35-.62c-.09-.34-.2-.68-.31-1a.5.5,0,1,0-.95.33C62.28,50.38,62.38,50.7,62.47,51Z">
                                    </path>
                                    <path
                                        d="M63,55q0,.49,0,1a.49.49,0,0,0,.46.53h0a.5.5,0,0,0,.5-.46c0-.35,0-.71,0-1.06v-.07a.47.47,0,0,0-.5-.46A.52.52,0,0,0,63,55Z">
                                    </path>
                                    <path
                                        d="M42,68.75c-.3-.13-.6-.28-.9-.43a.5.5,0,0,0-.67.21.51.51,0,0,0,.21.68c.32.16.63.31,1,.45a.46.46,0,0,0,.2,0,.52.52,0,0,0,.46-.3A.5.5,0,0,0,42,68.75Z">
                                    </path>
                                    <path
                                        d="M59.58,65.8a.49.49,0,0,0,.37-.16c.24-.27.46-.54.68-.82a.5.5,0,0,0-.79-.61c-.2.26-.41.51-.63.76a.49.49,0,0,0,.37.83Z">
                                    </path>
                                    <path
                                        d="M46.78,70c-.33,0-.66-.06-1-.11a.5.5,0,1,0-.14,1q.51.08,1.05.12h0a.5.5,0,0,0,0-1Z">
                                    </path>
                                    <path
                                        d="M51.7,69.54c-.32.08-.65.15-1,.21a.5.5,0,0,0-.4.58.49.49,0,0,0,.49.41h.09c.35-.07.69-.14,1-.23a.5.5,0,0,0,.36-.61A.49.49,0,0,0,51.7,69.54Z">
                                    </path>
                                    <path
                                        d="M56.21,67.56c-.27.18-.56.35-.85.51a.49.49,0,0,0-.18.68.49.49,0,0,0,.43.26.45.45,0,0,0,.25-.07c.3-.17.61-.36.9-.55a.5.5,0,0,0-.55-.83Z">
                                    </path>
                                    <path
                                        d="M57.94,51.07l-6.56-1-2.93-5.95a.52.52,0,0,0-.9,0l-2.93,5.95-6.56,1a.51.51,0,0,0-.41.34.53.53,0,0,0,.13.52l4.75,4.62-1.12,6.53a.49.49,0,0,0,.2.49.47.47,0,0,0,.52,0L48,60.53l5.87,3.08a.46.46,0,0,0,.23.06.45.45,0,0,0,.29-.1.47.47,0,0,0,.2-.49l-1.12-6.53,4.75-4.62a.53.53,0,0,0,.13-.52A.51.51,0,0,0,57.94,51.07Zm-5.35,5a.49.49,0,0,0-.15.44l1,5.8-5.21-2.74a.47.47,0,0,0-.46,0l-5.21,2.74,1-5.8a.49.49,0,0,0-.15-.44l-4.21-4.1L45,51.07a.47.47,0,0,0,.38-.27L48,45.53l2.6,5.27a.47.47,0,0,0,.38.27l5.82.85Z">
                                    </path>
                                    <path
                                        d="M76,16.31a.55.55,0,0,0-.47-.31l-18.84.21a.47.47,0,0,0-.35.15L45.53,27.13,34.76,16.36a.47.47,0,0,0-.35-.15L14.51,16a.53.53,0,0,0-.47.31.51.51,0,0,0,.12.56L34.3,35.72c-.18.46-.33,1-.47,1.45A6.31,6.31,0,0,1,32.7,39.7a6.31,6.31,0,0,1-2.53,1.13c-1.35.4-2.75.81-3.39,1.92s-.29,2.49,0,3.84a6.5,6.5,0,0,1,.29,2.81,6.28,6.28,0,0,1-1.6,2.19c-1,1-2,2.1-2,3.41s1,2.38,2,3.41a6.28,6.28,0,0,1,1.6,2.19,6.5,6.5,0,0,1-.29,2.81c-.32,1.35-.66,2.75,0,3.84s2,1.52,3.39,1.92A6.31,6.31,0,0,1,32.7,70.3a6.31,6.31,0,0,1,1.13,2.53c.4,1.35.81,2.75,1.92,3.39s2.49.29,3.85,0a6.44,6.44,0,0,1,2.8-.29,6.28,6.28,0,0,1,2.19,1.6c1,1,2.1,2,3.41,2s2.38-1,3.41-2a6.28,6.28,0,0,1,2.19-1.6,6.44,6.44,0,0,1,2.8.29c1.36.32,2.76.66,3.85,0s1.52-2,1.92-3.39A6.31,6.31,0,0,1,63.3,70.3a6.31,6.31,0,0,1,2.53-1.13c1.35-.4,2.75-.81,3.39-1.92s.29-2.49,0-3.84a6.5,6.5,0,0,1-.29-2.81,6.28,6.28,0,0,1,1.6-2.19c1-1,2-2.1,2-3.41s-1-2.38-2-3.41a6.28,6.28,0,0,1-1.6-2.19,6.5,6.5,0,0,1,.29-2.81c.32-1.35.66-2.75,0-3.84s-2-1.52-3.39-1.92A6.31,6.31,0,0,1,63.3,39.7a6.31,6.31,0,0,1-1.13-2.53c-.4-1.35-.81-2.75-1.92-3.39A2.69,2.69,0,0,0,59,33.44L75.85,16.86A.49.49,0,0,0,76,16.31ZM15.78,17l18.41.2L44.82,27.84,39,33.67l-.18,0-.38-.08-.32,0-.18,0-.3,0H37l-.3,0-.14,0-.3.07-.13,0a3.39,3.39,0,0,0-.39.18,2.19,2.19,0,0,0-.48.37,1.14,1.14,0,0,0-.11.11,4.21,4.21,0,0,0-.4.52ZM61.21,37.45a7,7,0,0,0,1.38,3,7,7,0,0,0,3,1.38c1.16.34,2.36.7,2.8,1.46s.16,1.89-.13,3.11a7,7,0,0,0-.28,3.3,6.73,6.73,0,0,0,1.84,2.62c.84.89,1.72,1.81,1.72,2.72s-.88,1.83-1.72,2.72a6.73,6.73,0,0,0-1.84,2.62,7,7,0,0,0,.28,3.3c.29,1.22.57,2.37.13,3.11s-1.64,1.12-2.8,1.46a7,7,0,0,0-3,1.38,6.88,6.88,0,0,0-1.38,3c-.34,1.16-.7,2.36-1.46,2.8s-1.89.16-3.11-.13a7,7,0,0,0-3.3-.28,6.73,6.73,0,0,0-2.62,1.84c-.89.85-1.81,1.72-2.72,1.72s-1.83-.87-2.72-1.72a6.73,6.73,0,0,0-2.62-1.84,3.36,3.36,0,0,0-.9-.11,10.35,10.35,0,0,0-2.4.39c-1.22.29-2.37.56-3.11.13s-1.12-1.64-1.46-2.8a7,7,0,0,0-1.38-3,7,7,0,0,0-3-1.38c-1.16-.34-2.36-.7-2.8-1.46s-.16-1.89.13-3.11a7,7,0,0,0,.28-3.3,6.73,6.73,0,0,0-1.84-2.62c-.84-.89-1.72-1.81-1.72-2.72s.88-1.83,1.72-2.72a6.73,6.73,0,0,0,1.84-2.62,7,7,0,0,0-.28-3.3c-.29-1.22-.57-2.37-.13-3.11s1.64-1.12,2.8-1.46a7,7,0,0,0,3-1.38,6.88,6.88,0,0,0,1.38-3,14.5,14.5,0,0,1,.56-1.65h0a3.55,3.55,0,0,1,.2-.39v0a2.08,2.08,0,0,1,.19-.29l.14-.15.09-.1a1.15,1.15,0,0,1,.26-.19,1.39,1.39,0,0,1,.53-.18l.06,0a3.92,3.92,0,0,1,.6,0h.1l.65.09.14,0,.66.15.37.08.09,0,.36.09h0l.09,0H40l.19,0,.29.05.32.06h.11a4.89,4.89,0,0,0,.55,0l.27,0h.19a3.12,3.12,0,0,0,.71-.1h0a6.73,6.73,0,0,0,2.62-1.84c.89-.84,1.81-1.72,2.72-1.72a1.4,1.4,0,0,1,.33,0h0l.34.11h0a7.93,7.93,0,0,1,2,1.56,6.73,6.73,0,0,0,2.62,1.84,3,3,0,0,0,.73.1h.17c.22,0,.45,0,.68,0l.14,0,.65-.12.19,0,.74-.17c.39-.09.78-.18,1.15-.25a2.94,2.94,0,0,1,2,.12C60.52,35.09,60.87,36.29,61.21,37.45Zm-3.74-3.88-1.07.24-1,.22a4.34,4.34,0,0,1-1.81.07,6.28,6.28,0,0,1-2.19-1.6,8.24,8.24,0,0,0-2.32-1.76h0a2.88,2.88,0,0,0-1-.24h0c-1.31,0-2.38,1-3.41,2a6.28,6.28,0,0,1-2.19,1.6h0a3.29,3.29,0,0,1-.58.07h-.2l-.51,0-.19,0-.16,0-.52-.1h-.09L56.86,17.21,74.27,17Z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p class="text-3xl font-semibold">{!! $setting['experience_num'] ?? '' !!}+</p>
                        <p class="text-xl font-normal">{!! $setting['experience_name'] ?? '' !!}</p>
                    </div>

                    <div class="card-achievement rounded-3xl overflow-hidden">
                        <svg fill="#ffffff" width="64px" height="64px" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16.114-0.011c-6.559 0-12.114 5.587-12.114 12.204 0 6.93 6.439 14.017 10.77 18.998 0.017 0.020 0.717 0.797 1.579 0.797h0.076c0.863 0 1.558-0.777 1.575-0.797 4.064-4.672 10-12.377 10-18.998 0-6.618-4.333-12.204-11.886-12.204zM16.515 29.849c-0.035 0.035-0.086 0.074-0.131 0.107-0.046-0.032-0.096-0.072-0.133-0.107l-0.523-0.602c-4.106-4.71-9.729-11.161-9.729-17.055 0-5.532 4.632-10.205 10.114-10.205 6.829 0 9.886 5.125 9.886 10.205 0 4.474-3.192 10.416-9.485 17.657zM16.035 6.044c-3.313 0-6 2.686-6 6s2.687 6 6 6 6-2.687 6-6-2.686-6-6-6zM16.035 16.044c-2.206 0-4.046-1.838-4.046-4.044s1.794-4 4-4c2.207 0 4 1.794 4 4 0.001 2.206-1.747 4.044-3.954 4.044z">
                                </path>
                            </g>
                        </svg>
                        <p class="text-3xl font-semibold">{!! $setting['location_num'] ?? '' !!}</p>
                        <p class="text-xl font-normal">{!! $setting['location_name'] ?? '' !!}</p>
                    </div>
                    <div class="card-achievement rounded-3xl overflow-hidden">
                        <svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" width="64px"
                            height="64px" fill="#ffffff" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <line style="
                                          fill: none;
                                          stroke: #ffffff;
                                          stroke-width: 2;
                                          stroke-miterlimit: 10;
                                        " x1="3" y1="13" x2="3" y2="24"></line>
                                <circle cx="3" cy="24" r="2"></circle>
                                <polygon style="
                                          fill: none;
                                          stroke: #ffffff;
                                          stroke-width: 2;
                                          stroke-miterlimit: 10;
                                        " points="16,8.833 3.5,13 16,17.167 28.5,13 "></polygon>
                                <path style="
                                          fill: none;
                                          stroke: #ffffff;
                                          stroke-width: 2;
                                          stroke-miterlimit: 10;
                                        " d="M7,14.451V20c0,1.657,4.029,3,9,3s9-1.343,9-3 v-5.549"></path>
                            </g>
                        </svg>
                        <p class="text-3xl font-semibold">{!! $setting['student_num'] ?? '' !!}+</p>
                        <p class="text-xl font-normal">{!! $setting['student_name'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Achievement Section  -->

    <!-- Study Aboard Section  -->
    @if ($country->isNotEmpty())
        <section class="study-abroad relative">
            <div class="container mx-auto px-2 md:px-0">
                <div class="study-abroad flex flex-col items-center gap-4 z-10 relative">
                    <h2 class="uppercase text-base font-semibold text-black">
                        {!! $setting['study_name'] ?? '' !!}
                    </h2>
                    <h4 class="text-3xl md:text-5xl font-semibold text-black leading-[32px] md:leading-[56px]">
                        {!! $setting['study_title'] ?? '' !!}
                    </h4>

                    <div class="grid md:grid-cols-3 gap-4 md:gap-12 mt-4">
                        @foreach ($country as $data)
                            <div class="card-country">
                                <div class="aspect-16/9 img-wrapper rounded-lg">
                                    <img src="{{ $data->image ? asset($data->image) : asset('frontend/img/blog-1.jpg') }}"
                                        alt="{{ $data->title }}">
                                </div>
                                <div class="card-country-title">
                                    <h6 class="text-2xl font-semibold text-white capitalize">
                                        {!! $data->name ?? '' !!}
                                    </h6>
                                </div>
                                <a class="stretched-link" href="{{ route('showAbroad', $data->slug) }}"></a>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex w-full mt-4 justify-center">
                        <a class="bg-secondary hover:bg-primary text-white text-base font-medium px-6 py-3 rounded-md"
                            href="/abroad">View All</a>
                    </div>

                </div>
            </div>

            </div>
            </div>
            </div>
        </section>
    @endif
    <!-- / Study Aboard Section  -->

    <!-- Procedure Steps Section  -->
    @if ($process->isNotEmpty())
        <section class="procedure relative bg-primary mt-16">
            <div class="container px-2 md:px-0 mx-auto">
                <div class="home-procedure-content py-16 flex flex-col gap-4 z-10 relative">
                    <h2 class="uppercase text-start text-base font-semibold text-white">
                        {!! $setting['process_name'] ?? '' !!}
                    </h2>
                    <h4 class="text-3xl md:text-4xl text-start font-semibold text-white leading-[32px] md:leading-[48px]">
                        {!! $setting['process_title'] ?? '' !!}
                    </h4>
                    <div class="procedure-card-container grid md:grid-cols-3 mt-4 rounded-xl overflow-hidden">
                        @foreach ($process as $index => $data)
                            <div class="card-procedure">
                                <div
                                    class="w-[50px] h-[50px] rounded-md flex items-center justify-center bg-[#0141CF] text-white text-xl font-semibold">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <div class="text-white flex">
                                    <div>
                                        <h6 class="text-2xl font-semibold py-3">
                                            {!! $data->name ?? '' !!}
                                        </h6>
                                        <p class="text-lg font-normal font-cabin line-clamp-3">
                                            @php
                                                $words = explode(' ', strip_tags($data->description ?? ''));
                                                $limited =
                                                    implode(' ', array_slice($words, 0, 30)) .
                                                    (count($words) > 30 ? '...' : '');
                                            @endphp
                                            {!! $limited !!}
                                        </p>
                                    </div>
                                    <div class="hidden md:block">
                                        <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            @if ($index == 2)
                                                <path d="M12 5V19M12 19L6 13M12 19L18 13" stroke="#ffffff" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            @elseif($index >= 3)
                                                <path d="M5 12H19M5 12L11 6M5 12L11 18" stroke="#ffffff" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            @else
                                                <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="#ffffff" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            @endif
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Service Section -->
    @if ($service->isNotEmpty())
        <section class="home-services mt-16">
            <div class="container mx-auto">
                <div class="bg-cover py-16 px-8">
                    <div class="home-services-content flex flex-col gap-4 z-10 relative">
                        <h2 class="uppercase text-start text-base font-semibold text-black">
                            {!! $setting['service_title'] ?? '' !!}
                        </h2>
                        <h4 class="text-3xl md:text-4xl text-start font-semibold text-black leading-[32px] md:leading-[48px]">
                            {!! $setting['service_description'] ?? '' !!}</span>
                        </h4>
                        <div class="services-card-container grid md:grid-cols-3 mt-4 gap-6">

                            @foreach ($service as $data)
                                <div class="card-service bg-white p-4 md:p-6 relative rounded-lg">
                                    <div class="flex gap-6 items-start">
                                        <div class="p-4 bg-[#EFF6F9] flex-shrink-0 max-h-fit">
                                            <img class="w-[48px] h-[48px]" src="{{ $data->image }}" width="40px" height="40px"
                                                alt="{{ $data->name }}" />
                                        </div>
                                        <div>
                                            <h5 class="text-xl font-semibold">
                                                {!! $data->name ?? '' !!}
                                            </h5>
                                            <p class="line-clamp-3 text-lg mt-2 font-normal font-cabin">
                                                {!! Str::words($data->description ?? '', 10, '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                    <a class="stretched-link" href="{{ route('servicesingle', $data->slug) }}"></a>
                                </div>
                            @endforeach

                        </div>
                        <div class="flex w-full justify-center">
                            <a class="bg-secondary hover:bg-primary text-white text-base font-medium px-6 py-3 rounded-md"
                                href="/service">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- / Service Section -->

    <!-- FAQ Section  -->
    @if ($faq->isNotEmpty())
        <section class="home-faq py-16">
            <div class="container mx-auto px-2 md:px-0">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="home-about-img order-2 md:order-1">
                        <div class="md:mr-20">
                            <div class="img-wrapper aspect-square rounded-xl overflow-hidden">
                                <img src="{{ $setting['faq_image'] ? asset($setting['faq_image']) : '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="order-1
                                                                        md:order-2">
                        <div class="home-faq-content flex flex-col gap-4 z-10 relative">
                            <h2 class="uppercase text-base font-semibold text-black">
                                {!! $setting['faq_name'] ?? '' !!}
                            </h2>
                            <h4 class="text-3xl md:text-5xl font-semibold text-black leading-[32px] md:leading-[56px]">
                                {!! $setting['faq_title'] ?? '' !!}
                            </h4>

                            <div class="hs-accordion-group rounded-xl overflow-hidden">
                                @foreach ($faq as $data)
                                    <div class="hs-accordion bg-white border-b" id="hs-active-bordered-heading-one">

                                        <button
                                            class="hs-accordion-toggle hs-accordion-active:black inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start text-white bg-primary-lighter px-6 py-5 text-lg disabled:opacity-50 disabled:pointer-events-none"
                                            aria-expanded="false" aria-controls="hs-basic-active-bordered-collapse-one">
                                            {!! $data->name ?? '' !!}
                                            <svg class="hs-accordion-active:hidden block size-3.5"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg>
                                            <svg class="hs-accordion-active:block hidden size-3.5"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>
                                        <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                            id="hs-basic-active-bordered-collapse-one" role="region"
                                            aria-labelledby="hs-active-bordered-heading-one">
                                            <div class="py-4 px-3">
                                                <p class="text-base text-gray-600 font-medium leading-8">
                                                    {!! $data->description ?? '' !!}
                                                </p>
                                            </div>
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
    <!-- / FAQ Section  -->

    <!-- Blog Section  -->
    @if ($news->isNotEmpty())
        <section class="home-blogs pb-16">
            <div class="container mx-auto px-2 md:px-0">
                <div class="home-faq-content flex flex-col gap-4 z-10 relative">
                    <!-- Section Titles -->
                    <h2 class="uppercase text-center text-base font-semibold text-black">
                        {!! $setting['blog_title'] ?? '' !!}
                    </h2>
                    <h4 class="text-3xl md:text-5xl text-center font-semibold text-black leading-[32px] md:leading-[56px]">
                        {!! $setting['blog_description'] ?? '' !!}
                    </h4>

                    <!-- Blog Cards -->
                    <div class="blog-card-container grid md:grid-cols-3 gap-6">
                        @foreach ($news as $data)
                            <div class="card-blog">
                                <!-- Blog Image -->
                                <div class="aspect-4/3 img-wrapper">
                                    <img src="{{ $data->image ? asset($data->image) : asset('frontend/images/blog.jpg') }}"
                                        alt="{{ $data->title }}">
                                </div>

                                <!-- Blog Content -->
                                <div class="relative px-5 pt-12 pb-5 flex flex-col gap-2">
                                    <!-- Date -->
                                    <div class="date-wrapper absolute px-4 py-4 bg-black right-7 -top-11">
                                        <div class="text-white flex flex-col items-center">
                                            <p class="font-semibold text-3xl font-cabin">
                                                {{ \Carbon\Carbon::parse($data->created_at)->format('d') }}
                                            </p>
                                            <p>
                                                {{ \Carbon\Carbon::parse($data->created_at)->format('M') }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Blog Title -->
                                    <h6 class="text-2xl font-semibold text-black">
                                        {!! $data->name ?? '' !!}
                                    </h6>

                                    <!-- Blog Description (Limited to 20 Words) -->
                                    <p class="line-clamp-2 text-lg font-normal font-cabin">
                                        @php
                                            $words = explode(' ', strip_tags($data->description ?? ''));
                                            $limited =
                                                implode(' ', array_slice($words, 0, 20)) .
                                                (count($words) > 20 ? '...' : '');
                                        @endphp
                                        {!! $limited !!}
                                    </p>
                                </div>

                                <!-- Blog Link -->
                                <a class="stretched-link" href="{{ route('newssingle', $data->slug) }}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- View All Button -->
                <div class="flex w-full justify-center mt-8">
                    <a class="bg-secondary hover:bg-primary text-white text-base font-medium px-6 py-3 rounded-md"
                        href="/blogs">View All</a>
                </div>
            </div>
        </section>
    @endif
    <!-- / Blog Section  -->

    <!-- Testimonial Section  -->
    @if ($review->isNotEmpty())
        <section class="home-testimonial py-16 overflow-x-hidden relative bg-[#EFF6F9]" style="overflow-y: hidden;">
            <div class="container mx-auto">
                <!-- Section Title -->
                <div class="home-faq-content flex flex-col gap-4 z-10 relative">
                    <h2 class="uppercase text-center text-base font-semibold text-black">
                        {!! $setting['testimonial_title'] ?? '' !!}
                    </h2>
                    <h4 class="text-3xl md:text-5xl text-center font-semibold text-black leading-[32px] md:leading-[56px]">
                        {!! $setting['testimonial_description'] ?? '' !!}
                    </h4>
                </div>

                <!-- Slider Section -->
                <div class="testimonial-swiper mt-8 overflow-x-hidden  -m-3" style="overflow-y: hidden;">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($review as $data)
                            <!-- Single Slide -->
                            <div class="swiper-slide my-3">
                                <div class="card-testimonial bg-white shadow-md rounded-md">
                                    <!-- Testimonial Content -->
                                    <div class="px-8 pt-6 pb-12">
                                        <!-- Profile Section -->
                                        <div class="relative">
                                            <div class="flex gap-3 items-center">
                                                <div class="profile-img p-[3px] w-[80px] border border-gray-600 rounded-full">
                                                    <div class="img-wrapper aspect-square rounded-full">
                                                        <img src="{{  $data->image }}" alt="{{ $data->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="text-xl font-semibold text-black">{{ $data->name }}</h6>
                                                <p class="text-base font-semibold font-cabin text-gray-700">
                                                    {{ $data->position }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Description Section -->
                                        <div class="py-4 text-lg font-normal text-gray-500 font-cabin">
                                            {!! $data->description !!}
                                        </div>

                                        <!-- Rating Section -->
                                        <div class="flex items-center gap-2">
                                            <i class="fa-solid fa-star text-yellow-600"></i>
                                            <i class="fa-solid fa-star text-yellow-600"></i>
                                            <i class="fa-solid fa-star text-yellow-600"></i>
                                            <i class="fa-solid fa-star text-yellow-600"></i>
                                            <i class="fa-solid fa-star text-yellow-600"></i>
                                        </div>

                                        <!-- Quote Icon -->
                                        <img class="absolute top-0 right-3" src="{{ asset('frontend/images/quote.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="swiper-pagination !bottom-6"></div> --}}
                </div>
            </div>
        </section>
    @endif
    <!-- / Testimonial Section  -->

    <!-- Events Section  -->
    @if ($event->isNotEmpty())
        <section class="home-events py-16">
            <div class="container mx-auto px-2 md:px-0">
                <div class="home-events-content flex flex-col gap-4 z-10 relative">
                    <!-- Section Titles -->
                    <h2 class="uppercase text-center text-base font-semibold text-black">
                        {!! $setting['event_title'] ?? '' !!}
                    </h2>
                    <h4 class="text-3xl md:text-4xl text-center font-semibold text-black leading-[32px] md:leading-[48px]">
                        {!! $setting['event_description'] ?? '' !!}
                    </h4>

                    <!-- Events Cards -->
                    <div class="events-card-container grid md:grid-cols-3 mt-4 gap-6">
                        @foreach ($event as $data)
                            @php
                                $eventDate = \Carbon\Carbon::parse($data->date);
                                $today = now()->startOfDay();
                                $isExpired = $eventDate->lt($today);
                                $daysRemaining = $today->diffInDays($eventDate);
                            @endphp

                            <div class="card-event bg-white relative shadow-md rounded-3xl">
                                <!-- Badge -->
                                <div class="absolute top-2 right-2 z-10">
                                    @if ($isExpired)
                                        <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                            Expired
                                        </span>
                                    @else
                                        <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                            {{ $daysRemaining }} {{ Str::plural('day', $daysRemaining) }} left
                                        </span>
                                    @endif
                                </div>

                                <!-- Event Image -->
                                <div class="aspect-4/3 img-wrapper rounded-3xl">
                                    <img src="{{ $data->icon_image ? $data->icon_image : asset('frontend/images/blog.jpg') }}"
                                        alt="{{ $data->title }}">
                                </div>

                                <!-- Event Content -->
                                <div class="relative px-5 pt-6 pb-5 flex flex-col gap-2">
                                    <!-- Date -->
                                    <div class="date-wrapper relative left-0 -ms-5 -mt-[58px] max-w-fit pe-6">
                                        <div class="px-4 py-2 rounded-t-3xl bg-white">
                                            <div class="tracking-widest font-cabin">
                                                {{ $eventDate->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Event Title -->
                                    <h6 class="text-2xl font-semibold text-black mt-2">
                                        {!! $data->name ?? '' !!}
                                    </h6>

                                    <!-- Registration Button -->
                                    <div class="flex w-full justify-end">
                                        <a class="bg-primary hover:bg-primary text-white text-sm font-medium px-3 py-2 rounded-2xl"
                                            href="{{ route('showEvent', $data->slug) }}">View More</a>
                                    </div>
                                </div>

                                <!-- Full Event Link -->
                                <a class="stretched-link" href="{{ route('showEvent', $data->slug) }}"></a>
                            </div>
                        @endforeach
                    </div>

                </div>

                <!-- View All Button -->
                <div class="flex w-full justify-center mt-8">
                    <a class="bg-secondary hover:bg-primary text-white text-base font-medium px-6 py-3 rounded-md"
                        href="/event">View All</a>
                </div>
            </div>
        </section>
    @endif
    <!-- / Events Section  -->

    <!-- University Section  -->
    @if ($uni->isNotEmpty())
        <section class="university">
            <div class="container mx-auto">
                <div class="home-univeritiy-content flex flex-col gap-4 z-10 relative">
                    <h2 class="uppercase text-center text-base font-semibold text-black">
                        {!! $setting['rep_description'] ?? '' !!}
                    </h2>
                    <h4 class="text-3xl md:text-5xl text-center font-semibold text-black leading-[32px] md:leading-[56px]">
                        {{-- {!! $setting['rep_description'] ?? '' !!} --}}
                    </h4>
                </div>
                <div class="university-swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($uni as $university)
                            <div class="swiper-slide">
                                <div class="aspect-4/3 img-wrapper1 rounded-lg p-2 flex items-center justify-center ">
                                    <img class="w-full h-full object-contain !important" src="{{ asset($university->image) }}"
                                        alt="{{ $university->name }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- / University Section  -->

    <style>
        /* Modal positioning and behavior */
        .modal {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease-in-out;
        }

        /* Ensuring modal dialog stays centered */
        .modal-dialog-centered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh !important;
            min-width: 100%;
            margin: 0 !important;
            width: 60% !important;
            max-width: 900px !important;
        }

        /* Modal content */
        .modal-content {
            position: relative !important;
            border: none !important;
            border-radius: 0px !important;
            overflow: hidden;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            height: auto !important;
        }

        /* Close button inside the image border */
        .red-close-btn {
            background-color: #05117a;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            opacity: 0.8;
            position: absolute;
            right: 10px;
            top: 10px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3E%3Cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707A1 1 0 01.293.293z'/%3E%3C/svg%3E");
            background-size: 16px;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            z-index: 1056;
        }

        .red-close-btn:hover {
            opacity: 1;
            background-color: #1c0791;
        }

        .modal-headerpopup {
            border-bottom: none !important;
            padding: 0;
            height: 40px;
        }

        /* Modal image styling */
        .modal-body img {
            width: 100%;
            height: auto;
            object-fit: contain !important;
            border: 1px solid black;
            border-radius: 5px;
            display: block !important;
            margin: 0 auto;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 767px) {
            .modal-dialog {
                width: 90% !important;
            }

            .modal-body img {
                object-fit: contain !important;
            }
        }

        @media (max-width: 576px) {
            .modal-dialog {
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
            }

            .modal-content {
                max-height: 90vh !important;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .modal-dialog {
                width: 70% !important;
            }

            .modal-body img {
                object-fit: contain !important;
            }

            .modal-content {
                max-height: 80vh !important;
            }
        }

        @media (min-width: 992px) {
            .modal-body img {
                object-fit: cover !important;
                height: 80vh !important;
            }

            .modal-dialog {
                width: 60% !important;
            }

            .modal-content {
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
            }
        }
    </style>
    <!-- Auto Trigger Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Open the first popup modal automatically when page loads
            var firstModal = document.querySelector('.modal');
            if (firstModal) {
                var myModal = new bootstrap.Modal(firstModal);
                myModal.show();
            }
        });
    </script>
@endsection