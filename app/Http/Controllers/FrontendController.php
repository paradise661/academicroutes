<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Member;
use App\Models\Careers;
use App\Models\Counter;
use App\Models\Partner;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Sliders;
use App\Models\Progress;
use App\Models\Services;
use App\Models\ClientTab;
use App\Models\ProjectCategory;
use App\Models\ClientRegistration;
use App\Models\SalientFeature;
use App\Models\Blog;
use App\Models\NewsCategory;
use App\Models\Social;
use App\Models\Catalog;
use App\Models\Country;
use App\Models\Agency;
use App\Models\Whyus;
use App\Models\Process;
use App\Models\Service;
use App\Models\FAQ;
use App\Models\News;
use App\Models\Review;
use App\Models\Abroad;
use App\Models\University;
use App\Models\Event;
use App\Models\Contacts;
use App\Models\Vacancy;
use App\Models\Register;
use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\StoreAgencyRequest;
use App\Http\Requests\StoreApplyRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Apply;
use App\Models\Appointment;
use App\Models\Branchtab;
use Illuminate\Http\JsonResponse;
use App\Models\Video;
use App\Models\IeltsRegister;
use App\Http\Requests\StoreIeltsRegisterRequest;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $today = now()->startOfDay();

        // Priority upcoming dates
        $priorityDates = ['2025-06-07', '2025-06-14'];

        // Get priority upcoming events
        $priorityUpcoming = Event::where('status', 1)
            ->whereIn('date', $priorityDates)
            ->whereDate('date', '>=', $today)
            ->orderByRaw("FIELD(date, '2025-06-07', '2025-06-14')")
            ->get();

        // Get other upcoming events (excluding priority ones)
        $remainingUpcoming = Event::where('status', 1)
            ->whereDate('date', '>=', $today)
            ->whereNotIn('date', $priorityDates)
            ->orderBy('date', 'asc')
            ->get();

        // Merge upcoming events
        $upcoming = $priorityUpcoming->merge($remainingUpcoming);

        // If less than 3, get expired events
        $needed = 3 - $upcoming->count();

        if ($needed > 0) {
            $expired = Event::where('status', 1)
                ->whereDate('date', '<', $today)
                ->orderBy('date', 'desc')
                ->take($needed)
                ->get();

            $event = $upcoming->merge($expired);
        } else {
            $event = $upcoming->take(3);
        }

        // Other unchanged queries
        $catalog = Catalog::orderBy('order', 'asc')->take(3)->get();
        $news = News::latest()->take(3)->get();
        $faq = FAQ::orderBy('order', 'asc')->take(4)->get();
        $service = Service::orderBy('order', 'asc')->take(6)->get();
        $process = Process::orderBy('order', 'asc')->take(6)->get();
        $country = Abroad::orderBy('order', 'asc')->take(3)->get();
        $review = Review::where('status', 1)->orderBy('order')->get();
        $course = Course::where('status', 1)->orderBy('order', 'asc')->get();
        $uni = University::all();
        $popups = Popup::where('status', 1)->orderBy('order')->get();

        return view('frontend.index', compact(
            'catalog',
            'country',
            'process',
            'service',
            'faq',
            'news',
            'review',
            'event',
            'uni',
            'course',
            'popups'
        ));
    }


    public function pages($slug)
    {
        $data = Page::whereSlug($slug)->first();

        if (!$data) {
            return view('errors.404');
        }

        if ($data->template == 2) {
            $members = Member::oldest('order')->paginate(4);
            return view('frontend.pages.about', compact('data', 'members'));
        } elseif ($data->template == 3) {
            return view('frontend.pages.contact', compact('data'));
        } elseif ($data->template == 17) {
            return view('frontend.pages.message', compact('data'));
        } elseif ($data->template == 18) {
            return view('frontend.pages.privacy-policy', compact('data'));
        } else {
            return view('frontend.pages.default', compact('data'));
        }
    }

    public function videos()
    {
        $video = Video::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view("frontend.videos.index", compact("video"));
    }


    public function news()
    {
        $news = News::where('status', 1)->latest()->paginate(6);
        $viewed_news = News::where('status', 1)
            ->orderBy('likes', 'desc')
            ->paginate(6);
        return view('frontend.news.index', compact('news', 'viewed_news'));
    }

    public function careers()
    {
        $careers = Careers::where('status', 1)->latest()->paginate(12);
        return view('frontend.pages.career', compact(['careers']));
    }

    public function careersingle($slug)
    {
        $content = Careers::where('slug', $slug)->where('status', 1)->first();

        if ($content) {
            $careers = Careers::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();

            if ($content->deadline) {
                $diff = now()->diffInDays($content->deadline);

                if ($diff < 8) {
                    $deadline = $diff . ' Days';
                } elseif ($diff < 15) {
                    $deadline = '2 Weeks';
                } elseif ($diff < 22) {
                    $deadline = '3 Weeks';
                } elseif ($diff < 29) {
                    $deadline = '4 Weeks';
                } elseif ($diff < 36) {
                    $deadline = '5 Weeks';
                } elseif ($diff < 43) {
                    $deadline = '6 Weeks';
                } elseif ($diff < 50) {
                    $deadline = '7 Weeks';
                } else {
                    $deadline = '8+ Weeks';
                }
            } else {
                $deadline = '';
            }

            // ✅ This was missing
            return view('frontend.careers.show', compact('content', 'careers', 'deadline'));
        } else {
            return view('errors.404');
        }
    }

    public function newssingle($slug)
    {
        $data = News::where('status', 1)->whereSlug($slug)->first();
        $viewed_news = News::where('status', 1)
            ->orderBy('likes', 'desc')
            ->paginate(6);
        if ($data) {
            $news = News::where('status', 1)->where('id', '!=', $data->id)->latest()->limit(6)->get();
            return view('frontend.news.show', compact('data', 'news', 'viewed_news'));
        }
    }
    public function catlogsingle($slug)
    {
        $data = Catalog::where('status', 1)->whereSlug($slug)->first();
        if ($data) {
            $catalog = Catalog::where('status', 1)->where('id', '!=', $data->id)->latest()->limit(6)->get();
            return view('frontend.news.show', compact('data', 'news'));
        }
    }
    public function service()
    {
        $service = Service::where('status', 1)->oldest('order')->get();
        return view('frontend.service.index', compact('service'));
    }
    public function servicesingle($slug)
    {
        $data = Service::where('status', 1)->whereSlug($slug)->first();
        if ($data) {
            $service = Service::where('status', 1)->where('id', '!=', $data->id)->latest()->limit(8)->get();
            return view('frontend.service.show', compact('data', 'service'));
        }
    }

    public function team()
    {
        $members = Member::oldest('order')->paginate(50);
        $data = Page::where('status', 1)->where('template', 4)->first();
        return view('frontend.pages.team', compact('members', 'data'));
    }
    public function representatives()
    {
        $uni = University::oldest('order')->paginate(50);
        $countries = Abroad::where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.representatives.index', compact('uni', 'countries'));
    }

    public function abroad()
    {
        $countries = Abroad::where('status', 1)->orderBy('order', 'asc')->get();
        return view("frontend.abroad.index", compact('countries'));
    }
    public function event()
    {
        $today = now()->startOfDay();

        // Explicit priority dates
        $priorityDates = ['2025-06-07', '2025-06-14'];

        // Fetch events happening on priority dates first
        $priorityEvents = Event::where('status', 1)
            ->whereIn('date', $priorityDates)
            ->orderByRaw("FIELD(date, '2025-06-07', '2025-06-14')")
            ->get();

        // Fetch upcoming events (excluding priority dates)
        $otherUpcoming = Event::where('status', 1)
            ->whereDate('date', '>=', $today)
            ->whereNotIn('date', $priorityDates)
            ->orderBy('date', 'asc')
            ->get();

        // Combine priority + other upcoming events
        $upcoming = $priorityEvents->merge($otherUpcoming);

        // Fetch expired events (before today)
        $expired = Event::where('status', 1)
            ->whereDate('date', '<', $today)
            ->orderBy('date', 'desc')
            ->get();

        // Final collection: Upcoming first (priority order), then expired
        $event = $upcoming->merge($expired);

        return view("frontend.events.index", compact('event'));
    }



    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('frontend.events.show', compact('event'));
    }
    public function showAbroad($slug)
    {
        $abroad = Abroad::where('slug', $slug)
            ->with(['universities' => function ($query) {
                $query->orderBy('order', 'asc');
            }])
            ->firstOrFail();
        $faq = Faq::all();
        return view("frontend.abroad.show", compact('abroad', 'faq'));
    }
    public function contact()
    {
        $branchtabs = Branchtab::all();
        $branch = Branch::oldest('order')->get();
        return view("frontend.contact.index", compact('branch', 'branchtabs'));
    }
    public function contactStore(StoreContactsRequest $request)
    {
        $token = $request->input('recaptcha_token');
        if (!$token) {
            return redirect()->back()->with('error', 'reCAPTCHA token missing!');
        }

        $secret = env('RECAPTCHA_SECRET_KEY');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $token,
        ]);

        $result = $response->json();

        if ($result['success'] && $result['score'] >= 0.5) {
            Contacts::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'number' => $request->number,
                'message' => $request->message,
            ]);
            
            

            return redirect()->back()->with('message', 'Your message has been submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed reCAPTCHA verification. Please try again.');
        }
    }
    public function vacancy()
    {
        $careers = Careers::all();
        return view("frontend.vacancy.index", compact('careers'));
    }
    public function vacancyStore(StoreVacancyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $data['file'] = fileUpload($request, 'file', 'vacancy');
        }

        Vacancy::create($data);

        return redirect()->back()->with('message', 'Your application has been submitted successfully.');
    }


    public function register()
    {
        $university = University::where('status', 1)->orderBy('order', 'asc')->get();
        $country = Abroad::where('status', 1)->orderBy('order', 'asc')->get();
        $course = Course::where('status', 1)->orderBy('order', 'asc')->get();
        
        // Get event data if event parameter is provided
        $event = null;
        if (request('event')) {
            $event = Event::where('name', request('event'))->with('eventDates')->first();

        }
        
        return view("frontend.register.index", compact('university', 'country', 'course', 'event'));
    }


   
