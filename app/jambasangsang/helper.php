<?php

use Illuminate\Support\Str;


if (!function_exists('is_active')) {
    function is_active($uri): string
    {
        return request()->is($uri) ? 'active' : (request()->routeIs($uri) ? 'active' : 'not');
    }
}

if (!function_exists('is_show')) {
    function is_show($uri): string
    {
        return request()->routeIs($uri . '.*') ? 'show' : 'not';
    }
}


if (!function_exists('is_selected')) {
    function is_selected($param1, $param2): string
    {
        return $param1 == $param2 ? 'selected' : 'not';
    }
}



if (!function_exists('uploadOrUpdateFile')) {
    function uploadOrUpdateFile($request, $image, $path)
    {

        if ($request->hasFile('image')) {
            // update the image //
            if ($request->edit_id) {
                if (!empty($image)) {

                    $photo_path = public_path() . $path . $image;
                    unlink($photo_path);
                }
            }
            // Add New image
            $file = $request->file('image');
            $randomName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . $path, $randomName);
            $image = $randomName;
        }
        return  $image;
    }
}


if (!function_exists('removeFile')) {
    function removeFile($image, $path)
    {
        if (!empty($image)) {
            $photo_path = public_path() . $path . $image;
            unlink($photo_path);
        }
        return  $image;
    }
}

if (!function_exists('uploadLogo')) {
    function uploadLogo($request, $image)
    {
        if (!empty($image)) {
            $photo_path = Str::replace(url('') . '/', '', $image);
            unlink($photo_path);
        }

        $file = $request->settings['logo'];
        $randomName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . \constPath::SystemLogo, $randomName);
        $image = $randomName;
        return  url(\constPath::SystemLogo . $image);
    }
}
