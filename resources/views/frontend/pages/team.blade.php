@extends('layouts.frontend.master')
<title>Our Teams - AR Education Consultancy</title>

@section('content')
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        Our Team
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
                    Our Team
                </li>
            </ol>
        </div>
    </div>

    <section class="teams pb-16 overflow-x-hidden relative">
        <div class="container mx-auto">
            <div class="teams-content flex flex-col gap-4 z-10 relative">
                <h2 class="uppercase text-center text-base font-semibold text-black">
                    Our Teams
                </h2>
                <h4 class="text-3xl md:text-4xl text-center font-semibold text-black leading-[32px] md:leading-[48px]">
                    The talented team that makes us who we are
                </h4>
            </div>
            <div class="grid md:grid-cols-4 gap-4 mt-4">
                @foreach ($members as $data)
                    <div style="padding: 12px; background-color: #EFF6F9; border-radius: 8px;">
                        <div style="aspect-ratio: 1 / 1; overflow: hidden; border-radius: 8px;">
                            <img src="{{ $data->image ? asset($data->image) : asset('frontend/images/blog.jpg') }}"
                                alt="{{ $data->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="text-align: center; margin-top: 10px;">
                            <h4 style="font-size: 18px; font-weight: 600;">{!! $data->name !!}</h4>
                            <p style="font-size: 14px;">{!! $data->position !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
