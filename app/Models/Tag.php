<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function restaurants()
    {
        return $this
            ->belongsToMany(Restaurant::class)
            ->using(RestaurantTag::class)
            ->withPivot('preferred')
            ->withTimestamps();
    }

    public function users()
    {
        return $this
            ->belongsToMany(User::class)
            ->using(UserTag::class)
            ->withPivot('preferred')
            ->withTimestamps();
    }
}
