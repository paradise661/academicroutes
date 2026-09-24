<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    // List the Appointment
    public function index()
    {
        $appointment = Appointment::latest()->paginate(10);
        return view('admin.appointment.index', compact('appointment'));
    }

    // Show a specific Appointment
    public function show(Appointment $appointment)
    {
        return view('admin.appointment.show', compact('appointment'));
    }

    // Delete a Appointment
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointment.index')->with('message', 'Delete Successfully');
    }

    // Store a new Appointment
    public function store(StoreAppointmentRequest $request)
    {
        Appointment::create($request->all());
        // dd($request);
        session()->flash('success', 'Your appointment has been successfully submitted!');

        return redirect()->back()->with('message', 'Your Appointment has been submitted successfully.');
    }
}
