@extends('layouts.admin.master')
@section('title', 'Edit Page - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Page - {{ $page->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('page.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('page.update', $page->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text" name="name"
                                    value="{{ old('name', $page->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="10"
                                    placeholder="Enter Description">{{ old('description', $page->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Second Description -->
                            <div class="form-group mb-3">
                                <label for="description_2">Short Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description_2') is-invalid @enderror"
                                    id="description_2" name="description_2" rows="10"
                                    placeholder="Enter Second Description">{{ old('description_2', $page->description_2) }}</textarea>
                                @error('description_2')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- SEO Section -->
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title', $page->seo_title) }}" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4"
                                        placeholder="Enter Seo Description">{{ old('seo_description', $page->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords', $page->seo_keywords) }} "
                                        placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10"
                                        placeholder="Enter Seo Schema">{{ old('seo_schema', $page->seo_schema) }}</textarea>
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
                                    <option class="p-3" value="1" @if ($page->status == 1) selected @endif>
                                        Publish</option>
                                    <option class="p-3" value="0" @if ($page->status == 0) selected @endif>
                                        Draft</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Template</label>
                                <select class="form-select ms-3" id="template" name="template"
                                    onchange="toggleImageFields()">
                                    <option class="p-3" value="0" @if ($page->template == 0) selected @endif>
                                        Default Template</option>
                                    <option class="p-3" value="1" @if ($page->template == 1) selected @endif>
                                        Side-To-Side</option>
                                    <option class="p-3" value="2" @if ($page->template == 2) selected @endif>
                                        About Us</option>
                                    <option class="p-3" value="3" @if ($page->template == 3) selected @endif>
                                        Contact Us</option>
                                    <option class="p-3" value="4" @if ($page->template == 4) selected @endif>
                                        Teams</option>
                                    <option class="p-3" value="5" @if ($page->template == 5) selected @endif>
                                        Our Commitment</option>
                                    <option class="p-3" value="6" @if ($page->template == 6) selected @endif>Message from
                                        Chairman</option>
                                    <option class="p-3" value="7" @if ($page->template == 7) selected @endif>Download</option>
                                    <option class="p-3" value="8" @if ($page->template == 8) selected @endif>Blogs</option>
                                    <option class="p-3" value="9" @if ($page->template == 9) selected @endif>Services</option>
                                    <option class="p-3" value="10" @if ($page->template == 10) selected @endif>Mission Vision
                                    </option>
                                    <option class="p-3" value="11" @if ($page->template == 11) selected @endif>Blog Category
                                    </option>
                                    <option class="p-3" value="12" @if ($page->template == 12) selected @endif>Projects
                                    </option>
                                    <option class="p-3" value="13" @if ($page->template == 13) selected @endif>Project
                                        Location</option>
                                    <option class="p-3" value="15" @if ($page->template == 15) selected @endif>Careers
                                    </option>
                                    <option class="p-3" value="16" @if ($page->template == 16) selected @endif>Client
                                        Registration</option>
                                    <option class="p-3" value="17" @if ($page->template == 17) selected @endif>Message from
                                        Director</option>
                                    <option class="p-3" value="14" @if ($page->template == 14) selected @endif>Sitemap
                                    </option>
                                    <option class="p-3" value="18" @if ($page->template == 18) selected @endif>Privacy Policy
                                    </option>
                                </select>
                            </div>
                        </div>

                        <hr class="shadow-sm">

                        <label for="image">Featured Image</label>
                        <div class="custom-file">
                            <input class="form-control" id="image_input" type="file" name="image" accept="image/*"
                                onchange="previewImage()">
                            <div class="upload-media border border-2 d-flex justify-content-center align-items-center mt-3">
                                <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                    <img class="custom-width" id="image" src="{{ $page->image }}" alt="upload-image">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Image for Mission Vision template -->
                        <div id="image_2_div" style="{{ $page->template == 10 ? 'display: block;' : 'display: none;' }}">
                            <label for="image_2">Additional Image for Vision</label>
                            <input class="form-control" id="image_2_input" type="file" name="image_2" accept="image/*"
                                onchange="previewSecondImage()">
                            <div class="upload-media border border-2 d-flex justify-content-center align-items-center mt-3">
                                <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                    <img class="custom-width" id="image_2"
                                        src="{{ $page->image_2 ? $page->image_2 : asset('admin/assets/images/upload.png') }}"
                                        alt="upload-image">
                                </div>
                            </div>
                        </div>

                        <script>
                            function previewImage() {
                                const fileInput = document.getElementById('image_input');
                                const imagePreview = document.getElementById('image');
                                const file = fileInput.files[0];

                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function (e) {
                                        imagePreview.src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                }
                            }

                            function previewSecondImage() {
                                const fileInput = document.getElementById('image_2_input');
                                const imagePreview = document.getElementById('image_2');
                                const file = fileInput.files[0];

                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function (e) {
                                        imagePreview.src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
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
                            document.addEventListener("DOMContentLoaded", function () {
                                toggleImageFields();
                            });
                        </script>

                        <hr class="shadow-sm">

                        <div class="card-footers">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-save"></i>
                                Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection