<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Breed extends Model
{
    /** @use HasFactory<\Database\Factories\BreedFactory> */
    use HasFactory;

    public function cats(): BelongsToMany
    {
        return $this->belongsToMany(Cat::class)
            ->using(CatBreed::class)
            ->withPivot('percentage');
    }
}
