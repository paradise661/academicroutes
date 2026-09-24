@extends('layouts.admin.master')
@section('title', 'Website Settings - BG Group')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="card-body p-0">
                    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card card-primary shadow br-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2 nav flex-column gap-2 nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-global-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-global" type="button"
                                            role="tab" aria-controls="v-pills-global"
                                            aria-selected="true">Global</button>
                                        <button class="nav-link text-start" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Homepage</button>
                                    </div>
                                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-global" role="tabpanel"
                                            aria-labelledby="v-pills-global-tab">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="image">Site Main Logo</label>
                                                        <div class="custom-file">
                                                            <!-- File input for selecting an image -->
                                                            <input class="form-control mainlogo" id="image_input"
                                                                data-default-file="{{ $settings['site_main_logo'] ? asset($settings['site_main_logo']) : '' }}"
                                                                type="file" name="site_main_logo">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="image">Site footer Logo</label>
                                                        <div class="custom-file">
                                                            <!-- File input for selecting an image -->
                                                            <input class="form-control mainlogo" id="image_input"
                                                                data-default-file="{{ $settings['site_footer_logo'] ? asset($settings['site_footer_logo']) : '' }}"
                                                                type="file" name="site_footer_logo">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="banner">Site Fav Icon</label>
                                                        <div class="custom-file">

                                                            <!-- File input for selecting an image -->
                                                            <input class="form-control footerlogo" id="image_input"
                                                                data-default-file="{{ $settings['site_fav_icon'] ? asset($settings['site_fav_icon']) : '' }}"
                                                                type="file" name="site_fav_icon" accept="image/*">

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_information">Site Information</label>
                                                        <textarea class="form-control br-8" name="site_information" rows="4" placeholder="Enter Site Information">{{ $settings['site_information'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone">Phone Number</label>
                                                        <input class="form-control br-8" type="tel" name="site_phone"
                                                            value="{{ $settings['site_phone'] }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email">Email</label>
                                                        <input class="form-control br-8" type="email" name="site_email"
                                                            value="{{ $settings['site_email'] }}" placeholder="Enter Email">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location">Location</label>
                                                        <input class="form-control br-8" type="text" name="site_location"
                                                            value="{{ $settings['site_location'] }}"
                                                            placeholder="Enter Location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location_url">Location Url</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location_url"
                                                            value="{{ $settings['site_location_url'] }}"
                                                            placeholder="Enter Location Url">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="mainhomepage_title">Homepage Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="mainhomepage_title"
                                                            value="{{ $settings['mainhomepage_title'] }}"
                                                            placeholder="Enter Homepage title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="aboutpage_title">Aboutpage Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="aboutpage_title"
                                                            value="{{ $settings['aboutpage_title'] }}"
                                                            placeholder="Enter Aboutpage Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="country_title">Country Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="country_title" value="{{ $settings['country_title'] }}"
                                                            placeholder="Enter Country Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="mainservice_title">Service Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="mainservice_title"
                                                            value="{{ $settings['mainservice_title'] }}"
                                                            placeholder="Enter Service Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="mainblog_title">Blog Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="mainblog_title"
                                                            value="{{ $settings['mainblog_title'] }}"
                                                            placeholder="Enter Blog Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="contact_title">Contact Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="contact_title" value="{{ $settings['contact_title'] }}"
                                                            placeholder="Enter Location Url">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_copyright">Site Copyright</label>
                                                        <textarea class="form-control br-8" name="site_copyright" rows="4" placeholder="Enter Site Copyright">{{ $settings['site_copyright'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_description">Enter Banner
                                                            Title</label>
                                                        <textarea class="form-control ckeditor br-8" name="homepage_description" rows="4">{{ $settings['homepage_description'] ?? '' }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="home">Select Banner Image</label>
                                                        <div class="custom-file">
                                                            <input class="form-control homepageimage" id="image_input"
                                                                data-default-file="{{ $settings['homepage_image'] ? asset($settings['homepage_image']) : '' }}"
                                                                type="file" name="homepage_image" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group mb-3">
                                                        <label for="homepage_title">Enter Banner Description</label>
                                                        <input class="form-control br-4" type="text"
                                                            name="homepage_title"
                                                            value="{{ $settings['homepage_title'] }}"
                                                            placeholder="Enter Homepage Title">
                                                    </div>
                                                </div>
                                                <br />
                                                <h2 style="text-align: center;">About Us</h2>
                                                <div class="row">
                                                    <!-- First Column -->
                                                    <div class="col-md-6 col">
                                                        <fieldset class="border p-3 mb-3">
                                                            <div class="col-12">
                                                                <div class="form-group mb-3 mt-2">
                                                                    <label for="home">Select About-Us Image 1</label>
                                                                    <div class="custom-file">
                                                                        <input class="form-control ctaimage"
                                                                            id="cta_image1_input"
                                                                            data-default-file="{{ $settings['abt_image1'] ? asset($settings['abt_image1']) : '' }}"
                                                                            type="file" name="abt_image1"
                                                                            accept="image/*">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-3 mt-2">
                                                                    <label for="home">Select About-Us Image 2</label>
                                                                    <div class="custom-file">
                                                                        <input class="form-control ctaimage"
                                                                            id="cta_image2_input"
                                                                            data-default-file="{{ $settings['abt_image2'] ? asset($settings['abt_image2']) : '' }}"
                                                                            type="file" name="abt_image2"
                                                                            accept="image/*">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-6 col">
                                                        <fieldset class="border p-3 mb-3">
                                                            <div class="col-12">
                                                                <div class="form-group mb-3 mt-2">
                                                                    <div class="form-group mb-3">
                                                                        <label for="abt_name">About Us</label>
                                                                        <textarea class="form-control br-8" name="abt_name" rows="4" placeholder="About Us">{{ $settings['abt_name'] }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-3 mt-2">
                                                                    <div class="form-group mb-3">
                                                                        <label for="abt_title">Title
                                                                        </label>
                                                                        <textarea class="form-control br-8" name="abt_title" rows="4"
                                                                            placeholder="About Us
                                                                            Description">{{ $settings['abt_title'] }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row-8">
                                                    <div class="form-group mb-3">
                                                        <label for="abt_description">Enter
                                                            About Description</label>
                                                        <textarea class="form-control ckeditor10 br-8" name="abt_description" rows="4">{{ $settings['abt_description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Teams</legend>
                                                        <div class="form-group mb-3">
                                                            <label for="member_title">Team Title</label>
                                                            <input class="form-control" type="text"
                                                                name="member_title"
                                                                value="{{ $settings['member_title'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="team_description">Team Info</label>
                                                            <textarea class="form-control br-8" name="team_description" rows="4" placeholder="Enter Something ...">{{ $settings['team_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Commitment</legend>
                                                        <div class="form-group mb-3">
                                                            <label for="commitment_name">Commitment</label>
                                                            <input class="form-control" type="text"
                                                                name="commitment_name"
                                                                value="{{ $settings['commitment_name'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="commitment_title">Commitment Title</label>
                                                            <textarea class="form-control br-8" name="commitment_title" rows="4" placeholder="Enter Something ...">{{ $settings['commitment_title'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Blogs</legend>
                                                        <div class="form-group mb-3">
                                                            <label for="blog_title">Blog Title</label>
                                                            <input class="form-control" type="text" name="blog_title"
                                                                value="{{ $settings['blog_title'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="blog_description">Blog Info</label>
                                                            <textarea class="form-control br-8" name="blog_description" rows="4" placeholder="Enter Something ...">{{ $settings['blog_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Study Abroad
                                                        </legend>
                                                        <div class="form-group mb-3">
                                                            <label for="study_name">Study Abroad</label>
                                                            <input class="form-control" type="text" name="study_name"
                                                                value="{{ $settings['study_name'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="study_title">Title</label>
                                                            <textarea class="form-control br-8" name="study_title" rows="4" placeholder="Enter Something ...">{{ $settings['study_title'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Events</legend>
                                                        <div class="form-group mb-3">
                                                            <label for="event_title">Event Title</label>
                                                            <input class="form-control" type="text" name="event_title"
                                                                value="{{ $settings['event_title'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="event_description">Event Info</label>
                                                            <textarea class="form-control br-8" name="event_description" rows="4" placeholder="Enter Something ...">{{ $settings['event_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Testimonials
                                                        </legend>
                                                        <div class="form-group mb-3">
                                                            <label for="testimonial_title">Testimonials</label>
                                                            <input class="form-control" type="text"
                                                                name="testimonial_title"
                                                                value="{{ $settings['testimonial_title'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="testimonial_description">Testimonial Info</label>
                                                            <textarea class="form-control br-8" name="testimonial_description" rows="4" placeholder="Enter Something ...">{{ $settings['testimonial_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">University
                                                        </legend>
                                                        <div class="form-group mb-3">
                                                            <label for="uni_title">University</label>
                                                            <input class="form-control" type="text" name="uni_title"
                                                                value="{{ $settings['uni_title'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="rep_description">Representative</label>
                                                            <textarea class="form-control br-8" name="rep_description" rows="4" placeholder="Enter Something ...">{{ $settings['rep_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Testimonials
                                                        </legend>
                                                        <div class="form-group mb-3">
                                                            <label for="testimonial_title">Testimonials</label>
                                                            <input class="form-control" type="text"
                                                                name="testimonial_title"
                                                                value="{{ $settings['testimonial_title'] ?? '' }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="testimonial_description">Testimonial Info</label>
                                                            <textarea class="form-control br-8" name="testimonial_description" rows="4" placeholder="Enter Something ...">{{ $settings['testimonial_description'] ?? '' }}</textarea>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Left Column: FAQ Image -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="home">Select FAQ Image </label>
                                                        <div class="custom-file">
                                                            <input class="form-control faq_image" id="faq_image_input"
                                                                data-default-file="{{ $settings['faq_image'] ? asset($settings['faq_image']) : '' }}"
                                                                type="file" name="faq_image" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Right Column: FAQ Section -->
                                                <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">FAQ</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="faq_name">FAQ Name</label>
                                                                    <input class="form-control" type="text"
                                                                        name="faq_name"
                                                                        value="{{ $settings['faq_name'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="faq_title">FAQ Title</label>
                                                                    <textarea class="form-control br-8" name="faq_title" rows="4" placeholder="Enter Something ...">{{ $settings['faq_title'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Left Column: FAQ Image -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="home">Select Page Banner Image </label>
                                                        <div class="custom-file">
                                                            <input class="form-control page_img" id="page_img"
                                                                data-default-file="{{ $settings['page_img'] ? asset($settings['page_img']) : '' }}"
                                                                type="file" name="page_img" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 mt-2">
                                                    <label for="whatsapp">Whatsapp Number</label>
                                                    <textarea class="form-control br-8" name="whatsapp" rows="4" placeholder="Enter Something ...">{{ $settings['whatsapp'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-md-12">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">Commitment</legend>
                                                        <div class="row">
                                                            {{-- First Row --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="member_name">Members</label>
                                                                    <input class="form-control" type="text"
                                                                        name="member_name"
                                                                        value="{{ $settings['member_name'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="member_num">Member Number</label>
                                                                    <textarea class="form-control br-8" name="member_num" rows="4" placeholder="Enter Something ...">{{ $settings['member_num'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>

                                                            {{-- Second Row --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="experience_name">Experience</label>
                                                                    <input class="form-control" type="text"
                                                                        name="experience_name"
                                                                        value="{{ $settings['experience_name'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="experience_num">Experience Number</label>
                                                                    <textarea class="form-control br-8" name="experience_num" rows="4" placeholder="Enter Something ...">{{ $settings['experience_num'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>

                                                            {{-- Third Row --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="location_name">Convenient Locations</label>
                                                                    <input class="form-control" type="text"
                                                                        name="location_name"
                                                                        value="{{ $settings['location_name'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="location_num">No of Locations</label>
                                                                    <textarea class="form-control br-8" name="location_num" rows="4" placeholder="Enter Something ...">{{ $settings['location_num'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>

                                                            {{-- Fourth Row --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="student_name">Happy Students</label>
                                                                    <input class="form-control" type="text"
                                                                        name="student_name"
                                                                        value="{{ $settings['student_name'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="student_num">No of Students</label>
                                                                    <textarea class="form-control br-8" name="student_num" rows="4" placeholder="Enter Something ...">{{ $settings['student_num'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Right Column: FAQ Section -->
                                                {{-- <div class="col-md-6">
                                                    <fieldset class="border p-3 mb-3">
                                                        <legend class="float-none w-auto legend-title">FAQ</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="faq_name">FAQ Name</label>
                                                                    <input class="form-control" type="text"
                                                                        name="faq_name"
                                                                        value="{{ $settings['faq_name'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="faq_title">FAQ Title</label>
                                                                    <textarea class="form-control br-8" name="faq_title" rows="4" placeholder="Enter Something ...">{{ $settings['faq_title'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update Setting</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        function selfChoice(value) {
            var option = new Choices(
                value, {
                    allowHTML: true,
                    removeItemButton: true,
                    fuseOptions: {
                        includeScore: true
                    },
                }
            );
        }
        selfChoice('#reviews');
        selfChoice('#services');
        selfChoice('#projects');
    </script>
@endsection
