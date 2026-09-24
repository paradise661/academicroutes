<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Http\Requests\StoreAgencyRequest;
use App\Http\Requests\UpdateAgencyRequest;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $agencies = Agency::latest()->paginate(10);
        return view('admin.agency.index', compact('agencies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Agency $agency
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
        return view('admin.agency.create');
    }
    public function show(Agency $agency)
    {
        return view('admin.agency.show', compact('agency'));
    }


    public function edit(Agency $agency)
    {
        return view('admin.agency.edit', compact('agency'));
    }
    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        $old_image = $agency->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'register');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $agency->update($input);
        return redirect()->route('agency.edit', $agency->id)->with('message', 'Update Successfully');
    }
    public function destroy(Agency $agency)
    {
        if ($agency->delete()) {
            removeFile($agency->image);
            return redirect()->route('agency.index')->with('message', 'Agency deleted successfully.');
        }

        return redirect()->route('agency.index')->with('error', 'Failed to delete the agency.');
    }

    /**
     * Store a new inquiry from the registration form.
     *
     * @param  StoreAgencyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAgencyRequest $request)
    {
        $data = $request->except('image');


        $data['registration_certificate_path'] = fileUpload($request, 'registration_certificate_path', 'register');
        $data['pan_certificate_path'] = fileUpload($request, 'pan_certificate_path', 'register');
        $data['tourism_certificate_path'] = fileUpload($request, 'tourism_certificate_path', 'register');
        $data['nrb_certificate_path'] = fileUpload($request, 'nrb_certificate_path', 'register');
        $data['has_tax_clearance'] = fileUpload($request, 'has_tax_clearance', 'register');
        $data['tax_clearance_path'] = fileUpload($request, 'tax_clearance_path', 'register');
        $data['company_logo_path'] = fileUpload($request, 'company_logo_path', 'register');
        $data['photo'] = fileUpload($request, 'photo', 'register');
        Agency::create($data);

        return redirect()->back()->with('message', 'Your message has been submitted successfully.');
    }
}
