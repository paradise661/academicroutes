@extends('layouts.admin.master')
@section('title', 'All Agency')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Agency ({{ $agencies->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('agency.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$agencies->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Submitted at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($agencies as $key => $acency)
                            <tr>
                                <td><strong>{{ $key + $agencies->firstItem() }}</strong></td>
                                <td><strong>{{ $acency->company_name }}</strong></td>
                                <td><strong>{{ $acency->official_email }}</strong></td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $acency->status == 1 ? 'success' : 'danger' }}">{{ $acency->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $acency->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('agency.show', $acency->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('agency.edit', $acency->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form class="delete-form" action="{{ route('agency.destroy', $acency->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_contacts mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $agencies->links() }}
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
        $('.delete_contacts').click(function(e) {
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
