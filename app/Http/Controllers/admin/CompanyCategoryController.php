<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Http\Controllers\Controller;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

class CompanyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CompanyCategory::paginate(20);
        return view('admin.companycategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companycategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // Upload image and icon
        $input['image'] = fileUpload($request, 'image','companycategory');
        $input['icon'] = fileUpload($request, 'icon','companycategory');  // Handling icon upload

        $slug = make_slug($request->name);
        $companyCategory = CompanyCategory::create($input);

        // Unique Slugs
        if (CompanyCategory::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $companyCategory->id;
        } else {
            $input['slug'] = $slug;
        }

        $companyCategory->update($input);

        return redirect()->route('companycategory.edit', $companyCategory->id)->with('success', 'New Category Created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyCategory $companycategory)
    {
        return view('admin.companycategory.edit', compact(['companycategory']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyCategory $companycategory)
    {
        $old_image = $companycategory->image;
        $old_icon = $companycategory->icon;
        $input = $request->all();

        // Upload new image and icon if provided
        $image = fileUpload($request, 'image','companycategory');
        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $icon = fileUpload($request, 'icon','companycategory');
        if ($icon) {
            removeFile($old_icon);
            $input['icon'] = $icon;
        } else {
            unset($input['icon']);
        }

        // Unique Slugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (CompanyCategory::where('slug', $slug)->where('id', '!=', $companycategory->id)->exists()) {
            $input['slug'] = $slug . '-' . $companycategory->id;
        } else {
            $input['slug'] = $slug;
        }

        $companycategory->update($input);

        return redirect()->route('companycategory.edit', $companycategory->id)->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyCategory $companycategory)
    {
        removeFile($companycategory->image);
        removeFile($companycategory->icon);  // Remove icon as well
        $companycategory->delete();
        return redirect()->route('companycategory.index')->with('message', 'Delete Successfully');
    }

}
