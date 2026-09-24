<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use File;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $services = Service::oldest('name')->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
       
        $input['image'] = fileUpload($request, 'image','service');
        // $input['file'] = fileUpload($request, 'file', 'service');
        $services =  Service::create($input);
        $services->update(['slug' => $slug]);
        return redirect()->route('services.edit', $services->id)->with('message', 'Created Successfully');
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
    public function edit(Service $service)
    {
         return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Service $service)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $service->image;
        // $old_file = $service->file;

        $input = $request->all();
        $image = fileUpload($request, 'image','service');
        // $file = fileUpload($request, 'file', 'service');


        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        // if ($file) {
        //     removeFile($old_file);
        //     $input['file'] = $file;
        // } else {
        //     unset($input['file']);
        // }


        

        //  if ($request->hasFile('file')) {
        // // Delete the old file if it exists
        // if ($service->file && \Storage::exists($service->file)) {
        //     \Storage::delete($services->file);
        // }

        // // Store the new file
        // $filePath = $request->file('file')->store('public/uploads');
        // $input['file'] = $filePath;
        // }

        $service->update($input);
        return redirect()->route('services.edit', $service->id)->with('message', 'Update Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        removeFile($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('message', 'Delete Successfully');
    }

}
