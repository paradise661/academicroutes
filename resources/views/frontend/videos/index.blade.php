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
                        Video Library
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
                    Videos
                </li>
            </ol>
        </div>
    </div>

    <section class="pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col gap-4 relative z-10">
                <h2 class="uppercase text-center text-sm sm:text-base font-semibold text-black">Reels</h2>
                <h4
                    class="text-2xl sm:text-3xl md:text-4xl text-center font-semibold text-black leading-snug md:leading-tight">
                    Explore our collection of highlights, reels, and more
                </h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-8 gap-4">
                    @foreach ($video as $videos)
                        @php
                            preg_match(
                                '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|\S+\/|\S+\?v=)|(?:youtu\.be\/))([^"&?\/\s]{11})/',
                                $videos->url,
                                $matches,
                            );
                            $youtubeId = $matches[1] ?? null;
                            $videoSrc = $videos->url_type === 'upload' ? asset('storage/' . $videos->video_file) : null;
                            $isYouTube = $youtubeId !== null;
                        @endphp

                        <div class="relative rounded-lg overflow-hidden">
                            <div class="aspect-[9/16] w-full">
                                @if ($isYouTube)
                                    <a class="block w-full h-full relative" data-fancybox href="{{ $videos->url }}">
                                        <img class="w-full h-full object-cover"
                                            src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                                            alt="Reel Thumbnail" />
                                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                            <div class="bg-white text-black rounded-full p-3 shadow-lg">
                                                <i class="fas fa-play text-xl"></i>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <video class="w-full h-full object-cover" src="{{ $videoSrc }}" loop muted></video>
                                    <button
                                        class="absolute top-2 right-2 bg-white/50 flex justify-center items-center w-8 h-8 rounded-full">
                                        <i class="ph ph-speaker-high text-white text-base"></i>
                                        <i class="ph ph-speaker-simple-slash text-white text-base hidden"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
