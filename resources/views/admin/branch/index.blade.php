@extends('layouts.admin.master')
@section('title', 'All Branches')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Branches ({{ $branch->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('branch.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$branch->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($branch as $key => $brn)
                            <tr>
                                <td><strong>{{ $key + $branch->firstItem() }}</strong></td>
                                <td>
                                    <a class="fancybox" data-fancybox="demo" href="{{ asset($brn->image) }}">
                                        <img src="{{ asset($brn->image) }}" alt="{{ $brn->title }}" width="80px">
                                    </a>
                                </td>
                                <td><strong>{{ $brn->title ?? '' }}</strong></td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $brn->status == 1 ? 'success' : 'danger' }}">{{ $brn->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $brn->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="/branch/{{ $brn['slug'] }}"
                                        style="float: left;margin-right: 5px;" target="_blank"><i
                                            class="fa-solid fa-eye"></i> View</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('branch.edit', $brn->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('branch.destroy', $brn->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_news mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $branch->links() }}
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
        $('.delete_news').click(function(e) {
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
