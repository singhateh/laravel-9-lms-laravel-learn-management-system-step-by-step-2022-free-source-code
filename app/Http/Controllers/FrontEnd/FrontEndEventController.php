<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndEventController extends Controller
{
    public function index()
    {
        return view('jambasangsang.frontend.events.index', ['events' => Event::get()]);
    }

    public function single($slug)
    {
        return view('jambasangsang.frontend.events.single', ['event' => Event::whereSlug($slug)->first()]);
    }
}
