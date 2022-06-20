<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{

    public function index()
    {
        Gate::authorize('view_users');
        return view('jambasangsang.backend.students.index', ['students' => User::Student()->get()]);
    }


    public function create()
    {
        Gate::authorize('add_users');
    }


    public function store(StoreStudentRequest $request)
    {
        Gate::authorize('add_users');
    }


    public function show($slug)
    {
        Gate::authorize('profile_students');
        return view('jambasangsang.backend.students.show', ['student' => User::with('courses', 'courses.course', 'courses.course.lessons', 'courses.course.teacher')->whereSlug($slug)->first()]);
    }


    public function edit(Student $student)
    {
        Gate::authorize('edit_users');
    }


    public function update(UpdateStudentRequest $request, Student $student)
    {
        Gate::authorize('edit_users');
    }

    public function destroy(Student $student)
    {
        Gate::authorize('delete_users');
    }
}
