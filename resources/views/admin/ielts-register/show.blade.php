@extends('layouts.admin.master')
@section('title', 'Class Registration Details')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Class Registration Details</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('ielts-admin.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </a>
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
                            <td><strong>Name</strong></td>
                            <td>{{ $ieltsRegister->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Location</strong></td>
                            <td>{{ $ieltsRegister->location }}</td>
                        </tr>
                        <tr>
                            <td><strong>Contact Number</strong></td>
                            <td>{{ $ieltsRegister->number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $ieltsRegister->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Program Enrollment</strong></td>
                            <td>{{ $ieltsRegister->program_enrollment }}</td>
                        </tr>
                        @if($ieltsRegister->program_other)
                        <tr>
                            <td><strong>Program Other</strong></td>
                            <td>{{ $ieltsRegister->program_other }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td><strong>Class Type</strong></td>
                            <td>{{ $ieltsRegister->class_type }}</td>
                        </tr>
                        <tr>
                            <td><strong>Deposit Made</strong></td>
                            <td>{{ $ieltsRegister->deposit_made ? 'Yes' : 'No' }}</td>
                        </tr>
                        @if($ieltsRegister->deposit_made && $ieltsRegister->deposit_amount)
                        <tr>
                            <td><strong>Deposit Amount</strong></td>
                            <td>{{ $ieltsRegister->deposit_amount }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td><strong>Preferred Joining Date</strong></td>
                            <td>{{ $ieltsRegister->preferred_joining_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>Preferred Timing</strong></td>
                            <td>{{ $ieltsRegister->preferred_timing }}</td>
                        </tr>
                        <tr>
                            <td><strong>University Applied</strong></td>
                            <td>{{ $ieltsRegister->university_applied ? 'Yes' : 'No' }}</td>
                        </tr>
                        @if($ieltsRegister->university_name)
                        <tr>
                            <td><strong>University Name</strong></td>
                            <td>{{ $ieltsRegister->university_name }}</td>
                        </tr>
                        @endif
                        @if($ieltsRegister->university_other)
                        <tr>
                            <td><strong>University Other</strong></td>
                            <td>{{ $ieltsRegister->university_other }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td><strong>Country of Interest</strong></td>
                            <td>{{ $ieltsRegister->country_interest }}</td>
                        </tr>
                        <tr>
                            <td><strong>Consultancy</strong></td>
                            <td>{{ $ieltsRegister->consultancy }}</td>
                        </tr>
                        <tr>
                            <td><strong>Reference</strong></td>
                            <td>{{ $ieltsRegister->reference }}</td>
                        </tr>
                        <tr>
                            <td><strong>Submitted At</strong></td>
                            <td>{{ $ieltsRegister->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection