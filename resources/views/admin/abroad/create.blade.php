@extends('layouts.admin.master')

@section('title', 'Create New abroads')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4 p-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Create-Abroad</h3>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('abroad.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>

            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('abroad.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- functions -->
                    @php
                        $fields = [
                            'name' => 'Name',
                            // 'slug' => 'Slug',
                            'description' => 'Description',
                            // 'short_description' => 'Short Description',
                            // 'other_description' => 'Table Description',
                        ];
                        $seo = [
                            'seo_title' => 'Seo Title',
                            'seo_keywords' => 'SEO Keyword',
                            'seo_description' => 'Seo Description',
                            'seo_schema' => 'Seo Schema',
                        ];
                    @endphp

                    <div class="col-md-8">
                        <div class="card-body card font-weight-bold br-8 mb-3">

                            @foreach ($fields as $name => $label)
                                <div class="form-group font-weight-bold mb-3">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    @if ($name == 'description')
                                        <textarea class="form-control ckeditor br-8 @error($name) is-invalid @enderror" id="{{ $name }}"
                                            name="{{ $name }}" rows="10" placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea>
                                        {{-- @elseif ($name == 'other_description')
                                        <textarea name="{{ $name }}" id="{{ $name }}" rows="10"
                                            class="form-control ckeditor1 br-8 @error($name) is-invalid @enderror"
                                            placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea>
                                    @elseif($name == 'short_description')
                                        <textarea name="{{ $name }}" id="{{ $name }}" rows="4"
                                            class="form-control br-8 @error($name) is-invalid @enderror" placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea> --}}
                                    @else
                                        <input class="form-control br-8 @error($name) is-invalid @enderror" type="text"
                                            name="{{ $name }}" value="{{ old($name) }}"
                                            placeholder="Enter {{ strtolower($label) }}">
                                    @endif
                                    @error($name)
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <!-- seo sections -->
                        <div class="card-body card shadow br-8">

                            @foreach ($seo as $name => $label)
                                <div class="form-group mb-3">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    @if ($name == 'seo_description' || $name == 'seo_schema')
                                        <textarea class="form-control br-8 @error($name) is-invalid @enderror" id="{{ $name }}"
                                            name="{{ $name }}" rows="{{ $name == 'seo_schema' ? 6 : 3 }}"
                                            placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea>
                                    @else
                                        <input class="form-control br-8 @error($name) is-invalid @enderror" type="text"
                                            name="{{ $name }}" value="{{ old($name) }}"
                                            placeholder="Enter {{ strtolower($label) }}">
                                    @endif
                                    @error($name)
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Additional Fields -->
                    <div class="col-md-4">
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
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false" type="file" name="image">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Icon Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('icon_image') is-invalid @enderror" id="icon_image"
                                        data-show-remove="false" type="file" name="icon_image">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-center">
                                <button class="btn btn-sm btn-primary w-full" type="submit"><i
                                        class="fa-solid fa-plus"></i> Publish</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection

<!-- style -->

<style>
    label {
        font-weight: 500 !important;
        text-transform: uppercase;
        margin-bottom: 5px;
        line-height: 200%;
    }
</style>
