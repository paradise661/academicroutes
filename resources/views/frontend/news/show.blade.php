@extends('layouts.frontend.master')
<title>{{ $data->seo_title ?? 'AR Education Consultancy' }}</title>
@section('content')
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
                    Blogs
                </li>
                <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16"
                    fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    {{ $data->name ?? '' }}
                </li>
            </ol>
        </div>
    </div>
    {{-- <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="./../../public/images/banner-full.png" alt="" />
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
    </div> --}}
    <!-- / Page Banner  -->

    <!-- Blog Single content Section  -->
    <section class="single-country">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="col-span-2 flex flex-col gap-8">
                    <div class="introduction">
                        <h2 class="text-secondary text-3xl font-semibold">
                            {!! $data->name ?? '' !!}
                        </h2>
                        <div class="{{ ($data->author || $data->position) ? 'flex items-start justify-between' : 'flex justify-end' }} mt-4">
                            @if($data->author || $data->position)
                            <div>
                                @if($data->author)
                                <p class="font-semibold text-gray-900">{{ $data->author }}</p>
                                @endif
                                @if($data->position)
                                <p class="text-xs text-gray-600">{{ $data->position }}</p>
                                @endif
                            </div>
                            @endif
                            <div class="flex items-center gap-4">
                                <p class="text-sm text-gray-500">{{ $data->created_at ? $data->created_at->format('F j, Y') : '' }}</p>
                                <div class="flex items-center gap-2">
                                    <button id="like-btn-{{ $data->id }}" class="like-btn" onclick="likeNews({{ $data->id }})">
                                        <svg class="heart liked" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="#e0245e" stroke="#e0245e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M12 21C12 21 4 13.6667 4 8.5C4 5.46243 6.46243 3 9.5 3C11.0913 3 12.5971 3.81071 13.5 5.08579C14.4029 3.81071 15.9087 3 17.5 3C20.5376 3 23 5.46243 23 8.5C23 13.6667 15 21 15 21H12Z" />
                                        </svg>
                                    </button>
                                    <span id="like-count-{{ $data->id }}" class="text-sm text-gray-600">{{ $data->likes }} likes</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-lg font-medium leading-8 text-justify mt-6">
                            {!! $data->description ?? '' !!}
                        </div>
                    </div>

                    <style>
                        .like-btn {
                            background: none;
                            border: none;
                            cursor: pointer;
                            padding: 4px;
                            display: inline-flex;
                            align-items: center;
                            transition: transform 0.2s ease;
                            width: fit-content;
                        }

                        .like-btn:hover {
                            transform: scale(1.1);
                        }

                        /* Heart always red */
                        .heart {
                            fill: #e0245e;
                            /* solid red */
                            stroke: #e0245e;
                            transition: transform 0.3s ease, fill 0.3s ease, stroke 0.3s ease;
                        }

                        /* Heart pop animation */
                        .heart.pop {
                            transform: scale(1.5);
                        }
                    </style>

                    <script>
                        async function likeNews(id) {
                            const btn = document.getElementById(`like-btn-${id}`);
                            const heart = btn.querySelector('.heart');
                            const countEl = document.getElementById(`like-count-${id}`);

                            try {
                                const res = await fetch(`/news/${id}/like`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    }
                                });

                                const data = await res.json();

                                // Animate heart pop
                                heart.classList.add('pop');
                                setTimeout(() => heart.classList.remove('pop'), 300);

                                // Update count
                                countEl.textContent = data.likes;

                            } catch (err) {
                                console.error(err);
                            }
                        }
                    </script>


                </div>
                <div class="h-full">
                    <div class="sticky top-0 flex flex-col gap-4 max-h-fit">
                        <div class="shadow-md rounded-lg px-6 py-4">
                            <h3 class="text-xl font-semibold text-primary">
                                Most Liked Blogs
                            </h3>
                            @foreach ($viewed_news as $data)
                                <div class="more-blogs mt-4 flex flex-col gap-4">
                                    <div class="more py-2 border-b relative">
                                        <div class="grid grid-cols-6 gap-4">
                                            <div class="col-span-2">
                                                <div class="aspect-4/3 img-wrapper">
                                                    <img src="{{ $data->image ? asset($data->image) : asset('frontend/images/blog.jpg') }}"
                                                        alt="{{ $data->title }}">
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
        implode(' ', array_slice($words, 0, 20)) .
        (count($words) > 20 ? '...' : '');
                                                    @endphp
                                                    {!! $limited !!}
                                                </p>
                                            </div>
                                        </div>
                                        <a class="stretched-link" href="{{ route('newssingle', $data->slug) }}"></a>
                                    </div>
                                    {{-- <div class="more py-2 border-b relative">
                                        <div class="grid grid-cols-6 gap-4">
                                            <div class="col-span-2">
                                                <div class="aspect-4/3 img-wrapper">
                                                    <img src="./../../public/images/profile.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-span-4">
                                                <h6 class="text-base text-primary font-medium line-clamp-2">
                                                    This is a blog content This is a blog content
                                                </h6>
                                                <p class="line-clamp-2">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Nisi consequatur ut, ea deserunt unde aut a
                                                    aliquid cupiditate ipsa earum nihil excepturi tenetur
                                                    facere perspiciatis.
                                                </p>
                                            </div>
                                        </div>
                                        <a class="stretched-link" href="./blogs.html"></a>
                                    </div>
                                    <div class="more py-2 border-b relative">
                                        <div class="grid grid-cols-6 gap-4">
                                            <div class="col-span-2">
                                                <div class="aspect-4/3 img-wrapper">
                                                    <img src="./../../public/images/profile.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-span-4">
                                                <h6 class="text-base text-primary font-medium line-clamp-2">
                                                    This is a blog content This is a blog content
                                                </h6>
                                                <p class="line-clamp-2">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Nisi consequatur ut, ea deserunt unde aut a
                                                    aliquid cupiditate ipsa earum nihil excepturi tenetur
                                                    facere perspiciatis.
                                                </p>
                                            </div>
                                        </div>
                                        <a class="stretched-link" href="./blogs.html"></a>
                                    </div>
                                    <div class="more py-2 border-b relative">
                                        <div class="grid grid-cols-6 gap-4">
                                            <div class="col-span-2">
                                                <div class="aspect-4/3 img-wrapper">
                                                    <img src="./../../public/images/profile.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-span-4">
                                                <h6 class="text-base text-primary font-medium line-clamp-2">
                                                    This is a blog content This is a blog content
                                                </h6>
                                                <p class="line-clamp-2">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Nisi consequatur ut, ea deserunt unde aut a
                                                    aliquid cupiditate ipsa earum nihil excepturi tenetur
                                                    facere perspiciatis.
                                                </p>
                                            </div>
                                        </div>
                                        <a class="stretched-link" href="./blogs.html"></a>
                                    </div> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
