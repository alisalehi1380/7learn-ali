<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Notifiable;
    use Searchable;

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
