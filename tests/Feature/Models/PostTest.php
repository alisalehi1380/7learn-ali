<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_tags_relation(): void
    {
        $count = 2;
        $post = Post::factory()->has(Tag::factory()->count($count))->create();
        
        $this->assertCount($count, $post->tags);
        $this->assertInstanceOf(Tag::class, $post->tags->first());
        $this->assertInstanceOf(BelongsToMany::class, $post->tags());
    }
}
