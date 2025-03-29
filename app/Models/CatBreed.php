<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CatBreed extends Pivot
{
    protected $table = 'breed_cat';

    protected $fillable = ['cat_id', 'breed_id', 'percentage'];

    public function cat()
    {
        return $this->belongsTo(Cat::class, 'cat_id');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class, 'breed_id');
    }
}
