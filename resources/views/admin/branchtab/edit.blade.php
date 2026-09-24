@extends('layouts.admin.master')
@section('name', 'Edit ' . $branchtab->name)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Branch tabs - {{ $branchtab->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('branchtab.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-6">
                <form class="row" method="POST" action="{{ route('branchtab.update', $branchtab->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="col-md-12">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label class="m-0 p-0" for="name">Name</label>
                                        <input class="form-control ms-5 br-8 @error('name') is-invalid @enderror"
                                            id="name" type="text" name="name"
                                            value="{{ old('name', $branchtab->name) }}" placeholder="Enter Name">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label class="m-0 p-0">Status</label>
                                        <select class="form-select ms-5" id="status" name="status">
                                            <option class="p-3" value="0"
                                                @if ($branchtab->status == 0) selected @endif>Draft</option>
                                            <option class="p-3" value="1"
                                                @if ($branchtab->status == 1) selected @endif>Publish</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label for="order">Order</label>
                                        <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                            name="order" value="{{ old('order', $branchtab->order) }}"
                                            placeholder="Enter Order">
                                        @error('order')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Link input added here -->
                                <div class="col-12">
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label class="m-0 p-0" for="link">Location</label>
                                        <input class="form-control ms-5 br-8 @error('link') is-invalid @enderror"
                                            id="link" type="url" name="link"
                                            value="{{ old('link', $branchtab->link) }}" placeholder="Enter Link URL">
                                        @error('link')
                                            <div class="invalid-feedback" role="alert" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footers mt-4">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                            Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
