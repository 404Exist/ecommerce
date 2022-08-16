<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category): void
    {
        cache()->forget('categories');
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category): void
    {
        cache()->forget('categories');
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category): void
    {
        cache()->forget('categories');
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category): void
    {
        cache()->forget('categories');
    }

    /**
     * Handle the Category "forceDeleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category): void
    {
        cache()->forget('categories');
    }
}
