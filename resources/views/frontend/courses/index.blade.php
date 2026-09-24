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
                        Courses
                    </h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrapper z-10">
            <ol class="flex items-center whitespace-nowrap breadcrumbs bg-white">
                <li class="inline-flex items-center">
                    <a class="flex items-center text-base text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                        href="./index.html">
                        Home
                    </a>
                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16"
                        fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                </li>

                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    Courses
                </li>
            </ol>
        </div>
    </div>
    <section class="study-abroad relative">
        <div class="container mx-auto px-2 md:px-0">
            <div class="study-abroad flex flex-col items-center gap-4 z-10 relative">
                <h2 class="uppercase text-base font-semibold text-black">
                    Our Courses
                </h2>
                <h4 class="text-3xl md:text-5xl font-semibold text-black leading-[32px] md:leading-[56px]">
                    {{-- {!! $setting['study_title'] ?? '' !!} --}}
                </h4>

                <div class="grid md:grid-cols-3 gap-4 md:gap-12 mt-4">
                    @foreach ($course as $data)
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
                            <a class="stretched-link" href="{{ route('coursesingle', $data->slug) }}"></a>
                        </div>
                    @endforeach
                </div>

                <div class="flex w-full mt-4 justify-center">

                </div>

            </div>
        </div>

        </div>
        </div>
        </div>
    </section>
@endsection
