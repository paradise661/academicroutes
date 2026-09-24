@extends('layouts.admin.master')
@section('title', 'Edit ' . $popup->name)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Goal - {{ $popup->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('popup.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('popup.update', $popup->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $popup->name) }}" placeholder="Enter Name">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $popup->description) }}</textarea>
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
                                    <option class="p-3" value="0" @if ($popup->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($popup->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $popup->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Popup Image</label>
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
                                    value="{{ old('image', $popup->image) }}">
                                @if ($popup->image)
                                    <img class="mt-2 old-image" src="{{ asset('admin/images/popup/' . $popup->image) }}"
                                        width="100">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 mt-2">
                            <label class="form-label" for="link">Link</label>
                            <input class="form-control @error('link') is-invalid @enderror" id="link" type="text"
                                name="link" placeholder="Enter Link" value="{{ old('link', $popup->link) }}" />
                            @error('link')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <hr class="shadow-sm">

                        <div class="card-footers">
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
