<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\EventDate;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::oldest('order')->paginate(10);
        return view('admin.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }


    public function store(StoreEventRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'event');
        $input['icon_image'] = fileUpload($request, 'icon_image', 'event');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $event = Event::create($input);
        $event->update(['slug' => $slug]);
        
        // Save additional event dates if provided
        if ($request->has('additional_dates')) {
            foreach ($request->additional_dates as $dateData) {
                if (isset($dateData['date']) && isset($dateData['time']) && isset($dateData['location']) && 
                    !empty($dateData['date']) && !empty($dateData['time']) && !empty($dateData['location'])) {
                    $event->eventDates()->create([
                        'date' => $dateData['date'],
                        'time' => $dateData['time'],
                        'location' => $dateData['location']
                    ]);
                }
            }
        }
        
        return redirect()->route('event.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }


    public function update(UpdateEventRequest $request, Event $event)
    {
        $old_image = $event->image;
        $old_icon_image = $event->icon_image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'event');
        $icon_image = fileUpload($request, 'icon_image', 'event');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        if ($icon_image) {
            removeFile($old_icon_image);
            $input['icon_image'] = $icon_image;
        } else {
            unset($input['icon_image']);
        }

        $input['slug'] = make_slug($request->name);
        $event->update($input);
        
        // Update additional event dates
        $event->eventDates()->delete();
        if ($request->has('additional_dates')) {
            foreach ($request->additional_dates as $dateData) {
                if (!empty($dateData['date']) && !empty($dateData['time']) && !empty($dateData['location'])) {
                    $event->eventDates()->create([
                        'date' => $dateData['date'],
                        'time' => $dateData['time'],
                        'location' => $dateData['location']
                    ]);
                }
            }
        }
        
        return redirect()->route('event.edit', $event->id)->with('message', 'Update Successfully');
    }


    public function destroy(Event $event)
    {
        removeFile($event->image);
        removeFile($event->icon_image);
        $event->delete();
        return redirect()->route('event.index')->with('message', 'Delete Successfully');
    }
}
