<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    public function index()
    {
        $course = Course::latest()->paginate(10);
        return view('admin.course.index', compact('course'));
    }


    public function create()
    {
        return view('admin.course.create');
    }


    public function store(StoreCourseRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'course');
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = Str::slug($request->name);

        // Create the Course
        Course::create($input);
        return redirect()->route('course.index')->with('message', 'Created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }


    public function update(UpdateCourseRequest $request, Course $course)
    {
        $old_image = $course->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'course');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = make_slug($request->title);
        $course->update($input);
        return redirect()->route('course.edit', $course->id)->with('message', 'Update Successfully');
    }


    public function destroy(Course $course)
    {
        removeFile($course->image);
        $course->delete();
        return redirect()->route('course.index')->with('message', 'Delete Successfully');
    }
}
