<?php

namespace App\Http\Controllers\Admin;

use App\Models\Careers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $career = Careers::oldest('name')->paginate(20);
        return view('admin.careers.index', compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $slug = make_slug($request->name);
        $career =  Careers::create($input);
        $career->update(['slug' => $slug]);
        return redirect()->route('careers.edit', $career->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Careers $career)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Careers $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Careers $career)
    {
        $input = $request->all();
        $input['slug'] = make_slug($request->name);
        $career->update($input);
        return redirect()->route('careers.edit', $career->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Careers $career)
    {
        $career->delete();
        return redirect()->route('careers.index')->with('message', 'Delete Successfully');
    }
}
