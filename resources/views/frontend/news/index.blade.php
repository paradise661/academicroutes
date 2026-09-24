@extends('layouts.frontend.master')
<title> {{ $setting['mainblog_title'] ?? '' }}</title>
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
                        Blogs
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
                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                </li>

                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    Blogs
                </li>
            </ol>
        </div>
    </div>

    <!-- Blog Section  -->
    @if ($news->isNotEmpty())
        <section class="home-blogs py-16 bg-gray-50">
            <div class="container mx-auto px-4 md:px-0">
                <!-- Header -->
                <div class="text-center mb-12">
                    <h2 class="text-primary uppercase font-bold text-sm tracking-widest mb-2">
                        {!! $setting['blog_title'] ?? '' !!}
                    </h2>
                    <h3 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                        {!! $setting['blog_description'] ?? '' !!}
                    </h3>

                </div>
                {{-- <input type="text" id="search-input" placeholder="Search blogs..."
                    class="form-control blog-search mb-3 mx-auto block" style="max-width: 400px;"> --}}
                    <div class="relative max-w-md mx-auto mb-10 group">
                        <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none transition-all duration-300 group-focus-within:left-3">
                            <!-- Search Icon -->
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-600 transition-all duration-300" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m1.61-4.15a7 7 0 1 0-14 0 7 7 0 0 0 14 0z" />
                            </svg>
                        </span>
                    
                        <input type="text" id="search-input" placeholder="Search blogs..."
                            class="w-full pl-12 pr-4 py-3 rounded-full shadow-md border border-gray-200 bg-white 
                                   focus:border-blue-600 focus:ring-4 focus:ring-blue-100 
                                   text-gray-800 placeholder-gray-500 outline-none transition-all duration-300
                                   hover:shadow-lg" />
                    </div>
                    

                <!-- Blog Cards -->
                {{-- <div id="news-grid" class="grid md:grid-cols-3 gap-8"> --}}
                    <div id="news-results">
                        @include('frontend.news.partials.news_list', ['news' => $news])
                    </div> {{--
                </div> --}}


            </div>
        </section>
    @endif
    <!-- Blog Section  -->

    <script>
        let timeout = null;
        const searchInput = document.getElementById('search-input');
        const newsResults = document.getElementById('news-results');

        // Store the initial blogs HTML
        const initialHTML = newsResults.innerHTML;

        searchInput.addEventListener('keyup', function () {
            clearTimeout(timeout);
            const query = this.value.trim();

            if (!query) {
                newsResults.innerHTML = initialHTML; // restore original blogs
                return;
            }

            timeout = setTimeout(() => {
                fetch(`{{ route('news.search.ajax') }}?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        newsResults.innerHTML = data.html;
                    })
                    .catch(err => console.error('Error:', err));
            }, 300);
        });
    </script>
    <!-- / Blog Section  -->
@endsection