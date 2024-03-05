<?php

namespace Tests\Feature\Http\Middlewares;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_redirect_to_past_version(): void
    {
        $post = Post::factory()->create();
        $response = $this->get(route('api.v2.post.show', $post));
        $v1 = 'http://localhost/api/v1/posts/' . $post->getKey();
        
        $response->assertRedirect($v1);
        $response->assertRedirectToRoute('api.v1.post.show', $post->getKey());
        
        $response = $this->get(route('api.v1.post.show', $post));
        $response->assertOk();
    }
    
    public function test_exist_method(): void
    {
        $response = $this->get(route('api.v2.post.index'));
        $response->assertOk();
    }
    
    public function test_not_exist_method(): void
    {
        $v1 = 'http://localhost/api/v1/ali';
        $response = $this->get($v1);
        $response->assertNotFound();
        
        $v1 = 'http://localhost/api/v2/ali';
        $response = $this->get($v1);
        $response->assertNotFound();
    }
}
