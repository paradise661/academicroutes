@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Appointment</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('appointment.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
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
                            <td>Name</td>
                            <td>{{ $appointment->name }}</td>

                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $appointment->number }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $appointment->email }}</td>
                        </tr>
                        @if (!empty($appointment->country))
                            <tr>
                                <td>Interested Country</td>
                                <td>{!! $appointment->country !!}</td>
                            </tr>
                        @endif

                        @if (!empty($appointment->address))
                            <tr>
                                <td>Address</td>
                                <td>{!! $appointment->address !!}</td>
                            </tr>
                        @endif

                        <tr>
                            <td>Message</td>
                            <td>{{ $appointment->message }}</td>

                        </tr>

                        <tr>
                            <td>Time</td>
                            <td>{{ $appointment->created_at->diffForHumans() }}</td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
