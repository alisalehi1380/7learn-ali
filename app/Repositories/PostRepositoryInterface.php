<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function all(): Collection;
}
