<?php

namespace App\Traits;

use App\Enums\ProductStatuses;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait HasProductScopes
{
    public function scopePublished($query): Builder
    {
        return $query->where('status', ProductStatuses::PUBLISHED->value);
    }

    public function scopeHot($query): Builder
    {
        return $query->where('discount_price', '>', 0)->where('discount_for', '>', now())
            ->orderBy('discount_price', 'desc');
    }

    public function scopeNewest($query): Builder
    {
        return $query->where('created_at', '>', now()->subMonth())->orderBy('created_at', 'desc');
    }

    public function scopeOrderByRates($query, $sort = 'desc'): Builder
    {
        return $query->withSum('reviews', 'rating')->orderBy('reviews_sum_rating', $sort);
    }

    public function scopeRelated($query): Builder
    {
        return $query->where('category_id', $this->category_id)->where('id', '!=', $this->id);
    }
}
