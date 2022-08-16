<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasProductAttributes
{
    use HasUrl;

    public function price(): Attribute
    {
        return Attribute::get(
            fn () => '$' . number_format($this->selling_price - $this->discount, 2)
        );
    }

    public function oldPrice(): Attribute
    {
        return Attribute::get(
            fn () => $this->selling_price > 0 ? '$' . number_format($this->selling_price, 2) : ''
        );
    }

    public function discount(): Attribute
    {
        return Attribute::get(
            fn () => $this->discount_for >= now() ? $this->discount_price : 0
        );
    }

    public function stars(): Attribute
    {
        return Attribute::get(
            fn () => $this->reviews->sum('rating') > 0 ? $this->reviews->sum('rating') / $this->reviews->count() : 0
        );
    }

    public function isInStock(): Attribute
    {
        return Attribute::get(
            fn () => $this->stock > 0
        );
    }

    public function starsView(): Attribute
    {
        return Attribute::get(
            function () {
                $html = '';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= round($this->stars)) {
                        if ($i == round($this->stars) && is_float($this->stars)) {
                            $html .= '<span><i class="fa fa-star-half-o"></i></span>';
                        } else {
                            $html .= '<span><i class="fa fa-star"></i></span>';
                        }
                    } else {
                        $html .= '<span><i class="fa fa-star-o"></i></span>';
                    }
                }

                return $html;
            }
        );
    }
}
