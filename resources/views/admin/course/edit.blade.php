@extends('layouts.admin.master')
@section('title', 'Edit ' . $course->title)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit courses - {{ $course->title }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('course.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('course.update', $course->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <!-- title Field -->
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input class="form-control br-8 @error('title') is-invalid @enderror" id="title"
                                    type="text" name="title" value="{{ old('title', $course->title) }}"
                                    placeholder="Enter title">
                                @error('title')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Description Field -->
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $course->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
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
                                    <label for="seo_title">SEO Title</label>
                                    <input class="form-control br-8" id="seo_title" type="text" name="seo_title"
                                        value="{{ old('seo_title', $course->seo_title) }}" placeholder="Enter SEO Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control br-8" id="seo_description" name="seo_description" rows="4"
                                        placeholder="Enter SEO Description">{{ old('seo_description', $course->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">SEO Schema</label>
                                    <textarea class="form-control br-8" id="seo_schema" name="seo_schema" rows="4" placeholder="Enter SEO Schema">{{ old('seo_schema', $course->seo_schema) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control br-8" id="seo_keywords" name="seo_keywords" rows="4"
                                        placeholder="Enter SEO Keywords">{{ old('seo_keywords', $course->seo_keywords) }}</textarea>
                                </div>
                            </fieldset>
                        </div>

                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <!-- Status Field -->
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($course->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3" value="1" @if ($course->status == 1) selected @endif>
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $course->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr class="shadow-sm">

                            <!-- Image Upload -->
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false" data-default-file="{{ $course->image }}" type="file"
                                        name="image">
                                    @error('image')
                                        <div class="invalid-feedback" role="alert" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <!-- Submit Button -->
                            <div class="card-footers text-center">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
