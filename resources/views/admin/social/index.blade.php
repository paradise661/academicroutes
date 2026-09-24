@extends('layouts.admin.master')
@section('title', 'All Posts')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Social ({{ $social->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('social.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$social->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($social as $key => $blg)
                            <tr>
                                <td><strong>{{ $key + $social->firstItem() }}</strong></td>
                               
                                <td><strong>{{ $blg->name ?? '' }}</strong></td>
                                <td><strong>{{ $blg->icon ?? '' }}</strong></td>
                              
                                <td>{{ $blg->updated_at->diffForHumans() }}</td>
                                <td>
                                    {{-- <a href="/slider/{{ $blg['slug'] }}"
                                        style="float: left;margin-right: 5px;" target="_blank" class="btn btn-sm btn-success"><i
                                            class="fa-solid fa-eye"></i> View</a> --}}
                                    <a href="{{ route('social.edit', $blg->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>


                                    <form class="delete-form" action="{{ route('social.destroy', $blg->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_scholorship mr-2" id=""
                                            title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $social->links() }}
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
        $('.delete_scholorship').click(function(e) {
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
