@extends('layouts.admin.master')
@section('title', 'Edit ' . $social->name)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Social - {{ $social->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('social.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('social.update', $social->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            {{-- Name --}}
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $social->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Icon</label>
                                <input class="form-control br-8 @error('icon') is-invalid @enderror" type="text"
                                    name="icon" value="{{ old('icon', $social->icon) }}" placeholder="Enter icon">
                                @error('icon')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- links --}}
                            <div class="form-group mb-3">
                                <label for="name">Link</label>
                                <input class="form-control br-8 @error('link') is-invalid @enderror" type="text"
                                    name="link" value="{{ old('link', $social->link) }}" placeholder="Enter link">
                                @error('link')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">

                            {{-- order --}}
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $social->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Icon Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false" data-default-file="{{ $social->image }}" type="file"
                                        name="image">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
