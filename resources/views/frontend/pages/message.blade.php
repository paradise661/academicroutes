@extends('layouts.frontend.master')
<title>{!! $data->name ?? '' !!}</title>
@section('content')
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        {!! $data->name ?? '' !!}
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
                    {!! $data->name ?? '' !!}
                </li>
            </ol>
        </div>
    </div>

    <section class="about mb-8 md:mb-44">
        <div class="container mx-auto">
            <div class="about-container">
                <div class="about-img">
                    <img src="{{ $data->image }}" alt="{{ $data->title }}">
                </div>
                <div class="dir-content">
                    <h2 class="text-secondary text-3xl font-bold" style="margin-bottom: 12px;">
                        {!! $data->name ?? '' !!}
                    </h2>
                    <p class="text-lg font-normal font-cabin">
                        {!! $data->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection