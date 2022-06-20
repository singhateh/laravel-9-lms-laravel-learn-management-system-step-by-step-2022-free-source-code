<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Course, User};
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Gate;
use Jambasangsang\Flash\Facades\LaravelFlash;

class CourseController extends Controller
{

    public function index()
    {
        Gate::authorize('view_courses');
        abort_if(auth()->user()->hasRole('User'), 403);

        return view(
            'jambasangsang.backend.courses.index',
            [
                'courses' => auth()->user()->hasRole('Teacher') ? auth()->user()->userCourses()->with(['teacher:id,name', 'category:id,name'])->get() : Course::with(['teacher:id,name', 'category:id,name'])->get(),
                'categories' => Category::get(['id', 'name'])
            ]
        );
    }


    public function create()
    {
        Gate::authorize('add_courses');
        return view(
            'jambasangsang.backend.courses.create',
            [
                'teachers' => User::Teacher()->get(['id', 'name']),
                'categories' => Category::with('parents')->whereNull('parent_id')->where('status', 'enabled')->get(['id', 'name'])
            ]
        );
    }


    public function store(StoreCourseRequest $request)
    {
        Gate::authorize('add_courses');

        $course = Course::create($request->validated());
        $course->image  = uploadOrUpdateFile($request, $course->image, \constPath::CourseImage);
        $course->save();
        LaravelFlash::withSuccess('Course Created Successfully');
        return redirect()->route('courses.index');
    }


    public function show($slug)
    {
        Gate::authorize('view_courses');
        return view(
            'jambasangsang.backend.courses.show',
            ['course' => Course::with('teacher:id,name,email', 'category:id,name', 'lessons')->whereSlug($slug)->first()]
        );
    }


    public function edit(Course $course)
    {
        Gate::authorize('edit_courses');

        return view('jambasangsang.backend.courses.edit', [
            'course' => $course, 'teachers' => User::Teacher()->get(['id', 'name']),
            'categories' => Category::with('parents')->whereNull('parent_id')->where('status', 'enabled')->get(['id', 'name'])
        ]);
    }


    public function update(UpdateCourseRequest $request, Course $course)
    {
        Gate::authorize('edit_courses');

        $course->update($request->validated());
        $course->image  = uploadOrUpdateFile($request, $course->image, \constPath::CourseImage);
        $course->save();
        LaravelFlash::withSuccess('Course Updated Successfully');
        return redirect()->route('courses.index');
    }


    public function destroy($id)
    {
        Gate::authorize('delete_courses');
    }
}
