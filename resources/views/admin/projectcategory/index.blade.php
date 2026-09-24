@extends('layouts.admin.master')
@section('title', 'All Categories - Paradise IT Solutions')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Categories</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('projectcategory.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>
        <div class="table-responsive text-nowrap">
            @if ($categories->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Name</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: end">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td><strong>{{ $key + $categories->firstItem() }}</strong></td>
                                <td><strong>{{ $category->name ?? '' }}</strong></td>
                                <td style="text-align: center"><span
                                        class="badge {{ $category->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $category->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-end">
                                        {{-- <a class="btn btn-sm btn-success"
                                            href="{{ route('projectcategory', $category->slug) }}" target="_blank"
                                            style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>  --}}
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('projectcategory.edit', $category->id) }}"
                                            style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form class="delete-form"
                                            action="{{ route('projectcategory.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger delete_category mr-2" id=""
                                                data-type="confirm" type="submit" title="Delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
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
        $('.delete_category').click(function(e) {
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
