@extends('layouts.admin.master')
@section('title', 'Edit ' . $project->name . ' - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Project - {{ $project->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('project.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('project.update', $project->id) }}"
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
                                            type="text" name="name" value="{{ old('name', $project->name) }}"
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
                                            type="text" name="slug" value="{{ old('slug', $project->slug) }}"
                                            placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="url">Url</label>
                                        <input class="form-control br-8 @error('url') is-invalid @enderror" type="text"
                                            name="url" value="{{ old('url', $project->url) }}"
                                            placeholder="Enter url Name">
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
                                                    <option class="p-3" value="{{ $value->id }}"
                                                        {{ $value->id == $project->category ? 'selected' : '' }}>
                                                        {{ $value->name }}
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
                                            name="date" value="{{ old('date', $project->date) }}"
                                            placeholder="dd-mm-yyyy">
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
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- New PDF Upload Section -->
                            <div class="form-group mb-3">
                                <label for="file">Upload PDF:</label>
                                <input class="form-control" type="file" name="file">

                                @if ($project->file)
                                    <div class="mt-2">
                                        <label>Previously Uploaded File:</label>
                                        <a class="btn btn-sm btn-outline-primary"
                                            href="{{ asset('storage/' . $project->file) }}" target="_blank">
                                            <i class="fa-solid fa-file-pdf"></i> View PDF
                                        </a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($project->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($project->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $project->order) }}"
                                    placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                {{-- <a class="btn btn-sm btn-success" href="{{ route('projectsingle', $project->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a> --}}
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
