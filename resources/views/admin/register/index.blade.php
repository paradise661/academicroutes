@extends('layouts.admin.master')
@section('title', 'All Register')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Registers ({{ $register->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('register.export') }}"><i class="fa-solid fa-download"></i>
                    Download</a>
            </small>
        </div>
        <div class="table-responsive text-nowrap">
            @if (!$register->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Submitted at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($register as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $register->firstItem() }}</strong></td>
                                <td><strong>{{ $blog->name }}</strong></td>
                                <td><strong>{{ $blog->email }}</strong></td>
                                <td><strong>{{ $blog->number }}</strong></td>
                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('register.show', $blog->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>

                                    <form class="delete-form" action="{{ route('register.destroy', $blog->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_register mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $register->links() }}
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
        $('.delete_register').click(function(e) {
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
