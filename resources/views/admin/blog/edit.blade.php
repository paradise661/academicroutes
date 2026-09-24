@extends('layouts.admin.master')
@section('title', 'Edit ' . $blog->name . ' - Shrayash')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Posts - {{ $blog->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('blog.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('blog.update', $blog->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id=""
                                            type="text" name="name" value="{{ old('name', $blog->name) }}"
                                            placeholder="">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-slug">slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" id=""
                                            type="text" name="slug" value="{{ old('slug', $blog->slug) }}"
                                            placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $blog->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title', $blog->seo_title) }}" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description', $blog->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords', $blog->seo_keywords) }}"
                                        placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $blog->seo_schema) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($blog->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($blog->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>


                             <hr class="shadow-sm">
                        <div class="form-group mb-3 mt-2">
                            <label for="image">Feature Image</label>
                                <div class="custom-file">
                                <!-- Image preview and modal button -->
                                <div class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                    <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                 
 
                            </div>
                        </div>
        
                                <!-- File input for selecting a new image -->
                        <input type="file" name="image" id="image_input" class="form-control" accept="image/*" onchange="previewImage()">
                            </div>
                        </div>
                                <div class="form-group mb-3 mt-2">
                                    </a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $blog->image) }}">
                                         @if ($blog->image)
                                        <img src="{{ asset('admin/images/blog/' . $blog->image) }}" width="100"
                                        class="mt-2 old-image">
                                @endif
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                        @include('admin.blog.includes.category')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
