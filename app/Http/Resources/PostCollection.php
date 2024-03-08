<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => collect($this->collection)->map(function (PostResource $post) use ($request) {
                return $this->transformPost($post, $request);
            }),
        ];
    }
    
    public function transformPost(PostResource $post, Request $request): array
    {
        return array_merge(
            PostResource::make($post)->toArray($request),
            ['tags' => $post->tags->map([$this, 'transformTag'])]
        );
    }
    
    public function transformTag(Tag $tag): array
    {
        return [
            'name' => $tag->name
        ];
    }
}
