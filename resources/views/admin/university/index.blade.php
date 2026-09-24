@extends('layouts.admin.master')
@section('title', 'Universities in ' . $abroad->name)

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0 text-capitalize font-weight-bold ">Universities in {{ $abroad->name }}</h3>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('universities.create', $abroad->id) }}"><i
                        class="fa-solid fa-plus"></i> Create University</a>
                <a class="btn btn-secondary" href="{{ route('abroad.index') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
            </small>
        </div>

        <div class="table-responsive text-nowrap text-capitalize">
            @if (!$universities->isEmpty())
                <table class="table">
                    <thead>
                        <tr class="text-lg">
                            <th>SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($universities as $key => $university)
                            <tr>
                                <td><strong>{{ $key + $universities->firstItem() }}</strong></td>
                                <td>
                                    <a class="fancybox" data-fancybox="demo" href="{{ asset($university->image) }}">
                                        <img src="{{ asset($university->image) }}" alt="{{ $university->name }}"
                                            width="120px" height="80px">
                                    </a>
                                </td>

                                <td><strong>{{ $university->name ?? '' }}</strong></td>
                                <td><strong>{{ $university->order ?? '' }}</strong></td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $abroad->status == 1 ? 'success' : 'danger' }}">{{ $university->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>
                                    <!-- Add your university actions like edit, delete, etc. -->
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('universities.edit', $university->id) }}"
                                        style="float: left;margin-right: 5px; font-size:15px"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form class="delete-form"
                                        action="{{ route('universities.destroy', [$abroad->id, $university->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_abroads mr-2 text-lg" type="submit"
                                            style="font-size:15px"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $universities->links() }}
            @else
                <div class="card-body">
                    <h6>No Universities Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection
