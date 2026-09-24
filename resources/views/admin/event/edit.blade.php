@extends('layouts.admin.master')
@section('title', 'Edit ' . $event->name)

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Event - {{ $event->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('event.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('event.update', $event->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <!-- Name Field -->
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $event->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="time">Time</label>
                                <input class="form-control br-8 @error('time') is-invalid @enderror" type="text"
                                    name="time" value="{{ old('time', $event->time) }}" placeholder="Enter Time">
                                @error('time')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-fullname">Date</label>
                                <input class="form-control flatpicker @error('date') is-invalid @enderror" id=""
                                    type="text" value="{{ old('date', $event->date) }}" name="date" placeholder="">
                                @error('date')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="lcoation">Location</label>
                                <input class="form-control br-8 @error('lcoation') is-invalid @enderror" type="text"
                                    name="lcoation" value="{{ old('lcoation', $event->lcoation) }}"
                                    placeholder="Enter Location">
                                @error('lcoation')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control ckeditor1 br-8 @error('short_description') is-invalid @enderror" id="short_description"
                                    name="short_description" rows="10" placeholder="Enter Short Description">{{ old('short_description', $event->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" role="alert" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Additional Event Dates Section -->
                            <div class="form-group mb-3">
                                <label>Additional Event Dates</label>
                                <div id="additional-dates">
                                    @foreach($event->eventDates as $index => $eventDate)
                                        <div class="additional-date-row mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Date</label>
                                                    <input type="date" name="additional_dates[{{ $index }}][date]" class="form-control br-8" value="{{ $eventDate->date }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Time</label>
                                                    <input type="text" name="additional_dates[{{ $index }}][time]" class="form-control br-8" value="{{ $eventDate->time }}" placeholder="e.g., 10:00 AM - 2:00 PM">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Location</label>
                                                    <input type="text" name="additional_dates[{{ $index }}][location]" class="form-control br-8" value="{{ $eventDate->location }}" placeholder="Enter location">
                                                </div>
                                                <div class="col-md-3 d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeAdditionalDate(this)">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if($event->eventDates->isEmpty())
                                        <div class="additional-date-row mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Date</label>
                                                    <input type="date" name="additional_dates[0][date]" class="form-control br-8">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Time</label>
                                                    <input type="text" name="additional_dates[0][time]" class="form-control br-8" placeholder="e.g., 10:00 AM - 2:00 PM">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Location</label>
                                                    <input type="text" name="additional_dates[0][location]" class="form-control br-8" placeholder="Enter location">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addAdditionalDate()">Add Another Date</button>
                            </div>
                        </div>

                        <!-- SEO Section -->
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">SEO Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title', $event->seo_title) }}" placeholder="Enter SEO Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter SEO Description">{{ old('seo_description', $event->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">SEO Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="4" placeholder="Enter SEO Schema">{{ old('seo_schema', $event->seo_schema) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control br-8" name="seo_keywords" rows="4" placeholder="Enter SEO Keywords">{{ old('seo_keywords', $event->seo_keywords) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <!-- Status Field -->
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0"
                                        @if ($event->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3" value="1"
                                        @if ($event->status == 1) selected @endif>
                                        Publish</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $event->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <!-- Image Upload -->
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false" data-default-file="{{ $event->image }}" type="file"
                                        name="image">
                                    @error('image')
                                        <div class="invalid-feedback" role="alert" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Icon Upload -->
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Icon Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('icon_image') is-invalid @enderror" id="icon_image"
                                        data-show-remove="false" data-default-file="{{ $event->icon_image }}"
                                        type="file" name="icon_image">
                                    @error('icon_image')
                                        <div class="invalid-feedback" role="alert" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <!-- Submit Button -->
                            <div class="card-footers text-center">
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
@section('scripts')
    <script>
        $(".flatpicker").flatpickr({
            dateFormat: "Y-m-d",
            altInput: true,
        });

        let dateIndex = {{ $event->eventDates->count() }};
        
        function addAdditionalDate() {
            const container = document.getElementById('additional-dates');
            const newRow = document.createElement('div');
            newRow.className = 'additional-date-row mb-3 p-3 border rounded';
            newRow.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <label>Date</label>
                        <input type="date" name="additional_dates[${dateIndex}][date]" class="form-control br-8">
                    </div>
                    <div class="col-md-3">
                        <label>Time</label>
                        <input type="text" name="additional_dates[${dateIndex}][time]" class="form-control br-8" placeholder="e.g., 10:00 AM - 2:00 PM">
                    </div>
                    <div class="col-md-3">
                        <label>Location</label>
                        <input type="text" name="additional_dates[${dateIndex}][location]" class="form-control br-8" placeholder="Enter location">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeAdditionalDate(this)">Remove</button>
                    </div>
                </div>
            `;
            container.appendChild(newRow);
            dateIndex++;
        }
        
        function removeAdditionalDate(button) {
            button.closest('.additional-date-row').remove();
        }
    </script>
@endsection
