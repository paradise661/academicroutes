@extends('layouts.admin.master')
@section('title', 'Edit ' . $companycategory->name . ' - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Category - {{ $companycategory->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('companycategory.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('companycategory.update', $companycategory->id) }}"
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
                                            type="text" name="name" value="{{ old('name', $companycategory->name) }}"
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
                                        <label class="form-label" for="basic-default-slug">Slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" id=""
                                            type="text" name="slug" value="{{ old('slug', $companycategory->slug) }}"
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
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $companycategory->description) }}</textarea>
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
                                        value="{{ old('seo_title', $companycategory->seo_title) }}"
                                        placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description', $companycategory->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords', $companycategory->seo_keywords) }}"
                                        placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $companycategory->seo_schema) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($companycategory->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3" @if ($companycategory->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>
                            <hr class="shadow-sm">

                            <!-- Image Section -->
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Companycategory Image</label>
                                <div class="custom-file">
                                    <input class="form-control" id="image_input" type="file" name="image"
                                        accept="image/*" onchange="previewImage()">
                                </div>
                                @if ($companycategory->image)
                                    <img class="mt-2 old-image"
                                        src="{{ asset('admin/images/companycategory/' . $companycategory->image) }}"
                                        width="100">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Icon Section -->
                            <div class="form-group mb-3 mt-2">
                                <label for="icon">Companycategory Icon</label>
                                <div class="custom-file">
                                    <input class="form-control" id="icon_input" type="file" name="icon"
                                        accept="image/*" onchange="previewIcon()">
                                </div>
                                @if ($companycategory->icon)
                                    <img class="mt-2 old-icon"
                                        src="{{ asset('admin/images/companycategory/' . $companycategory->icon) }}"
                                        width="100">
                                @endif
                                @error('icon')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footers d-flex justify-content-between">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
