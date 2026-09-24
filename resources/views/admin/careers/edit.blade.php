@extends('layouts.admin.master')
@section('title', 'Edit ' . $career->name . ' - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit careers - {{ $career->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('careers.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('careers.update', $career->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                            name="name" value="{{ old('name', $career->name) }}"
                                            placeholder="Enter Name">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="location">Company Location</label>
                                        <input class="form-control br-8 @error('location') is-invalid @enderror"
                                            type="text" name="location" value="{{ old('location', $career->location) }}"
                                            placeholder="Enter Company Location">
                                        @error('location')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="number">No. of Vacancy/s</label>
                                        <input class="form-control br-8 @error('number') is-invalid @enderror"
                                            type="text" name="number" value="{{ old('number', $career->number) }}"
                                            placeholder="Enter No. of Vacancy/s">
                                        @error('number')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="salary">Offered Salary</label>
                                        <input class="form-control br-8 @error('salary') is-invalid @enderror"
                                            type="text" name="salary" value="{{ old('salary', $career->salary) }}"
                                            placeholder="Enter Offered Salary">
                                        @error('salary')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="experiance">Experiance</label>
                                        <input class="form-control br-8 @error('experiance') is-invalid @enderror"
                                            type="text" name="experiance"
                                            value="{{ old('experiance', $career->experiance) }}"
                                            placeholder="Enter Experiance">
                                        @error('experiance')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="deadline">Deadline to Apply</label>
                                        <input class="form-control br-8 @error('deadline') is-invalid @enderror"
                                            type="date" name="deadline" value="{{ old('deadline', $career->deadline) }}"
                                            placeholder="Enter Deadline to Apply">
                                        @error('deadline')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="type">Job Type</label>
                                        <select class="form-select" id="type" name="type">
                                            <option>Select Job Type</option>
                                            <option class="p-3"
                                                value="Full Time(Onsite)"{{ $career->type == 'Full Time(Onsite)' ? ' selected' : '' }}>
                                                Full Time(Onsite)</option>
                                            <option class="p-3"
                                                value="Part Time(Onsite)"{{ $career->type == 'Part Time(Onsite)' ? ' selected' : '' }}>
                                                Part Time(Onsite)</option>
                                            <option class="p-3"
                                                value="Full Time(Remote)"{{ $career->type == 'Full Time(Remote)' ? ' selected' : '' }}>
                                                Full Time(Remote)</option>
                                            <option class="p-3"
                                                value="Part Time(Remote)"{{ $career->type == 'Part Time(Remote)' ? ' selected' : '' }}>
                                                Part Time(Remote)</option>
                                            <option class="p-3"
                                                value="Freelance"{{ $career->type == 'Freelance' ? ' selected' : '' }}>
                                                Freelance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="level">Job Level</label>
                                        <select class="form-select" id="level" name="level">
                                            <option>Select Job Level</option>
                                            <option class="p-3"
                                                value="Intern"{{ $career->level == 'Intern' ? ' selected' : '' }}>Intern
                                            </option>
                                            <option class="p-3"
                                                value="Junior/Entry Level"{{ $career->level == 'Junior/Entry Level' ? ' selected' : '' }}>
                                                Junior/Entry Level
                                            </option>
                                            <option class="p-3"
                                                value="Mid/Intermediate Level"{{ $career->level == 'Mid/Intermediate Level' ? ' selected' : '' }}>
                                                Mid/Intermediate Level
                                            </option>
                                            <option class="p-3"
                                                value="Senior/Lead Level"{{ $career->level == 'Senior/Lead Level' ? ' selected' : '' }}>
                                                Senior/Lead Level</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $career->description) }}</textarea>
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
                                    <option class="p-3" value="0"
                                        @if ($career->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($career->status == 1) selected @endif
                                        value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $career->order) }}" placeholder="Enter Order">
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
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($career->image)
                                                    @php
                                                        $feature = get_media($career->image ?? '');
                                                    @endphp
                                                    @if ($feature)
                                                        <img id="feature_img" src="{{ asset($feature->fullurl) }}"
                                                            alt="{{ $feature->alt }}">
                                                    @else
                                                        <img id="feature_img"
                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                            alt="upload-image">
                                                    @endif
                                                @else
                                                    <img class="custom-width" id="feature_img"
                                                        src="{{ asset('admin/assets/images/upload.png') }}"
                                                        alt="upload-image">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove"
                                        href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $career->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success" href="{{ route('careersingle', $career->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a>
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
