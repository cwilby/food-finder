<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RestaurantTag extends Pivot
{
    protected $fillable = [
        'user_id',
        'tag_id',
        'preferred'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
