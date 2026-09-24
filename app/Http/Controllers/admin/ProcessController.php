<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Process;
use Illuminate\Http\Request;
use File;

class ProcessController extends Controller
{
    public function index()
    {
        $process = Process::oldest('name')->paginate(20);
        return view('admin.process.index', compact('process'));
    }

    public function create()
    {
        return view('admin.process.create');
    }

    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);

        if ($request->hasFile('file')) {
            $filePath = fileUpload($request, 'file', 'process');
            $input['file'] = $filePath;
        }
        $input['image'] = fileUpload($request, 'image','process');
        $process = Process::create($input);
        $process->update(['slug' => $slug]);
        return redirect()->route('process.edit', $process->id)->with('message', 'Created Successfully');
    }

    public function edit(Process $process)
    {
        return view('admin.process.edit', compact('process'));
    }

    public function update(UpdateGlobalRequest $request, Process $process)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $process->image;
        $old_file = $process->file;
        $input = $request->all();
        $image = fileUpload($request, 'image','process');
        $file = fileUpload($request, 'file', 'process');


        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        if ($file) {
            removeFile($old_file);
            $input['file'] = $file;
        } else {
            unset($input['file']);
        }

        // if ($request->hasFile('file')) {
        //     if ($process->file && \Storage::exists($process->file)) {
        //         \Storage::delete($process->file);
        //     }
        //     $filePath = $request->file('file')->store('public/uploads');
        //     $input['file'] = $filePath;
        // }

        $process->update($input);
        return redirect()->route('process.edit', $process->id)->with('message', 'Update Successfully');
    }

    public function destroy(Process $process)
    {
        removeFile($process->image);
        $process->delete();
        return redirect()->route('process.index')->with('message', 'Delete Successfully');
    }
}
