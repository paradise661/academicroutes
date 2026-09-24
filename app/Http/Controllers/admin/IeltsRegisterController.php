<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IeltsRegister;
use App\Http\Requests\StoreIeltsRegisterRequest;
use App\Mail\IeltsRegistrationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IeltsRegisterController extends Controller
{
    // List the IELTS registrations
    public function index()
    {
        $ieltsRegisters = IeltsRegister::latest()->paginate(10);
        return view('admin.ielts-register.index', compact('ieltsRegisters'));
    }

    // Show a specific IELTS registration
    public function show(IeltsRegister $ielts_admin)
    {
        return view('admin.ielts-register.show', ['ieltsRegister' => $ielts_admin]);
    }

    // Delete an IELTS registration
    public function destroy(IeltsRegister $ielts_admin)
    {
        $ielts_admin->delete();
        return redirect()->route('ielts-admin.index')
            ->with('message', 'IELTS Registration deleted successfully');
    }

    // Store a new IELTS registration
    public function store(StoreIeltsRegisterRequest $request)
    {
        try {
            $data = $request->validated();
            IeltsRegister::create($data);
            
            // Try to send email, but don't fail if email fails
            try {
                Mail::to('shrayash000@gmail.com')->send(new IeltsRegistrationMail($data));
            } catch (\Exception $emailError) {
                // Log email error but continue with success response
                \Log::error('Email sending failed: ' . $emailError->getMessage());
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Form submitted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
