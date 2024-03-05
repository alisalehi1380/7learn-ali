<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::search('your_query_here')->get();
        return PostResource::make($data);
    }
    
    public function show(Post $post)
    {
        return PostResource::make($post);
    }
}
