<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branchtab;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    public function index()
    {
        $branch = Branch::latest()->paginate(10);
        return view('admin.branch.index', compact('branch'));
    }

    public function create()
    {
        $fields = [
            'title' => 'Title',
            'slug' => 'Slug',
            'category' => 'Category',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'seo_title' => 'SEO Title',
            'seo_description' => 'SEO Description',
            'seo_keywords' => 'SEO Keywords',
            'location' => 'Location',
            'email' => 'Email',
            'phone' => 'Phone',
            'branch_name' => 'Branch Name',
        ];
        $tabs = Branchtab::all();
        return view('admin.branch.create', compact('fields', 'tabs'));
    }

    public function store(StoreBranchRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'branch');
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = Str::slug($request->title); // Fixed slug generation

        // Create the branch
        Branch::create($input);

        return redirect()->route('branch.index')->with('message', 'Branch created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Branch $branch)
    {
        $fields = [
            'title' => 'Title',
            'slug' => 'Slug',
            'category' => 'Category',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'seo_title' => 'SEO Title',
            'seo_description' => 'SEO Description',
            'seo_keywords' => 'SEO Keywords',
            'location' => 'Location',
            'email' => 'Email',
            'phone' => 'Phone',
            'branch_name' => 'Branch Name',
        ];
        $tabs = Branchtab::all();
        return view('admin.branch.edit', compact('branch', 'fields', 'tabs'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $old_image = $branch->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'branch');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = Str::slug($request->title); // Fixed slug generation
        $branch->update($input);

        return redirect()->route('branch.index')->with('message', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        removeFile($branch->image);
        $branch->delete();

        return redirect()->route('branch.index')->with('message', 'Branch deleted successfully.');
    }
}
