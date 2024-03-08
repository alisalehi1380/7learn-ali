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
        return array_values([
            PostResource::make($post),
            'tags' => $post->tags->map([$this, 'transformTag']),
        ]);
    }

    public function transformTag($tag): array
    {
        return [
            'name' => $tag->name
        ];
    }
}
