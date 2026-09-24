@if ($id)
    @foreach ($id as $i)
        @php
            $media = get_media($i);
        @endphp
        @if ($media)
            @php
                $exts = explode('.', $media->fullurl)[1];
            @endphp
            <div class="col thumbnails media-wrapper">
                @if (in_array($exts, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC']))
                    <img src="{{ asset($media->fullurl) }}" alt="{{ $media->alt }}">
                @else
                    <img src="{{ asset('admin/assets/images/file-exts.png') }}" alt="{{ $media->alt }}">
                @endif
            </div>
        @endif
    @endforeach
@endif
