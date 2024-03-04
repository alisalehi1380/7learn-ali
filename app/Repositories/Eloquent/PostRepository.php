<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
