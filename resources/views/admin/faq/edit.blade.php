@extends('layouts.admin.master')
@section('title', 'Edit ' . $faq->name . ' - AREC')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit FAQ - {{ $faq->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('faq.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('faq.update', $faq->id) }}"
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
                                            type="text" name="name" value="{{ old('name', $faq->name) }}"
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
                                            type="text" name="slug" value="{{ old('slug', $faq->slug) }}"
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
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $faq->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($faq->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($faq->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>
                            <hr class="shadow-sm">
                            <div class="form-group mb-3 mt-2">
                                <label for="image">FAQ Image</label>
                                <div class="custom-file">
                                    <!-- Image preview and modal button -->

                                    <!-- File input for selecting a new image -->
                                    <input class="form-control" id="image_input" type="file" name="image"
                                        accept="image/*" onchange="previewImage()">
                                </div>
                            </div>
                            <div class="form-group mb-3 mt-2">
                                </a>

                                <input class="" id="feature_id" type="hidden" name="image"
                                    value="{{ old('image', $faq->image) }}">
                                @if ($faq->image)
                                    <img class="mt-2 old-image" src="{{ asset('admin/images/faq/' . $faq->image) }}"
                                        width="100">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <hr class="shadow-sm">
                        <div class="form-group mb-3 d-flex align-items-center">
                            <label for="order">Order</label>
                            <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                name="order" value="{{ old('order', $faq->order) }}" placeholder="Enter Order">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr class="shadow-sm">

                        <div class="card-footers d-flex justify-content-between">

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