public function registerStore(StoreRegisterRequest $request)
{
    // Get validated data
    $data = $request->validated();

    // Format phone number with +977 prefix
    $data['number'] = '+977 ' . $data['number'];

    // Save to DB
    Register::create($data);

    // Send email notification
    try {
        Mail::to('shrayash000@gmail.com')->send(new RegistrationMail($data));
    } catch (\Exception $emailError) {
        \Log::error('Registration email sending failed: ' . $emailError->getMessage());
    }

    return redirect()->back()->with('message', 'Your registration has been submitted successfully.');
}
    public function appointment()
    {
        return view("frontend.appointment.index");
    }
    public function appointementStore(StoreAppointmentRequest $request)
    {
        Appointment::create($request->validated());
        return redirect()->back()->with('message', 'Your message has been submitted successfully.');
    }


    public function course()
    {
        $course = Course::where('status', 1)->orderBy('order', 'asc')->get();
        return view("frontend.courses.index", compact('course'));
    }
    public function coursesingle($slug)
    {
        $data = Course::where('status', 1)->whereSlug($slug)->first();
        if ($data) {
            $course = Course::where('status', 1)->where('id', '!=', $data->id)->latest()->limit(8)->get();
            return view('frontend.courses.show', compact('data', 'course'));
        }
    }


    public function apply()
    {
        return view("frontend.apply.index");
    }
    public function registration(StoreApplyRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'address',
            'number',
            'message',
            'country',
            'university',
            'course',
            'academic_qualification',
            'academic_score',
            'english_score',
            'passed_year'
        ]);

        $data['bachelor_certificate'] = fileUpload($request, 'bachelor_certificate', 'apply');
        $data['master_certificate'] = fileUpload($request, 'master_certificate', 'apply');
        $data['diploma'] = fileUpload($request, 'diploma', 'apply');
        $data['cv'] = fileUpload($request, 'cv', 'apply');
        $data['grade_twelve'] = fileUpload($request, 'grade_twelve', 'apply');
        $data['other'] = fileUpload($request, 'other', 'apply');
        $data['passport'] = fileUpload($request, 'passport', 'apply');
        $data['ielts'] = fileUpload($request, 'ielts', 'apply');

        Apply::create($data);
        return redirect()->back()->with('message', 'Your message has been submitted successfully.');
    }

    public function costCalculator()
    {
        return view('frontend.cost-calculator.index');
    }

    public function ieltsRegister()
    {
        return view('frontend.ielts-register.index');
    }

    public function ieltsRegisterStore(StoreIeltsRegisterRequest $request)
    {
        $data = $request->validated();
        
        // Create the registration
        $registration = IeltsRegister::create($data);
        
        // Send email notification
        $this->sendIeltsEmailNotification($registration);
        
        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully!'
        ]);
    }

    private function sendIeltsEmailNotification($registration)
    {
        $emailData = [
            'name' => $registration->name,
            'email' => $registration->email,
            'number' => $registration->number,
            'address' => $registration->address,
            'academic_qualification' => $registration->academic_qualification,
            'field_of_study' => $registration->field_of_study,
            'academic_gpa' => $registration->academic_gpa,
            'interested_country' => $registration->interested_country,
        ];

        try {
            \Mail::send('emails.ielts-registration', $emailData, function ($message) use ($registration) {
                $message->to('shrayash000@gmail.com')
                        ->subject('Student registered for IELTS class - ' . $registration->name);
            });
        } catch (\Exception $e) {
            // Log error but don't fail the registration
            \Log::error('Failed to send IELTS registration email: ' . $e->getMessage());
        }
    }
}
