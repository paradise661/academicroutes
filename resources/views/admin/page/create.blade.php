@extends('layouts.admin.master')
@section('title', 'Create New Page - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Page</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('page.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('page.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description_2">Title</label>
                                <textarea class="form-control @error('description_2') is-invalid @enderror" id="description_2" name="description_2"
                                    rows="2" placeholder="Enter Page Title">{{ old('description_2') }}</textarea>
                                @error('description_2')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                name="description" rows="10" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Second Description Field -->

                        <!-- SEO Section -->
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title') }}" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description') }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords') }}" placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema') }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Sidebar Section -->
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="1">Publish</option>
                                    <option class="p-3" value="0">Draft</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Template</label>
                                <select class="form-select ms-3" id="template" name="template"
                                    onchange="toggleImageFields()">
                                    <option class="p-3" value="0">Default Template</option>
                                    <option class="p-3" value="1">Side-To-Side</option>
                                    <option class="p-3" value="2">About Us</option>
                                    <option class="p-3" value="3">Contact Us</option>
                                    <option class="p-3" value="4">Teams</option>
                                    <option class="p-3" value="5">Our Commitment</option>
                                    <option class="p-3" value="6">Message from Chairman</option>
                                    <option class="p-3" value="7">Download</option>
                                    <option class="p-3" value="8">Blogs</option>
                                    <option class="p-3" value="9">Services</option>
                                    <option class="p-3" value="10">Mission Vision</option>
                                    <option class="p-3" value="11">Blog Category</option>
                                    <option class="p-3" value="12">Projects</option>
                                    <option class="p-3" value="13">Project Location</option>
                                    <option class="p-3" value="15">Careers</option>
                                    <option class="p-3" value="16">Client Registration</option>
                                    <option class="p-3" value="17">Message from Director</option>
                                    <option class="p-3" value="14">Sitemap</option>
                                    <option class="p-3" value="18">Privacy Policy</option>
                                </select>
                            </div>
                        </div>

                        <hr class="shadow-sm">

                        <label for="image">Featured Image</label>
                        <div class="custom-file">
                            <input class="form-control" id="image_input" type="file" name="image" accept="image/*"
                                onchange="previewImage()">
                            <div
                                class="upload-media border border-2 d-flex justify-content-center align-items-center mt-3">
                                <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                    <img class="custom-width" id="image"
                                        src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Image for Mission Vision template -->
                        <div id="image_2_div" style="display: none;">
                            <label for="image_2">Second Featured Image</label>
                            <input class="form-control" id="image_2_input" type="file" name="image_2"
                                accept="image/*" onchange="previewSecondImage()">
                            <div
                                class="upload-media border border-2 d-flex justify-content-center align-items-center mt-3">
                                <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                    <img class="custom-width" id="image_2"
                                        src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                </div>
                            </div>
                        </div>

                        <hr class="shadow-sm">

                        <div class="card-footers">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-plus"></i>
                                Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function previewImage() {
            const fileInput = document.getElementById('image_input');
            const imagePreview = document.getElementById('image');
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '{{ asset('admin/assets/images/upload.png') }}';
            }
        }

        function previewSecondImage() {
            const fileInput = document.getElementById('image_2_input');
            const imagePreview = document.getElementById('image_2');
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '{{ asset('admin/assets/images/upload.png') }}';
            }
        }

        function toggleImageFields() {
            const template = document.getElementById('template').value;
            const image2Div = document.getElementById('image_2_div');

            // Adjust this condition based on which templates need the additional image
            if (template == '2' || template == '3' || template == '10') {
                image2Div.style.display = 'block'; // Show second image input
            } else {
                image2Div.style.display = 'none'; // Hide second image input
            }
        }

        // Initialize visibility based on the currently selected template
        document.addEventListener("DOMContentLoaded", function() {
            toggleImageFields();
        });
    </script>
@endsection
