@extends('layouts.admin.master')

@section('title', 'Create New Event')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4 p-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Create Event</h3>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('event.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>

            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                    @csrf

                    @php
                        $fields = [
                            'name' => 'Name',
                            'time' => 'Time',
                            'date' => 'Date',
                            'lcoation' => 'Location',
                            'short_description' => 'Short Description',
                            'description' => 'Description',
                        ];

                        $seo = [
                            'seo_title' => 'SEO Title',
                            'seo_keywords' => 'SEO Keywords',
                            'seo_description' => 'SEO Description',
                            'seo_schema' => 'SEO Schema',
                        ];
                    @endphp

                    <!-- Event Fields -->
                    <div class="col-md-8">
                        <div class="card-body card font-weight-bold br-8 mb-3">
                            @foreach ($fields as $name => $label)
                                <div class="form-group font-weight-bold mb-3">
                                    <label for="{{ $name }}">{{ $label }}</label>
                                    @if ($name == 'description')
                                        <textarea class="form-control ckeditor1 br-8 @error($name) is-invalid @enderror" id="{{ $name }}"
                                            name="{{ $name }}" rows="10" placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea>
                                    @elseif($name == 'short_description')
                                        <textarea class="form-control ckeditor  br-8 @error($name) is-invalid @enderror" id="{{ $name }}"
                                            name="{{ $name }}" rows="5" placeholder="Enter {{ strtolower($label) }}">{{ old($name) }}</textarea>
                                    @else
                                        <input
                                            class="form-control br-8 @error($name) is-invalid @enderror {{ $name == 'date' ? 'flatpicker' : '' }}"
                                            type="text" name="{{ $name }}" value="{{ old($name) }}"
                                            placeholder="Enter {{ strtolower($label) }}">
                                    @endif
                                    @error($name)
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endforeach

                            <!-- Additional Event Dates Section -->
                            <div class="form-group font-weight-bold mb-3">
                                <label>Additional Event Dates (Optional)</label>
                                <div id="additional-dates">
                                    <!-- Empty container - dates will be added dynamically -->
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addAdditionalDate()">Add Another Date</button>
                            </div>

                        </div>

                        <!-- SEO Fields -->
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
                    @include('admin.global.global')
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
@section('scripts')
    <script>
        $(".flatpicker").flatpickr({
            dateFormat: "Y-m-d",
            altInput: true,
        });

        let dateIndex = 0;
        
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
