<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Counters;
use Illuminate\Http\Request;
use File;
class CountersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $counter = Counters::oldest('name')->paginate(20);
        return view('admin.counter.index', compact('counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
       

        if ($request->hasFile('file')) {
        $filePath = fileUpload($request,'file','counter');
        $input['file'] = $filePath; // Save the file path
        }
        $input['image'] = fileUpload($request, 'image','counter');
        $counter =  Counters::create($input);
        $counter->update(['slug' => $slug]);
        return redirect()->route('counter.edit', $counter->id)->with('message', 'Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Counters $counter)
    {
         return view('admin.counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Counters $counter)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $counter->image;
        $old_file = $counter->file;

        $input = $request->all();
        $image = fileUpload($request, 'image','counter');
        $file = fileUpload($request, 'file', 'counter');


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


        //  if ($request->hasFile('file')) {
        // // Delete the old file if it exists
        // if ($counter->file && \Storage::exists($counter->file)) {
        //     \Storage::delete($counter->file);
        // }

        // // Store the new file
        // $filePath = $request->file('file')->store('public/uploads');
        // $input['file'] = $filePath;
        // }

        $counter->update($input);
        return redirect()->route('counter.edit', $counter->id)->with('message', 'Update Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counters $counter)
    {
        removeFile($counter->image);
        $counter->delete();
        return redirect()->route('counter.index')->with('message', 'Delete Successfully');
    }
}
