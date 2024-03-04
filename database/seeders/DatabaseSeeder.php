<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private array $tagsId;
    private array $categoriesId;

    public function run(): void
    {
        Model::unguard();

        $categories = Category::factory(8)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(2)->create();

        $this->categoriesId = $categories->pluck('id')->toArray();
        $this->tagsId = $tags->pluck('id')->toArray();

        $this->syncPostsWithTags($posts);
        $this->syncCategoriesWithTags($tags);

        Model::reguard();
    }

    private function syncPostsWithTags(Collection $posts) : void
    {
        $posts->each(function ($post) {
            $post->tags()->sync(collect($this->tagsId)->random(rand(2, 10)));
        });
    }

    private function syncCategoriesWithTags(Collection $tags) : void
    {
        $tags->each(function ($tag) {
            $tag->categories()->sync(collect($this->categoriesId)->random(rand(2, 8)));
        });
    }
}
