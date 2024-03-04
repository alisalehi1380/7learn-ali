<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function find($id): ?Model;
}
