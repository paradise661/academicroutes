 @if ($medias->isNotEmpty())
     <ul class="row row-cols-auto gap-2 thumb-image" id="image-lists">
         @foreach ($medias as $files)
             @php
                 $exts = explode('.', $files->fullurl)[1];
             @endphp
             <li class="col px-0 mb-1 medias image_card{{ $files->id }}" data-id="{{ $files->id }}"
                 data-url="{{ asset($files->fullurl) }}" data-alt="alt-{{ $files->alt }}">
                 <div class="thumbnails media-wrapper" data-id="{{ $files->id }}">

                     @if (in_array($exts, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC']))
                         <img src="{{ asset($files->fullurl) }}" alt="{{ $files->alt }}">
                     @else
                         <img src="{{ asset('admin/assets/images/file-exts.png') }}" alt="{{ $files->alt }}">
                     @endif
                 </div>
             </li>
         @endforeach
     </ul>
 @endif
