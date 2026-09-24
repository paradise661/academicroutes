@extends('layouts.admin.master')
@section('title', 'Sliders - BG Group')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Slider ({{ $sliders->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('slider.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$sliders->isEmpty())
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
                        @foreach ($sliders as $key => $slider)
                            <tr>
                                <td><strong>{{ $key + $sliders->firstItem() }}</strong></td>
                                <td><strong>{{ $slider->name ?? '' }}</strong></td>
                                <td>
                                    <img src="{{ asset('admin/images/slider/') }}/{{ $slider->image ?: 'avatar.png' }}"
                                        alt="" width="80px">

                                </td>
                                <td>{{ $slider->order }}</td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $slider->status == 1 ? 'success' : 'danger' }}">{{ $slider->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>{{ $slider->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('slider.edit', $slider->id) }}"
                                        style="float: left; margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('slider.destroy', $slider->id) }}"
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
                {{ $sliders->links() }}
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
        $('.delete_slider').click(function(e) {
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
