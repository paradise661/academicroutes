@extends('layouts.admin.master')
@section('title', 'Edit ' . $member->name)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Members - {{ $member->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('members.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('members.update', $member->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4 mb-3">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $member->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="position">Position</label>
                                <input class="form-control br-8" type="text" name="position"
                                    value="{{ old('position', $member->position) }}" placeholder="Enter Position">
                                @error('position')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="sociallink">Facebook</label>
                                <input class="form-control br-8" type="text" name="sociallink"
                                    value="{{ old('sociallink', $member->sociallink) }}" placeholder="Enter sociallink">
                                @error('sociallink')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="sociallink1">Instagram</label>
                                <input class="form-control br-8" type="text" name="sociallink1"
                                    value="{{ old('sociallink1', $member->sociallink1) }}" placeholder="Enter sociallink">
                                @error('sociallink1')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="sociallink2">linkedin</label>
                                <input class="form-control br-8" type="text" name="sociallink2"
                                    value="{{ old('sociallink2', $member->sociallink2) }}" placeholder="Enter sociallink">
                                @error('sociallink2')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone',$member->phone) }}" class="form-control br-8" placeholder="Enter Phone">
                            </div> --}}
                            {{-- <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ old('email',$member->email) }}" class="form-control br-8" placeholder="Enter Email">
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter description">{{ old('description', $member->description) }}</textarea>
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
                                    <option class="p-3" value="0" @if ($member->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($member->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $member->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false" data-default-file="{{ $member->image }}" type="file"
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
