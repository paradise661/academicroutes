<div class="form-group mt-3">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Parent Category</h4>
        </div>

        <div class="panel-body package_destination">
            <ul style="padding-left:0" class="category_checkbox">
                @foreach ($categorys as $category)
                    <li>
                        <input type="radio" name="parent_id"
                            @if (in_array($category->id, $categoryParents)) {{ 'checked' }} @endif class=""
                            value="{{ $category->id }}">
                            <label for="option">
                                @if( Request::segment(2) != 'create')                
                                    @if($category->id == $blogcategory->id)
                                        <strong>{{ $category->name }}</strong>  
                                        @else
                                        {{ $category->name }}
                                    @endif
                                    @else 
                                        {{ $category->name }}                    
                                @endif
                            </label>
                        <ul>
                            @if (count($category->children))
                                @include('admin.blogcategory.includes.subparent', [
                                    'subParent' => $category->children,
                                ])
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
