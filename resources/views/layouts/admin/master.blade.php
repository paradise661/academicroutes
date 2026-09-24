<!DOCTYPE html>
<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free" lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> @yield('title', 'AR Education Consultacy') </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $setting['site_main_logo'] ? asset($setting['site_main_logo']) : '' }}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/choices/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/boostrap-new.css') }}">
    <link class="template-customizer-core-css" rel="stylesheet"
        href="{{ asset('admin/assets/vendor/css/core.css') }}" />
    <link class="template-customizer-theme-css" rel="stylesheet"
        href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dropify.css') }}">
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fancy.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/inner/dropzone.min.css') }}">
    <script src="{{ asset('admin/assets/inner/dropzone.js') }}"></script>
    <style>
        .dash-icon {
            font-size: 2.25rem !important;
        }

        .ck-editor__editable[role="textbox"] {
            min-height: 400px;
        }

        .ck-content .image {
            max-width: 80%;
            margin: 20px auto;
        }

        @media (min-width: 1200px) {
            .modal-xl {
                width: 90vw !important;
                max-width: 90vw !important;
            }
        }

        .thumbnails.media-wrapper {
            width: 200px;
            height: 200px;
            overflow: hidden;
        }

        .thumbnails.media-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            cursor: pointer;
        }

        .media-wrapper img.custom-width {
            width: 50px !important;
            height: 50px !important;
            object-fit: contain !important;
        }

        .card_check .thumbnails {
            border: 3px solid red;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            background: #e7e7ff;
            background-color: #7174fe;
            color: white;
        }

        .package_destination {
            height: 400px;
            overflow-x: scroll;
            border: 1px #ddd solid;
            padding: 15px;
        }

        .panel-header {
            background: #efefef;
            padding: 10px;
            text-align: center;
        }

        .panel-header h4 {
            margin: 0;
        }

        ul li label {
            padding-left: 10px;
        }

        ul {
            list-style: none;
            line-height: 20px !important;
        }

        .upload-media {
            min-height: 200px;
            width: 100%;
            overflow: hidden;
        }

        li.col.px-0.mb-1.medias,
        .fro-dropzone-image {
            border: 1px dashed;
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.admin.sidebar')
            <div class="layout-page">
                @include('layouts.admin.nav')
                <div class="content-wrapper">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('layouts.admin.footer')
                    <div class="modal fade" id="featureModel" tabindex="-1" aria-labelledby="featureModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="featurefiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="feature-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="bannerModel" tabindex="-1" aria-labelledby="bannerModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="bannerfiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="banner-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="iconModel" tabindex="-1" aria-labelledby="iconModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="iconfiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="icon-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="footerModel" tabindex="-1" aria-labelledby="footerModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="footerfiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="footer-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="homeModel" tabindex="-1" aria-labelledby="homeModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="homefiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="home-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="videoModel" tabindex="-1" aria-labelledby="videoModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="videofiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="video-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="fimageModel" tabindex="-1" aria-labelledby="fimageModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5">Select File</h2>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                    <div id="fimagefiles">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="fimage-image-close" data-bs-dismiss="modal"
                                        type="button">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Request::segment(2) == 'setting')
                        <div class="modal fade" id="home_contactModel" tabindex="-1"
                            aria-labelledby="home_contactModelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5">Select File</h2>
                                        <button class="btn-close" data-bs-dismiss="modal" type="button"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                        <div id="home_contactfiles">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="home_contact-image-close"
                                            data-bs-dismiss="modal" type="button">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="about_contactModel" tabindex="-1"
                            aria-labelledby="about_contactModelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5">Select File</h2>
                                        <button class="btn-close" data-bs-dismiss="modal" type="button"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                        <div id="about_contactfiles">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="about_contact-image-close"
                                            data-bs-dismiss="modal" type="button">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Request::segment(2) == 'project' || Request::segment(2) == 'page')
                        @if (Request::segment(3) == 'create' || Request::segment(4) == 'edit')
                            <div class="modal fade" id="mapModel" tabindex="-1" aria-labelledby="mapModelLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5">Select File</h2>
                                            <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                            <div id="mapfiles">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="map-image-close"
                                                data-bs-dismiss="modal" type="button">Select</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="galleryModel" tabindex="-1"
                                aria-labelledby="galleryModelLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5">Select File</h2>
                                            <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="height: 80vh;overflow-y: auto;">
                                            <div id="galleryfiles">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-none" id="gallery-image-value" data-value=""></div>
                                            <button class="btn btn-primary" id="gallery-image-close"
                                                data-bs-dismiss="modal" type="button">Select</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-new.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/toast-new.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert-new.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropify-new.js') }}"></script>
    <script src="{{ asset('admin/assets/js/fancybox-new.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/choices/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/new-custom.js') }}"></script>
    @yield('scripts')

    <script>
        $(function() {

            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
            });

            $(".flatpicker").flatpickr({
                dateFormat: "Y-m-d",
                altInput: true,
            });

            $('.select2').select2({
                placeholder: "Select",
                allowClear: false
            });

            ckeditor('ckeditor');
            ckeditor('ckeditor1');
            ckeditor('reasonckeditor');
        });
    </script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif

</body>

</html>
