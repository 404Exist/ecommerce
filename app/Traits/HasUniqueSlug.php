<?php

namespace App\Traits;

trait HasUniqueSlug
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($row) {
            $row->slug = $row->uniqueSlug($row->title);
        });
    }

    private function uniqueSlug($title): string
    {
        if (static::whereSlug($slug = str($title)->slug())->exists()) {
            $max = static::where('title->en', $title)->count() + 1;

            return str("{$slug}-{$max}")->slug();
        }

        return str($slug)->slug();
    }
}
