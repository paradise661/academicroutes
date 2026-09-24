@extends('layouts.admin.master')
@section('title', 'Why us ? - BG Group')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Why Us ? ({{ $whyus->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('whyus.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$whyus->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($whyus as $key => $item)
                            <tr>
                                <td><strong>{{ $key + $whyus->firstItem() }}</strong></td>
                                <td><strong>{{ $item->name ?? '' }}</strong></td>
                                <td>
                                    <img src="{{ asset('admin/images/whyus/') }}/{{ $item->image ?: 'avatar.png' }}"
                                        alt="" width="80px">

                                </td>
                                <td>{{ $item->order }}</td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('whyus.edit', $item->id) }}"
                                        style="float: left; margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('whyus.destroy', $item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_slider mr-2" type="submit"
                                            title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $whyus->links() }}
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
        $('.delete_whyus').click(function(e) {
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
