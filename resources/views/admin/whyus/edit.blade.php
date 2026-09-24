@extends('layouts.admin.master')

@section('title', 'Edit ' . $whyu->name . ' - BG Group')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit - {{ $whyu->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('whyus.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-4">
                <form class="row" method="POST" action="{{ route('whyus.update', $whyu->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <!-- Left Column (whyus Information) -->
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <!-- Name Field -->
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $whyu->name) }}" placeholder="Enter Name">
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
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $whyu->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- URL Field -->
                            <div class="form-group mb-3">
                                <label for="link">URL</label>
                                <input class="form-control br-8 @error('link') is-invalid @enderror" type="text"
                                    name="link" value="{{ old('link', $whyu->link) }}" placeholder="Enter URL">
                                @error('link')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (Status, Order, and Image) -->
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <!-- Status Field -->
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option value="0" @if ($whyu->status == 0) selected @endif>Draft</option>
                                    <option value="1" @if ($whyu->status == 1) selected @endif>Publish
                                    </option>
                                </select>
                            </div>

                            <!-- Order Field -->
                            <div class="form-group mb-3">
                                <label for="order">Order</label>
                                <input class="form-control ms-1 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $whyu->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <!-- Image Upload Field -->
                            <div class="form-group mb-3 mt-2">
                                <label for="image">whyus Image</label>
                                <div class="custom-file">
                                    <input class="form-control" id="image_input" type="file" name="image"
                                        accept="image/*" onchange="previewImage()">
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="form-group mb-3 mt-2">
                                <input class="" id="feature_id" type="hidden" name="image"
                                    value="{{ old('image', $whyu->image) }}">
                                @if ($whyu->image)
                                    <img class="mt-2 old-image" src="{{ asset('admin/images/whyus/' . $whyu->image) }}"
                                        width="100">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <!-- Submit Button -->
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

@section('scripts')
    <script>
        function previewImage() {
            const fileInput = document.getElementById('image_input');
            const imagePreview = document.getElementById('feature_img');
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
    </script>
@endsection
