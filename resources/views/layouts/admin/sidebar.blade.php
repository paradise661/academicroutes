<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo p-0">
        <a class="app-brand-link mx-auto my-0" href="{{ route('dashboard') }}" target="_blank">
            @if ($setting['site_main_logo'])
                <img src="{{ $setting['site_main_logo'] ? asset($setting['site_main_logo']) : '' }}" height="50">
            @else
                <span class="app-brand-text demo menu-text fw-bolder ms-2">AR EDUCATION</span>
            @endif
        </a>

        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" href="javascript:void(0);">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(1) == 'apply' ? 'active' : '' }}">
            <a class="menu-link text-decoration-none{{ Request::segment(2) == 'apply' ? 'active' : '' }}"
                href="{{ route('apply.index') }}">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Accordion">Apply</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(1) == 'appointment' ? 'active' : '' }}">
            <a class="menu-link text-decoration-none{{ Request::segment(2) == 'appointment' ? 'active' : '' }}"
                href="{{ route('appointment.index') }}">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Accordion">Appointment</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(1) == 'register' ? 'active' : '' }}">
            <a class="menu-link text-decoration-none{{ Request::segment(2) == 'agency' ? 'active' : '' }}"
                href="{{ route('register.index') }}">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Accordion">Register</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(1) == 'ielts-register' ? 'active' : '' }}">
            <a class="menu-link text-decoration-none{{ Request::segment(2) == 'ielts-register' ? 'active' : '' }}"
                href="{{ route('ielts-admin.index') }}">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Accordion">IELTS Registrations</div>
            </a>
        </li>
        <li class="menu-item
    @if (Request::segment(2) == 'contacts') {{ 'active open' }} @endif">
            <a class="menu-link
        {{ Request::segment(2) == 'contacts' ? 'active' : '' }}"
                href="{{ route('contacts.index') }}">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Accordion">Contacts</div>
            </a>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->
        <li class="menu-item @if (Request::segment(2) == 'abroad') {{ 'active open' }} @endif">
            <a class="menu-link text-decoration-none menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-world"></i>
                <div data-i18n="General Setting">Abroad</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link text-decoration-none{{ Request::segment(2) == 'abroad' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('abroad.index') }}">
                        <i class="menu-icon tf-icons bx bx-book-content"></i>
                        <div data-i18n="Accordion">All Abroad</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link text-decoration-none {{ Request::segment(2) == 'abroad' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('abroad.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Abroad</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'catalog' ? 'active' : '' }}"
                href="{{ route('catalog.index') }}">
                <i class="menu-icon tf-icons bx bx bx-layer"></i>
                <div data-i18n="Accordion">Catalog </div>
            </a>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'page') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="General Setting">Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'page' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('page.index') }}">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Accordion">All Pages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'page' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('page.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Page</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'process') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="General Setting">Process & Service</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'process' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('process.index') }}">
                        <i class="menu-icon tf-icons bx bx-search"></i>
                        <div data-i18n="Accordion">All Processes</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'services' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('services.index') }}">
                        <i class="menu-icon tf-icons bx bx-support"></i>
                        <div data-i18n="Accordion">All Services</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item @if (Request::segment(2) == 'news' || Request::segment(2) == 'newscategory') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="General Setting">Blogs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'news' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('news.index') }}">
                        <i class="menu-icon tf-icons bx bx-briefcase"></i>
                        <div data-i18n="Accordion">All Blogs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'news' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('news.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Blogs</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'newscategory' ? 'active' : '' }}"
                        href="{{ route('newscategory.index') }}">
                        <i class="menu-icon tf-icons bx bxs-file"></i>
                        <div data-i18n="Accordion">News Category</div>
                    </a>
                </li> --}}
            </ul>
        </li>

        {{-- <li class="menu-item @if (Request::segment(2) == 'company' || Request::segment(2) == 'companycategory') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="General Setting">Company</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'company' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('company.index') }}">
                        <i class="menu-icon tf-icons bx bx-briefcase"></i>
                        <div data-i18n="Accordion">All Company</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'company' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('company.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Company</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'companycategory' ? 'active' : '' }}"
                        href="{{ route('companycategory.index') }}">
                        <i class="menu-icon tf-icons bx bxs-file"></i>
                        <div data-i18n="Accordion">Company Category</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- <li class="menu-item @if (Request::segment(2) == 'blog' || Request::segment(2) == 'blogcategory') {{ 'active open' }} @endif">
        <a class="menu-link menu-toggle" href="javascript:void(0)">
            <i class="menu-icon tf-icons bx bx-news"></i>
            <div data-i18n="General Setting">Posts</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a class="menu-link {{ Request::segment(2) == 'blog' && Request::segment(3) == '' ? 'active' : '' }}"
                    href="{{ route('blog.index') }}">
                    <i class="menu-icon tf-icons bx bx-news"></i>
                    <div data-i18n="Accordion">All Posts</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link {{ Request::segment(2) == 'blog' && Request::segment(3) == 'create' ? 'active' : '' }}"
                    href="{{ route('blog.create') }}">
                    <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                    <div data-i18n="Accordion">Create Post</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link {{ Request::segment(2) == 'blogcategory' ? 'active' : '' }}"
                    href="{{ route('blogcategory.index') }}">
                    <i class="menu-icon tf-icons bx bxs-file"></i>
                    <div data-i18n="Accordion">Categories</div>
                </a>
            </li>
        </ul>
    </li> --}}

        <li class="menu-item @if (Request::segment(2) == 'members') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="General Setting">Teams</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'members' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('members.index') }}">
                        <i class="menu-icon tf-icons bx bx-user-pin"></i>
                        <div data-i18n="Accordion">All Teams</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'members' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('members.create') }}">
                        <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                        <div data-i18n="Accordion">Create Team</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="menu-item @if (Request::segment(2) == 'project' || Request::segment(2) == 'projectcategory') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="General Setting">Projects</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'project' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('project.index') }}">
                        <i class="menu-icon tf-icons bx bx-briefcase"></i>
                        <div data-i18n="Accordion">All Projects</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'project' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('project.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Project</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'projectcategory' ? 'active' : '' }}"
                        href="{{ route('projectcategory.index') }}">
                        <i class="menu-icon tf-icons bx bxs-file"></i>
                        <div data-i18n="Accordion">Project Category</div>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- <li class="menu-item @if (Request::segment(2) == 'download') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div data-i18n="General Setting">Downloads</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'download' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('download.index') }}">
                        <i class="menu-icon tf-icons bx bx-download"></i>
                        <div data-i18n="Accordion">All Downloads</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'download' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('download.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Download</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item @if (Request::segment(2) == 'slider') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                <div data-i18n="General Setting">Sliders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'slider' && Request::segment(3) == '' ? 'active' : '' }}"
                        href="{{ route('slider.index') }}">
                        <i class="menu-icon tf-icons bx bx-slider-alt"></i>
                        <div data-i18n="Accordion">All Sliders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'slider' && Request::segment(3) == 'create' ? 'active' : '' }}"
                        href="{{ route('slider.create') }}">
                        <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                        <div data-i18n="Accordion">Create Slider</div>
                    </a>
                </li>

            </ul>
        </li> --}}
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'course' ? 'active' : '' }}"
                href="{{ route('course.index') }}">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Accordion">Courses </div>
            </a>
        </li>

        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'faq' ? 'active' : '' }}" href="{{ route('faq.index') }}">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="Accordion">Faqs </div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'video' ? 'active' : '' }}"
                href="{{ route('videos.index') }}">
                <i class="menu-icon tf-icons bx bx-film"></i>
                <div data-i18n="Accordion">Videos </div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'branchtab' ? 'active' : '' }}"
                href="{{ route('branchtab.index') }}">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Accordion">Branchtab </div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'branch' ? 'active' : '' }}"
                href="{{ route('branch.index') }}">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Accordion">Branches</div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'review' ? 'active' : '' }}"
                href="{{ route('review.index') }}">
                <i class="menu-icon tf-icons bx bx-star"></i>
                <div data-i18n="Accordion">Testimonial </div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'event' ? 'active' : '' }}"
                href="{{ route('event.index') }}">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Accordion">Events </div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a class="menu-link {{ Request::segment(2) == 'whyus' ? 'active' : '' }}"
                href="{{ route('whyus.index') }}">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="Accordion">Why US </div>
            </a>
        </li> --}}

        {{-- <li class="menu-item">
        <a class="menu-link {{ Request::segment(2) == 'salient-features' ? 'active' : '' }}"
            href="{{ route('salient-features.index') }}">
            <i class="menu-icon tf-icons bx bx-building-house"></i>
            <div data-i18n="Accordion">Salient Features</div>
        </a>
    </li> --}}

        <!-- General Settings  -->
        <li class="menu-item @if (Request::segment(2) == 'setting' ||
                Request::segment(2) == 'social' ||
                Request::segment(2) == 'counters' ||
                Request::segment(2) == 'popup' ||
                // Request::segment(2) == 'branch' ||
                Request::segment(2) == 'progress') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Global Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'setting' ? 'active' : '' }}"
                        href="{{ route('admin.setting.index') }}">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                        <div data-i18n="Accordion">Setting</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'counters' ? 'active' : '' }}"
                        href="{{ route('counters.index') }}">
                        <i class="menu-icon tf-icons bx bx-polygon"></i>
                        <div data-i18n="Accordion">Counters</div>
                    </a>
                </li> --}}
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'popup' ? 'active' : '' }}"
                        href="{{ route('popup.index') }}">
                        <i class="menu-icon tf-icons bx bx-conversation"></i>
                        <div data-i18n="Accordion">Popups</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'social' ? 'active' : '' }}"
                        href="{{ route('social.index') }}">
                        <i class="menu-icon tf-icons bx bx-images"></i>
                        <div data-i18n="Accordion">Social Icons</div>
                    </a>
                </li>
        </li>

    </ul>

</aside>
