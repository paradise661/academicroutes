@extends('layouts.admin.master')

@section('title', 'Create - BG Group')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Whyus</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('whyus.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-4">
                <form class="row" method="POST" action="{{ route('whyus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Left Column (whyus Information) -->
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <!-- Name Field -->
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

                            <!-- Description Field -->
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

                            <!-- URL Field -->
                            <div class="form-group mb-3">
                                <label for="link">URL</label>
                                <input class="form-control br-8 @error('link') is-invalid @enderror" type="text"
                                    name="link" value="{{ old('link') }}" placeholder="Enter URL">
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
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>

                            <!-- Order Field -->
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order') }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <!-- Image Upload Field -->
                            <label for="image">Featured Image</label>
                            <div class="custom-file">
                                <input class="form-control" id="image_input" type="file" name="image" accept="image/*"
                                    onchange="previewImage()">
                                <div
                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mt-3">
                                    <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                        <img class="custom-width" id="feature_img"
                                            src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                    </div>
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <!-- Submit Button -->
                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-plus"></i>
                                    Publish</button>
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
