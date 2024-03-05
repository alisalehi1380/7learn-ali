<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\SmsNotification;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Notification;

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
        
        $this->syncPostsWithTags($posts, $tags);
        $this->syncCategoriesWithTags($tags, $categories);

//        $this->addPostsInES($posts);
        
        Notification::sendNow($posts, new SmsNotification('complete indexing!', env('YOUR_PHONE_NUMBER')));
        
        Model::reguard();
    }
    
    private function syncPostsWithTags(Collection $posts, Collection $tags): void
    {
        $this->tagsId = $tags->pluck('id')->toArray();
        $posts->each(function ($post) {
            $post->tags()->sync(collect($this->tagsId)->random(rand(2, 10)));
        });
    }
    
    private function syncCategoriesWithTags(Collection $tags, Collection $categories): void
    {
        $this->categoriesId = $categories->pluck('id')->toArray();
        $tags->each(function ($tag) {
            $tag->categories()->sync(collect($this->categoriesId)->random(rand(2, 8)));
        });
    }
    
    private function addPostsInES($posts): void
    {
        try {
            $elastic = ClientBuilder::create()->build();
            
            foreach ($posts as $post) {
                $params = [
                    'index' => 'posts',
                    'id'    => $post->id,
                    'body'  => [
                        'title'      => $post->title,
                        'summery'    => $post->summery,
                        'content'    => $post->content,
                        'created_at' => $post->created_at,
                        'updated_at' => $post->created_at,
                    ]
                ];
                
                $response = $elastic->index($params);
                
                echo $post->id . "." . $post->title . " is transferred.\n";
                
                
                if ($response['result'] == 'created') {
                    echo 'Posts added successfully to Elasticsearch.';
                } else {
                    echo 'Failed to add Posts to Elasticsearch.';
                }
                
            }
        } catch (\Exception $e) {
            info($e->getMessage());
            echo 'Failed to add Posts to Elasticsearch.';
        }
    }
}
