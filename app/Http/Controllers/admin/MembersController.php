<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::latest()->paginate(10);
        return view('admin.members.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {

        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'member');
        $member =  Member::create($input);
        return redirect()->route('members.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $old_image = $member->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'member');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $member->update($input);
        return redirect()->route('members.edit', $member->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        removeFile($member->image);
        $member->delete();
        return redirect()->route('members.index')->with('message', 'Delete Successfully');
    }
}
