@extends('layouts.frontend.master')
<title> {{ $setting['mainservice_title'] ?? '' }}</title>
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
                        Our Services
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
                    Our Services
                </li>
            </ol>
        </div>
    </div>
    @if ($service->isNotEmpty())
        <section class="home-services mt-10">
            <div class="container mx-auto">
                <div class="bg-cover py-16 px-8">
                    <div class="home-services-content flex flex-col gap-4 z-10 relative">
                        <h2 class="uppercase text-start text-base font-semibold text-black">
                            {!! $setting['service_title'] ?? '' !!}
                        </h2>
                        <h4
                            class="text-3xl md:text-4xl text-start font-semibold text-black leading-[32px] md:leading-[48px]">
                            {!! $setting['service_description'] ?? '' !!}</span>
                        </h4>
                        <div class="services-card-container grid md:grid-cols-3 mt-4 gap-6">

                            @foreach ($service as $data)
                                <div class="card-service bg-white p-4 md:p-6 relative rounded-lg">
                                    <div class="flex gap-6 items-start">
                                        <div class="p-4 bg-[#EFF6F9] flex-shrink-0 max-h-fit">
                                            <img class="w-[48px] h-[48px]"
                                                src="{{ asset('admin/images/services/' . $data->image) }}" width="40px"
                                                height="40px" alt="{{ $data->name }}" />
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

                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
