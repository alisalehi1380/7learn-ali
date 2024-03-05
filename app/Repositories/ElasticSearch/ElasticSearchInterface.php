<?php

namespace App\Repositories\ElasticSearch;

use Illuminate\Support\Collection;

interface ElasticSearchInterface
{
    public function search(): Collection;
    public function create(): void;
}
