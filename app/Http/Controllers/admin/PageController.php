<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::oldest('name')->paginate(20);
        return view('admin.page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
        $input['image'] = fileUpload($request, 'image', $slug);
        
        // Handle the second image upload
        $input['image_2'] = fileUpload($request, 'image_2', $slug); // Adding image_2
        $input['description_2'] = $request->description_2 ?? null; // Handle description_2

        $page = Page::create($input);
        $page->update(['slug' => $slug]);

        return redirect()->route('page.edit', $page->id)->with('message', 'Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Page $page)
    {
        $old_image = $page->image;
        $old_image_2 = $page->image_2; // Save the old image_2 path
        $input = $request->all();
 
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $image = fileUpload($request, 'image', $input['slug']);
        
        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        // Handle the second image update
        $image_2 = fileUpload($request, 'image_2', $input['slug']);
        if ($image_2) {
            removeFile($old_image_2);
            $input['image_2'] = $image_2; // Update image_2 if a new one is uploaded
        } else {
            unset($input['image_2']);
        }

        // Handle the second description update
        $input['description_2'] = $request->description_2 ?? $page->description_2;

        $page->update($input);
        return redirect()->route('page.edit', $page->id)->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        removeFile($page->image);
        removeFile($page->image_2); // Remove the second image if it exists
        $page->delete();
        return redirect()->route('page.index')->with('message', 'Deleted Successfully');
    }

    /**
     * Handle file upload for image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @param  string  $folder
     * @return string
     */
    // public function fileUpload(Request $request, $name, $folder = '')
    // {
    //     $imageName = '';
    //     if ($image = $request->file($name)) {
    //         $fd = $folder != '' ? '/'.$folder : ''; // Folder path
    //         $fdname = $folder != '' ? $folder . '/' : '';
    //         $destinationPath = public_path() . '/admin/images/page' . $fd;
    //         $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
    //         $image->move($destinationPath, $imageName);
    //         $image = $fdname . $imageName;
    //     }
    //     return $image;
    // }

    /**
     * Remove a file from storage.
     *
     * @param  string  $file
     * @return void
     */
    // public function removeFile($file)
    // {
    //     $path = public_path() . '/admin/images/page/' . $file;
    //     if (File::exists($path)) {
    //         File::delete($path);
    //     }
    // }
}
