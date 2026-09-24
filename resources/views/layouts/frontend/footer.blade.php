<footer class="footer bg-primary pt-16">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-8 px-4 md:px-0">
            <div class="col-span-12 md:col-span-3">
                <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80" href="/"
                    aria-label="Brand">
                    <img src="{{ $setting['site_footer_logo'] ? asset($setting['site_footer_logo']) : '' }}"
                        alt="logo" width="250px" height="120px" /></a>
                <p class="text-gray-300 mt-3 leading-5 font-medium text-sm">
                    {!! $setting['site_information'] ?? '' !!}
                </p>
                <div class="social flex items-center gap-4 mt-3">
                    @foreach ($social->slice(0, 3) as $socials)
                        <a class="text-white text-base hover:opacity-70" href="{{ $socials->link }}" target="_blank">
                            <i class="fa-brands {{ $socials->icon }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-span-12 md:col-span-9">
                <div class="grid grid-cols-4">
                    <div class="md:ps-16">
                        <h4 class="font-semibold text-xl text-white tracking-wider">
                            Services
                        </h4>
                        <div class="footer-links">
                            <a href="/appointment">Appointment</a>
                            <a href="/event">Events</a>
                            <a href="/apply">Apply Now</a>
                        </div>
                    </div>
                    <div class="md:ps-16">
                        <h4 class="font-semibold text-xl text-white tracking-wider">
                            Quick Links
                        </h4>
                        <div class="footer-links">
                            <a href="/about-us">About Us</a>
                            <a href="/team">Our Teams</a>
                            <a href="/contact">Contact Us</a>
                            <a href="/abroad">Abroad</a>
                            <a href="/privacy-policy">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="md:ps-16">
                        <h4 class="font-semibold text-xl text-white tracking-wider">
                            Courses
                        </h4>
                        <div class="footer-links">
                            @foreach ($course as $data)
                                <a href="{{ route('coursesingle', $data->slug) }}">{{ $data->title ?? '' }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="md:ps-16">
                        <h4 class="font-semibold text-xl text-white tracking-wider">
                            Study Abroad
                        </h4>
                        <div class="footer-links">
                            @foreach ($countries as $country)
                                <a href="{{ url('abroad/' . $country->slug) }}">
                                    Study in {{ $country->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-500 mt-12" style="padding: 16px 0;">
        <div class="flex items-center gap-5 justify-center">
            <p class="text-white text-base font-normal">
                Copyright © {{ date('Y') }} AR Education. All Rights Reserved. Designed by <a class="cpright"
                    href="https://paradiseit.com.np/">Paradise IT Solution.</a>
            </p>

        </div>
    </div>

</footer>
