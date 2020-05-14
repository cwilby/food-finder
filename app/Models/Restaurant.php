<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name'
    ];

    public function tags()
    {
        return $this
            ->belongsToMany(Tag::class)
            ->using(RestaurantTag::class)
            ->withPivot(['preferred'])
            ->withTimestamps();
    }
}
