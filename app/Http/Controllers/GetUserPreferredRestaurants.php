<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserPreferredRestaurants extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::find($request->userId);

        $preferredTagIds = $user->tags()->where('preferred', '=', true)->get()->pluck('id');

        return Restaurant::query()
            ->whereHas('tags', fn ($tags) => $tags->whereIn('tags.id', $preferredTagIds))
            ->with('tags')
            ->get();
    }
}
