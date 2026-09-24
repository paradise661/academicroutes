@extends('layouts.admin.master')
@section('title', 'All download - BG Group')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Download ({{ $download->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('download.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$download->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Title</th>
                            <th>File</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($download as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $download->firstItem() }}</strong></td>
                                <td><strong>{{ $blog->name ?? '' }}</strong></td>
                                <td>
                                    <a href="{{ asset('admin/storage/download/' . ($blog->file ?? 'default.pdf')) }}"
                                        target="_blank">
                                        View PDF
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ asset('admin/images/download/') }}/{{ $blog->image ?: 'avatar.png' }}"
                                        alt="" width="80px">

                                </td>

                                <td>

                                    <a class="btn btn-sm btn-primary" href="{{ route('download.edit', $blog->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form class="delete-form" action="{{ route('download.destroy', $blog->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_project mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $download->links() }}
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
        $('.delete_project').click(function(e) {
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
