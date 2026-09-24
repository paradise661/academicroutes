<?php

namespace App\Providers;

use App\Models\News;
use App\Models\Social;
use App\Models\Setting;
use App\Models\Course;
use App\Models\Review;
use App\Models\Member;
use App\Models\Popup;





use App\Models\CompanyCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $data1 = Setting::pluck('value', 'key');
        $data2 = Social::whereStatus(1)->oldest('order')->get();
        $data3 = CompanyCategory::all();
        $course = Course::where('status', 1)->orderBy('order', 'asc')->get();
        $review = Review::all();
        $members = Member::all();
        $popup = Popup::all();
        View::share('members', $members);
        View::share('popup', $popup);


        View::share('review', $review);
        View::share('course', $course);
        View::share('social', Social::all());
        View::share('setting', $data1);
        View::share('companycategory', $data3);
        View::share('socialdata', $data2);
        View::share('footerblog', $data3);

        Paginator::useBootstrap();
    }
}
