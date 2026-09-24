@extends('layouts.admin.master')
@section('title', 'All Posts - Shrayash')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Posts ({{ $blogs->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('blog.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$blogs->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            {{-- <th>Catagory</th> --}}
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($blogs as $key => $blg)
                            <tr>
                                <td><strong>{{ $key + $blogs->firstItem() }}</strong></td>
                                <td><strong>{{ $blg->name ?? '' }}</strong></td>
                                <td>
                                     <img src="{{ asset('admin/images/blog/') }}/{{ $blg->image ?: 'avatar.png' }}"
                                            alt="" width="80px">
 
                                </td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $blg->status == 1 ? 'success' : 'danger' }}">{{ $blg->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                {{-- <td>{{ $blg->blogcategory->name ?? 'No Category' }}</td> --}}
                                <td>{{ $blg->created_at->diffForHumans() }}</td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('blogsingle', $blg['slug']) }}"
                                        style="float: left;margin-right: 5px;" target="_blank"><i
                                            class="fa-solid fa-eye"></i></a> --}}
                                    <a class="btn btn-sm btn-primary" href="{{ route('blog.edit', $blg->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>

                                    <form class="delete-form" action="{{ route('blog.destroy', $blg->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_news mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $blogs->links() }}
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
