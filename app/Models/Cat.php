<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cat extends Model
{
    /** @use HasFactory<\Database\Factories\CatFactory> */
    use HasFactory;

    public function breeds(): BelongsToMany
    {
        return $this->belongsToMany(Breed::class)
            ->using(CatBreed::class)
            ->withPivot('percentage');
    }
}
