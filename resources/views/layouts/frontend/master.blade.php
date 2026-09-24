<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Site Verification -->
    <meta name="google-site-verification" content="KCyZvKB7jYRB0aGia9wnIFx2kEYe0DPSG4oXvlKejc8" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N7X6870SFT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-N7X6870SFT');
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $setting['site_fav_icon'] ? asset($setting['site_fav_icon']) : '' }}">

    <!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Laravel Asset Paths for CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/output.css') }}">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>

    <title>AR Education Consultancy</title>

    <style>
        .expired_badge {
            background-color: #ef4444;
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 4px 12px;
            align-self: flex-end;
            position: absolute;
            right: 15px;
            top: 6px;
        }

        .blog-search {
            border-radius: 45px;
            border: 1px solid gray;
        }
    </style>
</head>

<body>

    <!-- Include Header -->
    @php
        $countries = \App\Models\Abroad::where('status', 1)->orderBy('order', 'asc')->take(3)->get();
    @endphp

    @include('layouts.frontend.header', ['countries' => $countries])

    <!-- Page Content -->
    @yield('content')

    <!-- Include Footer -->
    @include('layouts.frontend.footer', ['countries' => $countries, 'course' => $course])
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <!-- Bootstrap JS (include Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        var testimonialSwiper = new Swiper(".testimonial-swiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 8,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 12,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
        var universitySwiper = new Swiper(".university-swiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 8,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 12,
                },
                1024: {
                    slidesPerView: 7,
                    spaceBetween: 20,
                },
            },
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_SITE_KEY"></script>

</body>

</html>