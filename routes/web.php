<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\VacancyController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ProjectCategoryController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\CountersController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PopupController;
use App\Http\Controllers\admin\MembersController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\admin\SlidersController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\DownloadController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\CatalogController;
use App\Http\Controllers\admin\AgencyController;
use App\Http\Controllers\admin\ProcessController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\AbroadUniversityController;
use App\Http\Controllers\admin\AbroadController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\AppointmentController;
use App\Http\Controllers\admin\ApplyController;
use App\Http\Controllers\admin\BranchtabController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\admin\IeltsRegisterController;


Auth::routes(['register' => false]);

// Frontend routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/team', [FrontendController::class, 'team'])->name('team');
Route::get('/blogs', [FrontendController::class, 'news'])->name('news');
Route::get('/representatives', [FrontendController::class, 'representatives'])->name('representatives');
Route::get('/blogs/{slug}', [FrontendController::class, 'newssingle'])->name('newssingle');
Route::get('/abroad', [FrontendController::class, 'abroad'])->name('abroad');
Route::get('/abroad/{slug}', [FrontendController::class, 'showAbroad'])->name('showAbroad');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactStore'])->name('contact.store');
Route::get('/vacancy', [FrontendController::class, 'vacancy'])->name('vacancy');
Route::post('/vacancy', [FrontendController::class, 'vacancyStore'])->name('vacancy.store');
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::post('/register', [FrontendController::class, 'registerStore'])->name('frontend.register.store');
Route::get('/appointment', [FrontendController::class, 'appointment'])->name('appointment');
Route::post('appointment/apply', [FrontendController::class, 'appointementStore'])->name('appointment.apply');
Route::get('/event', [FrontendController::class, 'event'])->name('event');
Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
Route::get('/careers/{slug}', [FrontendController::class, 'careersingle'])->name('careersingle');
Route::get('/event/{slug}', [FrontendController::class, 'showEvent'])->name('showEvent');
Route::get('/course', [FrontendController::class, 'course'])->name('course');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/service/{slug}', [FrontendController::class, 'servicesingle'])->name('servicesingle');
Route::get('/apply', [FrontendController::class, 'apply'])->name('apply');
Route::post('registration', [FrontendController::class, 'registration'])->name('registration.store');
Route::get('/ielts-register', function() {
    return view('frontend.ielts-register.index');
})->name('ielts-register');

Route::post('/ielts-register', [IeltsRegisterController::class, 'store'])->name('ielts-register.store');
Route::get('/cost-calculator', [FrontendController::class, 'costCalculator'])->name('cost-calculator');
Route::get('/course/{slug}', [FrontendController::class, 'coursesingle'])->name('coursesingle');
Route::get('/videos', [FrontendController::class, 'videos'])->name('videos');
Route::get('/{slug}', [FrontendController::class, 'pages'])->name('pages');
Route::post('/news/{id}/like', [NewsController::class, 'like'])->name('news.like');
Route::get('/news/search-ajax', [NewsController::class, 'searchAjax'])->name('news.search.ajax');



// Admin routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('setting', [SettingController::class, 'edit'])->name('admin.setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('admin.setting.update');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/register/export', [RegisterController::class, 'export'])->name('register.export');
    Route::resource('apply', ApplyController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('contacts', ContactsController::class);
    Route::resource('vacancy', VacancyController::class);
    Route::resource('register', RegisterController::class);
    Route::resource('slider', SlidersController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('projectcategory', ProjectCategoryController::class);
    Route::resource('counter', CountersController::class);
    Route::resource('members', MembersController::class);
    Route::resource('social', SocialController::class);
    Route::resource('page', PageController::class);
    Route::resource('popup', PopupController::class);
    Route::resource('news', NewsController::class);
    Route::resource('download', DownloadController::class);
    Route::resource('country', CountryController::class);
    Route::resource('catalog', CatalogController::class);
    Route::resource('agency', AgencyController::class);
    Route::resource('process', ProcessController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('event', EventController::class);
    Route::resource('course', CourseController::class);
    Route::resource('branch', BranchController::class);
    Route::resource('branchtab', BranchtabController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('abroad', AbroadController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('careers', CareersController::class);
    Route::resource('ielts-admin', IeltsRegisterController::class);



    // Reels Routes
    Route::resource('reels', VideoController::class)->names([
        'index' => 'admin.reels.index',
        'create' => 'admin.reels.create',
        'store' => 'admin.reels.store',
        'show' => 'admin.reels.show',
        'edit' => 'admin.reels.edit',
        'update' => 'admin.reels.update',
        'destroy' => 'admin.reels.destroy',
    ]);
    Route::put('reels/{reel}/status', [VideoController::class, 'updateStatus'])->name('admin.reels.updateStatus');

    // Abroad University Routes
    Route::get('/abroad/{abroad_id}/universities/create', [AbroadUniversityController::class, 'createUniversity'])->name('universities.create');
    Route::post('/universities', [AbroadUniversityController::class, 'storeUniversity'])->name('universities.store');
    Route::get('/abroad/{abroad_id}/universities', [AbroadUniversityController::class, 'showUniversities'])->name('universities.index');
    Route::get('/abroad/{abroad_id}/universities/edit', [AbroadUniversityController::class, 'editUniversity'])->name('universities.edit');
    Route::put('/abroad/{abroad_id}/universities/{university}', [AbroadUniversityController::class, 'updateUniversity'])->name('universities.update');
    Route::delete('/abroad/{abroad_id}/universities/{university}', [AbroadUniversityController::class, 'destroy'])->name('universities.destroy');
});
