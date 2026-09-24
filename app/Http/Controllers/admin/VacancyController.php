<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Vacancy;
use App\Http\Requests\StoreVacancyRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancy = Vacancy::latest()->paginate(10);
        return view('admin.vacancy.index', compact('vacancy'));
    }


    public function show(Vacancy $vacancy)
{
    return view('admin.vacancy.show', compact('vacancy'));
}

public function destroy(Vacancy $vacancy)
{
    removeFile($vacancy->resume);
    $vacancy->delete();
    return redirect()->route('vacancy.index')->with('message', 'Delete Successfully');
}

public function store(StoreVacancyRequest $request)
{
    $data = $request->all();

    // Handle file upload
    // if ($request->hasFile('resume')) {
    //     $file = $request->file('resume');
    //     $filename = time() . '_' . $file->getClientOriginalName();
    //     $path = $file->storeAs('resumes', $filename, 'public');
    //     $data['resume'] = $path;
    // }
    $data['resume'] = fileUpload($request,'ressume','vacancy');

    Vacancy::create($data);

    return redirect()->back()->with('message', 'Your message has been submitted successfully.');
}
}
