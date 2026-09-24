@extends('layouts.admin.master')
@section('title', 'Counters')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit counter "{{ $counter->title ?? '' }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('counter.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('counter.update', $counter->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Text</label>
                                <input class="form-control @error('name') is-invalid @enderror" id=""
                                    type="text" value="{{ old('name', $counter->name) }}" name="name" placeholder="">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Number</label>
                                <input class="form-control @error('count_num') is-invalid @enderror" id=""
                                    type="number" value="{{ old('count_num', $counter->count_num) }}" name="count_num"
                                    placeholder="1234">
                                @error('count_num')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">After Number</label>
                                <input class="form-control @error('num_postfix') is-invalid @enderror" id=""
                                    type="text" value="{{ old('num_postfix', $counter->num_postfix) }}"
                                    name="num_postfix" placeholder="K+">
                                @error('num_postfix')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" type="number" name="order"
                                value="{{ old('order', $counter->order) }}">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="basic-default-fullname">Icon</label>
                            <input class="form-control @error('icon') is-invalid @enderror" id="" type="text"
                                name="icon" value="{{ old('icon', $counter->icon) }}">
                            @error('icon')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr class="shadow-sm">
                    <div class="form-group mb-3 mt-2">
                        <label for="image">Catalog Icon</label>
                        <div class="custom-file">
                            <!-- Image preview and modal button -->

                            <!-- File input for selecting a new image -->
                            <input class="form-control" id="image_input" type="file" name="image" accept="image/*"
                                onchange="previewImage()">
                        </div>
                    </div>
                    <div class="form-group mb-3 mt-2">
                        </a>

                        <input class="" id="feature_id" type="hidden" name="image"
                            value="{{ old('image', $catalog->image) }}">
                        @if ($catalog->image)
                            <img class="mt-2 old-image" src="{{ asset('admin/images/catalog/' . $catalog->image) }}"
                                width="100">
                        @endif
                        @error('image')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>

            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-rotate"></i> Update</button>
            </form>
        </div>
    </div>
    </div>
@endsection
