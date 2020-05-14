<?php

use App\Models\Restaurant;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tagCount = 10;
    private $restaurantCount = 10;
    private $userCount = 100;
    private $pivotRandomMin = 1;
    private $pivotRandomMax = 10;

    public function run()
    {
        $tags = factory(Tag::class, $this->tagCount)->create();

        factory(Restaurant::class, $this->restaurantCount)
            ->create()
            ->each(function ($restaurant) use ($tags) {
                $this->addRandomTags($restaurant, $tags);
            });

        factory(User::class, $this->userCount)
            ->create()
            ->each(function ($user) use ($tags) {
                $this->addRandomTags($user, $tags);
            });
    }

    private function addRandomTags($taggable, Collection $tags)
    {
        Tag::inRandomOrder()
            ->take(rand($this->pivotRandomMin, $this->pivotRandomMax))
            ->get()
            ->each(
                fn ($tag) => $taggable
                    ->tags()
                    ->attach(
                        $tag->id,
                        ['preferred' => !!rand(0, 1)]
                    )
            );
    }
}
