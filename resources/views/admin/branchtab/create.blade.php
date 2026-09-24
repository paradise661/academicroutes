@extends('layouts.admin.master')

@section('title', 'Create New Branch')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4 p-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Create Branch tabs</h3>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('branchtab.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>

            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('branchtab.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Branch Fields -->
                    <div class="col-md-12">
                        <div class="card-body card font-weight-bold br-8 mb-3">
                            {{-- @foreach ($fields as $name => $label)
                                <div class="form-group font-weight-bold mb-3">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    @if ($name == 'description')
                                        <textarea class="form-control ckeditor br-8 @error($name) is-invalid @enderror" id="{{ $name }}"
                                            name="{{ $name }}" rows="10" placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea>
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
                            @endforeach --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label for="name">Name </label>
                                        <input class="form-control ms-5 @error('name') is-invalid @enderror" type="text"
                                            name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label for="link">Location </label>
                                        <input class="form-control ms-5 @error('link') is-invalid @enderror" type="url"
                                            name="link" value="{{ old('link') }}" placeholder="Enter Link URL">
                                        @error('link')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
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
                                </div>

                                <div class="col-6">

                                    <div class="form-group mb-3 d-flex align-items-center">
                                        <label class="m-0 p-0">Status</label>
                                        <select class="form-select ms-5" id="status" name="status">
                                            <option class="p-3" value="1">Publish</option>
                                            <option class="p-3" value="0">Draft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footers ">
                            <button class="btn btn-sm btn-primary w-full" type="submit"><i class="fa-solid fa-plus"></i>
                                Publish</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
@endsection

<!-- Style -->
<style>
    label {
        font-weight: 500 !important;
        text-transform: uppercase;
        margin-bottom: 5px;
        line-height: 200%;
    }
</style>
