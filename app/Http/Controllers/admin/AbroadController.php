<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abroad;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbroadRequest;
use App\Http\Requests\UpdateAbroadRequest;
use Illuminate\Support\Str;
use File;

class AbroadController extends Controller
{

    public function index()
    {
        $abroads = Abroad::latest()->paginate(10);
        return view('admin.abroad.index', compact('abroads'));
    }

    public function create()
    {
        return view('admin.abroad.create');
    }




    public function store(StoreAbroadRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = fileUpload($request, 'image', 'abroad');
            $input['image'] = $image;
        }
        if ($request->hasFile('icon_image')) {
            $iconImage = fileUpload($request, 'icon_image', 'abroad/icons');
            $input['icon_image'] = $iconImage;
        }
        $input['slug'] = Str::slug($request->name);
        Abroad::create($input);
        return redirect()->route('abroad.index')->with('message', 'Created Successfully');
    }
 
    

    public function edit(Abroad $abroad)
    {
        return view('admin.abroad.edit', compact('abroad'));
    }


    public function update(UpdateAbroadRequest $request, Abroad $abroad)
    {
        $input = $request->all();
        $old_icon_image = $abroad->icon_image;
        $old_image = $abroad->image;


        if ($request->hasFile('image')) {
            removeFile($old_image);
            $image = fileUpload($request, 'image', 'abroad');
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }


        if ($request->hasFile('icon_image')) {
            removeFile($old_icon_image);
            $iconImage = fileUpload($request, 'icon_image', 'abroad/icons');
            $input['icon_image'] = $iconImage;
        } else {
            unset($input['icon_image']);
        }


        $input['slug'] = Str::slug($request->name);


        $abroad->update($input);


        return redirect()->route('abroad.index')->with('message', 'Updated Successfully');
    }


    public function destroy(Abroad $abroad)
    {

        removeFile($abroad->image);
        removeFile($abroad->icon_image);


        $abroad->delete();


        return redirect()->route('abroad.index')->with('message', 'Deleted Successfully');
    }


    public function createUniversity($abroad_id)
    {
        $abroad = Abroad::findOrFail($abroad_id);
        return view('admin.university.show', compact('abroad'));
    }

    public function showUniversities($abroad_id)
    {

        $abroad = Abroad::findOrFail($abroad_id);


        $universities = $abroad->universities()->paginate(10);

        return view('admin.university.index', compact('abroad', 'universities'));
    }


    public function storeUniversity(StoreAbroadRequest $request)
    {

        $validatedData = $request->validated();


        $input = $validatedData;


        if ($request->hasFile('image')) {
            $image = fileUpload($request, 'image', 'universities');
            $input['image'] = $image;
        }


        if ($request->hasFile('icon_image')) {
            $iconImage = fileUpload($request, 'icon_image', 'universities/icons');
            $input['icon_image'] = $iconImage;
        }


        $input['slug'] = Str::slug($request->university_name);

        University::create($input);


        return redirect()->route('abroad.index')->with('message', 'University created successfully!');
    }

    public function updateUniversity(UpdateAbroadRequest $request, $abroad_id, University $university)
    {
        $input = $request->all();
        $old_icon_image = $university->icon_image;
        $old_image = $university->image;


        if ($request->hasFile('image')) {

            removeFile($old_image);
            $image = fileUpload($request, 'image', 'universities');
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }


        if ($request->hasFile('icon_image')) {

            removeFile($old_icon_image);
            $iconImage = fileUpload($request, 'icon_image', 'universities/icons');
            $input['icon_image'] = $iconImage;
        } else {
            unset($input['icon_image']);
        }


        $input['slug'] = Str::slug($request->name);


        $university->update($input);


        return redirect()->route('universities.index', ['abroad_id' => $university->abroad_id])
            ->with('message', 'University updated successfully');
    }
}
