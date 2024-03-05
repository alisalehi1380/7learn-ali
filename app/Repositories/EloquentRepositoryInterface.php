<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface EloquentRepositoryInterface
{
    public function all(): ?Collection;
}
