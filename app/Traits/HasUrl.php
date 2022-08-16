<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasUrl
{
    public function url(): Attribute
    {
        return Attribute::get(
            fn () => route(strtolower(class_basename($this)), $this->slug)
        );
    }
}
