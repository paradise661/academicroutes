<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Contacts;
use App\Http\Requests\StoreContactsRequest;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts = Contacts::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }


    public function show(Contacts $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }


    public function destroy(Contacts $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Delete Successfully');
    }

    public function inquiry(StoreContactsRequest $request)
    {
        Contacts::create($request->all());
        return redirect()->back()->with('message', 'Your message have been submitted successfully.');
    }
}
