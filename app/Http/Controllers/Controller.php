<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        $notificationNews = News::where(['status' => 'Enabled', 'is_read'  => 'no'])->select('id', 'title', 'slug', 'created_at')->get();
        $notificationEvents = Event::where(['status'  => 'Enabled', 'is_read' => 'no'])->select('id', 'title', 'slug', 'created_at')->get();
        $settingLogo = Setting::where('key', 'logo')->first();

        view()->share(['notificationNews' => $notificationNews, 'notificationEvents' => $notificationEvents, 'system' => $settingLogo]);
    }
}
