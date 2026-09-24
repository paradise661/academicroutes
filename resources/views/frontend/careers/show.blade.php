@extends('layouts.frontend.master')
<title>{{ $data->seo_title ?? 'AR Education Consultancy' }}</title>
@section('content')
    <!-- Page Banner -->
    <div class="page-banner relative mb-12">
        <div class="aspect-[16/9] md:aspect-[18/5] img-wrapper">
            <img class="w-full h-full object-cover" src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}" />
        </div>
        <div class="absolute inset-0 z-10 bg-black/40 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-semibold text-white tracking-wide">
                    {{ $content->name ?? '' }}
                </h1>
            </div>
        </div>
        <div class="breadcrumb-wrapper z-10 mt-4 px-4 md:px-0">
            <ol class="flex flex-wrap items-center text-sm breadcrumbs bg-white p-2 rounded shadow-sm">
                <li class="inline-flex items-center">
                    <a class="text-gray-500 hover:text-blue-600" href="/">Home</a>
                    <svg class="mx-2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </li>
                <li class="inline-flex items-center">
                    <a class="text-gray-500 hover:text-blue-600" href="/careers">Careers</a>
                    <svg class="mx-2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </li>
                <li class="text-gray-800 font-semibold truncate">{{ $content->name ?? '' }}</li>
            </ol>
        </div>
    </div>

    <!-- Career Details Section -->
    <section class="single-country py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Career Details Left -->
                <div class="md:col-span-2 flex flex-col gap-8">
                    <h2 class="text-2xl md:text-3xl text-secondary font-semibold">
                        {!! $content->name ?? 'Career Title' !!}
                    </h2>

                    <div class="space-y-4">
                        @if ($content->type)
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Job Type</h3>
                                <p class="text-base text-justify">{!! $content->type !!}</p>
                            </div>
                        @endif
                        @if ($content->location)
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Job Location</h3>
                                <p class="text-base text-justify">{!! $content->location !!}</p>
                            </div>
                        @endif
                        @if ($content->level)
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Job Level</h3>
                                <p class="text-base text-justify">{!! $content->level !!}</p>
                            </div>
                        @endif
                        @if ($content->deadline)
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Application Deadline</h3>
                                <p class="text-base text-justify">{!! $content->deadline !!}</p>
                            </div>
                        @endif
                        @if ($content->salary)
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Salary</h3>
                                <p class="text-base text-justify">{!! $content->salary !!}</p>
                            </div>
                        @endif
                        @if ($content->number)
                            <div>
                                <h3 class="text-lg font-semibold text-primary">No. of Vacancies</h3>
                                <p class="text-base text-justify">{!! $content->number !!}</p>
                            </div>
                        @endif
                        <div>
                            <h3 class="text-lg font-semibold text-primary">Job Description</h3>
                            <p class="text-base text-justify">{!! $content->description ?? 'No description available.' !!}</p>
                        </div>
                    </div>

                    <!-- Apply Button -->
                    <div>
                        <a class="inline-block bg-blue-900 hover:bg-blue-800 text-white font-semibold px-5 py-3 rounded-md text-center transition w-full sm:w-auto"
                            href="{{ route('vacancy') }}">
                            Apply Now
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div>
                    <div class="sticky top-20 flex flex-col gap-4">
                        <div class="shadow-md rounded-lg px-4 py-5 bg-white">
                            <h3 class="text-xl font-semibold text-primary mb-4">Other Vacancies</h3>
                            @forelse ($careers as $item)
                                @if ($item->id !== $content->id)
                                    <div class="mb-3">
                                        <div class="py-3 px-4 border rounded-lg shadow-sm bg-gray-50">
                                            <div class="flex justify-between items-center">
                                                <div class="pr-3">
                                                    <h6 class="text-sm font-semibold text-gray-800 line-clamp-2">
                                                        {{ $item->name ?? '' }}
                                                    </h6>
                                                </div>
                                                <a class="bg-blue-900 hover:bg-blue-800 text-white text-xs font-medium py-1.5 px-3 rounded transition"
                                                    href="{{ route('careersingle', $item->slug) }}">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p class="text-gray-500">No other vacancies found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
