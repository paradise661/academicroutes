@extends('layouts.admin.master')
@section('title', 'All Posts')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Blogs ({{ $news->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('news.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$news->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th style="text-align: center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($news as $key => $blg)
                            <tr>
                                <td><strong>{{ $key + $news->firstItem() }}</strong></td>
                                <td>
                                    <a class="fancybox" data-fancybox="demo" href="{{ asset($blg->image) }}">
                                        <img src="{{ asset($blg->image) }}" alt="{{ $blg->name }}" width="80px">
                                    </a>
                                </td>
                                <td><strong>{{ $blg->name ?? '' }}</strong></td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $blg->status == 1 ? 'success' : 'danger' }}">{{ $blg->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $blg->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">

                                        <a class="btn btn-sm btn-success" href="/blogs/{{ $blg['slug'] }}"
                                            style="float: left;margin-right: 5px;" target="_blank"><i
                                                class="fa-solid fa-eye"></i> </a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('news.edit', $blg->id) }}"
                                            style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form class="delete-form" action="{{ route('news.destroy', $blg->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger delete_news mr-2" id=""
                                                data-type="confirm" type="submit" title="Delete"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                    </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news->links() }}
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
