<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Jambasangsang\Flash\Facades\LaravelFlash;

class SettingController extends Controller
{

    public function index()
    {
        Gate::authorize('view_settings');
        return view('jambasangsang.backend.settings.index', ['settings' => Setting::all()]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add_settings');

        // dd($request->except('settings[logo]'));
        foreach (Arr::except($request->settings, ['logo']) as $key => $value) {
            Setting::firstWhere('key', $key)->update([
                'value' => $value
            ]);
        }
        if (!empty($request->settings['logo'])) {

            $setting = Setting::where('key', 'logo')->first();
            $setting->value  = uploadLogo($request, $setting->value);
            $setting->save();
        }

        LaravelFlash::withSuccess('News Updated Successfully');
        return redirect()->route('settings.index');
    }
}
