<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Media;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{

    protected $sizes;

    public function __construct()
    {
        $this->sizes  = image_sizes();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::latest()->get();
        return view('admin.media.index', compact('medias'));
    }

    public function mediapopup()
    {
        $medias = Media::latest()->get();
        return view('admin.media.popup', compact('medias'));
    }

    public function medialist()
    {
        $medias = Media::latest()->get();
        return view('admin.media.list', compact('medias'));
    }

    public function gallerymedialist($id)
    {
        $id = explode(',', $id);
        return view('admin.media.gallery.gallerylist', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($image = $request->file('file')) {

            //Getting file extension
            $namewithextension  = $image->getClientOriginalName();
            $names = explode('.', $namewithextension)[0];

            //Making unique name for file
            if (Media::where('name', $names)->exists()) {
                $name = $names . '-' . date('YmdHis');
            } else {
                $name = $names;
            }

            //Getting Image Slug
            $extension = $image->getClientOriginalExtension();

            //Converting image name to slug (your name -> your-name)
            $slugify = make_slug($name);

            //New Name by adding new slug and extension
            $image_new_name = $slugify . '.' . $extension;

            //Storing image/file with new name
            $image->move(public_path('storage/'), $image_new_name);

            //Getting file height width
            if (in_array($extension, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC'])) {
                $height = $image ? getimagesize(public_path('storage/' . $image_new_name))[1] : '';
                $width = $image ? getimagesize(public_path('storage/' . $image_new_name))[0] : '';
            }

            //Getting file size
            $fsize = filesize(public_path('storage/' . $image_new_name)) / 1024;

            //Storing  image slug name for resizes images
            $fileName = $image_new_name;

            //Croping or fitting the image on given sizes
            if (in_array($extension, ['png', 'jpg', 'jpeg', 'webp', 'heic', 'PNG', 'JPG', 'JPEG', 'WEBP', 'HEIC'])) {

                if ($this->sizes) {
                    foreach ($this->sizes as $resize) {
                        if ($resize['width'] && $resize['height']) {
                            if ($resize['width'] < $width && $resize['height'] < $height) {

                                $originalImage = Image::make(public_path('/storage/' . $fileName));

                                $resizedImage = $originalImage->fit((int) $resize['width'], (int) $resize['height'], function ($constraint) {
                                    $constraint->aspectRatio();
                                });

                                $resizedFilename = make_slug($name . '-' . $resize['width'] . 'x' . $resize['height']) . '.' . $extension;

                                $resizedImage->save(public_path('storage/') . $resizedFilename);
                            }
                        }
                    }
                }
            }

            Media::create([
                'name' => $name,
                'url' => $slugify,
                'extention' => $extension,
                'fullurl' => '/storage/' . $fileName,
                'alt' => $name,
                'width' => $width ?? '',
                'height' => $height ?? '',
                'size' => (int) $fsize . 'KB',
                'date' => date('Y-m-d H:i:s')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Media $media)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Media $media)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $medium)
    {
        $medium->update($request->all());
        return redirect()->route('media.index')->with('message', 'Update Successfully');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Media $media)
    // {
    //     //
    // }

    public function mediadestroy($image_id)
    {
        $media = Media::findOrFail($image_id);
        removeFile($media->fullurl);

        if ($this->sizes) {
            foreach ($this->sizes as $resize) {
                if ($resize['width'] && $resize['height']) {
                    removeFile('/storage/' . $media->url . '-' . $resize['width'] . 'x' . $resize['height'] . '.' . $media->extention);
                }
            }
        }

        $media->delete();
    }
}
