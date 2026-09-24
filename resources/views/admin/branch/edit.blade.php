@extends('layouts.admin.master')
@section('title', 'Edit ' . $branch->title)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Branches - {{ $branch->title }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('branch.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('branch.update', $branch->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <!-- Title Field -->
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input class="form-control br-8 @error('title') is-invalid @enderror" id="title"
                                    type="text" name="title" value="{{ old('title', $branch->title) }}"
                                    placeholder="Enter title">
                                @error('title')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Location Field -->
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input class="form-control br-8 @error('location') is-invalid @enderror" id="location"
                                    type="text" name="location" value="{{ old('location', $branch->location) }}"
                                    placeholder="Enter location">
                                @error('location')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Email Field -->
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input class="form-control br-8 @error('email') is-invalid @enderror" id="email"
                                    type="email" name="email" value="{{ old('email', $branch->email) }}"
                                    placeholder="Enter email">
                                @error('email')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Phone Field -->
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control br-8 @error('phone') is-invalid @enderror" id="phone"
                                    type="tel" name="phone" value="{{ old('phone', $branch->phone) }}"
                                    placeholder="Enter phone number">
                                @error('phone')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Branch Name Field -->
                            <div class="form-group mb-3">
                                <label for="branch_name">Branch Name</label>
                                <input class="form-control br-8 @error('branch_name') is-invalid @enderror" id="branch_name"
                                    type="text" name="branch_name"
                                    value="{{ old('branch_name', $branch->branch_name) }}" placeholder="Enter branch name">
                                @error('branch_name')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tabs">Branch Tabs</label>
                                <select class="form-select" id="tabs" name="tabs">
                                    @foreach ($tabs as $tab)
                                        <option value="{{ $tab->id }}"
                                            {{ in_array($tab->id, old('tabs', $branch->tabs ? collect($branch->tabs)->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                                            {{ $tab->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <!-- Description Field -->
                            {{-- <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $branch->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        </div>

                        <!-- SEO Section -->
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">SEO Title</label>
                                    <input class="form-control br-8" id="seo_title" type="text" name="seo_title"
                                        value="{{ old('seo_title', $branch->seo_title) }}" placeholder="Enter SEO Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control br-8" id="seo_description" name="seo_description" rows="4"
                                        placeholder="Enter SEO Description">{{ old('seo_description', $branch->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">SEO Schema</label>
                                    <textarea class="form-control br-8" id="seo_schema" name="seo_schema" rows="4" placeholder="Enter SEO Schema">{{ old('seo_schema', $branch->seo_schema) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control br-8" id="seo_keywords" name="seo_keywords" rows="4"
                                        placeholder="Enter SEO Keywords">{{ old('seo_keywords', $branch->seo_keywords) }}</textarea>
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
                                    <option class="p-3" value="0"
                                        @if ($branch->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3" value="1"
                                        @if ($branch->status == 1) selected @endif>
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $branch->order) }}" placeholder="Enter Order">
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
                                        data-show-remove="false" data-default-file="{{ $branch->image }}" type="file"
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
