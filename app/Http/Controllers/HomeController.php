<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Faq;
use App\Models\Member;
use App\Models\News;
use App\Models\Branch;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Register;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contacts::all();
        $news = News::all();
        $branches = Branch::all();
        $teams = Member::all();
        $appointments = Appointment::all();
        // $faqs = Faq::all();
        $register = Register::all();
        return view('admin.dashboard', compact(['contacts', 'news','branches','teams','register','appointments']));
    }
}
