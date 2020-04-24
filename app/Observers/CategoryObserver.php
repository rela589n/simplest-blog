<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{

    /**
     * Handle the category "deleting" event.
     *
     * @param Category $category
     * @return void|false
     */
    public function deleting(Category $category)
    {
        // forbid deleting "Uncategorized"
        if ($category->id == 1) {
            return false;
        }

        $category->posts()->update(['category_id' => 1]);
    }
}
