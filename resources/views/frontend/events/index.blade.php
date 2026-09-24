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
                        Events
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
                    Events
                </li>
            </ol>
        </div>
    </div>
    <section class="home-blogs pb-16">
        <div class="container mx-auto px-2 md:px-0">
            <div class="home-faq-content flex flex-col gap-4 z-10 relative">
                <h2 class="uppercase text-center text-base font-semibold text-black">
                    {!! $setting['event_title'] ?? '' !!}
                </h2>
                <h4 class="text-3xl md:text-5xl text-center font-semibold text-black leading-[32px] md:leading-[56px]">
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
                                <img src="{{ $data->icon_image ? asset($data->icon_image) : asset('frontend/images/blog.jpg') }}"
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
        </div>
    </section>
    <style>

    </style>
@endsection
