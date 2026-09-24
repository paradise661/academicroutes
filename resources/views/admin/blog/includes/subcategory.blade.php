@if ($subCategory)
    @foreach ($subCategory as $sub)
        <li>
            <input class="" type="checkbox" @if (in_array($sub->id, $categoryBlogs)) {{ 'checked' }} @endif
                name="category[]" value="{{ $sub->id }}">
            <label>{{ $sub->name }}</label>
            <ul>
                @if (count($sub->children))
                    @include('admin.news.includes.subcategory', [
                        'subCategory' => $sub->children,
                    ])
                @endif
            </ul>
        </li>
    @endforeach
@endif
