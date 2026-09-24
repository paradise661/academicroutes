<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apply;
use App\Http\Requests\StoreApplyRequest;
use App\Http\Requests\UpdateApplyRequest;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $apply = Apply::latest()->paginate(10);
        return view('admin.apply.index', compact('apply'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Apply $apply
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     //
    //     return view('admin.apply.create');
    // }
    public function show(Apply $apply)
    {
        return view('admin.apply.show', compact('apply'));
    }


    public function edit(Apply $apply)
    {
        return view('admin.apply.edit', compact('apply'));
    }
    public function update(UpdateApplyRequest $request, Apply $apply)
    {
        $old_image = $apply->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'apply');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $apply->update($input);
        return redirect()->route('apply.edit', $apply->id)->with('message', 'Update Successfully');
    }
    public function destroy(Apply $apply)
    {
        if ($apply->delete()) {
            removeFile($apply->image);
            return redirect()->route('apply.index')->with('message', 'Apply deleted successfully.');
        }

        return redirect()->route('apply.index')->with('error', 'Failed to delete the apply.');
    }

    /**
     * Store a new inquiry from the registration form.
     *
     * @param  StoreApplyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreApplyRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'address',
            'number',
            'country',
            'university',
            'course',
            'academic_qualification',
            'academic_score',
            'english_score',
            'passed_year'
        ]);

        $data['bachelor_certificate'] = fileUpload($request, 'bachelor_certificate', 'apply');
        $data['master_certificate'] = fileUpload($request, 'master_certificate', 'apply');
        $data['diploma'] = fileUpload($request, 'diploma', 'apply');
        $data['cv'] = fileUpload($request, 'cv', 'apply');
        $data['grade_twelve'] = fileUpload($request, 'grade_twelve', 'apply');
        $data['other'] = fileUpload($request, 'other', 'apply');
        $data['passport'] = fileUpload($request, 'passport', 'apply');
        $data['ielts'] = fileUpload($request, 'ielts', 'apply');

        Apply::create($data);
        return redirect()->back()->with('message', 'Your message has been submitted successfully.');






        // Apply::create($request->all());

        // return redirect()->back()->with('message', 'Your message has been submitted successfully.');
    }
}
