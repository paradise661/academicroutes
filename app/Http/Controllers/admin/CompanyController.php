<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $company = Company::oldest('name')->paginate(20);
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CompanyCategory::whereStatus(1)->get();
        return view('admin.company.create', compact('category'));
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
        $filePath = fileUpload($request,'file','company');
        $input['file'] = $filePath; // Save the file path
        }
        $input['image'] = fileUpload($request, 'image','company');
        $company =  company::create($input);
        $company->update(['slug' => $slug]);
        return redirect()->route('company.edit', $company->id)->with('message', 'Created Successfully');
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
    public function edit(Company $company)
    {
        $category = CompanyCategory::whereStatus(1)->get();
        return view('admin.company.edit', compact(['company', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Company $company)
    {
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $old_image = $company->image;
        $old_file = $company->file;

        $input = $request->all();
        $image = fileUpload($request, 'image','company');
        $file = fileUpload($request, 'file', 'company');


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
        // if ($company->file && \Storage::exists($company->file)) {
        //     \Storage::delete($company->file);
        // }

        // // Store the new file
        // $filePath = $request->file('file')->store('public/uploads');
        // $input['file'] = $filePath;
        // }

        $company->update($input);
        return redirect()->route('company.edit', $company->id)->with('message', 'Update Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        removeFile($company->image);
        $company->delete();
        return redirect()->route('company.index')->with('message', 'Delete Successfully');
    }
}
