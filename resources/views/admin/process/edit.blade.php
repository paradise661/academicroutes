@extends('layouts.admin.master')
@section('title', 'Edit ' . $process->name . ' - AREC')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Process - {{ $process->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('process.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </a>
                </small>
            </div>

            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('process.update', $process->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="name"
                                            type="text" name="name" value="{{ old('name', $process->name) }}"
                                            placeholder="Enter Name">
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $process->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="card-body card shadow br-8">
                    <div class="form-group mb-3 d-flex align-items-center">
                        <label class="m-0 p-0" for="status">Status</label>
                        <select class="form-select ms-5" id="status" name="status">
                            <option value="0" @if ($process->status == 0) selected @endif>Draft</option>
                            <option value="1" @if ($process->status == 1) selected @endif>Publish
                            </option>
                        </select>
                    </div>
                    <hr class="shadow-sm">

                    <div class="form-group mb-3 mt-2">
                        <label for="image">Process Image</label>
                        <input class="form-control" id="image_input" type="file" name="image" accept="image/*"
                            onchange="previewImage()">
                        @if ($process->image)
                            <img class="mt-2 old-image" src="{{ asset('admin/images/process/' . $process->image) }}"
                                width="100">
                        @endif
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr class="shadow-sm">

                    <div class="form-group mb-3 d-flex align-items-center">
                        <label for="order">Order</label>
                        <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number" name="order"
                            value="{{ old('order', $process->order) }}" placeholder="Enter Order">
                        @error('order')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr class="shadow-sm">

                    <div class="card-footer d-flex justify-content-between">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa-solid fa-rotate"></i> Update
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
