<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Repositories\Eloquent\PostRepository;

class PostController extends Controller
{
    public function index(PostRepository $postRepository): PostCollection
    {
        return PostCollection::make($postRepository->all());
    }
}
