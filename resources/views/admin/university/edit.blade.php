@extends('layouts.admin.master')
@section('title', $abroad ? 'University in ' . $abroad->name : 'University')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit university - {{ $university->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary"
                        href="{{ $abroad ? route('universities.index', ['abroad_id' => $abroad->id]) : '#' }}">W
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </a>

                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST"
                    action="{{ route('universities.update', ['abroad_id' => $abroad->id, 'university' => $university->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Main Content -->
                    <div class="col-md-8">
                        <div class="card card-body main-description shadow br-8 p-4">

                            <!-- Name Field -->
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $university->name) }}" placeholder="Enter title">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $university->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Link</label>
                                <input class="form-control br-8 @error('link') is-invalid @enderror" type="text"
                                    name="link" value="{{ old('link', $university->link) }}" placeholder="Enter link">
                                @error('link')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($university->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3" value="1" @if ($university->status == 1) selected @endif>
                                        Publish</option>
                                </select>
                            </div>
                        </div>

                        <hr class="shadow-sm">

                        <div class="form-group mb-3 d-flex align-items-center">
                            <label for="order">Order</label>
                            <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                name="order" value="{{ old('order', $university->order) }}" placeholder="Enter Order">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <hr class="shadow-sm">

                        <div class="form-group mb-3 mt-2">
                            <label for="image">Featured Image</label>
                            <div class="custom-file">
                                <input class="dropify @error('image') is-invalid @enderror" id="image"
                                    data-show-remove="false" data-default-file="{{ $university->image }}" type="file"
                                    name="image">
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="shadow-sm">

                        <div class="card-footers d-flex justify-content-center">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
