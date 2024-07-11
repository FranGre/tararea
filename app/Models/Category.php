<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function toSearchableArray(): array
    {
        $array = [];

        $array['title'] = $this->title;

        return $array;
    }
}
