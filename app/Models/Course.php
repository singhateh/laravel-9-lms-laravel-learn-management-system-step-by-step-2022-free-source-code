<?php

namespace App\Models;

use App\Traits\Slugable;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Course extends Model
{

    use HasFactory, Slugable;

    protected $fillable = ['name', 'code', 'slug', 'description', 'summary', 'requirement', 'teacher_id', 'category_id', 'status', 'price', 'duration', 'started_at', 'finished_at', 'image'];


    protected $casts = ['started_at' => 'datetime', 'finished_at' => 'datetime'];

    public function scopeFrontEndCourse()
    {
        return $this->where('status', 'Enabled');
    }


    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }


    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable')->with('user');
    }

    public function price()
    {
        return $this->price == 0 || $this->price == Null ? 'Free' : Config::get('settings.symbol') . $this->price;
    }
}
