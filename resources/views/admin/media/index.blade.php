@extends('layouts.admin.master')
@section('title', 'Media Library - Ecommerce')

@section('content')
    <style>
        .media-wrapper {
            width: 1000px;
            height: 700px;
            overflow: hidden;
        }

        .media-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Upload Files</h5>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form class="dropzone" id="dropzone" action="{{ route('media.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            Drag and Drop Your Images Here<br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row row-cols-auto gap-2 m-2">
                        @if (!$medias->isEmpty())
                            @foreach ($medias as $gallery)
                                @if (File::exists(public_path($gallery->fullurl)))
                                    @php
                                        $exts = explode('.', $gallery->fullurl)[1];
                                        if (in_array($exts, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC'])) {
                                            $height = $gallery->height ?? '';
                                            $width = $gallery->width ?? '';
                                        }
                                        $size = $gallery->size;
                                    @endphp
                                    <div class="fro-dropzone-image col px-0">
                                        <div class="thumbnails media-wrapper">
                                            <a class="fro-dropzone-image-a"data-bs-toggle="modal"
                                                data-bs-target="#mediaModel" data-id="{{ $gallery->id }}"
                                                data-title="{{ $gallery->name }}"
                                                data-url="{{ in_array($exts, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC']) ? $gallery->fullurl : '/admin/assets/images/file-exts.png' }}"
                                                data-name="{{ $gallery->fullurl }}" data-alt="{{ $gallery->alt }}"
                                                data-size="{{ $size }}"
                                                data-date="{{ date('d F, Y', strtotime($gallery->created_at)) }}"
                                                @if (in_array($exts, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC'])) data-height="{{ $height ?? '' }}" data-width="{{ $width ?? '' }}" @endif
                                                href="{{ asset($gallery->url) }}">
                                                @if (in_array($exts, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC']))
                                                    <img class="fro-dropzone-image-img"
                                                        src="{{ asset($gallery->fullurl) }}" alt="{{ $gallery->alt }}">
                                                @else
                                                    <img class="fro-dropzone-image-img"
                                                        src="{{ asset('admin/assets/images/file-exts.png') }}"
                                                        alt="{{ $gallery->alt }}">
                                                @endif
                                            </a>
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="card-body">
                                <div class="alert alert-dark mb-0" role="alert">No File Uploaded Yet!</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mediaModel" tabindex="-1" aria-labelledby="mediaModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5">Attachment Details</h2>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="media-wrapper">
                                <img class="media-url" id="show-image" src="" alt="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="details">
                                <h2 class="screen-reader-text">Details</h2>
                                <div class="uploaded"><strong>Uploaded on:</strong> <i class="media-date"></i></div>
                                <div class="filename"><strong>File:</strong> <i class="media-name"></i></div>
                                <div class="file-size"><strong>File size:</strong> <i class="media-size"></i></div>
                                <div class="dimensions"><strong>Dimensions:</strong> <i class="media-width"></i> by <i
                                        class="media-height"></i> pixels</div>
                            </div>
                            <form class="media-form" method="POST" action="" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="col-form-label" for="media-title">Title:</label>
                                    <input class="form-control media-title" type="text" name="name">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label" for="media-alt">Alt:</label>
                                    <input class="form-control media-alt" type="text" name="alt">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                        Submit</button>
                                    <button class="btn btn-sm btn-danger media-id delete-single-document" value=""><i
                                            class="fa-solid fa-rotate"></i> Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const mediaModel = document.getElementById("mediaModel");
        mediaModel.addEventListener("show.bs.modal", (event) => {
            const button = event.relatedTarget;
            const title = button.getAttribute("data-title");
            const url = button.getAttribute("data-url");
            const alt = button.getAttribute("data-alt");
            const height = button.getAttribute("data-height");
            const width = button.getAttribute("data-width");
            const size = button.getAttribute("data-size");
            const id = button.getAttribute("data-id");
            const date = button.getAttribute("data-date");
            const name = button.getAttribute("data-name");

            const modalTitle = mediaModel.querySelector(".modal-body .media-title");
            const modalname = mediaModel.querySelector(".modal-body .media-name");
            const modalalt = mediaModel.querySelector(".modal-body .media-alt");
            const modalurl = mediaModel.querySelector(".modal-body .media-url");
            const modalheight = mediaModel.querySelector(".modal-body .media-height");
            const modalwidth = mediaModel.querySelector(".modal-body .media-width");
            const modalsize = mediaModel.querySelector(".modal-body .media-size");
            const modalid = mediaModel.querySelector(".modal-body .media-id");
            const modaldate = mediaModel.querySelector(".modal-body .media-date");
            const modalform = mediaModel.querySelector(".modal-body .media-form");

            modalTitle.value = title;
            modalalt.value = alt;
            modalurl.src = url;
            modalurl.alt = alt;
            modalid.value = id;
            modalheight.textContent = height;
            modalwidth.textContent = width;
            modalsize.textContent = size;
            modalname.textContent = name;
            modaldate.textContent = date;

            modalform.action = "{{ url('/admin/media') }}" + "/" + id;
        });

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("form#dropzone", {
            maxFiles: 1200,
            dictInvalidFileType: "This form only accepts images.",
            dictDefaultMessage: "Drag or click here to upload",
            maxFilesize: 1000000000000,
            timeout: 180000000,
        });

        myDropzone.on("complete", function(file) {
            if (
                this.getUploadingFiles().length === 0 &&
                this.getQueuedFiles().length === 0
            ) {
                location.reload();
                toastr.success("Images Upload Successfully!", {
                    fadeAway: 1500,
                });
            }
        });

        $(".delete-single-document").click(function(e) {
            e.preventDefault();
            var id = $(this).attr("value");

            var url = "{{ url('/admin/media/delete-file') }}" + "/" + id;

            swal({
                title: `Are you sure?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(data) {
                            location.reload();
                            $("#mediaModel").modal("hide");
                            toastr.success("Images Deleted Successfully!", {
                                fadeAway: 1500,
                            });
                        },
                        error: function(data) {
                            alert("Some Problems Occured!");
                        },
                    });
                }
            });
        });
    </script>
@endsection
