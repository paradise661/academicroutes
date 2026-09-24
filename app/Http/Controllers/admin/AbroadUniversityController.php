<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abroad;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use Illuminate\Support\Str;

class AbroadUniversityController extends Controller
{

    public function createUniversity($abroad_id)
    {
        $abroad = Abroad::findOrFail($abroad_id);
        return view('admin.university.create', compact('abroad'));
    }

    public function editUniversity($university_id)
    {

        $university = University::where("id", $university_id)->first();
        $abroad = Abroad::where("id", $university->abroad_id)->first();

        return view('admin.university.edit', compact('university', 'abroad'));
    }



    public function showUniversities($abroad_id)
    {

        $abroad = Abroad::findOrFail($abroad_id);


        $universities = $abroad->universities()->orderBy('order', 'asc')->paginate(10);

        return view('admin.university.index', compact('abroad', 'universities'));
    }


    public function storeUniversity(StoreUniversityRequest $request)
    {

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = fileUpload($request, 'image', 'universities');
            $input['image'] = $image;
        }

        $input['slug'] = Str::slug($request->university_name);


        University::create($input);


        return redirect()->route('abroad.index')->with('message', 'University created successfully!');
    }


    public function updateUniversity(UpdateUniversityRequest  $request, $abroad_id, University $university)
    {
        $input = $request->all();

        $old_image = $university->image;


        if ($request->hasFile('image')) {

            removeFile($old_image);
            $image = fileUpload($request, 'image', 'universities');
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }



        $input['slug'] = Str::slug($request->name);


        $university->update($input);


        return redirect()->route('universities.index', ['abroad_id' => $university->abroad_id])
            ->with('message', 'University updated successfully');
    }

    public function destroy($abroad_id, University $university)
    {

        if ($university) {
            $university->delete();
            return redirect()->route('universities.index', ['abroad_id' => $abroad_id])
                ->with('message', 'University deleted successfully!');
        }

        return redirect()->route('universities.index', ['abroad_id' => $abroad_id])
            ->with('error', 'University not found!');
    }
}
