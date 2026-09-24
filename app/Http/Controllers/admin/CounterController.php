<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Counter;
use File;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::oldest('order')->paginate(20);
        return view('admin.counters.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        Counter::create($input);
        return redirect()->route('counters.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    // public function show(Counter $counter)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('admin.counters.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, Counter $counter)
    {
        $input = $request->all();

        $counter->update($input);
        return redirect()->route('counters.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Counter $counter)
    {
        $counter->delete();
        return redirect()->route('counters.index')->with('message', 'Delete Successfully');
    }
}
