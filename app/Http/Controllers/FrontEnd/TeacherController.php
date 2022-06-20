<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('jambasangsang.frontend.teachers.index', ['teachers' => User::Teacher()->get()]);
    }

    public function single()
    {
        # code...
    }
}
