<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{


    public function index()
    {
        return view('jambasangsang.frontend.courses.index', ['courses' => Course::FrontEndCourse()->with('teacher:id,name,image,slug', 'students:id')->where('status', 'Enabled')->paginate(6)]);
    }

    public function single(Course $course)
    {
        // dd($slug);
        // $course = Course::whereSlug($slug)->first();
        // dd($course);

        return view('jambasangsang.frontend.courses.single', [
            'related_courses' => Course::FrontEndCourse()->with('teacher:id,name,image,slug')->where('category_id', $course->category_id)->where('id', '!=', $course->id)->inRandomOrder()->take(2)->get(),
            'course' => $course->load('teacher:id,name,image,slug', 'students:id', 'category:id,name,slug', 'lessons', 'reviews'),
            'courses_you_may_like' => Course::FrontEndCourse()->with('teacher:id,name,image,slug')->where('id', '!=', $course->id)->inRandomOrder()->take(3)->get(),
        ]);
    }
}
