<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use Session;
use File;
use Illuminate\Support\Str;
use PHPUnit\Framework\Error\Notice;

class VideoController extends Controller
{

    public function index()
    {
        $video = Video::latest()->paginate(10);
        return view('admin.video.index', compact('video'));
    }


    public function create()
    {
        return view('admin.video.create');
    }


    public function store(StoreVideoRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'video');
        $video =  Video::create($input);
        return redirect()->route('videos.index')->with('message', 'Created Successfully');
    }


    public function edit(Video $video)
    {
        return view('admin.video.edit', compact('video'));
    }


    public function update(UpdateVideoRequest $request, Video $video)
    {
        $old_image = $video->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'video');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $video->update($input);
        return redirect()->route('videos.edit', $video->id)->with('message', 'Update Successfully');
    }

    public function destroy(Video $video)
    {
        removeFile($video->image);
        $video->delete();
        return redirect()->route('videos.index')->with('message', 'Delete Successfully');
    }
}
