@extends('layouts.frontend.master')

<title> {{ $setting['aboutpage_title'] ?? '' }}</title>

@section('content')
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        About Us
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
                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                </li>

                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    About Us
                </li>
            </ol>
        </div>
    </div>

    <section class="about mb-8 md:mb-44">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2">
                <div class="relative">
                    <div class="md:w-7/12">
                        <div class="aspect-4/5 img-wrapper rounded-2xl">
                            <img src="{{ $data->image_2 }}" alt="{{ $data->title }}" />
                        </div>
                    </div>
                    <div class="md:w-7/12 md:absolute top-[30%] right-[16%]">
                        <div class="aspect-4/5 img-wrapper rounded-2xl">
                            <img src="{{  $data->image }}" alt="{{ $data->title }}" />
                        </div>
                    </div>
                </div>
                <div class="about-content flex flex-col gap-4 z-10 relative">
                    <h2 class="uppercase text-base font-semibold text-black">
                        About us
                    </h2>
                    <h4 class="text-3xl md:text-5xl font-semibold text-black leading-[32px] md:leading-[56px]">
                        {!! $data->description_2 !!}
                    </h4>
                    <p class="text-lg font-normal font-cabin">
                        {!! $data->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

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
                <div class="testimonial-swiper mt-8 overflow-x-hidden -m-3" style="overflow-y: hidden;">
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
                                                        <img src="{{ $data->image }}" alt="{{ $data->name }}">
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

                </div>
            </div>
        </section>
    @endif

    <section class="teams pb-16 overflow-x-hidden relative mt-16">
        <div class="container mx-auto">
            <div class="teams-content flex flex-col gap-4 z-10 relative">
                <h2 class="uppercase text-center text-base font-semibold text-black">
                    Our Teams
                </h2>
                <h4 class="text-3xl md:text-4xl text-center font-semibold text-black leading-[32px] md:leading-[48px]">
                    The talented team that makes us who we are
                </h4>
            </div>

            <div class="grid md:grid-cols-4 gap-8 mt-8">
                @foreach ($members as $data)
                    <div class="card-teams px-4 py-4 bg-[#EFF6F9] rounded-lg">
                        <div class="aspect-square img-wrapper rounded-lg overflow-hidden">
                            <img src="{{ $data->image ? asset($data->image) : asset('frontend/images/blog.jpg') }}"
                                alt="{{ $data->title }}">
                        </div>
                        <div class="flex flex-col items-center justify-center text-center gap-4 mt-4">
                            <h4 class="text-2xl font-medium text-black">{!! $data->name !!}</h4>
                            <p class="text-base font-normal text-black">{!! $data->position !!}</p>
                            {{-- <div class="nav-social flex gap-4 items-center text-base">
                                <a class="text-primary bg-white py-2 px-4 rounded-md hover:bg-primary-lighter hover:text-white"
                                    href="{{ $data->sociallink }}" target="_blank">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a class="text-primary bg-white py-2 px-4 rounded-md hover:bg-primary-lighter hover:text-white"
                                    href="{{ $data->sociallink1 }}" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a class="text-primary bg-white py-2 px-4 rounded-md hover:bg-primary-lighter hover:text-white"
                                    href="{{ $data->sociallink2 }}" target="_blank">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex w-full mt-16 justify-center">
                <a class="bg-secondary hover:bg-primary text-white text-base font-medium px-6 py-3 rounded-md"
                    href="/team">View All</a>
            </div>
        </div>
    </section>
@endsection