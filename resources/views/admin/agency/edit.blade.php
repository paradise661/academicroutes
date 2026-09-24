@extends('layouts.admin.master')

@section('title', 'Edit Agency')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Agency</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('agency.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('agency.update', $agency->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Agency Details Section -->
                    <div class="col-12 p-4">
                        <h2 class="mb-4">Agency Details</h2>
                        <div class="row gx-4 gy-3">
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="company_name"
                                    value="{{ old('company_name', $agency->company_name) }}" placeholder="Company Name *">
                                @error('company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="registered_address"
                                    value="{{ old('registered_address', $agency->registered_address) }}"
                                    placeholder="Registered Address *">
                                @error('registered_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="tel" name="phone_number"
                                    value="{{ old('phone_number', $agency->phone_number) }}" placeholder="Phone Number *">
                                @error('phone_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="fax_number"
                                    value="{{ old('fax_number', $agency->fax_number) }}" placeholder="Fax Number">
                                @error('fax_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="email" name="official_email"
                                    value="{{ old('official_email', $agency->official_email) }}"
                                    placeholder="Official Email *">
                                @error('official_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="url" name="website"
                                    value="{{ old('website', $agency->website) }}" placeholder="Website">
                                @error('website')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="registration_number"
                                    value="{{ old('registration_number', $agency->registration_number) }}"
                                    placeholder="Registration Number *">
                                @error('registration_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="pan_number"
                                    value="{{ old('pan_number', $agency->pan_number) }}" placeholder="PAN Number *">
                                @error('pan_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Company Documents Section -->
                    {{-- <div class="col-12 p-4">
                        <h2 class="mb-4">Company Documents</h2>
                        <div class="row gx-4 gy-3">
                            <div class="col-md-6">
                                <label for="registration_certificate_path">Registration Certificate</label>
                                <div class="custom-file">
                                    <input class="dropify @error('registration_certificate_path') is-invalid @enderror"
                                        id="registration_certificate_path" data-show-remove="false"
                                        data-default-file="{{ $agency->registration_certificate_path }}" type="file"
                                        name="registration_certificate_path">

                                    @error('registration_certificate_path')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>Registration Certificate (Max 1MB) *</small>
                            </div>

                            <div class="col-md-6">
                                <label for="pan_certificate_path">PAN Certificate</label>
                                <div class="custom-file">
                                    <input class="dropify @error('pan_certificate_path') is-invalid @enderror"
                                        id="pan_certificate_path" data-show-remove="false"
                                        data-default-file="{{ $agency->pan_certificate_path }}" type="file"
                                        name="pan_certificate_path">

                                    @error('pan_certificate_path')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>PAN Certificate (Max 1MB) *</small>
                            </div>

                            <div class="col-md-6">
                                <label for="tourism_certificate_path">Tourism Certificate</label>
                                <div class="custom-file">
                                    <input class="dropify @error('tourism_certificate_path') is-invalid @enderror"
                                        id="tourism_certificate_path" data-show-remove="false"
                                        data-default-file="{{ $agency->tourism_certificate_path }}" type="file"
                                        name="tourism_certificate_path">

                                    @error('tourism_certificate_path')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>Tourism Certificate (Max 1MB)</small>
                            </div>

                            <div class="col-md-6">
                                <label for="nrb_certificate_path">NRB Certificate</label>
                                <div class="custom-file">
                                    <input class="dropify @error('nrb_certificate_path') is-invalid @enderror"
                                        id="nrb_certificate_path" data-show-remove="false"
                                        data-default-file="{{ $agency->nrb_certificate_path }}" type="file"
                                        name="nrb_certificate_path">

                                    @error('nrb_certificate_path')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>NRB Certificate (Max 1MB) (If applicable)</small>
                            </div>

                            <div class="col-md-6">
                                <label for="tax_clearance">Upload Tax Clearance?</label><br>
                                <input id="tax_yes" type="radio" name="has_tax_clearance" value="1"
                                    {{ old('has_tax_clearance', $agency->has_tax_clearance) == '1' ? 'checked' : '' }}> Yes
                                <input id="tax_no" type="radio" name="has_tax_clearance" value="0"
                                    {{ old('has_tax_clearance', $agency->has_tax_clearance) == '0' ? 'checked' : '' }}> No
                                @error('has_tax_clearance')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6" id="tax_upload_section"
                                style="{{ old('has_tax_clearance', $agency->has_tax_clearance) == '1' ? 'display: block;' : 'display: none;' }}">
                                <label for="tax_clearance_path">Tax Clearance</label>
                                <div class="custom-file">
                                    <input class="dropify @error('tax_clearance_path') is-invalid @enderror"
                                        id="tax_clearance_path" data-show-remove="false"
                                        data-default-file="{{ $agency->tax_clearance_path }}" type="file"
                                        name="tax_clearance_path">

                                    @error('tax_clearance_path')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>Upload Tax Clearance (Max 1MB)</small>
                            </div>

                            <div class="col-md-6">
                                <label for="company_logo_path">Company Logo</label>
                                <div class="custom-file">
                                    <input class="dropify @error('company_logo_path') is-invalid @enderror"
                                        id="company_logo_path" data-show-remove="false"
                                        data-default-file="{{ $agency->company_logo_path }}" type="file"
                                        name="company_logo_path">

                                    @error('company_logo_path')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>Company Logo (Max 1MB) *</small>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Contact Person Details Section -->
                    <div class="col-12 p-4">
                        <h2 class="mb-4">Contact Person Details</h2>
                        <div class="row gx-4 gy-3">
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="contact_name"
                                    value="{{ old('contact_name', $agency->contact_name) }}" placeholder="Name *">
                                @error('contact_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="gender">Gender *</label><br>
                                <input type="radio" name="gender" value="Male"
                                    {{ old('gender', $agency->gender) == 'Male' ? 'checked' : '' }}> Male
                                <input type="radio" name="gender" value="Female"
                                    {{ old('gender', $agency->gender) == 'Female' ? 'checked' : '' }}> Female
                                <input type="radio" name="gender" value="Other"
                                    {{ old('gender', $agency->gender) == 'Other' ? 'checked' : '' }}> Other
                                @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <input class="form-control py-3" type="date" name="dob"
                                    value="{{ old('dob', $agency->dob) }}">
                                <small>Date of Birth</small>
                                @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6">
                                <input class="form-control py-3" type="tel" name="mobile"
                                    value="{{ old('mobile', $agency->mobile) }}" placeholder="Mobile *">
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="email" name="contact_email"
                                    value="{{ old('contact_email', $agency->contact_email) }}" placeholder="Email *">
                                @error('contact_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="residence_address"
                                    value="{{ old('residence_address', $agency->residence_address) }}"
                                    placeholder="Residence Address">
                                @error('residence_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="designation"
                                    value="{{ old('designation', $agency->designation) }}" placeholder="Designation">
                                @error('designation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="photo">Photo</label>
                                <div class="custom-file">
                                    <input class="dropify @error('photo') is-invalid @enderror" id="photo"
                                        data-show-remove="false" data-default-file="{{ $agency->photo }}" type="file"
                                        name="photo">

                                    @error('photo')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small>Photo (Max 1MB) *</small>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Sidebar for Settings -->
                    <div class="d-flex justify-content-center">
                        <div class="col-md-3">
                            <div class="card shadow-sm p-3">
                                <h5 class="mb-3">Settings</h5>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select class="form-select" name="status">
                                        <option value="1"
                                            {{ old('status', $agency->status) == 1 ? 'selected' : '' }}>Publish</option>
                                        <option value="0"
                                            {{ old('status', $agency->status) == 0 ? 'selected' : '' }}>Draft</option>
                                    </select>
                                </div>
                                <hr class="shadow-sm">

                                <div class="card-footers">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="fa-solid fa-rotate"></i>
                                        Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const taxYes = document.getElementById("tax_yes");
            const taxNo = document.getElementById("tax_no");
            const taxUploadSection = document.getElementById("tax_upload_section");

            taxYes.addEventListener("change", function() {
                taxUploadSection.style.display = "block";
            });

            taxNo.addEventListener("change", function() {
                taxUploadSection.style.display = "none";
            });
        });
    </script>
@endsection
