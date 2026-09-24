<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::oldest('name')->paginate(20);
        return view('admin.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProjectCategory::whereStatus(1)->get();
        return view('admin.project.create', compact('category'));
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
        $filePath = fileUpload($request,'file','project');
        $input['file'] = $filePath; // Save the file path
        }
        $project =  Project::create($input);
        $project->update(['slug' => $slug]);
        return redirect()->route('project.edit', $project->id)->with('message', 'Created Successfully');
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
    public function edit(Project $project)
    {
        $category = ProjectCategory::whereStatus(1)->get();
        return view('admin.project.edit', compact(['project', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Project $project)
    {
        $input = $request->all();
        $old_file = $request->file;
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;

        $file = fileUpload($request,'file','project');

    
        if ($file) {
            removeFile($old_file);
            $input['file'] = $file;
        } else {
            unset($input['file']);
        }


        $project->update($input);
        return redirect()->route('project.edit', $project->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('message', 'Delete Successfully');
    }
}
