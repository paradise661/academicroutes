<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchtabRequest;
use App\Http\Requests\UpdateBranchtabRequest;
use App\Models\Branchtab;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BranchtabController extends Controller
{
    public function index()
    {
        $branchtab = Branchtab::latest()->paginate(10);
        return view('admin.branchtab.index', compact('branchtab'));
    }
    public function create()
    {
        return view('admin.branchtab.create');
    }

    public function store(StoreBranchtabRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'branch');
        Branchtab::create($input);

        return redirect()->route('branchtab.index')->with('message', 'Branchtab created successfully.');
    }

    public function edit(Branchtab $branchtab)
    {

        return view('admin.branchtab.edit', compact('branchtab'));
    }

    public function update(UpdateBranchtabRequest $request, Branchtab $branchtab)
    {

        $input = $request->all();
        $old_image = $branchtab->image;
        $image = fileUpload($request, 'image', 'branch');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        };
        $branchtab->update($input);

        return redirect()->route('branchtab.index')->with('message', 'Branchtab updated successfully.');
    }
    public function destroy(Branchtab $branchtab)
    {
        removeFile($branchtab->image);
        $branchtab->delete();

        return redirect()->route('branchtab.index')->with('message', 'Branchtab deleted successfully.');
    }
}
