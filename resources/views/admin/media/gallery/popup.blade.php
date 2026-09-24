<div id="mediamodals">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="popup-home-tab" data-bs-toggle="tab" data-bs-target="#popup-home" type="button"
                role="tab" aria-controls="popup-home" aria-selected="true">Upload <i
                    class="menu-icon tf-icons bx bx-upload"></i></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="popup-allmedia-tab" data-bs-toggle="tab"
                data-bs-target="#popup-allmedia" type="button" role="tab" aria-controls="popup-allmedia"
                aria-selected="false">All Media</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="popup-home" role="tabpanel" aria-labelledby="popup-home-tab">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <form class="dropzone" id="popupdropzone" action="{{ route('media.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="dz-message">
                                Drag and Drop Your Images Here<br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="popup-allmedia" role="tabpanel" aria-labelledby="popup-allmedia-tab">
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
                                    <img src="{{ asset('admin/assets/images/file-exts.png') }}"
                                        alt="{{ $files->alt }}">
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
