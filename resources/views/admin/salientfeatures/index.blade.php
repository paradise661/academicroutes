@extends('layouts.admin.master')
@section('title', 'All Salient Features -')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('salient-features.create') }}">
                    <i class="fa-solid fa-plus"></i> Create
                </a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$features->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($features as $key => $feature)
                            <tr>
                                <td><strong>{{ $key + $features->firstItem() }}</strong></td>
                                <td><strong>{{ $feature->title ?? '' }}</strong></td>
                                <td>
                                    <img src="{{ asset('admin/images/salientfeatures/') }}/{{ $feature->image ?: 'avatar.png' }}"
                                        alt="" width="80px">

                                </td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $feature->status == 1 ? 'success' : 'danger' }}">{{ $feature->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $feature->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('salient-features.edit', $feature->id) }}"
                                        style="float: left; margin-right: 5px;">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form class="delete-form" action="{{ route('salient-features.destroy', $feature->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_services" type="submit" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $features->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_services').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
        });
    </script>
@endsection
