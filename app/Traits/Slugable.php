<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Casts\Attribute;


trait Slugable
{

    public static function bootSlugable()
    {

        // if user is logged in
        if (auth()->check()) {

            // Creating Function
            static::creating(function ($model) {

                if (Schema::hasColumn($model->getTable(), 'created_by_id')) {
                    $model->created_by_id = auth()->user()->id;
                }

                if (Schema::hasColumn($model->getTable(), 'code')) {
                    $model->code = Str::substr(Str::upper($model->name), 0, 2) . rand(000000, 999999);
                }

                if (Schema::hasColumn($model->getTable(), 'slug')) {
                    if (Schema::hasColumn($model->getTable(), 'title')) {
                        $model->slug = Str::slug($model->title);
                    } else {
                        $model->slug = Str::slug($model->name);
                    }
                }
            });

            // Updating Function
            static::updating(function ($model) {
                if (Schema::hasColumn($model->getTable(), 'updated_by_id')) {
                    $model->updated_by_id = auth()->user()->id;
                }
            });
        } else {
            static::creating(function ($model) {

                if (Schema::hasColumn($model->getTable(), 'code')) {
                    $model->code = Str::substr(Str::upper($model->name), 0, 2) . rand(000000, 999999);
                }

                if (Schema::hasColumn($model->getTable(), 'slug')) {
                    if (Schema::hasColumn($model->getTable(), 'title')) {
                        $model->slug = Str::slug($model->title);
                    } else {
                        $model->slug = Str::slug($model->name);
                    }
                }
                if (!App::runningInConsole()) {
                    $model->assignRole('User');
                }
            });
        }
    }


    public function link()
    {

        if (Schema::hasColumn($this->getTable(), 'slug')) {

            if (request()->routeIs('students.*')) {
                return Route('students.show', $this->slug);
            } elseif (request()->routeIs('instructors.*')) {
                return Route('instructors.show', $this->slug);
            } elseif (request()->routeIs('Courses.*') || request()->is('/') || request()->routeIs('Categories.*')) {
                return Route('Courses.single',  [$this->id, $this->slug]);
            } elseif (request()->routeIs('teachers.*')) {
                return Route('teachers.single', $this->slug);
            } elseif (request()->routeIs('Events.*')) {
                return Route('Events.single', $this->slug);
            } elseif (request()->routeIs('news.*')) {
                return Route('news.single', $this->slug);
            } elseif (request()->routeIs('newses.*')) {
                return Route('newses.show', $this->slug);
            } elseif (auth()->user()->hasRole('User')) {
                return Route('students.show', $this->slug);
            } elseif (auth()->user()->hasRole('Teacher')) {
                return Route('students.show', $this->slug);
            }
            return Route($this->getTable() . '.show', $this->slug);
        }
    }

    public function slug()
    {
        if (Schema::hasColumn($this->getTable(), 'slug')) {
            return $this->slug;
        }
    }

    protected function status(): Attribute
    {
        if (Schema::hasColumn($this->getTable(), 'status')) {

            return Attribute::make(
                get: fn ($value) => ucfirst($value),
                set: fn ($value) => strtolower($value),
            );
        }
    }

    public function image()
    {
        if (Schema::hasColumn($this->getTable(), 'image')) {
            return asset(!empty($this->image) ? '/jambasangsang/assets/' . $this->getTable() . '/images/' . $this->image : \constPath::DefaultImage);
        }
    }
}
