<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map([$this, 'transformPost'])
        ];
    }

    public function transformPost($post): array
    {
        return [
            'name' => $post->name,
            'summery' => $post->summery,
            'content' => $post->content,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
            'tags' => $post->tags->map([$this, 'transformTag']),
        ];
    }

    public function transformTag($tag): array
    {
        return [
            'name' => $tag->name
        ];
    }
}
