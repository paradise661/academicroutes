@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Agency</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('agency.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Field</th>
                            <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Company Name</td>
                            <td>{{ $agency->company_name }}</td>
                        </tr>
                        <tr>
                            <td>Registered Address</td>
                            <td>{{ $agency->registered_address }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $agency->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Fax Number</td>
                            <td>{{ $agency->fax_number }}</td>
                        </tr>
                        <tr>
                            <td>Official Email</td>
                            <td>{{ $agency->official_email }}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ $agency->website }}</td>
                        </tr>
                        <tr>
                            <td>Registration Number</td>
                            <td>{{ $agency->registration_number }}</td>
                        </tr>
                        <tr>
                            <td>PAN Number</td>
                            <td>{{ $agency->pan_number }}</td>
                        </tr>

                        <tr>
                            <td>Contact Name</td>
                            <td>{{ $agency->contact_name }}</td>
                        </tr>
                        <tr>
                            <td>Contact Phone</td>
                            <td>{{ $agency->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Residence Address</td>
                            <td>{{ $agency->residence_address }}</td>
                        </tr>
                        <tr>
                            <td>Contact Email</td>
                            <td>{{ $agency->contact_email }}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>{{ $agency->designation }}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ $agency->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
