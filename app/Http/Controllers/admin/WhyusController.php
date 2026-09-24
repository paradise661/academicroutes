<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Whyus;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class WhyusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyus = Whyus::oldest('name')->paginate(20);
        return view('admin.whyus.index', compact('whyus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.whyus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image','whyus');
        $whyu =  Whyus::create($input);

        return redirect()->route('whyus.edit', $whyu->id)
            ->with('message', 'Created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sliders  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Whyus $whyu)
    {
        return view('admin.whyus.edit', compact('whyu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Sliders  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Whyus $whyu)
    {
        $old_image = $whyu->image;
        $input = $request->all();
 
        $image = fileUpload($request, 'image','whyus');
 
        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
 
        $whyu->update($input);

        return redirect()->route('whyus.edit', $whyu->id)
            ->with('message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whyus  $Whyu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whyus $whyu)
    {
        // Delete the image if it exists

        removeFile($whyu->image);

        $whyu->delete();

        return redirect()->route('whyus.index')
            ->with('message', 'Deleted successfully!');
    }
}
