<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;
use File;
class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $faq = FAQ::oldest('name')->paginate(20);
        return view('admin.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
        $filePath = fileUpload($request,'file','faq');
        $input['file'] = $filePath; // Save the file path
        }
        $input['image'] = fileUpload($request, 'image','faq');
        $faq =  FAQ::create($input);
        $faq->update(['slug' => $slug]);
        return redirect()->route('faq.edit', $faq->id)->with('message', 'Created Successfully');
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
    public function edit(FAQ $faq)
    {
         return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, FAQ $faq)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $faq->image;
        $old_file = $faq->file;
        $input = $request->all();
        $image = fileUpload($request, 'image','faq');
        $file = fileUpload($request, 'file', 'faq');


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
        // if ($faq->file && \Storage::exists($faq->file)) {
        //     \Storage::delete($faq->file);
        // }

        // // Store the new file
        // $filePath = $request->file('file')->store('public/uploads');
        // $input['file'] = $filePath;
        // }

        $faq->update($input);
        return redirect()->route('faq.edit', $faq->id)->with('message', 'Update Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        removeFile($faq->image);
        $faq->delete();
        return redirect()->route('faq.index')->with('message', 'Delete Successfully');
    }
   
}
