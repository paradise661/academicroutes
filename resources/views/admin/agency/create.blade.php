@extends('layouts.admin.master')

@section('title', 'Create New Agency')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Agency</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('agency.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('agency.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Agency Details Section -->
                    <div class="col-12 p-4">
                        <h2 class="mb-4">Agency Details</h2>
                        <div class="row gx-4 gy-3">
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="company_name"
                                    placeholder="Company Name *">
                                @error('company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="registered_address"
                                    placeholder="Registered Address *">
                                @error('registered_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="tel" name="phone_number"
                                    placeholder="Phone Number *">
                                @error('phone_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="fax_number" placeholder="Fax Number">
                                @error('fax_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="email" name="official_email"
                                    placeholder="Official Email *">
                                @error('official_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="url" name="website" placeholder="Website">
                                @error('website')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="registration_number"
                                    placeholder="Registration Number *">
                                @error('registration_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="pan_number"
                                    placeholder="PAN Number *">
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
                            <!-- Registration Certificate -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="registration_certificate_path">Registration Certificate (Max 1MB)</label>
                                    <div class="custom-file">
                                        <input class="dropify @error('registration_certificate_path') is-invalid @enderror"
                                            id="registration_certificate_path" type="file"
                                            name="registration_certificate_path" accept=".pdf,.jpg,.jpeg,.png">
                                        @error('registration_certificate_path')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PAN Certificate -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pan_certificate_path">PAN Certificate (Max 1MB)</label>
                                    <div class="custom-file">
                                        <input class="dropify @error('pan_certificate_path') is-invalid @enderror"
                                            id="pan_certificate_path" type="file" name="pan_certificate_path"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                        @error('pan_certificate_path')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tourism Certificate -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tourism_certificate_path">Tourism Certificate (Max 1MB)</label>
                                    <div class="custom-file">
                                        <input class="dropify @error('tourism_certificate_path') is-invalid @enderror"
                                            id="tourism_certificate_path" type="file" name="tourism_certificate_path"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                        @error('tourism_certificate_path')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- NRB Certificate -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nrb_certificate_path">NRB Certificate (Max 1MB) (If applicable)</label>
                                    <div class="custom-file">
                                        <input class="dropify @error('nrb_certificate_path') is-invalid @enderror"
                                            id="nrb_certificate_path" type="file" name="nrb_certificate_path"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                        @error('nrb_certificate_path')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tax Clearance Option -->
                            <div class="col-md-6">
                                <label for="tax_clearance">Upload Tax Clearance?</label><br>
                                <input id="tax_yes" type="radio" name="has_tax_clearance" value="1"> Yes
                                <input id="tax_no" type="radio" name="has_tax_clearance" value="0"> No
                                @error('has_tax_clearance')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tax Clearance File -->
                            <div class="col-md-6" id="tax_upload_section" style="display: none;">
                                <div class="form-group mb-3">
                                    <label for="tax_clearance_path">Upload Tax Clearance (Max 1MB)</label>
                                    <div class="custom-file">
                                        <input class="dropify @error('tax_clearance_path') is-invalid @enderror"
                                            id="tax_clearance_path" type="file" name="tax_clearance_path"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                        @error('tax_clearance_path')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Company Logo -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="company_logo_path">Company Logo (Max 1MB)</label>
                                    <div class="custom-file">
                                        <input class="dropify @error('company_logo_path') is-invalid @enderror"
                                            id="company_logo_path" type="file" name="company_logo_path"
                                            accept=".jpg,.jpeg,.png">
                                        @error('company_logo_path')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Contact Person Details Section -->
                    <div class="col-12 p-4">
                        <h2 class="mb-4">Contact Person Details</h2>
                        <div class="row gx-4 gy-3">
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="contact_name" placeholder="Name *">
                                @error('contact_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="gender">Gender *</label><br>
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> Female
                                <input type="radio" name="gender" value="Other"> Other
                                @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <input class="form-control py-3" type="date" name="dob">
                                <small>Date of Birth</small>
                                @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6">
                                <input class="form-control py-3" type="tel" name="mobile" placeholder="Mobile *">
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="email" name="contact_email" placeholder="Email *">
                                @error('contact_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="residence_address"
                                    placeholder="Residence Address">
                                @error('residence_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control py-3" type="text" name="designation"
                                    placeholder="Designation">
                                @error('designation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label for="photo">Photo</label>
                                <div class="custom-file">
                                    <input class="dropify @error('photo') is-invalid @enderror" id="photo"
                                        data-show-remove="false" type="file" name="photo">
                                    @error('photo')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary w-100 py-3" type="submit"><i
                                            class="fa-solid fa-plus"></i> Publish</button>
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
