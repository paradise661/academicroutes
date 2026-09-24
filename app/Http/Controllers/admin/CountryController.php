<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use File;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $country = Country::oldest('name')->paginate(20);
        return view('admin.country.index', compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
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
        $filePath = fileUpload($request,'file','country');
        $input['file'] = $filePath; // Save the file path
        }
        $input['image'] = fileUpload($request, 'image','country');
        $country =  Country::create($input);
        $country->update(['slug' => $slug]);
        return redirect()->route('country.edit', $country->id)->with('message', 'Created Successfully');
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
    public function edit(Country $country)
    {
         return view('admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Country $country)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $country->image;
        $old_file = $country->file;
        $input = $request->all();
        $image = fileUpload($request, 'image','country');
        $file = fileUpload($request, 'file', 'country');


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
        // if ($country->file && \Storage::exists($country->file)) {
        //     \Storage::delete($country->file);
        // }

        // // Store the new file
        // $filePath = $request->file('file')->store('public/uploads');
        // $input['file'] = $filePath;
        // }

        $country->update($input);
        return redirect()->route('country.edit', $country->id)->with('message', 'Update Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        removeFile($country->image);
        $country->delete();
        return redirect()->route('country.index')->with('message', 'Delete Successfully');
    }
}
