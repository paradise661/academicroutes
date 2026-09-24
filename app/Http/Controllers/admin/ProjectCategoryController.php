<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategory::paginate(20);
        return view('admin.projectcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projectcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $slug = make_slug($request->name);
        $projectcategory = ProjectCategory::create($input);

        //Unique SLugs
        if (ProjectCategory::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $projectcategory->id;
        } else {
            $input['slug'] = $slug;
        }

        $projectcategory->update($input);

        return redirect()->route('projectcategory.edit', $projectcategory->id)->with('success', 'New Category Created');
    }

    /**
     * Display the specified resource.
     */
    // public function show(ProjectCategory $projectCategory)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectcategory)
    {
        return view('admin.projectcategory.edit', compact(['projectcategory']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $projectcategory)
    {
        $input = $request->all();

        //Unique SLugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (ProjectCategory::where('slug', $slug)->where('id', '!=', $projectcategory->id)->exists()) {
            $input['slug'] = $slug . '-' . $projectcategory->id;
        } else {
            $input['slug'] = $slug;
        }

        $projectcategory->update($input);

        return redirect()->route('projectcategory.edit', $projectcategory->id)->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectcategory)
    {
        $projectcategory->delete();
        return redirect()->route('projectcategory.index')->with('message', 'Delete Successfully');
    }
}
