@extends('layouts.frontend.master')
<title>{{ $abroad->seo_title ?? 'AR Education Consultancy' }}</title>
@section('content')
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        {{ $abroad->name ?? '' }}
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
                    Abroad
                </li>
                <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16"
                    fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    {{ $abroad->name ?? '' }}
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
                        </h2>
                        <div class="text-lg font-medium leading-8 text-justify mt-4">
                            {!! $abroad->description ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="h-full">
                    <div class="sticky top-0 flex flex-col gap-4 max-h-fit">
                        <div class="rounded-lg bg-primary">
                            <div class="px-14 py-10">
                                <div class="text-white text-center font-semibold text-2xl">
                                    Get Expert Guidance Now
                                </div>
                                <div class="text-white text-base font-normal mt-4 text-center">
                                    Need Help? Share Your Details, and Our Experts Will Call for
                                    FREE Assistance.
                                </div>
                                <div class="w-full justify-center flex mt-4">
                                    <a class="bg-secondary text-base inline-flex gap-2 font-medium text-white font-cabin max-w-fit px-6 py-3 rounded-md"
                                        href="{{ route('appointment') }}">
                                        Free Consultation
                                        <svg id="_x32_" height="24px" width="24px" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
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
                                </div>
                            </div>
                        </div>

                        <div class="hs-accordion-group mt-4 bg-[#EFF6F9] px-4 py-4 rounded-lg">
                            <h4 class="text-black font-semibold text-2xl pb-4">FAQs</h4>
                            @foreach ($faq as $data)
                                <div class="hs-accordion bg-white border-b" id="hs-active-bordered-heading-one">
                                    <button
                                        class="hs-accordion-toggle hs-accordion-active:black inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start text-black px-2 py-5 text-sm hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-expanded="false" aria-controls="hs-basic-active-bordered-collapse-one">
                                        {!! $data->name ?? '' !!}
                                        <svg class="hs-accordion-active:hidden block size-3.5"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                        <svg class="hs-accordion-active:block hidden size-3.5"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                        </svg>
                                    </button>
                                    <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                        id="hs-basic-active-bordered-collapse-one" role="region"
                                        aria-labelledby="hs-active-bordered-heading-one">
                                        <div class="pb-4 px-3">
                                            <p class="text-base text-gray-600 font-medium leading-6">
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
@endsection
