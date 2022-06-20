<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{

    protected $fillable = ['message', 'user_id'];

 
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messageable() : MorphTo
    {
        return $this->morphTo();
    }
}
