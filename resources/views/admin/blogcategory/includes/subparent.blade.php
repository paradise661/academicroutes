@if ($subParent)
    @foreach ($subParent as $sub)
        <li>
            <input class="" type="radio" @if (in_array($sub->id, $categoryParents)) {{ 'checked' }} @endif
                name="parent_id" value="{{ $sub->id }}">
            <label>
                @if (Request::segment(3) != 'create')
                    @if ($sub->id == $blogcategory->id)
                        <strong>{{ $sub->name }}</strong>
                    @else
                        {{ $sub->name }}
                    @endif
                @else
                    {{ $sub->name }}
                @endif
            </label>
            <ul>
                @if (count($sub->children))
                    @include('admin.blogcategory.includes.subparent', [
                        'subParent' => $sub->children,
                    ])
                @endif
            </ul>
        </li>
    @endforeach
@endif
