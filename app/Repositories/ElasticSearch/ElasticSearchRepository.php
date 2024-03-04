<?php

namespace App\Repositories\ElasticSearch;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Collection;

class ElasticSearchRepository implements ElasticsearchInterface
{
    private $client;
    private $index;

    public function __construct($index)
    {
        $this->client = ClientBuilder::create()->build();
        $this->index = $index;
    }

    public function search($index, $query): Collection
    {
        $params = [
            'index' => $index,
            'body' => [
                'query' => [
                    'match' => [
                        'field' => $query,
                    ],
                ],
            ],
        ];

        return $this->client->search($params);
    }
}
