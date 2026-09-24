@extends('layouts.admin.master')
@section('title', 'All Countries')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Abroad Courses ({{ $abroadcourse->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('abroadcourse.create', $abroad_id) }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$abroadcourse->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($abroadcourse as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $abroadcourse->firstItem() }}</strong></td>
                                <td class="">
                                    <a href="{{ asset($blog->image) }}"
                                        data-fancybox="demo" class="fancybox">
                                        <img src="{{ asset($blog->image) }}"
                                            alt="{{ $blog->name }}" width="80px">
                                    </a>
                                </td>
                                <td><strong>{{ $blog->name ?? '' }}</strong></td>
                                <td><strong>{{ $blog->order ?? '' }}</strong></td>
                                <td><span class="badge rounded-pill bg-label-{{  $blog->status ==1?'success':'danger'  }}">{{ $blog->status ==1?'Publish':'Draft' }}</span></td>
                                <td>{{ $blog->updated_at->diffForHumans() }}</td>
                                <td>
                                    

                                    <a href="{{ route('abroadcourse.edit', [$abroad_id,$blog->id]) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>


                                    <form class="delete-form" action="{{ route('abroadcourse.destroy',[$abroad_id, $blog->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_abroads mr-2" id=""
                                            title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $abroadcourse->links() }}
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
        $('.delete_abroads').click(function(e) {
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
