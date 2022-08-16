<?php

namespace App\Traits;

use App\Models\Review;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyReviews
{
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
