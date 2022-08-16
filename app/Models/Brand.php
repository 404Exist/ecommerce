<?php

namespace App\Models;

use App\Traits\HasManyProducts;
use App\Traits\HasUniqueSlug;
use App\Traits\HasUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use HasFactory;
    use HasUniqueSlug;
    use HasTranslations;
    use HasUrl;
    use HasManyProducts;

    public $translatable = ['title'];

    protected $fillable = [
        'title',
        'slug',
        'image',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
