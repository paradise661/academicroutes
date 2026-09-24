@extends('layouts.frontend.master')
@section('content')
    <section class="pt-[10px]">
        <div class="py-5">
            <div class="container mx-auto px-4 md:px-0">
                <div class="grid md:grid-cols-10 gap-4 md:gap-12 ">
                    <div class="md:col-span-4 md:order-2">
                        <div class="img-wrapper overflow-hidden rounded-xl ">
                            <img src="{{ $event->image ? asset($event->image) : asset('frontend/img/blog-1.jpg') }}"
                                alt="" />

                        </div>
                    </div>
                    <div class="md:col-span-6 md:order-1">
                        <ol class="flex items-center whitespace-nowrap">
                            <li class="inline-flex items-center">
                                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600"
                                    href="{{ route('home') }}">
                                    Home
                                </a>
                                <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                                </svg>
                            </li>
                            <li class="inline-flex items-center">
                                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600"
                                    href="{{ route('event') }}">
                                    Events
                                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate"
                                aria-current="page">
                                {{ $event->name }}
                            </li>
                        </ol>
                        <h1 class="text-3xl md:text-5xl w-full font-bold text-black">
                            {{ $event->name }}
                        </h1>

                        @php
                            $eventDate = \Carbon\Carbon::parse($event->date);
                            $today = now()->startOfDay();
                            $isExpired = $eventDate->lt($today);
                            $daysRemaining = $today->diffInDays($eventDate, false);
                        @endphp

                        <div class="flex gap-4 mt-4 flex-wrap">
                            <div class="flex items-center text-lg gap-2 text-primary font-semibold">
                                <i class="ph ph-calendar-check text-2xl text-secondary"></i>
                                {{ $event->date }}
                            </div>
                            <div class="flex items-center text-lg gap-2 text-primary font-semibold">
                                <i class="ph ph-timer text-2xl text-secondary"></i>
                                {{ $event->time }}
                            </div>
                            <div class="flex items-center text-lg gap-2 text-primary font-semibold">
                                <i class="ph ph-navigation-arrow text-2xl text-secondary"></i>
                                {{ $event->lcoation }}
                            </div>

                            <div class="flex items-center text-lg gap-2 text-primary font-semibold">
                                @if ($isExpired)
                                    <span class="expired_badge1 py-0">Expired</span>
                                @else
                                    <span class="bg-green-600 text-white font-semibold px-3 py-1 rounded">
                                        {{ $daysRemaining }} Day{{ $daysRemaining != 1 ? 's' : '' }} Remaining
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="items-center text-lg gap-2 text-black font-semibold mt-4">
                            {!! $event->short_description ?? '' !!}
                        </div>

                    </div>
                </div>

                <div class="grid md:grid-cols-12 gap-4 md:gap-12 items-center">
                    <div class="md:col-span-6 md:order-1">
                        <div class="items-center text-lg gap-2 text-black font-semibold mt-4">
                            {!! $event->description ?? '' !!}
                        </div>
                        <div class="flex items-center gap-4 mt-4">

                            <a class="text-white uppercase text-base font-semibold bg-secondary px-8 hover:bg-primary rounded-md py-2"
                                href="/register?event={{ urlencode($event->name) }}">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .expired_badge1 {
            background-color: #ef4444;
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 4px 12px;
            /* border-radius: 999px; */
            align-self: flex-end;
        }
    </style>
@endsection
