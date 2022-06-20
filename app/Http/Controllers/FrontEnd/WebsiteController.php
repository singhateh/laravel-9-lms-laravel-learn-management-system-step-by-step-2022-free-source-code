<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\{Category, Course, Event, News, Slider, User};
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function website()
    {

        // dd(News::inRandomOrder()->get()->take(4));

        return view(
            'welcome',
            [
                'categories' => Category::where('status', 'Enabled')->whereNotNull('parent_id')->get(['id', 'name', 'image', 'slug']),
                'teachers' => User::Teacher()->where('status', 'Enabled')->get(),
                'courses' => Course::with('teacher:id,name,image,slug', 'students:id')->where('status', 'Enabled')->get(),
                'random_news' => News::inRandomOrder()->get()->take(4),
                'featured_new' => News::inRandomOrder()->take(1)->get(),
                'sliders' => Slider::where('status', 'Enabled')->get(),
                'events' => Event::where('status', 'Enabled')->get(),
            ]
        );
    }
}
