<?php

namespace Tests\Feature\Http\Controllers\API\V2;

use App\Http\Resources\PostCollection;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testIndex()
    {
        $posts = Post::factory(3)->has(Tag::factory()->count(2))->create();
        $response = $this->get(route('api.post.index'));
        
        $response->assertSuccessful();
        
        $expectedData = PostCollection::make($posts)->response()->getData(true);
        $response->assertJson($expectedData);
        
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'summery',
                    'content',
                    'created_at',
                    'updated_at',
                    'tags' => [
                        '*' => [
                            'name'
                        ]
                    ]
                ]
            ]
        ]);
    }
}
