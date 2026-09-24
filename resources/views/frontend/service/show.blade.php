@extends('layouts.frontend.master')
<title>{{ $data->seo_title ?? 'AR Education Consultancy' }}</title>
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
                        {{ $data->name ?? '' }}
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
                    {{ $data->name ?? '' }}
                </li>
            </ol>
        </div>
    </div>
    <section class="single-country">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="col-span-2 flex flex-col gap-8">
                    <div class="introduction">
                        <h2 class="text-secondary text-3xl font-semibold">
                            {!! $data->name ?? '' !!}
                        </h2>
                        <div class="text-lg font-medium leading-8 text-justify mt-4">
                            {!! $data->description ?? '' !!}
                        </div>
                    </div>

                </div>
                <div class="h-full">
                    <div class="sticky top-0 flex flex-col gap-4 max-h-fit">
                        <div class="shadow-md rounded-lg px-6 py-4">
                            <h3 class="text-xl font-semibold text-primary">
                                Our Services
                            </h3>
                            @foreach ($service->take(3) as $data)
                                <div class="more-blogs mt-4 flex flex-col gap-4">
                                    <div class="more py-2 border-b relative">
                                        <div class="grid grid-cols-6 gap-4">
                                            <div class="col-span-2">
                                                <div class="aspect-[4/3] img-wrapper">
                                                    <img class="object-contain w-full h-full"
                                                        src="{{  $data->image }}"
                                                        alt="{{ $data->name }}" />
                                                </div>
                                            </div>
                                            <div class="col-span-4">
                                                <h6 class="text-base text-primary font-medium line-clamp-2">
                                                    {!! $data->name ?? '' !!}
                                                </h6>
                                                <p class="line-clamp-2">
                                                    @php
                                                        $words = explode(' ', strip_tags($data->description ?? ''));
                                                        $limited =
                                                            implode(' ', array_slice($words, 0, 10)) .
                                                            (count($words) > 10 ? '...' : '');
                                                    @endphp
                                                    {!! $limited !!}
                                                </p>
                                            </div>
                                        </div>
                                        <a class="stretched-link" href="{{ route('servicesingle', $data->slug) }}"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
