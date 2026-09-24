@if ($subParent)
    @php
        $dash = $count;
    @endphp
    @foreach ($subParent as $sub)
        <tr>
            <td><strong>{{ $dash }}</strong></td>
            <td><strong>{{ $sub->name ?? '' }}</strong></td>
            <td style="text-align: center"><span
                    class="badge {{ $sub->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $sub->status == 0 ? 'Draft' : 'Published' }}</span>
            </td>

            <td>

                <div class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-success" href="{{ route('categorysingle', $sub->slug) }}" target="_blank"
                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ route('blogcategory.edit', $sub->id) }}"
                        style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form class="delete-form" action="{{ route('blogcategory.destroy', $sub->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger delete_category mr-2" id="" data-type="confirm"
                            type="submit" title="Delete"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>

        @if (count($sub->children))
            @include('admin.blogcategory.table.children', [
                'subParent' => $sub->children,
                'count' => $dash . '-',
            ])
        @endif
    @endforeach
@endif
