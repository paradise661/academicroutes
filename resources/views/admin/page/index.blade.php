@extends('layouts.admin.master')
@section('title', 'All Pages - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pages ({{ $page->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('page.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$page->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($page as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $page->firstItem() }}</strong></td>
                                <td><strong>{{ $blog->name ?? '' }}</strong></td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $blog->status == 1 ? 'success' : 'danger' }}">{{ $blog->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $blog->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="#" target="_blank"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('page.edit', $blog->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form class="delete-form" action="{{ route('page.destroy', $blog->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_page mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $page->links() }}
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
        $('.delete_page').click(function(e) {
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
