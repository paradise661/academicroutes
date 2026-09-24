<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::oldest('name')->paginate(20);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image','sliders');
        $slider =  Sliders::create($input);

        return redirect()->route('slider.edit', $slider->id)
            ->with('message', 'Slider created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sliders  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Sliders $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Sliders  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Sliders $slider)
    {
        $old_image = $slider->image;
        $input = $request->all();
 
        $image = fileUpload($request, 'image','sliders');
 
        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
 
        $slider->update($input);

        return redirect()->route('slider.edit', $slider->id)
            ->with('message', 'Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sliders  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sliders $slider)
    {
        // Delete the image if it exists

        removeFile($slider->image);

        $slider->delete();

        return redirect()->route('slider.index')
            ->with('message', 'Slider deleted successfully!');
    }
}
