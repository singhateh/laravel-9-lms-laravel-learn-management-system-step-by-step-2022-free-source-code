<?php

namespace App\Models;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, Slugable;

    protected $fillable = [
        'image',
        'title',
        'content',
        'slug',
        'date',
        'status',
        'created_by_id',
        'is_read'

    ];

    protected $casts = ['date' => 'datetime'];


    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
