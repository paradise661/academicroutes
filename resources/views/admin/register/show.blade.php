@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Resgister</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('register.index') }}"><i
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
                            <td>Event Name</td>
                            <td>{{ $register->event ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <td>Name</td>
                            <td>{{ $register->name }}</td>

                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $register->number }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $register->email }}</td>
                        </tr>
                        @if (!empty($register->country))
                            <tr>
                                <td>Interested Country</td>
                                <td>{!! $register->country !!}</td>
                            </tr>
                        @endif

                        @if (!empty($register->address))
                            <tr>
                                <td>Address</td>
                                <td>{!! $register->address !!}</td>
                            </tr>
                        @endif
                        @if (!empty($register->university))
                            <tr>
                                <td>University</td>
                                <td>{!! $register->university !!}</td>
                            </tr>
                        @endif
                        {{-- <tr>
                            <td>University</td>
                            <td>{{ $register->university }}</td>

                        </tr> --}}
                        <tr>
                            <td>Intake</td>
                            <td>{{ $register->intake }}</td>

                        </tr>
                        <tr>
                            <td>Course</td>
                            <td>{{ $register->course }}</td>

                        </tr>
                        <tr>
                            <td>Academic Qualification</td>
                            <td>{{ $register->qualification }}</td>

                        </tr>
                        <tr>
                            <td>Academic Score</td>
                            <td>{{ $register->academic_score }}</td>

                        </tr>
                        <tr>
                            <td>English Scores</td>
                            <td>{{ $register->english_score }}</td>

                        </tr>
                        <tr>
                            <td>Passed Year</td>
                            <td>{{ $register->passed_year }}</td>

                        </tr>

                        <tr>
                            <td>Time</td>
                            <td>{{ $register->created_at->diffForHumans() }}</td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
