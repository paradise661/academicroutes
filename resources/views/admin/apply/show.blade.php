@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Apply</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('apply.index') }}"><i class="fa-solid fa-arrow-left"></i>
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
                            <td>{{ $apply->name }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $apply->address }}</td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>{{ $apply->number }}</td>
                        </tr>
                        <tr>
                            <td>Interested Country</td>
                            <td>{{ $apply->country }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $apply->email }}</td>
                        </tr>
                        <tr>
                            <td>Interested University</td>
                            <td>{{ $apply->university }}</td>
                        </tr>
                        <tr>
                            <td>Interested Course</td>
                            <td>{{ $apply->course }}</td>
                        </tr>
                        <tr>
                            <td>Last Academic Qualification</td>
                            <td>{{ $apply->academic_qualification }}</td>
                        </tr>

                        <tr>
                            <td>Academic Score</td>
                            <td>{{ $apply->academic_score }}</td>
                        </tr>
                        <tr>
                            <td>English Scores</td>
                            <td>{{ $apply->english_score }}</td>
                        </tr>
                        <tr>
                            <td>Passed Year</td>
                            <td>{{ $apply->passed_year }}</td>
                        </tr>
                        <tr>
                            <td>Master Degree Certificate</td>
                            <td>
                                @if ($apply->master_certificate)
                                    <a href="{{ asset($apply->master_certificate) }}" target="_blank">
                                        View Master Degree Certificate
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>Bachelor Degree Certificate</td>
                            <td>
                                @if ($apply->bachelor_certificate)
                                    <a href="{{ asset($apply->bachelor_certificate) }}" target="_blank">
                                        View Bachelor Degree Certificate
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Diploma</td>
                            <td>
                                @if ($apply->diploma)
                                    <a href="{{ asset($apply->diploma) }}" target="_blank">
                                        View Diploma Certificate
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Grade 12 Certificate</td>
                            <td>
                                @if ($apply->grade_twelve)
                                    <a href="{{ asset($apply->grade_twelve) }}" target="_blank">
                                        View Grade 12 Certificate
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>CV</td>
                            <td>
                                @if ($apply->cv)
                                    <a href="{{ asset($apply->cv) }}" target="_blank">
                                        View CV
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Passport</td>
                            <td>
                                @if ($apply->passport)
                                    <a href="{{ asset($apply->passport) }}" target="_blank">
                                        View Passport
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>IELTS</td>
                            <td>
                                @if ($apply->ielts)
                                    <a href="{{ asset($apply->ielts) }}" target="_blank">
                                        View IELTS
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>OTHERS</td>
                            <td>
                                @if ($apply->other)
                                    <a href="{{ asset($apply->other) }}" target="_blank">
                                        View Other Documents
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Time</td>
                            <td>{{ $apply->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
