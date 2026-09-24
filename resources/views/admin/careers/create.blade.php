@extends('layouts.admin.master')
@section('title', 'Create New Careers - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Career</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('careers.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('careers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4 mb-3">
                            <div class="row">
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="location">Company Location</label>
                                        <input class="form-control br-8 @error('location') is-invalid @enderror"
                                            type="text" name="location" value="{{ old('location') }}"
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
                                            type="text" name="number" value="{{ old('number') }}"
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
                                            type="text" name="salary" value="{{ old('salary') }}"
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
                                            type="text" name="experiance" value="{{ old('experiance') }}"
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
                                            type="date" name="deadline" value="{{ old('deadline') }}"
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
                                            <option class="p-3" value="Full Time(Onsite)">Full Time(Onsite)</option>
                                            <option class="p-3" value="Part Time(Onsite)">Part Time(Onsite)</option>
                                            <option class="p-3" value="Full Time(Remote)">Full Time(Remote)</option>
                                            <option class="p-3" value="Part Time(Remote)">Part Time(Remote)</option>
                                            <option class="p-3" value="Past Time">Freelance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="level">Job Level</label>
                                        <select class="form-select" id="level" name="level">
                                            <option>Select Job Level</option>
                                            <option class="p-3" value="Intern">Intern</option>
                                            <option class="p-3" value="Junior/Entry Level">Junior/Entry Level
                                            </option>
                                            <option class="p-3" value="Mid/Intermediate Level">Mid/Intermediate Level
                                            </option>
                                            <option class="p-3" value="Senior/Lead Level">Senior/Lead Level</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6"></div>
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

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                <img class="custom-width" id="feature_img"
                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                    alt="upload-image">
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove"
                                        href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image') }}">
                                </div>
                            </div>

                            <hr class="shadow-sm">

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
