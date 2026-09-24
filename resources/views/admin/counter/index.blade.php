@extends('layouts.admin.master')
@section('title', 'Counters')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Counters ({{ $counter->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('counter.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$counter->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($counter as $key => $counter)
                            <tr>
                                <td><strong>{{ $key + $counter->firstItem() }}</strong></td>
                                <td><strong>{{ $counter->name ?? '-' }}</strong></td>
                                <td>{{ $counter->order ?? '-' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('counter.edit', $counter->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>

                                    <form class="delete-form" action="{{ route('counter.destroy', $counter->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_counter mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $counter->links() }}
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
        $('.delete_counter').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    counter: "warning",
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
