<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // dd(auth()->user()->courses()->withCount('course', 'student')->with('course:id,name,slug,image')->get());
        return view(
            'home',
            [
                'numberOfAdmins' => User::Admin()->count(),
                'numberOfTeachers' => User::Teacher()->count(),
                'numberOfStudents' => User::Student()->count(),
                'numberOfActiveStudents' => User::Student()->where('status', 'Enabled')->count(),
                'numberOfInactiveStudents' => User::Student()->where('status', 'Disabled')->count(),
                'numberOfStaff' => User::Staff()->count(),
                'numberOfCourses' => auth()->user()->hasRole('Teacher') ? auth()->user()->userCourses()->where('status', 'Enabled')->count() : Course::count(),
                'numberOfInactiveCourses' => auth()->user()->hasRole('Teacher') ? auth()->user()->userCourses()->where('status', 'Disabled')->count() : Course::count(),
                'numberOfCourses' => auth()->user()->hasRole('Teacher') ? auth()->user()->userCourses()->count() : Course::count(),
                'numberOfCoursesAndStudents' => auth()->user()->hasRole('Teacher') ?
                    auth()->user()->userCourses()->select('id', 'name', 'slug', 'image')->withCount('students')->get() : (auth()->user()->hasRole('User')  ? auth()->user()->courses()->withCount('course', 'student')->with('course:id,name,slug,image')->get() : Course::select('id', 'name', 'slug', 'image')->withCount('students')->get()),
                'news' => News::where('status', 'Enabled')->get(['id', 'title', 'created_at']),
                'events' => Event::where('status', 'Enabled')->get(['id', 'title', 'created_at']),

            ]
        );
    }
}
