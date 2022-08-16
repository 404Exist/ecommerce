<?php

namespace App\Models;

use App\Traits\HasProductAttributes;
use App\Traits\HasProductRelations;
use App\Traits\HasProductScopes;
use App\Traits\HasSku;
use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUniqueSlug;
    use HasSku;
    use HasProductScopes;
    use HasProductAttributes;
    use HasProductRelations;

    public $translatable = ['title', 'short_description', 'description'];

    protected $fillable = [
        'brand_id',
        'category_id',
        'title',
        'slug',
        'image',
        'sku',
        'selling_price',
        'discount_price',
        'stock',
        'status',
        'short_description',
        'description',
        'discount_for',
    ];

    protected $with = ['reviews'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($row) {
            $row->slug = $row->uniqueSlug($row->title);
            $row->sku = $row->sku($row);
        });
        static::updating(function ($row) {
            $row->slug = $row->uniqueSlug($row->title);
            $row->sku = $row->sku($row);
        });
    }
}
