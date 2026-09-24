@extends('layouts.admin.master')
@section('title', 'All company - BG Group')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Company ({{ $company->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('company.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$company->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($company as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $company->firstItem() }}</strong></td>
                                <td><strong>{{ $blog->name ?? '' }}</strong></td>
                                <td>
                                    <img src="{{ asset('admin/images/company/') }}/{{ $blog->image ?: 'avatar.png' }}"
                                        alt="" width="80px">

                                </td>

                                <td>{{ $blog->categories->name ?? 'No Category' }}</td>
                                <td>

                                    <a class="btn btn-sm btn-primary" href="{{ route('company.edit', $blog->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form class="delete-form" action="{{ route('company.destroy', $blog->id) }}"
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
                {{ $company->links() }}
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
