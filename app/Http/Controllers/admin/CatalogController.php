<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Catalog;
use Illuminate\Http\Request;
use File;
class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $catalog = Catalog::oldest('name')->paginate(20);
        return view('admin.catalog.index', compact('catalog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.create');
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
        $filePath = fileUpload($request,'file','catalog');
        $input['file'] = $filePath; // Save the file path
        }
        $input['image'] = fileUpload($request, 'image','catelog');
        $catalog =  Catalog::create($input);
        $catalog->update(['slug' => $slug]);
        return redirect()->route('catalog.edit', $catalog->id)->with('message', 'Created Successfully');
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
    public function edit(Catalog $catalog)
    {
         return view('admin.catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Catalog $catalog)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $catalog->image;
        $old_file = $catalog->file;
        $input = $request->all();
        $image = fileUpload($request, 'image','catelog');
 
        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }


        
        $file = fileUpload($request,'file','catelog');
        if ($file) {
            removeFile($old_file);
            $input['file'] = $file;
        } else {
            unset($input['file']);
        }


        $catalog->update($input);
        return redirect()->route('catalog.edit', $catalog->id)->with('message', 'Update Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        removeFile($catalog->image);
        $catalog->delete();
        return redirect()->route('catalog.index')->with('message', 'Delete Successfully');
    }
}
