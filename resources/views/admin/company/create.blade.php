@extends('layouts.admin.master')
@section('title', 'Create Company - BG Group')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Company</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('company.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
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
                            {{-- <div>
                                <label for="file">Upload PDF:</label>
                                <input id="file" type="file" name="file" accept="application/pdf" required>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="url">Url</label>
                                        <input class="form-control br-8 @error('url') is-invalid @enderror" type="text"
                                            name="url" value="{{ old('url') }}" placeholder="Enter Url">
                                        @error('url')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="category">Category</label>
                                        <select class="form-select @error('category') is-invalid @enderror" id="category"
                                            name="category">
                                            <option> Select Category</option>
                                            @if ($category->isNotEmpty())
                                                @foreach ($category as $key => $value)
                                                    <option class="p-3" value="{{ $value->id }}">{{ $value->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="date">Date</label>
                                        <input class="form-control br-8 @error('date') is-invalid @enderror" type="text"
                                            name="date" value="{{ old('date') }}" placeholder="dd-mm-yyyy">
                                        @error('date')
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
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description') }}</textarea>
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
                                        value="{{ old('seo_title') }}" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description') }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords') }}" placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema') }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="1">Publish</option>
                                    <option class="p-3" value="0">Draft</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

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
                            <label for="image">Featured Image</label>
                            <div class="custom-file">
                                <!-- File input for selecting an image -->
                                <input class="form-control" id="image_input" type="file" name="image"
                                    accept="image/*" onchange="previewImage()">
                                <div
                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mt-3">
                                    <div class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                        <img class="custom-width" id="feature_img"
                                            src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                    </div>
                                </div>
                            </div>
                        </div>

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
