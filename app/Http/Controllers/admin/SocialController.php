<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{

    public function index()
    {
        $social = Social::latest()->paginate(10);
        return view('admin.social.index', compact('social'));
    }

    public function create()
    {
        return view('admin.social.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'social');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $social =  Social::create($input);
        $social->update(['slug' => $slug]);
        return redirect()->route('social.index')->with('message', 'Created Successfully');
    }


    public function edit(Social $social)
    {
        return view('admin.social.edit', compact('social'));
    }


    public function update(UpdateNewsRequest $request, Social $social)
    {
        $old_image = $social->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'social');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = make_slug($request->name);
        $social->update($input);
        return redirect()->route('social.edit', $social->id)->with('message', 'Update Successfully');
    }

    public function destroy(Social $social)
    {
        removeFile($social->image);
        $social->delete();
        return redirect()->route('social.index')->with('message', 'Delete Successfully');
    }
}
