<?php

namespace App\Repositories\ElasticSearch;

use Illuminate\Support\Collection;

interface ElasticsearchInterface
{
    public function search(): Collection;
}
