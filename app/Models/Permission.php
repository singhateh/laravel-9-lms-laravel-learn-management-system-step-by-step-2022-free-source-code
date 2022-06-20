<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{


    public static function defaultPermissions()
    {
        return [

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_courses',
            'add_courses',
            'edit_courses',
            'delete_courses',

            'view_lessons',
            'add_lessons',
            'edit_lessons',
            'delete_lessons',

            'view_categories',
            'add_categories',
            'edit_categories',
            'delete_categories',

            'view_events',
            'add_events',
            'edit_events',
            'delete_events',

            'view_news',
            'add_news',
            'edit_news',
            'delete_news',

            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_teachers',
            'add_teachers',
            'edit_teachers',
            'delete_teachers',

            'view_students',
            'add_students',
            'edit_students',
            'delete_students',

            'view_settings',
            'add_settings',
            'edit_settings',
            'delete_settings',

            'view_admin',
            'view_dashboard',
            'profile_users',
            'profile_students',
            'profile_teachers',

        ];
    }
}
