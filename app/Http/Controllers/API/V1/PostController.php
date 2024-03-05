<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Repositories\ElasticSearch\ElasticSearchRepository;

class PostController extends Controller
{
    public function index(ElasticSearchRepository $elasticSearchRepository)
    {
        $data = $elasticSearchRepository->search();
        return PostResource::make($data);
    }

    public function show(Post $post)
    {
        dd('show - v1');
    }
}
