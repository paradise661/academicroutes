@extends('layouts.admin.master')
@section('title', 'IELTS Registrations')

@section('content')
@include('admin.includes.message')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">IELTS Registrations ({{ $ieltsRegisters->total() }})</h5>
    </div>
    <div class="table-responsive text-nowrap">
        @if (!$ieltsRegisters->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Submitted at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($ieltsRegisters as $key => $registration)
                        <tr>
                            <td><strong>{{ $key + $ieltsRegisters->firstItem() }}</strong></td>
                            <td><strong>{{ $registration->name }}</strong></td>
                            <td><strong>{{ $registration->email }}</strong></td>
                            <td><strong>{{ $registration->number }}</strong></td>
                            <td><strong>{{ $registration->country_interest }}</strong></td>
                            <td>{{ $registration->created_at ? $registration->created_at->diffForHumans() : 'N/A' }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('ielts-admin.show', $registration->id) }}"
                                    style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>

                                <form class="delete-form d-inline" action="{{ route('ielts-admin.destroy', $registration->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger delete_registration" type="submit" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ieltsRegisters->links() }}
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
$(document).on('click', '.delete_registration', function(e) {
    e.preventDefault();
    let form = $(this).closest('form');
    swal({
        title: "Are you sure?",
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});
</script>
@endsection
