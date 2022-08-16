<?php

namespace App\Traits;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasProductRelations
{
    use HasManyReviews;

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
