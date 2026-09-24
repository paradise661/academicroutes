@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Inquiry</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('vacancy.index') }}"><i
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
                            <td>{{ $vacancy->name }}</td>

                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $vacancy->number }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $vacancy->email }}</td>
                        </tr>
                        @if (!empty($vacancy->country))
                            <tr>
                                <td>Country</td>
                                <td>{!! $vacancy->country !!}</td>
                            </tr>
                        @endif

                        @if (!empty($vacancy->address))
                            <tr>
                                <td>Address</td>
                                <td>{!! $vacancy->address !!}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Message</td>
                            <td>{!! $vacancy->message !!}</td>
                        </tr>

                        <tr>
                            <td>Time</td>
                            <td>{{ $vacancy->created_at->diffForHumans() }}</td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
