<header>
    <div class="bg-primary w-full py-1 md:block hidden">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <div class="flex items-center gap-4">
                    <a class="nav-phone flex gap-2 items-center text-white"
                        href="mailto:{{ $setting['site_email'] ?? '' }}">
                        <i class="fa-solid fa-envelope"></i>
                        <p class="text-sm font-normal">{{ $setting['site_email'] ?? '' }}</p>
                    </a>
                    <p class="text-white text-xl font-thin">|</p>
                    <a class="nav-phone flex gap-2 items-center text-white"
                        href="tel:{{ $setting['site_phone'] ?? '' }}">
                        <i class="fa-solid fa-phone"></i>
                        <p class="text-sm font-normal">{{ $setting['site_phone'] ?? '' }}</p>
                    </a>
                </div>
                <div class="nav-social flex gap-4 items-center text-base">
                    <p class="text-sm font-medium text-white">Follow us :</p>
                    @foreach ($social as $socials)
                        <a class="text-white text-base hover:opacity-70" href="{{ $socials->link }}" target="_blank">
                            <i class="fa-brands {{ $socials->icon }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar w-full bg-white">
        <div class="container mx-auto flex items-center justify-between py-3 px-2 md:px-0">
            <a class="logo" href="/">
                <img class="w-[160px] h-[60px] md:w-[185px] md:h-[70px]"
                    src="{{ $setting['site_main_logo'] ? asset($setting['site_main_logo']) : '' }}" alt="logo" />
            </a>
            <div class="gap-6 items-center hidden sm:flex">
                <a class="nav-item" href="/">Home</a>

                <div class="hs-dropdown [--trigger:hover] relative inline-flex">
                    <a class="hs-dropdown-toggle nav-item inline-flex items-center gap-x-1 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        id="nav-about-dropdown" href="javascript:void(0)" type="button" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        About Us
                        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </a>

                    <div class="hs-dropdown-menu z-20 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                        role="menu" aria-orientation="vertical" aria-labelledby="nav-about-dropdown">
                        <div class=" space-y-0.5">
                            <a class="drop-nav-item" href="/about-us"> Our Company </a>
                            <a class="drop-nav-item" href="/message-from-managing-director"> Message From Director</a>
                            <a class="drop-nav-item" href="/team"> Our Teams </a>
                            <a class="drop-nav-item" href="/representatives">
                                Our Representatives
                            </a>
                            {{-- <a class="drop-nav-item" href="#">
                                Our Ambassadors
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="hs-dropdown [--trigger:hover] relative inline-flex">
                    <a class="hs-dropdown-toggle nav-item inline-flex items-center gap-x-1 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        id="nav-about-dropdown" href="javascript:void(0)" type="button" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        Study Abroad
                        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </a>

                    <div class="hs-dropdown-menu z-20 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                        role="menu" aria-orientation="vertical" aria-labelledby="nav-about-dropdown">
                        <div class=" space-y-0.5">
                            @foreach ($countries as $country)
                                <a class="drop-nav-item" href="{{ route('showAbroad', $country->slug) }}">
                                    Study in {{ $country->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="hs-dropdown [--trigger:hover] relative inline-flex">
                    <a class="hs-dropdown-toggle nav-item inline-flex items-center gap-x-1 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        id="nav-about-dropdown" href="javascript:void(0)" type="button" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        Services
                        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </a>

                    <div class="hs-dropdown-menu z-20 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                        role="menu" aria-orientation="vertical" aria-labelledby="nav-about-dropdown">
                        <div class=" space-y-0.5">
                            @foreach (getService() as $service)
                                <a class="drop-nav-item" href="{{ route('servicesingle', $service->slug) }}">
                                    {{ $service->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <a class="nav-item" href="/blogs">Blogs</a>
                <a class="nav-item" href="/careers">Careers</a>
                <a class="nav-item" href="/contact">Contact Us</a>
                {{-- <div class="nav-item dropdown relative group">

                </div> --}}

                <div class="hs-dropdown [--trigger:hover] relative inline-flex">
                    <button
                        class="hs-dropdown-toggle nav-item inline-flex items-center gap-x-1 bg-secondary py-2 px-3 text-white rounded-lg hover:bg-primary focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                        id="nav-about-dropdown" style="color: white;" type="button" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        Useful Links
                        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div class="hs-dropdown-menu z-20 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                        role="menu" aria-orientation="vertical" aria-labelledby="nav-about-dropdown">
                        <div class="space-y-0.5">
                            <a class="drop-nav-item" href="/apply">Apply Now</a>
                            <a class="drop-nav-item" href="/ielts-register">Class Registration</a>
                            <a class="drop-nav-item" href="/videos">Video Library</a>
                            <a class="drop-nav-item" href="/cost-calculator">Cost Calculator</a>
                            {{-- <a class="drop-nav-item" href="#">Our Ambassadors</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <button
                class="py-2 px-3 items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-primary text-white disabled:opacity-50 disabled:pointer-events-none md:hidden"
                data-hs-overlay="#r-navbar-offcanvas" type="button" aria-haspopup="dialog" aria-expanded="false"
                aria-controls="r-navbar-offcanvas">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 7L4 7" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M20 12L4 12" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M20 17L4 17" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </button>

            <div class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s"
                id="r-navbar-offcanvas" role="dialog" tabindex="-1" aria-labelledby="r-navbar-offcanvas-label">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800" id="r-navbar-offcanvas-label">
                        AR Education Consultancy
                    </h3>
                    <button
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#r-navbar-offcanvas" type="button" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    <div class="gap-6 flex flex-col">
                        <a class="nav-item" href="/">Home</a>
                        <div class="hs-accordion" id="hs-basic-with-arrow-heading-two">
                            <button
                                class="hs-accordion-toggle nav-item flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none"
                                aria-expanded="false" aria-controls="hs-basic-with-arrow-collapse-two">
                                About Us
                                <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                                <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6"></path>
                                </svg>
                            </button>
                            <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                id="hs-basic-with-arrow-collapse-two" role="region"
                                aria-labelledby="hs-basic-with-arrow-heading-two">
                                <div class="px-2 py-2 space-y-0.5">
                                    <a class="drop-nav-item" href="/about-us"> Our Company </a>
                                    <a class="drop-nav-item" href="/message-from-managing-director"> Message From
                                        Director</a>
                                    <a class="drop-nav-item" href="/team">
                                        Our Teams
                                    </a>
                                    <a class="drop-nav-item" href="/representatives">
                                        Our Representatives
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="hs-accordion" id="hs-basic-with-arrow-heading-three">
                            <button
                                class="hs-accordion-toggle nav-item flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none"
                                aria-expanded="false" aria-controls="hs-basic-with-arrow-collapse-three">
                                Study Aborad
                                <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                                <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6"></path>
                                </svg>
                            </button>
                            <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                id="hs-basic-with-arrow-collapse-three" role="region"
                                aria-labelledby="hs-basic-with-arrow-heading-three">
                                <div class="px-2 py-2 space-y-0.5">
                                    @foreach ($countries as $country)
                                        <a class="drop-nav-item" href="{{ route('showAbroad', $country->slug) }}">
                                            Study in {{ $country->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="hs-accordion" id="hs-basic-with-arrow-heading-three">
                            <button
                                class="hs-accordion-toggle nav-item flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none"
                                aria-expanded="false" aria-controls="hs-basic-with-arrow-collapse-three">
                                Services
                                <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                                <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6"></path>
                                </svg>
                            </button>
                            <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                id="hs-basic-with-arrow-collapse-three" role="region"
                                aria-labelledby="hs-basic-with-arrow-heading-three">
                                <div class="px-2 py-2 space-y-0.5">
                                    @foreach (getService() as $service)
                                        <a class="drop-nav-item" href="{{ route('servicesingle', $service->slug) }}">
                                            Study in {{ $service->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a class="nav-item" href="/blogs">Blogs</a>
                        <a class="nav-item" href="/careers">Careers</a>
                        <a class="nav-item" href="/contact">Contact Us</a>
                        <div class="hs-dropdown [--trigger:hover] relative inline-flex">
                            <button
                                class="hs-dropdown-toggle nav-item inline-flex items-center gap-x-1 bg-secondary py-2 px-3 text-white rounded-lg hover:bg-primary focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                                id="nav-about-dropdown" style="color: white;" type="button" aria-haspopup="menu"
                                aria-expanded="false" aria-label="Dropdown">
                                Useful Links
                                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu z-20 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                                role="menu" aria-orientation="vertical" aria-labelledby="nav-about-dropdown">
                                <div class="space-y-0.5">
                                    <a class="drop-nav-item" href="/apply">Apply Now</a>
                                    <a class="drop-nav-item" href="/ielts-register">Class Registration</a>
                                    <a class="drop-nav-item" href="/videos">Video Library</a>
                                    <a class="drop-nav-item" href="/cost-calculator">Cost Calculator</a>
                                    {{-- <a class="drop-nav-item" href="#">Our Ambassadors</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>
</header>